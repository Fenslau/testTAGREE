<?php
namespace App\Helpers;

use App\Helpers\Contracts\SearchInterface;
use App\Models\City;
use App\Models\Doctor;

class EloqumentSearch implements SearchInterface {

    public function search($request) {
      $items = array();

        $items = City::whereIn('id', $request->city)->where(function($q) use ($request) {
          $q->whereHas('clinics', $filter1 = function($query) use ($request) {
              $query->where('name', 'like', '%'.$request->search.'%');
          })
          ->with(['clinics' => $filter1])
          ->orWhereHas('clinics.doctors', $filter2 = function($query) use ($request) {
              $query->where('name', 'like', '%'.$request->search.'%');
          })
          ->with(['clinics.doctors' => $filter2])
          ->orWhereHas('clinics.doctors.services', $filter3 = function($query) use ($request) {
              $query->where('name', 'like', '%'.$request->search.'%');
          })
          ->with(['clinics.doctors.services' => $filter3]);
        })
      ->get();
      return $items;
    }

}


?>
