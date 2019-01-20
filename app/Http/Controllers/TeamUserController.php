<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        $team->users()->sync($request->get('users'));

        return redirect(action('TeamController@index'))->with('success', 'The items were added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        $team->users()->detach($request->get('users'));

        return redirect(action('TeamController@index'))->with('success', 'The items were removed successfully.');
    }
}
