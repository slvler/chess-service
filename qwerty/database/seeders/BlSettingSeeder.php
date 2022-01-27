<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BlSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->insert([
           'title' => Str::random(10),
            'keyword' => Str::random(10),
            'description' => 'author',
            'author' => 'author',
            'analytics' => 'analytics',
            'metrica' => 'metrica',
            'facebook' => 'facebook',
            'instagram' => 'instagram',
            'twitter' => 'twitter',
            'pinterest' => 'pinterest',
            'youtube' => 'youtube',
            'status' => 0
        ]);

    }
}
