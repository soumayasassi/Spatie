
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Roles') }}</div>

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

