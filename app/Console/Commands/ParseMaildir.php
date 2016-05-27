<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ParseMaildir extends Command
{
	protected $signature = 'maildir {dir}';
	protected $description = 'Pass mails into a Maildir to the `parse` command';

	public function __construct()
	{
		parent::__construct();
	}

	public function handle()
	{
		$folder = $this->argument('dir');

		$files = array_diff(scandir($folder), ['.', '..']);
		foreach ($files as $file) {
			$file = sprintf('%s/%s', $folder, $file);
			$this->callSilent('parse', ['file' => $file]);
			unlink($file);
		}
	}
}

