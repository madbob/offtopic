<?php

namespace App\Http\Controllers;

use App\List;

class ListController extends Controller
{

	public function index()
	{
		$data['lists'] = List::orderBy('address', 'asc')->get();
		return view('welcome', $data);
	}

	public function widget($list)
	{
	}

}
