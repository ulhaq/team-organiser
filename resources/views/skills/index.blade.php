@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Skills</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">People who know this</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($skills as $skill)
                            <tr>
                              <th scope="row">{{ $skill->id }}</th>
                              <td><a href="{{ action('SkillController@show', $skill->id) }}">{{ $skill->title }}</a></td>
                              <td>{{ $skill->users->count() }}</td>
                              <td>
                                  <a href="{{ action('SkillController@edit', $skill->id) }}" class="btn btn-primary">Edit</a>

                                  <form action="{{ action('SkillController@destroy', $skill->id) }}" method="POST">
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
                            <td colspan="4">
                              {{ $skills->links() }}
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
