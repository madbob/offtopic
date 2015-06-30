<?php

namespace App\Http\Controllers;

use App\MailingList;
use App\Thread;
use Config;

class ListController extends Controller
{

	public function __construct()
	{
		Config::set('session.driver', 'array');
	}

	public function index()
	{
		$data['lists'] = MailingList::orderBy('address', 'asc')->get();
		return view('welcome', $data);
	}

	public function widget($list)
	{
		$l = MailingList::where('address', '=', $list)->first();
		if ($l == null) {
			return view('notfound');
		}
		else {
			$data['list'] = $l;
			$data['threads'] = Thread::where('list_id', '=', $l->id)->orderBy('created_at', 'desc')->take(10)->get();
			return view('widget', $data);
		}
	}

}
