<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostTagCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        for ($i = 1; $i <= 150; $i++) {
            if ($id == 11) {
                $id = 1;
            }
            DB::table('post_category')->insert([
                'post_id' => $i,
                'category_id' => $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $id++;
        }
        for ($i = 1; $i <= 150; $i++) {
            if ($id == 11) {
                $id = 1;
            }
            DB::table('tag_post')->insert([
                'post_id' => $i,
                'tag_id' => $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
