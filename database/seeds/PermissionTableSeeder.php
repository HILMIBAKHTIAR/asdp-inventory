<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            //SDM
            'sdm-create',
            'sdm-edit',
            'sdm-list',
            'sdm-delete',
            'sdm-show',
            //UMUM
            'umum-create',
            'umum-edit',
            'umum-list',
            'umum-delete',
            'umum-show',
            //Role&User
            'admin-create',
            'admin-edit',
            'admin-list',
            'admin-delete',
            'admin-show',
            //History
            'history-create',
            'history-edit',
            'history-list',
            'history-delete',
            'history-show',
            //inventory
            'inventory-create',
            'inventory-edit',
            'inventory-list',
            'inventory-delete',
            'inventory-show',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
    }
}
