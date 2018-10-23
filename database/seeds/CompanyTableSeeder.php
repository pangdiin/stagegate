<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Model\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();

        $faker = Faker::create();

        $companies = [
            ['code' => 'RBC','name' => 'RBC', 'description' => 'RBC'],
            ['code' => 'JBC','name' => 'JBC', 'description' => 'JBC'],
            ['code' => 'MFC','name' => 'MFC', 'description' => 'MFC'],
            ['code' => 'MFC-BUK','name' => 'MFC-BUK', 'description' => 'MFC-BUKIDNON'],
            ['code' => 'SPI','name' => 'SPI', 'description' => 'SPI'],
            ['code' => 'PFI','name' => 'PFI', 'description' => 'PFI'],
            ['code' => 'BBFI','name' => 'BBFI', 'description' => 'BBFI'],
            ['code' => 'RBC-BBFI','name' => 'RBC-BBFI', 'description' => 'RBC-BBFI (FBC)'],
            ['code' => 'SFI-MM','name' => 'SFI-MM', 'description' => 'SFI-MM'],
            ['code' => 'SFI','name' => 'SFI', 'description' => 'SFI'],
            ['code' => 'APC','name' => 'APC', 'description' => 'APC'],
            ['code' => 'RBC-BUK','name' => 'RBC-BUK', 'description' => 'RBC-BUKIDNON'],
        ];

        Company::insert($companies);
    }
}
