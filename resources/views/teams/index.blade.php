@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Teams</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Required Skills</th>
                          <th scope="col">Required Technologies</th>
                          <th scope="col">Members</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teams as $team)
                            <tr>
                              <th scope="row">{{ $team->id }}</th>
                              <td><a href="{{ action('TeamController@show', $team->id) }}">{{ $team->name }}</a></td>
                              <td>{{ implode(', ', $team->skills->pluck('title')->toArray()) }}</td>
                              <td>{{ implode(', ', $team->technologies->pluck('title')->toArray()) }}</td>
                              <td>{{ $team->users->count() }}</td>
                              <td>
                                  <a href="{{ action('TeamController@edit', $team->id) }}" class="btn btn-primary">Edit</a>

                                  <form action="{{ action('TeamController@destroy', $team->id) }}" method="POST">
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
                              {{ $teams->links() }}
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
