<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfidentialityLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('confidentiality_levels')->delete();
        
        \DB::table('confidentiality_levels')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Normal',
                'created_at' => '2023-01-23 11:43:44',
                'updated_at' => '2023-01-23 11:43:44',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Secret',
                'created_at' => '2023-01-23 11:43:57',
                'updated_at' => '2023-01-23 11:43:57',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Top secret',
                'created_at' => '2023-01-23 11:44:04',
                'updated_at' => '2023-01-23 11:44:04',
            ),
        ));
        
        
    }
}