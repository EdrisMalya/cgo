<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AllowedExtensionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('allowed_extensions')->delete();
        
        \DB::table('allowed_extensions')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'PDF',
                'created_at' => '2023-01-23 14:51:35',
                'updated_at' => '2023-01-23 14:51:35',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'JPG',
                'created_at' => '2023-01-23 14:51:39',
                'updated_at' => '2023-01-23 14:51:39',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'JPEG',
                'created_at' => '2023-01-23 14:51:45',
                'updated_at' => '2023-01-23 14:51:45',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'PNG',
                'created_at' => '2023-01-24 09:59:43',
                'updated_at' => '2023-01-24 09:59:43',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'PPTX',
                'created_at' => '2023-01-24 09:59:49',
                'updated_at' => '2023-01-24 09:59:49',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'CSV',
                'created_at' => '2023-01-24 09:59:53',
                'updated_at' => '2023-01-24 09:59:53',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'XLSX',
                'created_at' => '2023-01-24 10:00:02',
                'updated_at' => '2023-01-24 10:00:02',
            ),
        ));
        
        
    }
}