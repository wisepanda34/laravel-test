<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Achievement;
use App\Models\Country;
use App\Models\Team;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(200)->create();
        foreach ($posts as $post) {
            $tagsIds = $tags->random(rand(1, 5))->pluck('id');
            $post->tags()->attach($tagsIds);
        }


        Achievement::create(['title' => 'champion']);
        Achievement::create(['title' => 'cup of country']);
        Achievement::create(['title' => 'UEFA Cup']);
        Achievement::create(['title' => 'The League of the Champions']);
        Country::create(['title' => 'Italy']);
        Country::create(['title' => 'England']);
        Country::create(['title' => 'Germany']);
        Country::create(['title' => 'France']);
        Country::create(['title' => 'Spain']);
        Team::create(['title' => 'Liverpool', 'country_id' => 2]);
        Team::create(['title' => 'Inter', 'country_id' => 1]);
        Team::create(['title' => 'Real', 'country_id' => 5]);
        Team::create(['title' => 'PSG', 'country_id' => 4]);
        // Получаем нужные достижения
        $champion = Achievement::where('title', 'champion')->first();
        $cupOfCountry = Achievement::where('title', 'cup of country')->first();
        $uefaCup = Achievement::where('title', 'UEFA Cup')->first();
        $leagueOfChampions = Achievement::where('title', 'The League of the Champions')->first();

        // Получаем нужные команды
        $liverpool = Team::where('title', 'Liverpool')->first();
        $inter = Team::where('title', 'Inter')->first();
        $real = Team::where('title', 'Real')->first();
        $psg = Team::where('title', 'PSG')->first();

        // Вставляем данные в таблицу achievement_team
        $champion->teams()->attach([$liverpool->id, $inter->id]);
        $cupOfCountry->teams()->attach([$liverpool->id, $psg->id]);
        $uefaCup->teams()->attach([$real->id]);
        $leagueOfChampions->teams()->attach([$liverpool->id, $real->id]);




        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
