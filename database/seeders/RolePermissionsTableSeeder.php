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
                'id' => 2493,
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            1 => 
            array (
                'id' => 2494,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            2 => 
            array (
                'id' => 2495,
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            3 => 
            array (
                'id' => 2496,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            4 => 
            array (
                'id' => 2497,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            5 => 
            array (
                'id' => 2498,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            6 => 
            array (
                'id' => 2499,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            7 => 
            array (
                'id' => 2500,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            8 => 
            array (
                'id' => 2501,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            9 => 
            array (
                'id' => 2502,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            10 => 
            array (
                'id' => 2503,
                'role_id' => 1,
                'permission_id' => 16,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            11 => 
            array (
                'id' => 2504,
                'role_id' => 1,
                'permission_id' => 17,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            12 => 
            array (
                'id' => 2505,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            13 => 
            array (
                'id' => 2506,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            14 => 
            array (
                'id' => 2507,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            15 => 
            array (
                'id' => 2508,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            16 => 
            array (
                'id' => 2509,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            17 => 
            array (
                'id' => 2510,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            18 => 
            array (
                'id' => 2511,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            19 => 
            array (
                'id' => 2512,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            20 => 
            array (
                'id' => 2513,
                'role_id' => 1,
                'permission_id' => 28,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            21 => 
            array (
                'id' => 2514,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            22 => 
            array (
                'id' => 2515,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            23 => 
            array (
                'id' => 2516,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            24 => 
            array (
                'id' => 2517,
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            25 => 
            array (
                'id' => 2518,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            26 => 
            array (
                'id' => 2519,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            27 => 
            array (
                'id' => 2520,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            28 => 
            array (
                'id' => 2521,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            29 => 
            array (
                'id' => 2522,
                'role_id' => 1,
                'permission_id' => 36,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            30 => 
            array (
                'id' => 2523,
                'role_id' => 1,
                'permission_id' => 37,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            31 => 
            array (
                'id' => 2524,
                'role_id' => 1,
                'permission_id' => 40,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            32 => 
            array (
                'id' => 2525,
                'role_id' => 1,
                'permission_id' => 41,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            33 => 
            array (
                'id' => 2526,
                'role_id' => 1,
                'permission_id' => 42,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            34 => 
            array (
                'id' => 2527,
                'role_id' => 1,
                'permission_id' => 43,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            35 => 
            array (
                'id' => 2528,
                'role_id' => 1,
                'permission_id' => 44,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            36 => 
            array (
                'id' => 2529,
                'role_id' => 1,
                'permission_id' => 46,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            37 => 
            array (
                'id' => 2530,
                'role_id' => 1,
                'permission_id' => 47,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            38 => 
            array (
                'id' => 2531,
                'role_id' => 1,
                'permission_id' => 48,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            39 => 
            array (
                'id' => 2532,
                'role_id' => 1,
                'permission_id' => 49,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            40 => 
            array (
                'id' => 2533,
                'role_id' => 1,
                'permission_id' => 50,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            41 => 
            array (
                'id' => 2534,
                'role_id' => 1,
                'permission_id' => 51,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            42 => 
            array (
                'id' => 2535,
                'role_id' => 1,
                'permission_id' => 52,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            43 => 
            array (
                'id' => 2536,
                'role_id' => 1,
                'permission_id' => 53,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            44 => 
            array (
                'id' => 2537,
                'role_id' => 1,
                'permission_id' => 54,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            45 => 
            array (
                'id' => 2538,
                'role_id' => 1,
                'permission_id' => 55,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            46 => 
            array (
                'id' => 2539,
                'role_id' => 1,
                'permission_id' => 56,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            47 => 
            array (
                'id' => 2540,
                'role_id' => 1,
                'permission_id' => 57,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            48 => 
            array (
                'id' => 2541,
                'role_id' => 1,
                'permission_id' => 58,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            49 => 
            array (
                'id' => 2542,
                'role_id' => 1,
                'permission_id' => 60,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            50 => 
            array (
                'id' => 2543,
                'role_id' => 1,
                'permission_id' => 61,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            51 => 
            array (
                'id' => 2544,
                'role_id' => 1,
                'permission_id' => 63,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            52 => 
            array (
                'id' => 2545,
                'role_id' => 1,
                'permission_id' => 64,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            53 => 
            array (
                'id' => 2546,
                'role_id' => 1,
                'permission_id' => 39,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            54 => 
            array (
                'id' => 2547,
                'role_id' => 1,
                'permission_id' => 73,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            55 => 
            array (
                'id' => 2548,
                'role_id' => 1,
                'permission_id' => 74,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            56 => 
            array (
                'id' => 2549,
                'role_id' => 1,
                'permission_id' => 66,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
            57 => 
            array (
                'id' => 2550,
                'role_id' => 1,
                'permission_id' => 71,
                'created_at' => '2023-02-05 12:41:09',
                'updated_at' => '2023-02-05 12:41:09',
            ),
        ));
        
        
    }
}