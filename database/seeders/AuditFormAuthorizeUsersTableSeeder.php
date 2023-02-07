<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuditFormAuthorizeUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('audit_form_authorize_users')->delete();
        
        \DB::table('audit_form_authorize_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'audit_form_id' => 1,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-01-24 12:00:16',
                'updated_at' => '2023-01-24 12:00:16',
            ),
            1 => 
            array (
                'id' => 2,
                'audit_form_id' => 1,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-01-24 12:00:16',
                'updated_at' => '2023-01-24 12:00:16',
            ),
            2 => 
            array (
                'id' => 3,
                'audit_form_id' => 2,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-01-24 12:16:11',
                'updated_at' => '2023-01-24 12:16:11',
            ),
            3 => 
            array (
                'id' => 4,
                'audit_form_id' => 3,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-01-24 14:54:53',
                'updated_at' => '2023-01-24 14:54:53',
            ),
            4 => 
            array (
                'id' => 5,
                'audit_form_id' => 4,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-01-26 09:36:34',
                'updated_at' => '2023-01-26 09:36:34',
            ),
            5 => 
            array (
                'id' => 6,
                'audit_form_id' => 5,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-02 11:50:10',
                'updated_at' => '2023-02-02 11:50:10',
            ),
            6 => 
            array (
                'id' => 7,
                'audit_form_id' => 5,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-02 11:50:10',
                'updated_at' => '2023-02-02 11:50:10',
            ),
            7 => 
            array (
                'id' => 8,
                'audit_form_id' => 6,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-04 15:07:59',
                'updated_at' => '2023-02-04 15:07:59',
            ),
            8 => 
            array (
                'id' => 9,
                'audit_form_id' => 6,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-04 15:07:59',
                'updated_at' => '2023-02-04 15:07:59',
            ),
            9 => 
            array (
                'id' => 10,
                'audit_form_id' => 7,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-05 09:42:44',
                'updated_at' => '2023-02-05 09:42:44',
            ),
            10 => 
            array (
                'id' => 11,
                'audit_form_id' => 7,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-05 09:42:44',
                'updated_at' => '2023-02-05 09:42:44',
            ),
            11 => 
            array (
                'id' => 12,
                'audit_form_id' => 8,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-05 14:50:04',
                'updated_at' => '2023-02-05 14:50:04',
            ),
            12 => 
            array (
                'id' => 13,
                'audit_form_id' => 8,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-05 14:50:04',
                'updated_at' => '2023-02-05 14:50:04',
            ),
            13 => 
            array (
                'id' => 28,
                'audit_form_id' => 10,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-07 11:59:33',
                'updated_at' => '2023-02-07 11:59:33',
            ),
            14 => 
            array (
                'id' => 29,
                'audit_form_id' => 10,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-07 11:59:33',
                'updated_at' => '2023-02-07 11:59:33',
            ),
            15 => 
            array (
                'id' => 30,
                'audit_form_id' => 9,
                'user_id' => 3,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-07 12:00:35',
                'updated_at' => '2023-02-07 12:00:35',
            ),
            16 => 
            array (
                'id' => 31,
                'audit_form_id' => 9,
                'user_id' => 9,
                'role_id' => 1,
                'type' => 'na',
                'created_at' => '2023-02-07 12:00:35',
                'updated_at' => '2023-02-07 12:00:35',
            ),
        ));
        
        
    }
}