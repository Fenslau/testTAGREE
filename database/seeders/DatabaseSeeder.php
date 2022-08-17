<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         City::factory(200)->create();
         Clinic::factory(1000)->create();
         Doctor::factory(100000)->create();
         Service::factory(1000)->create();

        $clinics = Clinic::chunk(10000, function($clinics){
            $doctors = Doctor::chunk(10000, function($doctors) use ($clinics) {
              $doctors->each(function ($doctor) use ($clinics) {
              $doctor->update(['clinic_id' => $clinics->random()->id]);
            });
          });
        });

        $service = Service::chunk(10000, function($service){
          $doctors = Doctor::chunk(10000, function($doctors) use ($service) {
              $doctors->each(function ($doctor) use ($service) {
              $doctor->services()->attach(
              $service->random(rand(1, 10))->pluck('id')->toArray()
              );
            });
          });
        });

        $clinics = Clinic::chunk(10000, function($clinics){
          $cities = City::chunk(10000, function($cities) use ($clinics) {
              $cities->each(function ($city) use ($clinics) {
              $city->clinics()->attach(
              $clinics->random(rand(1, 10))->pluck('id')->toArray()
              );
            });
          });
        });

    }
}
