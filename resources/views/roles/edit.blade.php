@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Edit Role') }}</h4>
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

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col-sm-12 mb-3">
                <label for="name">{{ __('Name') }}</label>
                <input type="text"
                    class="form-control"
                    name="name"
                    placeholder="Name"
                    value="{{ $role->name }}">
            </div>

            <div class="form-group col-sm-12 mb-3">
                <label for="permission">{{ __('Permission') }}</label>
                <br/>
                @foreach($permission as $value)
                    <label>
                        <input type="checkbox"
                        class="name"
                        name="permission[{{$value->id}}]"
                        value="{{$value->id}}"
                        {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}> {{ $value->name }}
                    </label>
                <br/>
                @endforeach
            </div>

            <div class="col-sm-12 text-end">
                <button type="submit"
                    class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
@endsection
