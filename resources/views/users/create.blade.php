@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new User</div>

                <div class="card-body">
                  <form method="POST" action="{{ action('UserController@store') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                              @if ($errors->has('address'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="joined_at" class="col-md-4 col-form-label text-md-right">Joined Date</label>

                          <div class="col-md-6">
                              <input id="joined_at" type="date" class="form-control{{ $errors->has('joined_at') ? ' is-invalid' : '' }}" name="joined_at" value="{{ old('joined_at') }}" required>

                              @if ($errors->has('joined_at'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('joined_at') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="skills" class="col-md-4 col-form-label text-md-right">Skills</label>

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
                          <label for="technologies" class="col-md-4 col-form-label text-md-right">Technologies</label>

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

                      <div class="form-group row">
                          <label for="img" class="col-md-4 col-form-label text-md-right">Profile Image</label>

                          <div class="col-md-6">
                              <input id="img" type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" />

                              @if ($errors->has('img'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('img') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-success">
                                  Create User
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
