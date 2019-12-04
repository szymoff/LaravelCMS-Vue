<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('pages')->insert([
                'title' => 'Page Title 2',
                'meta_title' => 'Page Meta Title 2',
                'meta_description' => 'Page Meta Description 2',
                'content' => 'Page Content Lorem Ipsum 2',
                'author' => 1,
                'header' => 1,
                'footer' => 1,
                'sketch' => FALSE,
                'created_at' => now(),
                'updated_at'=> now()
            ]);
        
    }
}
