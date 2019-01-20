<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __invoke(Team $team)
    {
        $users = User::filter([
            'skill' => $team->skill_ids,
            'technology' => $team->technology_ids,
        ])->get();

        foreach ($users as $user) {
            $user->matching = collect([
                array_similarity($team->skill_ids, $user->skill_ids),
                array_similarity($team->technology_ids, $user->technology_ids),
            ])->avg();
        }

        $users = $users->sortByDesc('matching');

        return view('teams.add_users', compact('team', 'users'));
    }
}
