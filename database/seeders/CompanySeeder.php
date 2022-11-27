<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Factory $factory)
    {
        Company::factory()
            ->count(10)->create()->each(function (Company $company) {
                $company->company_clients()->attach(Client::query()->inRandomOrder()->take(5)->get()->pluck('id')->toArray());
            });
    }
}
