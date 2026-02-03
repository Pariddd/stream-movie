<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'The Last Horizon',
                'director' => 'John Carter',
                'stars' => 'Alex Turner, Emma Stone',
                'release_date' => '2022-06-12',
                'duration' => 120,
            ],
            [
                'title' => 'Shadow Night',
                'director' => 'Michael Reeves',
                'stars' => 'Chris Evans, Scarlett Johansson',
                'release_date' => '2021-10-01',
                'duration' => 110,
            ],
            [
                'title' => 'Beyond the Stars',
                'director' => 'Sophia Nolan',
                'stars' => 'Ryan Gosling, Natalie Portman',
                'release_date' => '2023-02-20',
                'duration' => 130,
            ],
            [
                'title' => 'Broken Silence',
                'director' => 'Daniel Smith',
                'stars' => 'Jake Gyllenhaal, Amy Adams',
                'release_date' => '2020-08-15',
                'duration' => 115,
            ],
            [
                'title' => 'Midnight Escape',
                'director' => 'Laura White',
                'stars' => 'Tom Hardy, Emily Blunt',
                'release_date' => '2019-12-05',
                'duration' => 105,
            ],
            [
                'title' => 'The Forgotten Land',
                'director' => 'Peter Jackson',
                'stars' => 'Orlando Bloom, Evangeline Lilly',
                'release_date' => '2018-07-22',
                'duration' => 140,
            ],
            [
                'title' => 'Echoes of Time',
                'director' => 'Christopher Lane',
                'stars' => 'Benedict Cumberbatch, Keira Knightley',
                'release_date' => '2021-04-18',
                'duration' => 125,
            ],
            [
                'title' => 'Silent War',
                'director' => 'Robert King',
                'stars' => 'Matt Damon, Charlize Theron',
                'release_date' => '2020-11-11',
                'duration' => 118,
            ],
            [
                'title' => 'Dreamcatcher',
                'director' => 'Olivia Brown',
                'stars' => 'Timothée Chalamet, Zendaya',
                'release_date' => '2022-09-09',
                'duration' => 112,
            ],
            [
                'title' => 'Last Signal',
                'director' => 'Henry Moore',
                'stars' => 'Oscar Isaac, Jessica Chastain',
                'release_date' => '2023-05-30',
                'duration' => 128,
            ],
        ];

        $categories = Category::pluck('id')->toArray();

        foreach ($movies as $movieData) {
            $movie = Movie::create([
                'title' => $movieData['title'],
                'slug' => Str::slug($movieData['title']),
                'description' => 'This is a sample description for ' . $movieData['title'],
                'poster' => 'posters/default.jpg',
                'director' => $movieData['director'],
                'stars' => $movieData['stars'],
                'release_date' => $movieData['release_date'],
                'hls_url' => 'https://www.youtube.com/watch?v=Jx7ktt3yMj4&list=RDJx7ktt3yMj4&start_radio=1',
                'duration' => $movieData['duration'],
            ]);

            $movie->categories()->attach(
                collect($categories)->random(rand(1, 3))->toArray()
            );
        }
    }
}
