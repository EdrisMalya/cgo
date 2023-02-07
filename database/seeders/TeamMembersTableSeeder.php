<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamMembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_members')->delete();
        
        \DB::table('team_members')->insert(array (
            0 => 
            array (
                'id' => 12,
                'auditor_team_id' => 1,
                'auditor_member_id' => 2,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            1 => 
            array (
                'id' => 13,
                'auditor_team_id' => 1,
                'auditor_member_id' => 3,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            2 => 
            array (
                'id' => 14,
                'auditor_team_id' => 1,
                'auditor_member_id' => 4,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            3 => 
            array (
                'id' => 15,
                'auditor_team_id' => 1,
                'auditor_member_id' => 5,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            4 => 
            array (
                'id' => 16,
                'auditor_team_id' => 1,
                'auditor_member_id' => 6,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            5 => 
            array (
                'id' => 17,
                'auditor_team_id' => 1,
                'auditor_member_id' => 7,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            6 => 
            array (
                'id' => 18,
                'auditor_team_id' => 1,
                'auditor_member_id' => 8,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            7 => 
            array (
                'id' => 19,
                'auditor_team_id' => 1,
                'auditor_member_id' => 9,
                'created_at' => '2023-01-23 11:41:19',
                'updated_at' => '2023-01-23 11:41:19',
            ),
            8 => 
            array (
                'id' => 24,
                'auditor_team_id' => 2,
                'auditor_member_id' => 2,
                'created_at' => '2023-01-24 12:12:20',
                'updated_at' => '2023-01-24 12:12:20',
            ),
            9 => 
            array (
                'id' => 25,
                'auditor_team_id' => 2,
                'auditor_member_id' => 3,
                'created_at' => '2023-01-24 12:12:20',
                'updated_at' => '2023-01-24 12:12:20',
            ),
            10 => 
            array (
                'id' => 26,
                'auditor_team_id' => 2,
                'auditor_member_id' => 6,
                'created_at' => '2023-01-24 12:12:20',
                'updated_at' => '2023-01-24 12:12:20',
            ),
            11 => 
            array (
                'id' => 27,
                'auditor_team_id' => 2,
                'auditor_member_id' => 7,
                'created_at' => '2023-01-24 12:12:20',
                'updated_at' => '2023-01-24 12:12:20',
            ),
            12 => 
            array (
                'id' => 28,
                'auditor_team_id' => 2,
                'auditor_member_id' => 4,
                'created_at' => '2023-01-24 12:12:20',
                'updated_at' => '2023-01-24 12:12:20',
            ),
            13 => 
            array (
                'id' => 29,
                'auditor_team_id' => 2,
                'auditor_member_id' => 5,
                'created_at' => '2023-01-24 12:12:20',
                'updated_at' => '2023-01-24 12:12:20',
            ),
        ));
        
        
    }
}