@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Best Matches</div>

                <div class="card-body">
                  <form action="{{ action('TeamUserController@store', $team->id) }}" method="POST">
                      @csrf
                      <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Skills</th>
                          <th scope="col">Technologies</th>
                          <th scope="col">Email</th>
                          <th scope="col">Matching</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                            <tr>
                              <th scope="row"><input type="checkbox" name="users[]" value="{{ $user->id }}" {{ in_array($user->id, $team->user_ids) ? 'checked' : '' }}/></th>
                              <td><a href="{{ action('UserController@show', $user->id) }}">{{ $user->name }}</a></td>
                              <td>{{ implode(', ', $user->skills->pluck('title')->toArray()) }}</td>
                              <td>{{ implode(', ', $user->technologies->pluck('title')->toArray()) }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->matching }} %</td>
                            </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <td colspan="6">
                              @if($users->count())
                                <input type="submit" value="Add Users" class="btn btn-success" />
                              @endif
                              <a href="{{ action('TeamController@edit', $team->id) }}" class="btn btn-primary">Change Requirements</a>
                            </td>
                          </tr>
                      </tfoot>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
