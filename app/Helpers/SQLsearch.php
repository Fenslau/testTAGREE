<?php
namespace App\Helpers;

use App\Helpers\Contracts\SearchInterface;
use App\Models\City;

class SQLsearch implements SearchInterface {

    public function search($request) {
      $items = array();
      $items = City::leftJoin('city_clinic', 'cities.id', '=', 'city_clinic.city_id')
      ->leftJoin('clinics', 'city_clinic.clinic_id', '=', 'clinics.id')
      ->leftJoin('doctors', 'clinics.id', '=', 'doctors.clinic_id')
      ->leftJoin('doctor_service', 'doctors.id', '=', 'doctor_service.doctor_id')
      ->leftJoin('services', 'doctor_service.service_id', '=', 'services.id')
      ->select('cities.name AS city', 'clinics.name AS clinic', 'doctors.name AS doctor', 'services.name AS service')
      ->whereIn('cities.name', $request->city)
      ->where(function($q) use ($request) {
          $q->where('clinics.name', 'like', '%'.$request->search.'%')
          ->orWhere('doctors.name', 'like', '%'.$request->search.'%')
          ->orWhere('services.name', 'like', '%'.$request->search.'%');
      })
      ->take(100)
      ->get();
      return $items;
    }

}


?>
