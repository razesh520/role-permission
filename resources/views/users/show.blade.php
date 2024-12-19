@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Show User') }}</h4>
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

    <div class="row">
        <div class="form-group col-sm-12 mb-3">
            <label for="name">{{ __('Name:') }}</label>
            {{ $user->name }}
        </div>

        <div class="form-group col-sm-12 mb-3">
            <label for="email">{{ __('Email:') }}</label>
            {{ $user->email }}
        </div>
        
        <div class="form-group col-sm-12 mb-3">
            <label for="roles">{{ __('Roles:') }}</label>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
@endsection
