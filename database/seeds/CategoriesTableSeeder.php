<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'name' => 'Văn Học',
                'slug' => 'vanhoc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'  => 'Kinh Tế',
                'slug'  => 'kinhte',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'  => 'Chính Trị',
                'slug'  => 'chinhtri',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'  => 'Tư Duy - Kĩ Năng Sống',
                'slug'  => 'tuduy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'  => 'Khoa Học',
                'slug'  => 'khoahoc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'   => 'Công Nghệ Thông Tin',
                'slug'   => 'cntt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'  => 'Viễn Tưởng - Kinh Dị',
                'slug'  => 'kinhdi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
