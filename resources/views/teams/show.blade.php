@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $team->name }}</div>

                <div class="card-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>#</td>
                        <td>{{ $team->id }}</td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td>{{ $team->name }}</td>
                      </tr>
                      <tr>
                        <td>Required Skills</td>
                        <td>
                          <select multiple disabled class="form-control" >
                            @foreach($team->skills as $skill)
                              <option>{{ $skill->title }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Required Technologies</td>
                        <td>
                          <select multiple disabled class="form-control" >
                            @foreach($team->technologies as $technology)
                              <option>{{ $technology->title }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Users</td>
                        <td>
                          <form action="{{ action('TeamUserController@destroy', $team->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}

                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Skills</th>
                                  <th scope="col">Technologies</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($team->users as $user)
                                    <tr>
                                      <th scope="row"><input type="checkbox" name="users[]" value="{{ $user->id }}" /></th>
                                      <td><a href="{{ action('UserController@show', $user->id) }}">{{ $user->name }}</a></td>
                                      <td>{{ implode(', ', $user->skills->pluck('title')->toArray()) }}</td>
                                      <td>{{ implode(', ', $user->technologies->pluck('title')->toArray()) }}</td>
                                    </tr>
                                @endforeach
                                @if($team->users->count())
                                  <tr>
                                    <td colspan="4">
                                      <input type="submit" class="btn btn-danger" value="Remove Users" />
                                    </td>
                                  </tr>
                                @endif
                              </tbody>
                            </table>
                          </form>
                        </td>
                      </tr>
                      <tr>
                        <td>Actions</td>
                        <td>
                            <a href="{{ action('TeamController@edit', $team->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ action('TeamController@destroy', $team->id) }}" method="POST">
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
