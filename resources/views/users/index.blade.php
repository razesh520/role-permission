@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4>{{ __('Users Management') }}</h4>
                </div>
    
                <div>
                    <a class="btn btn-sm btn-success"
                        href="{{ route('users.create') }}">
                        <i class="fa fa-plus"></i> {{ __('Add User') }}
                    </a>
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
            <th>{{ __('Email') }}</th>
            <th>{{ __('Roles') }}</th>
            <th width="280px">{{ __('Action') }}</th>
        </tr>

        @foreach ($data as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-sm btn-info"
                        href="{{ route('users.show',$user->id) }}">
                        <i class="fa fa-list"></i>
                    </a>

                    <a class="btn btn-sm btn-primary"
                        href="{{ route('users.edit',$user->id) }}">
                        <i class="fa fa-pen-to-square"></i>
                    </a>
                    
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                        style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $data->links('pagination::bootstrap-5') !!}
@endsection
