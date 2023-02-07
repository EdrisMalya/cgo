<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoginLogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('login_logs')->delete();
        
        \DB::table('login_logs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-20 15:32:24',
                'updated_at' => '2022-12-20 15:32:24',
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-20 15:45:40',
                'updated_at' => '2022-12-20 15:45:40',
            ),
            2 => 
            array (
                'id' => 3,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-20 15:45:41',
                'updated_at' => '2022-12-20 15:45:41',
            ),
            3 => 
            array (
                'id' => 4,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-20 15:45:42',
                'updated_at' => '2022-12-20 15:45:42',
            ),
            4 => 
            array (
                'id' => 5,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-20 15:45:43',
                'updated_at' => '2022-12-20 15:45:43',
            ),
            5 => 
            array (
                'id' => 6,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-20 15:45:45',
                'updated_at' => '2022-12-20 15:45:45',
            ),
            6 => 
            array (
                'id' => 7,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-21 08:59:05',
                'updated_at' => '2022-12-21 08:59:05',
            ),
            7 => 
            array (
                'id' => 8,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-21 08:59:06',
                'updated_at' => '2022-12-21 08:59:06',
            ),
            8 => 
            array (
                'id' => 9,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-21 08:59:11',
                'updated_at' => '2022-12-21 08:59:11',
            ),
            9 => 
            array (
                'id' => 10,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-21 12:30:24',
                'updated_at' => '2022-12-21 12:30:24',
            ),
            10 => 
            array (
                'id' => 11,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-21 12:30:52',
                'updated_at' => '2022-12-21 12:30:52',
            ),
            11 => 
            array (
                'id' => 12,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-21 12:31:01',
                'updated_at' => '2022-12-21 12:31:01',
            ),
            12 => 
            array (
                'id' => 13,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-21 12:31:05',
                'updated_at' => '2022-12-21 12:31:05',
            ),
            13 => 
            array (
                'id' => 14,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-22 08:48:48',
                'updated_at' => '2022-12-22 08:48:48',
            ),
            14 => 
            array (
                'id' => 15,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-22 10:16:37',
                'updated_at' => '2022-12-22 10:16:37',
            ),
            15 => 
            array (
                'id' => 16,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-22 10:29:39',
                'updated_at' => '2022-12-22 10:29:39',
            ),
            16 => 
            array (
                'id' => 17,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-22 10:29:52',
                'updated_at' => '2022-12-22 10:29:52',
            ),
            17 => 
            array (
                'id' => 18,
                'email' => 'edrismalya2@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2022-12-24 09:09:46',
                'updated_at' => '2022-12-24 09:09:46',
            ),
            18 => 
            array (
                'id' => 19,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2022-12-24 09:09:53',
                'updated_at' => '2022-12-24 09:09:53',
            ),
            19 => 
            array (
                'id' => 20,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-22 14:26:31',
                'updated_at' => '2023-01-22 14:26:31',
            ),
            20 => 
            array (
                'id' => 21,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-01-22 14:26:52',
                'updated_at' => '2023-01-22 14:26:52',
            ),
            21 => 
            array (
                'id' => 22,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-22 14:26:57',
                'updated_at' => '2023-01-22 14:26:57',
            ),
            22 => 
            array (
                'id' => 23,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-22 14:29:38',
                'updated_at' => '2023-01-22 14:29:38',
            ),
            23 => 
            array (
                'id' => 24,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-22 14:29:46',
                'updated_at' => '2023-01-22 14:29:46',
            ),
            24 => 
            array (
                'id' => 25,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-23 11:10:41',
                'updated_at' => '2023-01-23 11:10:41',
            ),
            25 => 
            array (
                'id' => 26,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-23 11:11:20',
                'updated_at' => '2023-01-23 11:11:20',
            ),
            26 => 
            array (
                'id' => 27,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-23 11:11:27',
                'updated_at' => '2023-01-23 11:11:27',
            ),
            27 => 
            array (
                'id' => 28,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 08:55:16',
                'updated_at' => '2023-01-24 08:55:16',
            ),
            28 => 
            array (
                'id' => 29,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '10.0.5.54',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 12:04:23',
                'updated_at' => '2023-01-24 12:04:23',
            ),
            29 => 
            array (
                'id' => 30,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '10.0.5.54',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 12:08:30',
                'updated_at' => '2023-01-24 12:08:30',
            ),
            30 => 
            array (
                'id' => 31,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 12:38:38',
                'updated_at' => '2023-01-24 12:38:38',
            ),
            31 => 
            array (
                'id' => 32,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 12:38:46',
                'updated_at' => '2023-01-24 12:38:46',
            ),
            32 => 
            array (
                'id' => 33,
                'email' => 'haqy@mailinator.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-01-24 14:53:19',
                'updated_at' => '2023-01-24 14:53:19',
            ),
            33 => 
            array (
                'id' => 34,
                'email' => 'haqy@mailinator.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 14:53:21',
                'updated_at' => '2023-01-24 14:53:21',
            ),
            34 => 
            array (
                'id' => 35,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-24 14:56:14',
                'updated_at' => '2023-01-24 14:56:14',
            ),
            35 => 
            array (
                'id' => 36,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-25 09:08:23',
                'updated_at' => '2023-01-25 09:08:23',
            ),
            36 => 
            array (
                'id' => 37,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-25 11:45:05',
                'updated_at' => '2023-01-25 11:45:05',
            ),
            37 => 
            array (
                'id' => 38,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-26 09:06:38',
                'updated_at' => '2023-01-26 09:06:38',
            ),
            38 => 
            array (
                'id' => 39,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-29 09:01:46',
                'updated_at' => '2023-01-29 09:01:46',
            ),
            39 => 
            array (
                'id' => 40,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-30 09:04:13',
                'updated_at' => '2023-01-30 09:04:13',
            ),
            40 => 
            array (
                'id' => 41,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-30 14:27:48',
                'updated_at' => '2023-01-30 14:27:48',
            ),
            41 => 
            array (
                'id' => 42,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-01-31 10:59:28',
                'updated_at' => '2023-01-31 10:59:28',
            ),
            42 => 
            array (
                'id' => 43,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-01-31 10:59:33',
                'updated_at' => '2023-01-31 10:59:33',
            ),
            43 => 
            array (
                'id' => 44,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-31 10:59:36',
                'updated_at' => '2023-01-31 10:59:36',
            ),
            44 => 
            array (
                'id' => 45,
                'email' => 'haqy@mailinator.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-01-31 14:18:15',
                'updated_at' => '2023-01-31 14:18:15',
            ),
            45 => 
            array (
                'id' => 46,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-01 09:04:12',
                'updated_at' => '2023-02-01 09:04:12',
            ),
            46 => 
            array (
                'id' => 47,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-01 09:52:52',
                'updated_at' => '2023-02-01 09:52:52',
            ),
            47 => 
            array (
                'id' => 48,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-02 09:29:02',
                'updated_at' => '2023-02-02 09:29:02',
            ),
            48 => 
            array (
                'id' => 49,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-02 10:07:55',
                'updated_at' => '2023-02-02 10:07:55',
            ),
            49 => 
            array (
                'id' => 50,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-02 10:08:35',
                'updated_at' => '2023-02-02 10:08:35',
            ),
            50 => 
            array (
                'id' => 51,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-02-04 08:54:16',
                'updated_at' => '2023-02-04 08:54:16',
            ),
            51 => 
            array (
                'id' => 52,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 09:18:13',
                'updated_at' => '2023-02-04 09:18:13',
            ),
            52 => 
            array (
                'id' => 53,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 10:06:38',
                'updated_at' => '2023-02-04 10:06:38',
            ),
            53 => 
            array (
                'id' => 54,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-02-04 10:23:47',
                'updated_at' => '2023-02-04 10:23:47',
            ),
            54 => 
            array (
                'id' => 55,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 10:23:48',
                'updated_at' => '2023-02-04 10:23:48',
            ),
            55 => 
            array (
                'id' => 56,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 10:25:38',
                'updated_at' => '2023-02-04 10:25:38',
            ),
            56 => 
            array (
                'id' => 57,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-02-04 10:26:02',
                'updated_at' => '2023-02-04 10:26:02',
            ),
            57 => 
            array (
                'id' => 58,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 10:26:05',
                'updated_at' => '2023-02-04 10:26:05',
            ),
            58 => 
            array (
                'id' => 59,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 10:33:37',
                'updated_at' => '2023-02-04 10:33:37',
            ),
            59 => 
            array (
                'id' => 60,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 10:33:41',
                'updated_at' => '2023-02-04 10:33:41',
            ),
            60 => 
            array (
                'id' => 61,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '10.0.5.54',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 12:58:54',
                'updated_at' => '2023-02-04 12:58:54',
            ),
            61 => 
            array (
                'id' => 62,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '10.0.5.54',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-04 13:03:18',
                'updated_at' => '2023-02-04 13:03:18',
            ),
            62 => 
            array (
                'id' => 63,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-05 08:54:23',
                'updated_at' => '2023-02-05 08:54:23',
            ),
            63 => 
            array (
                'id' => 64,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-02-05 12:21:17',
                'updated_at' => '2023-02-05 12:21:17',
            ),
            64 => 
            array (
                'id' => 65,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-05 12:21:23',
                'updated_at' => '2023-02-05 12:21:23',
            ),
            65 => 
            array (
                'id' => 66,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-06 09:06:39',
                'updated_at' => '2023-02-06 09:06:39',
            ),
            66 => 
            array (
                'id' => 67,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 0,
                'created_at' => '2023-02-06 09:09:14',
                'updated_at' => '2023-02-06 09:09:14',
            ),
            67 => 
            array (
                'id' => 68,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'action_type' => 'login',
                'status' => 1,
                'created_at' => '2023-02-06 09:09:21',
                'updated_at' => '2023-02-06 09:09:21',
            ),
        ));
        
        
    }
}