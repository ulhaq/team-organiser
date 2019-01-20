<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['Project Management', 'Operational Management', 'Functional Management', 'Business Analysing', 'Process Analysis', 'Solution Architecting', 'QA Management', 'Software Architecting', 'Software Development', 'Backend Development', 'Frontend Development', 'UX Designing',];

        for ($i=0; $i < count($skills); $i++) {
            DB::table('skills')->insert([
              'title' => $skills[$i],
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
