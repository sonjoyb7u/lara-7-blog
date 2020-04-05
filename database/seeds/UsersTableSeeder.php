<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->defaultUserData();

        $faker = Faker\Factory::create();

        foreach(range(1, 9) as $index) {
            $full_name = $faker->name;
            $password = '123456';

            User::create([
                'full_name' => $full_name,
                'email' => $faker->freeEmail,
                'user_name' => $this->userGenerate($full_name),
                'image' => $faker->imageUrl(),
                'password' => bcrypt($password),

            ]);
        }

//        factory(User::class, 10)->create();


    }

    public function defaultUserData() {
        User::create([
            'Full_name' => 'Sonjoy Barua',
            'email' => 'admin@gmail.com',
            'user_name' => 'adminb7u',
            'image' => '57975_20200401074857_53541.jpg',
            'password' => bcrypt('123456'),

        ]);
    }

    public function userGenerate($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '_', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '_');

        // remove duplicate -
        $text = preg_replace('~-+~', '_', $text);

        // lowercase
        $text = strtolower($text);

        if(empty($text)) {
            return 'N-A';
        }

        return $text;
    }



}
