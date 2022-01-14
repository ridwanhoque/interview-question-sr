@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>
</div>


<div class="card">
    <form action="" method="get" class="card-header">
        <div class="form-row justify-content-between">
            <div class="col-md-2">
                <input type="text" name="title" placeholder="Product Title" class="form-control"
                    value="{{ request()->get('title') }}">
            </div>
            <div class="col-md-2">
                <select name="variant" id="" class="form-control">
                    <option value="">All</option>
                    @foreach ($variants as $variant)
                    <optgroup label="{{ $variant->title }}">
                        @foreach ($variant->product_variants as $product_variant)
                            <option value="{{ $product_variant->id }}" {{ request()->get('variant') == $product_variant->id ? 'selected' : ''}}>
                                {{ $product_variant->variant ?? '' }}
                            </option>
                        @endforeach 
                    </optgroup>                        
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Price Range</span>
                    </div>
                    <input type="text" name="price_from" aria-label="Price From" placeholder="From"
                        class="form-control" value="{{ request()->get('price_from') }}">
                    <input type="text" name="price_to" aria-label="Price To" placeholder="To" class="form-control"
                        value="{{ request()->get('price_to') }}">
                </div>
            </div>
            <div class="col-md-2">
                <input type="date" name="date" placeholder="Date" class="form-control" value="{{ request()->get('date') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

    <div class="card-body">
        <div class="table-response">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th style="width: 180px;">Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($products as $key => $item)
                    <tr>
                        <td>{{ $key+$products->firstItem() }}</td>
                        <td>{{ $item->title ?? '' }} <br> {{ "Create at: ".$item->created_ago }}</td>
                        <td>{{ $item->description ?? '' }}</td>
                        <td>
                            <dl class="row mb-0" style="height: 80px; overflow: hidden" id="variant">

                                <dt class="col-sm-3 pb-0">
                                    @foreach ($item->product_variant_prices as $variant)
                                    {{ $variant->product_variant_first->variant.'/'
                                    .$variant->product_variant_second->variant.'/'
                                    .$variant->product_variant_third->variant }}
                                    @endforeach
                                </dt>
                                <dd class="col-sm-9">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 pb-0">
                                            @foreach ($item->product_variant_prices as $item_price)
                                            {!! "Price :".$item_price->price."<br>" !!}
                                            @endforeach
                                        </dt>
                                        <dd class="col-sm-8 pb-0">
                                            @foreach ($item->product_variant_prices as $item_stock)
                                            {!! "InStock :".$item_stock->stock."<br>" !!}
                                            @endforeach
                                        </dd>
                                    </dl>
                                </dd>
                            </dl>
                            <button onclick="$('#variant').toggleClass('h-auto')" class="btn btn-sm btn-link">Show
                                more</button>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>

    </div>

    <div class="card-footer">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <p>
                    {{ $products->appends($_GET)->links() }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection