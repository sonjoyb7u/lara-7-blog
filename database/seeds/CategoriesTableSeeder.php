<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        Category::create([
//            'name' => Str::random(20),
//            'slug' => strtolower(Str::random(20)),
//        ]);

//        $this->defaultCategoryData();

        $faker = Faker\Factory::create();

        foreach(range(1, 10) as $index) {
            $cat_name = $faker->unique()->name;

            Category::create([
                'name' => $cat_name,
                'slug' => $this->slugGenerate($cat_name),
                'status' => random_int(0, 1),
            ]);
        }

//        factory(Category::class, 10)->create();

    }

    public function defaultCategoryData() {
        Category::create([
            'name' => Str::random(20),
            'slug' => strtolower(Str::random(20)),
        ]);
    }

    public function slugGenerate($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'N-A';
        }

        return $text;
    }



}
