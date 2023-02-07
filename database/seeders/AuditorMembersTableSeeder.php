<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuditorMembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('auditor_members')->delete();
        
        \DB::table('auditor_members')->insert(array (
            0 => 
            array (
                'id' => 2,
                'image' => NULL,
                'first_name' => 'Oprah',
                'last_name' => 'Velez',
                'email' => 'kykihaj@mailinator.com',
            'phone_number' => '+1 (625) 879-6459',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:08',
                'updated_at' => '2023-01-23 11:40:08',
            ),
            1 => 
            array (
                'id' => 3,
                'image' => NULL,
                'first_name' => 'Mariko',
                'last_name' => 'Nixon',
                'email' => 'dyzecyvo@mailinator.com',
            'phone_number' => '+1 (545) 588-7142',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:14',
                'updated_at' => '2023-01-23 11:40:14',
            ),
            2 => 
            array (
                'id' => 4,
                'image' => NULL,
                'first_name' => 'Charlotte',
                'last_name' => 'Maynard',
                'email' => 'mated@mailinator.com',
            'phone_number' => '+1 (179) 255-1669',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:25',
                'updated_at' => '2023-01-23 11:40:25',
            ),
            3 => 
            array (
                'id' => 5,
                'image' => NULL,
                'first_name' => 'Colton',
                'last_name' => 'Ashley',
                'email' => 'ryhodo@mailinator.com',
            'phone_number' => '+1 (257) 655-7748',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:29',
                'updated_at' => '2023-01-23 11:40:29',
            ),
            4 => 
            array (
                'id' => 6,
                'image' => NULL,
                'first_name' => 'Ahmed',
                'last_name' => 'Stein',
                'email' => 'lyxubo@mailinator.com',
            'phone_number' => '+1 (577) 933-3899',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:36',
                'updated_at' => '2023-01-23 11:40:36',
            ),
            5 => 
            array (
                'id' => 7,
                'image' => NULL,
                'first_name' => 'Alec',
                'last_name' => 'Cannon',
                'email' => 'qufovumu@mailinator.com',
            'phone_number' => '+1 (968) 776-1837',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:38',
                'updated_at' => '2023-01-23 11:40:38',
            ),
            6 => 
            array (
                'id' => 8,
                'image' => NULL,
                'first_name' => 'Brenna',
                'last_name' => 'Barlow',
                'email' => 'focyfoxo@mailinator.com',
            'phone_number' => '+1 (556) 775-6837',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:45',
                'updated_at' => '2023-01-23 11:40:45',
            ),
            7 => 
            array (
                'id' => 9,
                'image' => NULL,
                'first_name' => 'Russell',
                'last_name' => 'Emerson',
                'email' => 'vytanemo@mailinator.com',
            'phone_number' => '+1 (397) 396-1588',
                'status' => 1,
                'created_at' => '2023-01-23 11:40:49',
                'updated_at' => '2023-01-23 11:40:49',
            ),
        ));
        
        
    }
}