@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Users</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Skills</th>
                          <th scope="col">Technologies</th>
                          <th scope="col">Joined</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                            <tr>
                              <th scope="row">{{ $user->id }}</th>
                              <td><a href="{{ action('UserController@show', $user->id) }}">{{ $user->name }}</a></td>
                              <td>{{ implode(', ', $user->skills->pluck('title')->toArray()) }}</td>
                              <td>{{ implode(', ', $user->technologies->pluck('title')->toArray()) }}</td>
                              <td>{{ $user->joined_at->diffForHumans() }}</td>
                              <td>
                                  <a href="{{ action('UserController@edit', $user->id) }}" class="btn btn-primary">Edit</a>

                                  <form action="{{ action('UserController@destroy', $user->id) }}" method="POST">
                                      @csrf
                                      {{ method_field('DELETE') }}

                                      <input type="submit" value="Delete" class="btn btn-danger">
                                  </form>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <td colspan="6">
                              {{ $users->links() }}
                            </td>
                          </tr>
                      </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
