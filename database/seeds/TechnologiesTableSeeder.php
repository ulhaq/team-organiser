<?php

use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['JavaScript', 'Ruby', 'Java', 'PHP', 'Python', 'Scala', 'Elixir', 'MySQL', 'Postgres', 'SQLite', 'NoSQL', 'Mongo', 'Cassandra', 'ReactJS', 'VueJS', 'AngularJS', 'React Native', 'Flutter', 'Ionic', 'Cordova', 'Objective C', 'Swift',];

        for ($i=0; $i < count($technologies); $i++) {
            DB::table('technologies')->insert([
              'title' => $technologies[$i],
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
