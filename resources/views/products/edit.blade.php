@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>
    

    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" placeholder="Product Name" class="form-control" value="{{ $product->title ?? old('product_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Product SKU</label>
                            <input type="text" placeholder="Product Name" class="form-control" value="{{ $product->sku ?? old('product_sku') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea id="" cols="30" rows="4" class="form-control">{{ $product->description ?? old('product_description') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                    </div>
                    <div class="card-body border">
                        <img src="" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Variants</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Option</label>
                                    <select class="form-control">
                                        {{-- @foreach ($variants as $variant)
                                        <option value="{{ $variant->id }}" {{ $vaiant->id == $product->variant_id ? 'selected':'' }}>
                                            {{ $variant->title ?? '' }}
                                        </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header text-uppercase">Preview</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Variant</td>
                                    <td>Price</td>
                                    <td>Stock</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->product_variant_prices as $product_variant_price)
                                    <tr>
                                        <td>{{ $product_variant_price->product_variant_one }}</td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $product_variant_price->price }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $product_variant_price->stock }}">
                                        </td>
                                    </tr>                                            
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-lg btn-primary">Save</button>
        <button type="button" class="btn btn-secondary btn-lg">Cancel</button>
    </section>
@endsection
