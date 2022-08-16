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
         Doctor::factory(10000)->create();
         Service::factory(1000)->create();

        $clinics = Clinic::all();
        Doctor::all()->each(function ($doctor) use ($clinics) {
          $doctor->update(['clinic_id' => $clinics->random()->id]);
        });

        $service = Service::all();
        Doctor::all()->each(function ($doctor) use ($service) {
          $doctor->services()->attach(
          $service->random(rand(1, 10))->pluck('id')->toArray()
          );
        });

        $clinics = Clinic::all();
        City::all()->each(function ($city) use ($clinics) {
          $city->clinics()->attach(
          $clinics->random(rand(1, 10))->pluck('id')->toArray()
          );
        });

    }
}
