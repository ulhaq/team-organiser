<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Skill;
use App\Technology;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Validation rules
     * @var array
     */
    private $rules = [
        'name' => 'required',
        'skills' => 'required',
        'technologies' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::paginate(10);

        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        $technologies = Technology::all();

        return view('teams.create', compact('skills', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $team = Team::create($request->except('skills', 'technologies'));

        $team->skills()->sync($request->get('skills'));
        $team->technologies()->sync($request->get('technologies'));

        return redirect(action('MatchController', $team->id))->with('success', 'The item was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $users = User::all();
        $skills = Skill::all();
        $technologies = Technology::all();

        return view('teams.edit', compact('team', 'users', 'skills', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate($this->rules);

        $team->update($request->except('skills', 'technologies'));

        $team->users()->sync($request->get('users'));
        $team->skills()->sync($request->get('skills'));
        $team->technologies()->sync($request->get('technologies'));

        return redirect(action('TeamController@index'))->with('success', 'The item was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect(action('TeamController@index'))->with('success', 'The item was deleted successfully.');
    }
}
