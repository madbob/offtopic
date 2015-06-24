<?php

/*
	Most of this class has been inspired by
	http://www.sitepoint.com/piping-emails-laravel-application/
*/

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMimeMailParser\Parser;
use App\MailingList;
use App\Thread;
use App\Mail;
use App\Contact;

class EmailParse extends Command
{
	protected $signature = 'parse';
	protected $description = 'Parse incoming mail';

	public function handle()
	{
		$fd = fopen("php://stdin", "r");
		$rawEmail = "";
		while (!feof($fd))
			$rawEmail .= fread($fd, 1024);

		fclose($fd);

		$parser = new Parser();
		$parser->setText($rawEmail);

		$list = $parser->getHeader('x-beenthere');
		if ($list === false)
			return;

		$reference = mailparse_rfc822_parse_addresses($list);
		$reference = $reference[count($reference) - 1];
		$l = MailingList::where('address', '=', $reference['address'])->first();
		if ($l == null) {
			$l = new MailingList();
			$l->address = $reference['address'];
			$l->save();
		}

		$from = $parser->getHeader('from');
		$reference = mailparse_rfc822_parse_addresses($from);
		$c = Contact::where('mail', '=', $reference[0]['address'])->first();
		if ($c == null) {
			$c = new Contact();
			$c->name = $reference[0]['display'];
			$c->mail = $reference[0]['address'];
			$c->save();
		}

		$thread_id = -1;
		$previous = $parser->getHeader('in-reply-to');
		if ($previous != null) {
			$reference = Mail::where('message_id', '=', $previous)->first();
			if ($reference != null)
				$thread_id = $reference->thread_id;
		}
		if ($thread_id == -1) {
			$t = new Thread();
			$t->title = $parser->getHeader('subject');
			$t->save();
			$thread_id = $t->id;
		}

		$mail = new Mail();
		$mail->contact_id = $c->id;
		$mail->thread_id = $thread_id;
		$mail->message_id = $parser->getHeader('message-id');
		$mail->save();
	}
}
