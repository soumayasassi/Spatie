@extends('layouts.app')

@can('list roles')
    @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-md-8">
                <div class="pull-left">
                    <h2>Roles</h2>
                </div>
                <div class="pull-right">
                        @can('create roles')
                            <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @can('list roles')
                            @if ($roles->isEmpty())
                                <p>{{ __('No roles found.') }}</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Role') }}</th>
                                        <th>{{ __('Permissions') }}</th>
                                        <th> Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->permissions as $permission)
                                                    <span class="badge bg-primary">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                                    @can('create roles ')
                                                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')

                                                    @can('delete roles')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @else
                            <p>{{ __('You do not have permission to view roles.') }}</p>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endcan
