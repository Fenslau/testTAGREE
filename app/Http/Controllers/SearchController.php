<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Contracts\SearchInterface;
use App\Models\City;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function main() {
      $cities = City::pluck('name', 'id');
      return view('home', compact('cities'));
    }

    public function search(SearchRequest $request, SearchInterface $search) {

      $items = $search->search($request);
      $returnHTML = view('inc.search-result', compact('items'))->render();
      return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
}
