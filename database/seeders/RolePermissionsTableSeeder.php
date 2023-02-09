<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 2551,
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => '2023-02-08 15:18:27',
                'updated_at' => '2023-02-08 15:18:27',
            ),
            1 => 
            array (
                'id' => 2552,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => '2023-02-08 15:18:27',
                'updated_at' => '2023-02-08 15:18:27',
            ),
            2 => 
            array (
                'id' => 2553,
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-02-08 15:18:27',
                'updated_at' => '2023-02-08 15:18:27',
            ),
            3 => 
            array (
                'id' => 2554,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => '2023-02-08 15:18:27',
                'updated_at' => '2023-02-08 15:18:27',
            ),
            4 => 
            array (
                'id' => 2555,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => '2023-02-08 15:18:27',
                'updated_at' => '2023-02-08 15:18:27',
            ),
            5 => 
            array (
                'id' => 2556,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => '2023-02-08 15:18:27',
                'updated_at' => '2023-02-08 15:18:27',
            ),
            6 => 
            array (
                'id' => 2557,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            7 => 
            array (
                'id' => 2558,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            8 => 
            array (
                'id' => 2559,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            9 => 
            array (
                'id' => 2560,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            10 => 
            array (
                'id' => 2561,
                'role_id' => 1,
                'permission_id' => 16,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            11 => 
            array (
                'id' => 2562,
                'role_id' => 1,
                'permission_id' => 17,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            12 => 
            array (
                'id' => 2563,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            13 => 
            array (
                'id' => 2564,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            14 => 
            array (
                'id' => 2565,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            15 => 
            array (
                'id' => 2566,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            16 => 
            array (
                'id' => 2567,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            17 => 
            array (
                'id' => 2568,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            18 => 
            array (
                'id' => 2569,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            19 => 
            array (
                'id' => 2570,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            20 => 
            array (
                'id' => 2571,
                'role_id' => 1,
                'permission_id' => 28,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            21 => 
            array (
                'id' => 2572,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            22 => 
            array (
                'id' => 2573,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            23 => 
            array (
                'id' => 2574,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            24 => 
            array (
                'id' => 2575,
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            25 => 
            array (
                'id' => 2576,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            26 => 
            array (
                'id' => 2577,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            27 => 
            array (
                'id' => 2578,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            28 => 
            array (
                'id' => 2579,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            29 => 
            array (
                'id' => 2580,
                'role_id' => 1,
                'permission_id' => 36,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            30 => 
            array (
                'id' => 2581,
                'role_id' => 1,
                'permission_id' => 37,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            31 => 
            array (
                'id' => 2582,
                'role_id' => 1,
                'permission_id' => 40,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            32 => 
            array (
                'id' => 2583,
                'role_id' => 1,
                'permission_id' => 41,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            33 => 
            array (
                'id' => 2584,
                'role_id' => 1,
                'permission_id' => 42,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            34 => 
            array (
                'id' => 2585,
                'role_id' => 1,
                'permission_id' => 43,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            35 => 
            array (
                'id' => 2586,
                'role_id' => 1,
                'permission_id' => 44,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            36 => 
            array (
                'id' => 2587,
                'role_id' => 1,
                'permission_id' => 46,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            37 => 
            array (
                'id' => 2588,
                'role_id' => 1,
                'permission_id' => 47,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            38 => 
            array (
                'id' => 2589,
                'role_id' => 1,
                'permission_id' => 48,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            39 => 
            array (
                'id' => 2590,
                'role_id' => 1,
                'permission_id' => 49,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            40 => 
            array (
                'id' => 2591,
                'role_id' => 1,
                'permission_id' => 50,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            41 => 
            array (
                'id' => 2592,
                'role_id' => 1,
                'permission_id' => 51,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            42 => 
            array (
                'id' => 2593,
                'role_id' => 1,
                'permission_id' => 52,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            43 => 
            array (
                'id' => 2594,
                'role_id' => 1,
                'permission_id' => 53,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            44 => 
            array (
                'id' => 2595,
                'role_id' => 1,
                'permission_id' => 54,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            45 => 
            array (
                'id' => 2596,
                'role_id' => 1,
                'permission_id' => 55,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            46 => 
            array (
                'id' => 2597,
                'role_id' => 1,
                'permission_id' => 56,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            47 => 
            array (
                'id' => 2598,
                'role_id' => 1,
                'permission_id' => 57,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            48 => 
            array (
                'id' => 2599,
                'role_id' => 1,
                'permission_id' => 58,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            49 => 
            array (
                'id' => 2600,
                'role_id' => 1,
                'permission_id' => 60,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            50 => 
            array (
                'id' => 2601,
                'role_id' => 1,
                'permission_id' => 61,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            51 => 
            array (
                'id' => 2602,
                'role_id' => 1,
                'permission_id' => 63,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            52 => 
            array (
                'id' => 2603,
                'role_id' => 1,
                'permission_id' => 64,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            53 => 
            array (
                'id' => 2604,
                'role_id' => 1,
                'permission_id' => 39,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            54 => 
            array (
                'id' => 2605,
                'role_id' => 1,
                'permission_id' => 73,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            55 => 
            array (
                'id' => 2606,
                'role_id' => 1,
                'permission_id' => 74,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            56 => 
            array (
                'id' => 2607,
                'role_id' => 1,
                'permission_id' => 66,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            57 => 
            array (
                'id' => 2608,
                'role_id' => 1,
                'permission_id' => 71,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
            58 => 
            array (
                'id' => 2609,
                'role_id' => 1,
                'permission_id' => 75,
                'created_at' => '2023-02-08 15:18:28',
                'updated_at' => '2023-02-08 15:18:28',
            ),
        ));
        
        
    }
}