@extends('layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
</div>


<section>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_title" placeholder="Product Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Product SKU</label>
                        <input type="text" name="product_sku" placeholder="Product Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="product_description" id="" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                </div>
                <div class="card-body border">
                    <input type="file" name="product_image" id="">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Variants</h6>
                </div>
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Option</label>
                                <br>
                                <select class="form-control" name="product_variant"
                                    onchange="loadProductVariants(this.value)">
                                    <option value="">Choose</option>
                                    @foreach ($variants as $item)
                                    <option>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="float-right text-primary" style="cursor: pointer;">Remove</label>
                                <br>
                                <select name="" id="" class="multiple-select col-md-8" multiple="multiple">
                                    @foreach ($product_variants as $product_variant)
                                    <option value="{{ $product_variant->id }}">
                                        {{ $product_variant->variant ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> --}}

                    <table class="col-md-12" id="productVariantPriceTable">
                        <thead>
                            <tr>
                                <td>
                                    <label for="">Option</label>
                                </td>
    
                                <td>
                                    <label class="float-right text-primary" style="cursor: pointer;"
                                        id="removeProductVariantPrice">Remove</label>
                                </td>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-3">
                                    <select class="form-control col-md-12" name="product_variant"
                                        onchange="loadProductVariants(this.value)">
                                        <option value="">Choose</option>
                                        @foreach ($variants as $item)
                                        <option>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="col-md-9">
                                    <select name="" id="selectProductVariantPrice" class="select_product_variant_price col-md-12 select" multiple data-mdb-filter="true">
                                        @foreach ($product_variants as $product_variant)
                                        <option value="{{ $product_variant->id }}">
                                            {{ $product_variant->variant ?? '' }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                        </tbody>
                        
                    </table>




                </div>
                <div class="card-footer">
                    <button class="btn btn-primary add_another_row" id="addAnotherRow">Add another option</button>
                </div>

                <div class="card-header text-uppercase">Preview</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="">
                            <thead>
                                <tr>
                                    <td>Variant</td>
                                    <td>Price</td>
                                    <td>Stock</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="myTable">
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
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

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        // $('.multiple-select').select2();
    });
</script>
@endpush
