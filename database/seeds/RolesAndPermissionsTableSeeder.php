<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
        
    	/**
    	 * Create permissions
    	 */
    	$manage_all = Permission::create(['name' => 'Manage All']);

    	/**
    	 * Create role
    	 */
        $administrator = Role::create(['name' => 'administrator']);

        /**
         * Assign permissions to role
         */
        $administrator->givePermissionTo($manage_all);

        $this->roles();
    }

    public function roles()
    {
       Role::create(['name' => 'product-assistant']);
       Role::create(['name' => 'product-manager']);
       Role::create(['name' => 'category-manager']);
       Role::create(['name' => 'group-head']);
       Role::create(['name' => 'vp-for-mktg']);
       Role::create(['name' => 'svp-for-mktg']);
       Role::create(['name' => 'r-d-encoder']);
       Role::create(['name' => 'r-d-manager']);
       Role::create(['name' => 'ctc-admin']);
       Role::create(['name' => 'vp-operations']);
       Role::create(['name' => 'vp-sales']);
       Role::create(['name' => 'president']);
       Role::create(['name' => 'aom-plant']);
       Role::create(['name' => 'satellite-head']);
       Role::create(['name' => 'creator']);
    }

    public function permissions()
    {

    }
}
