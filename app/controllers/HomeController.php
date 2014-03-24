<?php

class HomeController extends BaseController {


	public function index()
	{
		$data['options'] = Option::AllAsFlatten();
		
		$data['taps'] = ActiveTap::orderBy('tapNumber')->get();

		return View::make('home.index', $data);
	}

}