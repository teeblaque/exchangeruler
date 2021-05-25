<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveData extends Controller
{
	public function index(){
      $prices = get_curl("https://blockchain.info/ticker");

      return view('front.welcome', ['prices' => $prices);

       // return view("front.welcome")->with('prices',json_decode($prices, true));
}

       // $view->with('menu', $prices["USD"]["sell"])->with('catalogue', $catalogue);
}
