<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuditorTeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('auditor_teams')->delete();
        
        \DB::table('auditor_teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Team A',
                'status' => 1,
                'created_at' => '2023-01-23 11:35:40',
                'updated_at' => '2023-01-23 11:35:40',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Team B',
                'status' => 1,
                'created_at' => '2023-01-23 11:41:40',
                'updated_at' => '2023-01-23 11:41:40',
            ),
        ));
        
        
    }
}