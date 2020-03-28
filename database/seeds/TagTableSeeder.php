<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tag::create([
            'tag' => 'makkelijk',
        ]);
        Tag::create([
            'tag' => 'moeilijk',
        ]);
        Tag::create([
            'tag' => 'leuk',
        ]);
        Tag::create([
            'tag' => 'saai',
        ]);
        Tag::create([
            'tag' => 'veel werk',
        ]);
        Tag::create([
            'tag' => 'weinig werk',
        ]);
    }
}
