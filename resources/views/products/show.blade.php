@extends('layouts.app')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>
</div>


<div class="card">

    <div class="card-body">
        <div class="table-response">
            <table class="table">
                    <tr>
                        <th>Title</th>
                        <td>{{ $product->title ?? '' }}</td>
                    </tr>

                    <tr>
                        <th>Sku</th>
                        <td>{{ $product->sku ?? '' }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description ?? '' }}</td>
                    </tr>

                    <tr>
                        <th>Created at</th>
                        <td>{{ $product->created_ago ?? '' }}</td>
                    </tr>
            </table>
        </div>

    </div>

</div>

@endsection