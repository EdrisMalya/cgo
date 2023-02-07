<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuditFormFilesAuthorizeDownloaderUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('audit_form_files_authorize_downloader_users')->delete();
        
        \DB::table('audit_form_files_authorize_downloader_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'audit_form_id' => 1,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-01-24 12:00:16',
                'updated_at' => '2023-01-24 12:00:16',
            ),
            1 => 
            array (
                'id' => 2,
                'audit_form_id' => 2,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 1,
                'created_at' => '2023-01-24 12:16:11',
                'updated_at' => '2023-01-24 12:16:11',
            ),
            2 => 
            array (
                'id' => 3,
                'audit_form_id' => 2,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 1,
                'created_at' => '2023-01-24 12:16:11',
                'updated_at' => '2023-01-24 12:16:11',
            ),
            3 => 
            array (
                'id' => 4,
                'audit_form_id' => 2,
                'user_id' => 9,
                'type' => 'na',
                'created_by' => 1,
                'created_at' => '2023-01-24 12:16:11',
                'updated_at' => '2023-01-24 12:16:11',
            ),
            4 => 
            array (
                'id' => 5,
                'audit_form_id' => 3,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 9,
                'created_at' => '2023-01-24 14:54:53',
                'updated_at' => '2023-01-24 14:54:53',
            ),
            5 => 
            array (
                'id' => 6,
                'audit_form_id' => 4,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-01-26 09:36:34',
                'updated_at' => '2023-01-26 09:36:34',
            ),
            6 => 
            array (
                'id' => 7,
                'audit_form_id' => 5,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-02 11:50:10',
                'updated_at' => '2023-02-02 11:50:10',
            ),
            7 => 
            array (
                'id' => 8,
                'audit_form_id' => 5,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-02 11:50:10',
                'updated_at' => '2023-02-02 11:50:10',
            ),
            8 => 
            array (
                'id' => 9,
                'audit_form_id' => 5,
                'user_id' => 9,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-02 11:50:10',
                'updated_at' => '2023-02-02 11:50:10',
            ),
            9 => 
            array (
                'id' => 10,
                'audit_form_id' => 6,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-04 15:07:59',
                'updated_at' => '2023-02-04 15:07:59',
            ),
            10 => 
            array (
                'id' => 11,
                'audit_form_id' => 7,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-05 09:42:44',
                'updated_at' => '2023-02-05 09:42:44',
            ),
            11 => 
            array (
                'id' => 12,
                'audit_form_id' => 7,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-05 09:42:44',
                'updated_at' => '2023-02-05 09:42:44',
            ),
            12 => 
            array (
                'id' => 13,
                'audit_form_id' => 7,
                'user_id' => 9,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-05 09:42:44',
                'updated_at' => '2023-02-05 09:42:44',
            ),
            13 => 
            array (
                'id' => 14,
                'audit_form_id' => 8,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-05 14:50:04',
                'updated_at' => '2023-02-05 14:50:04',
            ),
            14 => 
            array (
                'id' => 15,
                'audit_form_id' => 8,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-05 14:50:04',
                'updated_at' => '2023-02-05 14:50:04',
            ),
            15 => 
            array (
                'id' => 16,
                'audit_form_id' => 8,
                'user_id' => 9,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-05 14:50:04',
                'updated_at' => '2023-02-05 14:50:04',
            ),
            16 => 
            array (
                'id' => 31,
                'audit_form_id' => 10,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-07 11:59:33',
                'updated_at' => '2023-02-07 11:59:33',
            ),
            17 => 
            array (
                'id' => 32,
                'audit_form_id' => 10,
                'user_id' => 3,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-07 11:59:33',
                'updated_at' => '2023-02-07 11:59:33',
            ),
            18 => 
            array (
                'id' => 33,
                'audit_form_id' => 10,
                'user_id' => 9,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-07 11:59:33',
                'updated_at' => '2023-02-07 11:59:33',
            ),
            19 => 
            array (
                'id' => 34,
                'audit_form_id' => 9,
                'user_id' => 1,
                'type' => 'na',
                'created_by' => 3,
                'created_at' => '2023-02-07 12:00:35',
                'updated_at' => '2023-02-07 12:00:35',
            ),
        ));
        
        
    }
}