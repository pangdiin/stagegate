<?php

use App\Model\Department;
use Illuminate\Database\Seeder;


class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();

        $departments = [
            ['code' => 'PRES','name' => 'PRES', 'description' => 'PRES'],
            ['code' => 'BMGP','name' => 'BMGP', 'description' => 'BMGP'],
            ['code' => 'RSVM','name' => 'RSVM', 'description' => 'RSVM'],
            ['code' => 'RSLN','name' => 'RSLN', 'description' => 'RSLN'],
            ['code' => 'OMDR','name' => 'OMDR', 'description' => 'OMDR'],
            ['code' => 'OSDR','name' => 'OSDR', 'description' => 'OSDR'],
            ['code' => 'CSMD','name' => 'CSMD', 'description' => 'CSMD'],
            ['code' => 'O-VPO','name' => 'O-VPO', 'description' => 'O-VPO'],
            ['code' => 'OM','name' => 'OM', 'description' => 'OM'],
            ['code' => 'CTC','name' => 'CTC', 'description' => 'CTC'],
            ['code' => 'CTEC','name' => 'CTEC', 'description' => 'CTEC'],
            ['code' => 'S-ACCTG','name' => 'S-ACCTG', 'description' => 'S-ACCTG'],
            ['code' => 'SSMG','name' => 'SSMG', 'description' => 'SSMG'],
        ];

        Department::insert($departments);
    }
}
