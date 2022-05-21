<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('roles')->delete();

        DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Admin_L2',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Corretor',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Corretor_L2',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            )
        ));


    }
}
