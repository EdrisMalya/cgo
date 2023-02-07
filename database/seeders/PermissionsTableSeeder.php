<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_group_id' => 1,
                'name' => 'Access',
                'key' => 'user-management-access',
                'created_at' => '2022-12-11 06:04:55',
                'updated_at' => '2022-12-11 06:04:55',
            ),
            1 => 
            array (
                'id' => 2,
                'permission_group_id' => 2,
                'name' => 'Access',
                'key' => 'users-access',
                'created_at' => '2022-12-11 06:05:18',
                'updated_at' => '2022-12-11 06:05:18',
            ),
            2 => 
            array (
                'id' => 3,
                'permission_group_id' => 2,
                'name' => 'Create user',
                'key' => 'users-create-user',
                'created_at' => '2022-12-11 06:05:30',
                'updated_at' => '2022-12-11 06:05:30',
            ),
            3 => 
            array (
                'id' => 4,
                'permission_group_id' => 2,
                'name' => 'Edit user',
                'key' => 'users-edit-user',
                'created_at' => '2022-12-11 06:05:39',
                'updated_at' => '2022-12-11 06:05:39',
            ),
            4 => 
            array (
                'id' => 5,
                'permission_group_id' => 2,
                'name' => 'Delete user',
                'key' => 'users-delete-user',
                'created_at' => '2022-12-11 06:05:48',
                'updated_at' => '2022-12-11 06:05:48',
            ),
            5 => 
            array (
                'id' => 6,
                'permission_group_id' => 3,
                'name' => 'Access',
                'key' => 'roles-access',
                'created_at' => '2022-12-11 06:05:55',
                'updated_at' => '2022-12-11 06:05:55',
            ),
            6 => 
            array (
                'id' => 9,
                'permission_group_id' => 3,
                'name' => 'View role details',
                'key' => 'roles-view-role-details',
                'created_at' => '2022-12-11 06:06:23',
                'updated_at' => '2022-12-11 06:06:23',
            ),
            7 => 
            array (
                'id' => 10,
                'permission_group_id' => 3,
                'name' => 'Create role',
                'key' => 'roles-create-role',
                'created_at' => '2022-12-11 06:06:50',
                'updated_at' => '2022-12-11 06:06:50',
            ),
            8 => 
            array (
                'id' => 11,
                'permission_group_id' => 3,
                'name' => 'Edit role',
                'key' => 'roles-edit-role',
                'created_at' => '2022-12-11 06:06:54',
                'updated_at' => '2022-12-11 06:06:54',
            ),
            9 => 
            array (
                'id' => 12,
                'permission_group_id' => 3,
                'name' => 'Delete role',
                'key' => 'roles-delete-role',
                'created_at' => '2022-12-11 06:06:58',
                'updated_at' => '2022-12-11 06:06:58',
            ),
            10 => 
            array (
                'id' => 13,
                'permission_group_id' => 2,
                'name' => 'View profile',
                'key' => 'users-view-profile',
                'created_at' => '2022-12-11 08:13:11',
                'updated_at' => '2022-12-11 08:13:11',
            ),
            11 => 
            array (
                'id' => 14,
                'permission_group_id' => 4,
                'name' => 'Access',
                'key' => 'configuration-access',
                'created_at' => '2022-12-11 10:24:17',
                'updated_at' => '2022-12-11 10:24:17',
            ),
            12 => 
            array (
                'id' => 15,
                'permission_group_id' => 5,
                'name' => 'Access',
                'key' => 'language-access',
                'created_at' => '2022-12-11 10:43:21',
                'updated_at' => '2022-12-11 10:43:21',
            ),
            13 => 
            array (
                'id' => 16,
                'permission_group_id' => 5,
                'name' => 'Create language',
                'key' => 'language-create-language',
                'created_at' => '2022-12-12 06:22:13',
                'updated_at' => '2022-12-12 06:22:13',
            ),
            14 => 
            array (
                'id' => 17,
                'permission_group_id' => 5,
                'name' => 'Edit language name',
                'key' => 'language-edit-language-name',
                'created_at' => '2022-12-13 05:26:42',
                'updated_at' => '2022-12-13 05:26:42',
            ),
            15 => 
            array (
                'id' => 18,
                'permission_group_id' => 5,
                'name' => 'Delete language',
                'key' => 'language-delete-language',
                'created_at' => '2022-12-13 05:26:49',
                'updated_at' => '2022-12-13 05:26:49',
            ),
            16 => 
            array (
                'id' => 19,
                'permission_group_id' => 6,
                'name' => 'Access',
                'key' => 'language-dictionary-access',
                'created_at' => '2022-12-13 05:27:28',
                'updated_at' => '2022-12-13 05:27:28',
            ),
            17 => 
            array (
                'id' => 21,
                'permission_group_id' => 6,
                'name' => 'Add new word to dictionary',
                'key' => 'language-dictionary-add-new-word-to-dictionary',
                'created_at' => '2022-12-13 05:44:26',
                'updated_at' => '2022-12-13 05:44:26',
            ),
            18 => 
            array (
                'id' => 22,
                'permission_group_id' => 6,
                'name' => 'Edit word',
                'key' => 'language-dictionary-edit-word',
                'created_at' => '2022-12-13 07:32:33',
                'updated_at' => '2022-12-13 07:32:33',
            ),
            19 => 
            array (
                'id' => 23,
                'permission_group_id' => 6,
                'name' => 'Delete word',
                'key' => 'language-dictionary-delete-word',
                'created_at' => '2022-12-13 07:32:39',
                'updated_at' => '2022-12-13 07:32:39',
            ),
            20 => 
            array (
                'id' => 26,
                'permission_group_id' => 9,
                'name' => 'Access',
                'key' => 'log-activity-access',
                'created_at' => '2022-12-18 10:06:53',
                'updated_at' => '2022-12-18 10:06:53',
            ),
            21 => 
            array (
                'id' => 27,
                'permission_group_id' => 2,
                'name' => 'View user login log',
                'key' => 'users-view-user-login-log',
                'created_at' => '2022-12-18 10:39:43',
                'updated_at' => '2022-12-18 10:39:43',
            ),
            22 => 
            array (
                'id' => 28,
                'permission_group_id' => 9,
                'name' => 'View log details',
                'key' => 'log-activity-view-log-details',
                'created_at' => '2022-12-18 11:01:30',
                'updated_at' => '2022-12-18 11:01:30',
            ),
            23 => 
            array (
                'id' => 29,
                'permission_group_id' => 9,
                'name' => 'Delete log',
                'key' => 'log-activity-delete-log',
                'created_at' => '2022-12-18 11:01:48',
                'updated_at' => '2022-12-18 11:01:48',
            ),
            24 => 
            array (
                'id' => 30,
                'permission_group_id' => 10,
                'name' => 'Access',
                'key' => 'login-log-access',
                'created_at' => '2022-12-19 06:29:09',
                'updated_at' => '2022-12-19 06:29:09',
            ),
            25 => 
            array (
                'id' => 31,
                'permission_group_id' => 10,
                'name' => 'Truncate',
                'key' => 'login-log-truncate',
                'created_at' => '2022-12-19 06:29:17',
                'updated_at' => '2022-12-19 06:29:17',
            ),
            26 => 
            array (
                'id' => 32,
                'permission_group_id' => 11,
                'name' => 'Access',
                'key' => 'backups-access',
                'created_at' => '2022-12-19 15:37:12',
                'updated_at' => '2022-12-19 15:37:12',
            ),
            27 => 
            array (
                'id' => 33,
                'permission_group_id' => 13,
                'name' => 'Access',
                'key' => 'log-activity-access',
                'created_at' => '2022-12-22 10:29:09',
                'updated_at' => '2022-12-22 10:29:09',
            ),
            28 => 
            array (
                'id' => 34,
                'permission_group_id' => 13,
                'name' => 'View details',
                'key' => 'log-activity-view-details',
                'created_at' => '2022-12-22 10:29:14',
                'updated_at' => '2022-12-22 10:29:14',
            ),
            29 => 
            array (
                'id' => 35,
                'permission_group_id' => 14,
                'name' => 'Access',
                'key' => 'normal-audit-access',
                'created_at' => '2023-01-23 11:11:49',
                'updated_at' => '2023-01-23 11:11:49',
            ),
            30 => 
            array (
                'id' => 36,
                'permission_group_id' => 14,
                'name' => 'Add new record',
                'key' => 'normal-audit-add-new-record',
                'created_at' => '2023-01-23 11:13:03',
                'updated_at' => '2023-01-23 11:13:03',
            ),
            31 => 
            array (
                'id' => 37,
                'permission_group_id' => 15,
                'name' => 'Access',
                'key' => 'auditor-team-access',
                'created_at' => '2023-01-23 11:14:34',
                'updated_at' => '2023-01-23 11:14:34',
            ),
            32 => 
            array (
                'id' => 39,
                'permission_group_id' => 15,
                'name' => 'Create team',
                'key' => 'auditor-team-create-team',
                'created_at' => '2023-01-23 11:35:05',
                'updated_at' => '2023-01-23 11:35:05',
            ),
            33 => 
            array (
                'id' => 40,
                'permission_group_id' => 15,
                'name' => 'Edit team',
                'key' => 'auditor-team-edit-team',
                'created_at' => '2023-01-23 11:36:03',
                'updated_at' => '2023-01-23 11:36:03',
            ),
            34 => 
            array (
                'id' => 41,
                'permission_group_id' => 15,
                'name' => 'Delete team',
                'key' => 'auditor-team-delete-team',
                'created_at' => '2023-01-23 11:36:14',
                'updated_at' => '2023-01-23 11:36:14',
            ),
            35 => 
            array (
                'id' => 42,
                'permission_group_id' => 15,
                'name' => 'View team members',
                'key' => 'auditor-team-view-team-members',
                'created_at' => '2023-01-23 11:36:38',
                'updated_at' => '2023-01-23 11:36:38',
            ),
            36 => 
            array (
                'id' => 43,
                'permission_group_id' => 15,
                'name' => 'Add member to team',
                'key' => 'auditor-team-add-member-to-team',
                'created_at' => '2023-01-23 11:37:44',
                'updated_at' => '2023-01-23 11:37:44',
            ),
            37 => 
            array (
                'id' => 44,
                'permission_group_id' => 16,
                'name' => 'Access',
                'key' => 'auditor-members-access',
                'created_at' => '2023-01-23 11:38:40',
                'updated_at' => '2023-01-23 11:38:40',
            ),
            38 => 
            array (
                'id' => 46,
                'permission_group_id' => 16,
                'name' => 'Create member',
                'key' => 'auditor-members-create-member',
                'created_at' => '2023-01-23 11:39:30',
                'updated_at' => '2023-01-23 11:39:30',
            ),
            39 => 
            array (
                'id' => 47,
                'permission_group_id' => 16,
                'name' => 'Edit member',
                'key' => 'auditor-members-edit-member',
                'created_at' => '2023-01-23 11:39:38',
                'updated_at' => '2023-01-23 11:39:38',
            ),
            40 => 
            array (
                'id' => 48,
                'permission_group_id' => 16,
                'name' => 'Delete member',
                'key' => 'auditor-members-delete-member',
                'created_at' => '2023-01-23 11:39:46',
                'updated_at' => '2023-01-23 11:39:46',
            ),
            41 => 
            array (
                'id' => 49,
                'permission_group_id' => 17,
                'name' => 'Access',
                'key' => 'confidentiality-level-access',
                'created_at' => '2023-01-23 11:42:36',
                'updated_at' => '2023-01-23 11:42:36',
            ),
            42 => 
            array (
                'id' => 50,
                'permission_group_id' => 17,
                'name' => 'Create',
                'key' => 'confidentiality-level-create',
                'created_at' => '2023-01-23 11:43:11',
                'updated_at' => '2023-01-23 11:43:11',
            ),
            43 => 
            array (
                'id' => 51,
                'permission_group_id' => 17,
                'name' => 'Edit',
                'key' => 'confidentiality-level-edit',
                'created_at' => '2023-01-23 11:43:16',
                'updated_at' => '2023-01-23 11:43:16',
            ),
            44 => 
            array (
                'id' => 52,
                'permission_group_id' => 17,
                'name' => 'Delete',
                'key' => 'confidentiality-level-delete',
                'created_at' => '2023-01-23 11:43:19',
                'updated_at' => '2023-01-23 11:43:19',
            ),
            45 => 
            array (
                'id' => 53,
                'permission_group_id' => 18,
                'name' => 'Access',
                'key' => 'application-settings-access',
                'created_at' => '2023-01-23 11:54:13',
                'updated_at' => '2023-01-23 11:54:13',
            ),
            46 => 
            array (
                'id' => 54,
                'permission_group_id' => 19,
                'name' => 'Access',
                'key' => 'allowed-extensions-access',
                'created_at' => '2023-01-23 11:56:16',
                'updated_at' => '2023-01-23 11:56:16',
            ),
            47 => 
            array (
                'id' => 55,
                'permission_group_id' => 19,
                'name' => 'Add extension',
                'key' => 'allowed-extensions-add-extension',
                'created_at' => '2023-01-23 14:35:08',
                'updated_at' => '2023-01-23 14:35:08',
            ),
            48 => 
            array (
                'id' => 56,
                'permission_group_id' => 19,
                'name' => 'Delete extension',
                'key' => 'allowed-extensions-delete-extension',
                'created_at' => '2023-01-23 14:35:16',
                'updated_at' => '2023-01-23 14:35:16',
            ),
            49 => 
            array (
                'id' => 57,
                'permission_group_id' => 14,
                'name' => 'View access',
                'key' => 'normal-audit-view-access',
                'created_at' => '2023-01-24 12:42:12',
                'updated_at' => '2023-01-24 12:42:12',
            ),
            50 => 
            array (
                'id' => 58,
                'permission_group_id' => 14,
                'name' => 'Seen history access',
                'key' => 'normal-audit-seen-history-access',
                'created_at' => '2023-01-25 12:41:08',
                'updated_at' => '2023-01-25 12:41:08',
            ),
            51 => 
            array (
                'id' => 60,
                'permission_group_id' => 14,
                'name' => 'Review document access',
                'key' => 'normal-audit-review-document-access',
                'created_at' => '2023-02-01 09:54:43',
                'updated_at' => '2023-02-01 09:54:43',
            ),
            52 => 
            array (
                'id' => 61,
                'permission_group_id' => 14,
                'name' => 'Approve document access',
                'key' => 'normal-audit-approve-document-access',
                'created_at' => '2023-02-02 10:09:48',
                'updated_at' => '2023-02-02 10:09:48',
            ),
            53 => 
            array (
                'id' => 63,
                'permission_group_id' => 14,
                'name' => 'Delete report',
                'key' => 'normal-audit-delete-report',
                'created_at' => '2023-02-02 11:33:40',
                'updated_at' => '2023-02-02 11:33:40',
            ),
            54 => 
            array (
                'id' => 64,
                'permission_group_id' => 20,
                'name' => 'Access',
                'key' => 'edit-report-access',
                'created_at' => '2023-02-02 12:22:16',
                'updated_at' => '2023-02-02 12:22:16',
            ),
            55 => 
            array (
                'id' => 66,
                'permission_group_id' => 20,
                'name' => 'Edit files',
                'key' => 'edit-report-edit-files',
                'created_at' => '2023-02-02 12:26:19',
                'updated_at' => '2023-02-02 12:26:19',
            ),
            56 => 
            array (
                'id' => 71,
                'permission_group_id' => 20,
                'name' => 'Edit auditor team',
                'key' => 'edit-report-edit-auditor-team',
                'created_at' => '2023-02-05 12:33:10',
                'updated_at' => '2023-02-05 12:33:10',
            ),
            57 => 
            array (
                'id' => 73,
                'permission_group_id' => 20,
                'name' => 'Edit access',
                'key' => 'edit-report-edit-access',
                'created_at' => '2023-02-05 12:38:17',
                'updated_at' => '2023-02-05 12:38:17',
            ),
            58 => 
            array (
                'id' => 74,
                'permission_group_id' => 20,
                'name' => 'Edit download access',
                'key' => 'edit-report-edit-download-access',
                'created_at' => '2023-02-05 12:38:25',
                'updated_at' => '2023-02-05 12:38:25',
            ),
        ));
        
        
    }
}