<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BuildupTableSeeder::class);
        $this->call(RolesAndPermissionsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
