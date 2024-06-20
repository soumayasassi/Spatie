@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                     @can('list products')
                         You can LIST Products.
                      @endcan
                     @can('create products')
                         You can CREATE Products.
                         @endcan
                   @can('only super-admins can see this section')
                         Congratulations, you are a super-admin!
                       @endcan
            </div>
        </div>
    </div>
</div>
@endsection
