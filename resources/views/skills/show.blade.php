@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $skill->title }}</div>

                <div class="card-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>#</td>
                        <td>{{ $skill->id }}</td>
                      </tr>
                      <tr>
                        <td>Title</td>
                        <td>{{ $skill->title }}</td>
                      </tr>
                      <tr>
                        <td>People who know this</td>
                        <td>
                          <select multiple disabled class="form-control" >
                            @foreach($skill->users as $user)
                              <option>{{ $user->name }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Actions</td>
                        <td>
                            <a href="{{ action('SkillController@edit', $skill->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ action('SkillController@destroy', $skill->id) }}" method="POST">
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
