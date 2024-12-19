@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Add Product') }}</h4>
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

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="form-group col-sm-12 mb-3">
                <label for="name">{{ __('Name') }}</label>
                <input type="text"
                    class="form-control"
                    name="name"
                    placeholder="Enter the product name">
            </div>

            <div class="form-group col-sm-12 mb-3">
                <label for="detail">{{ __('Detail') }}</label>
                <textarea class="form-control" 
                    style="height:150px"
                    name="detail"
                    placeholder="Enter the product Detail">
                </textarea>
            </div>

            <div class="col-sm-12 text-end">
                <button type="submit"
                    class="btn btn-sm btn-primary">
                    <i class="fa fa-floppy-disk"></i> {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
@endsection