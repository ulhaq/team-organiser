<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Skill;
use App\Technology;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Validation rules
     * @var array
     */
    private $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'address' => 'required',
        'joined_at' => 'required|date_format:Y-m-d',
        'skills' => 'required',
        'technologies' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
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

        return view('users.create', compact('skills', 'technologies'));
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

        $user = User::create($request->except('skills', 'technologies', 'img'));

        $user->skills()->sync($request->get('skills'));
        $user->technologies()->sync($request->get('technologies'));

        $this->imgUpdate($request, $user);

        return redirect(action('UserController@index'))->with('success', 'The item was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $teams = Team::all();
        $skills = Skill::all();
        $technologies = Technology::all();

        return view('users.edit', compact('user', 'teams', 'skills', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->rules['email'] = 'required|unique:users,email,' . $user->id;

        $request->validate($this->rules);

        $user->update($request->except('skills', 'technologies', 'img'));

        $user->teams()->sync($request->get('teams'));
        $user->skills()->sync($request->get('skills'));
        $user->technologies()->sync($request->get('technologies'));

        $this->imgUpdate($request, $user);

        return redirect(action('UserController@index'))->with('success', 'The item was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(action('UserController@index'))->with('success', 'The item was deleted successfully.');
    }

    public function imgUpdate(Request $request, User $user)
    {
        if ($request->img !== null) {
            $img = time() . "_$user->id." . request()->img->getClientOriginalExtension();

            $request->img->storeAs('profile-images/', $img);

            $user->img = $img;
            $user->save();
        }
    }
}
