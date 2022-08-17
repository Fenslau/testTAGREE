<?php
namespace App\Helpers;

use App\Helpers\Contracts\SearchInterface;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class SpeedSearch implements SearchInterface {

    public function search($request) {
      $items = array();

      return $items;
    }

}


?>
