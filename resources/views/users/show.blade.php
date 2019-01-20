@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                  <table class="table">
                    <tbody>
                      @if($user->img)
                        <tr>
                          <td>&nbsp;</td>
                          <td><img height="250" width="250" src="{{ asset('storage/profile-images/' . $user->img) }}" /></td>
                        </tr>
                      @endif
                      <tr>
                        <td>#</td>
                        <td>{{ $user->id }}</td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td>Joined</td>
                        <td>{{ $user->joined_at->diffForHumans() }}</td>
                      </tr>
                      <tr>
                        <td>E-mail Address</td>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>{{ $user->address }}</td>
                      </tr>
                      <tr>
                        <td>Skills</td>
                        <td>
                          <select multiple disabled class="form-control" >
                            @foreach($user->skills as $skill)
                              <option>{{ $skill->title }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Technologies</td>
                        <td>
                          <select multiple disabled class="form-control" >
                            @foreach($user->technologies as $technology)
                              <option>{{ $technology->title }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Teams</td>
                        <td>
                            <select multiple disabled class="form-control" >
                              @foreach($user->teams as $team)
                                <option>{{ $team->name }}</option>
                              @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Actions</td>
                        <td>
                            <a href="{{ action('UserController@edit', $user->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ action('UserController@destroy', $user->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
