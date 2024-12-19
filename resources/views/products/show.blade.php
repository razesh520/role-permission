@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __(('Show Product')) }}</h4>
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
            {{ $product->name }}
        </div>

        <div class="form-group col-sm-12 mb-3">
            <label for="details">{{ __('Details:') }}</label>
            {{ $product->detail }}
        </div>
    </div>
@endsection
