@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new team</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('TeamController@store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus value="{{ old('name') }}" />

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skills" class="col-md-4 col-form-label text-md-right">Required Skills</label>

                            <div class="col-md-6">
                                <select multiple id="skills" class="form-control{{ $errors->has('skills') ? ' is-invalid' : '' }}" name="skills[]" required autofocus>
                                  @foreach($skills as $skill)
                                      <option value="{{ $skill->id }}" {{ old('skills') ? (in_array($skill->id, old('skills')) ? 'selected' : '') : '' }}>{{ $skill->title }}</option>
                                  @endforeach
                                </select>

                                @if ($errors->has('skills'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('skills') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="technologies" class="col-md-4 col-form-label text-md-right">Required Technologies</label>

                            <div class="col-md-6">
                                <select multiple id="technologies" class="form-control{{ $errors->has('technologies') ? ' is-invalid' : '' }}" name="technologies[]" required autofocus>
                                  @foreach($technologies as $technology)
                                      <option value="{{ $technology->id }}" {{ old('technologies') ? (in_array($technology->id, old('technologies')) ? 'selected' : '') : '' }}>{{ $technology->title }}</option>
                                  @endforeach
                                </select>

                                @if ($errors->has('technologies'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('technologies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Create Team
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
