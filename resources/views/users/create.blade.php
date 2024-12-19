@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Add User') }}</h4>
                </div>
    
                <div>
                    <a class="btn btn-sm btn-primary"
                        href="{{ URL::previous() }}">
                        <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="row">
            <div class="form-group col-sm-12 mb-3">
                <label for="name">{{ __('Name') }}</label>
                <input type="text"
                    class="form-control"
                    name="name"
                    placeholder="Enter the user name"
                    required>
            </div>

            <div class="form-group col-sm-12 mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input type="email"
                    class="form-control"
                    name="email"
                    placeholder="Enter the user email"
                    required>
            </div>

            <div class="form-group col-sm-12 mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input type="password"
                    class="form-control"
                    name="password"
                    placeholder="Enter the password"
                    required>
            </div>

            <div class="form-group col-sm-12 mb-3">
                <label for="confirm_password">{{ __('Confirm Password') }}</label>
                <input type="password"
                    class="form-control"
                    name="confirm_password"
                    placeholder="Enter the confirm password"
                    required>
            </div>

            <div class="form-group col-sm-12 mb-3">
                <label for="role">{{ __('Role') }}</label>
                <select name="roles[]" class="form-control" multiple="multiple">
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}">
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12 text-end">
                <button type="submit"
                    class="btn btn-sm btn-primary">
                    <i class="fa fa-floppy-disk"></i> {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
@endsection
