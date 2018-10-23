<?php

use App\Model\Migrate;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	
    	User::truncate();
        
        Schema::enableForeignKeyConstraints();

        $usersToMigrate = Migrate::all();

        collect($usersToMigrate)->each(function($user) {
        	$this->create($user);
        });

        $this->admin();
    }

    public function create($user)
    {
        $faker = Faker::create();
    	
    	User::create([
    		'first_name' => $user->user_fname,
    		'middle_name' => $user->user_mname,
    		'last_name' => $user->user_lname,
    		'username' => $user->username,
    		'email' => $faker->email,
    		'password' => Hash::make('rebisco'),
    		'active' => true,
    		'sec_notification' => false,
    		'created_at' => now(),
    		'updated_at' => now(),
    	]);
    }

    public function admin()
    {
        $admin = User::create([
            'first_name' => 'Guillermo',
            'middle_name' => 'C.',
            'last_name' => 'Celestino',
            'username' => 'guillermo.celestino',
            'email' => 'guillermo.celestino@rebisco@rebmain.com',
            'password' => Hash::make('rebisco'),
            'active' => true,
            'sec_notification' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $admin->assignRole('administrator');
    }
}
