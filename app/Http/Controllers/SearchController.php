<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function main() {
      $cities = ['Томск', 'Москва', 'Екатеринбург', 'Сочи', 'Санкт-Петербург', 'Саратов', 'Анжеро-Судженск'];

      return view('home', compact('cities'));
    }

    public function search(Request $request) {
      $items = array();
      sleep(2);
      $returnHTML = view('inc.search-result', compact('items'))->render();
      return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
}
