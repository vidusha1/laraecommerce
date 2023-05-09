@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Products
                    <a href="{{ url('admin/products') }}" class="btn btn-sm btn-danger text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotags-tab" data-bs-toggle="tab"
                                data-bs-target="#seotags-tab-pane" type="button" role="tab"
                                aria-controls="seotags-tab-pane" aria-selected="false">
                                Seo Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="product-images-tab" data-bs-toggle="tab"
                                data-bs-target="#product-images-tab-pane" type="button" role="tab"
                                aria-controls="product-images-tab-pane" aria-selected="false">
                                Product Images
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane"
                                aria-selected="false">Product Color
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control form-control-sm">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input type="text" name="slug" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="">Brand</label>
                                <select name="brand" class="form-control form-control-sm">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Small Description (500 Words)</label>
                                <textarea type="text" name="small_description" class="form-control form-control-sm"
                                    rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control form-control-sm"
                                    rows="4"></textarea>
                            </div>
                        </div>
                        <div class=" tab-pane fade" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control form-control-sm"
                                    rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control form-control-sm"
                                    rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="mb-3 col-md-4">
                                <label for="">Original Price</label>
                                <input type="number" name="original_price" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Trending</label>
                                <input type="checkbox" name="trending">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">
                            </div>

                        </div>
                        <div class="tab-pane fade" id="product-images-tab-pane" role="tabpanel"
                            aria-labelledby="product-images-tab" tabindex="0">
                            <div class="mb-3 col-md-4">
                                <label for="">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label for="" class="p-2">Select Colors</label>
                                <hr>
                                <div class="row">
                                    @forelse ($colors as $colorItem)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Color: `<input type="checkbox" name="colors[{{ $colorItem->id }}]"
                                                value="{{ $colorItem->id }}" />
                                            {{ $colorItem->name }}
                                            <br>
                                            Quantity: <input type="number" name="colorquantity[{{ $colorItem->id }}]"
                                                style="width: 70px; border: 1px solid black">
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1>No Color Found</h1>
                                    </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection