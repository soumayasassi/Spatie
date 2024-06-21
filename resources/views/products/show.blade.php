@extends('layouts.app')
@can('list products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $product->name }}</div>

                    <div class="card-body">
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>

                        <!-- You can add more details or actions here -->

                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endcan
