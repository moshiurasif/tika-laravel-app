<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\People;
use App\Models\Upazilla;
use App\Models\User;
use App\Models\VaccinationCenter;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        People::factory(20)->create();

        $user = new User();
        $user->name = "Moshiur";
        $user->email = 'asif@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('123');
        $user->remember_token = Str::random(10);
        $user->save();


        // divisions data


        foreach (tika_bd_divisions() as $division) {
            $divisionModel = new Division();
            $divisionModel->name = $division['name'];
            $divisionModel->save();
        }

        // districts data


        foreach (tika_bd_districts() as $district) {
            $districtModel = new District();
            $districtModel->name = $district['name'];
            $districtModel->division_id = $district['division_id'];
            $districtModel->save();
        }

        // upazilas data



        foreach (tika_bd_upazillas() as $upazila) {
            $upazilaModel = new Upazilla();
            $upazilaModel->name = $upazila['name'];
            $upazilaModel->district_id = $upazila['district_id'];
            $upazilaModel->save();
        }

        // category
        foreach (tika_bd_categories() as $category) {
            $categoryModel = new Category();
            $categoryModel->name = $category["name"];
            $categoryModel->min_age = $category["min_age"];
            $categoryModel->save();
        }

        // vaccines
        $available_vaccines = ["Pfizer", "Moderna", "AstraZeneca", "Sinopharm", "Sputnik V"];
        foreach ($available_vaccines as $available_vaccine) {
            $vaccineModel = new Vaccine();
            $vaccineModel->name = $available_vaccine;
            $vaccineModel->save();
        }

        VaccinationCenter::factory(30)->create();
    }
}
