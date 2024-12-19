@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Role Management') }}</h4>
                </div>
    
                <div>
                    @can('role-create')
                        <a class="btn  btn-sm btn-success"
                            href="{{ route('roles.create') }}">
                            <i class="fa fa-plus"></i> {{ __('Add New') }}
                        </a>
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
            <th>{{ __('Action') }}</th>
        </tr>

        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-sm btn-info"
                        href="{{ route('roles.show',$role->id) }}">
                        <i class="fa fa-list"></i>
                    </a>

                    @can('role-edit')
                        <a class="btn btn-sm btn-primary"
                            href="{{ route('roles.edit',$role->id) }}">
                            <i class="fa fa-pen-to-square"></i>
                        </a>
                    @endcan

                    @can('role-delete')
                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                            style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $roles->links('pagination::bootstrap-5') !!}
@endsection
