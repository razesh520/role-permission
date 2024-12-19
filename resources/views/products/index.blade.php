@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Products') }}</h4>
                </div>
    
                <div>
                    @can('product-create')
                        <a class="btn btn-sm btn-success"
                            href="{{ route('products.create') }}">
                            <i class="fa fa-plus"></i> {{ __('Add New') }}</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success" role="alert"> 
            {{ $value }}
        </div>
    @endsession

    <table class="table table-bordered">
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Details') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-sm btn-info"
                            href="{{ route('products.show', $product->id) }}">
                            <i class="fa fa-list"></i>
                        </a>

                        @can('product-edit')
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('products.edit', $product->id) }}">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('product-delete')
                            <button type="submit"
                                class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
@endsection
