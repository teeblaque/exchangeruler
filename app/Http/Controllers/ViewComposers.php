<?php

namespace App\Http\ViewComposers;

use App\Catalogue;
use App\Nav;

class NavComposer
{
    public function compose($view)
    {
        $prices = get_curl("https://blockchain.info/ticker");
        $catalogue = Catalogue::all();

        $view->with('menu', $prices["USD"]["sell"])->with('catalogue', $catalogue);
    }
}
