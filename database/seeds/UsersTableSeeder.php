<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user) {
            $len = rand(1,10);

            for ($i=0; $i < $len; $i++) {
                $skill_ids[] = rand(1,12);
                $technology_ids[] = rand(1,22);
            }

            $user->skills()->attach($skill_ids);
            $user->technologies()->attach($technology_ids);
        });
    }
}
