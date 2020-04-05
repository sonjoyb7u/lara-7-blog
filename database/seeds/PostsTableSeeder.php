<?php

use Illuminate\Database\Seeder;
use App\Models\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(Post::class, 10)->create();

        $faker = Faker\Factory::create();

        foreach(range(1, 10) as $index) {
            Post::create([
                'user_id' => random_int(1, 2),
                'cat_id' => random_int(1, 10),
                'title' => $faker->sentence,
                'desc' => $faker->realText(),
                'image' => $faker->imageUrl(),
                'status' => $this->getRandomStatus(),
            ]);
        }

    }

    /**
     * @return mixed
     */

    public function getRandomStatus() {
        $postStatus = ['draft', 'published', 'private'];

        return $postStatus[array_rand($postStatus)];
    }




}
