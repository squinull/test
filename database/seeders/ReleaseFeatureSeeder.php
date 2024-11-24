<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Release;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReleaseFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $releases = Release::factory(10)->create();

        $features = Feature::factory(30)->create();

        $releases->each(function ($release) use ($features) {
            $release->features()->attach($features->random(rand(3, 7))->pluck('id')->toArray());
        });
    }
}
