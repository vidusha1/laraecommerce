@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h6 class="alert alert-danger mb-2">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Products
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
                <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control form-control-sm">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ?
                                        'selected' : '' }} >
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="">Brand</label>
                                <select name="brand" class="form-control form-control-sm">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->name == $product->brand ? 'selectd' : ''
                                        }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Small Description (500 Words)</label>
                                <textarea type="text" name="small_description" class="form-control form-control-sm"
                                    rows="4">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control form-control-sm"
                                    rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class=" tab-pane fade" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control form-control-sm"
                                    rows="4">{{ $product->meta_keyword }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control form-control-sm"
                                    rows="4">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="mb-3 col-md-4">
                                <label for="">Original Price</label>
                                <input type="number" name="original_price" value="{{ $product->original_price }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Selling Price</label>
                                <input type="number" name="selling_price" value="{{ $product->selling_price }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" value="{{ $product->quantity }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Trending</label>
                                <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked' : '' }}>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : '' }}>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="product-images-tab-pane" role="tabpanel"
                            aria-labelledby="product-images-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control form-control-sm">
                            </div>
                            <div class="m-3">
                                {{-- <img src="{{ asset('uploads/product/'. '/' . $product->image) }}" width="60px"
                                    height="60px" alt=""> --}}
                                @if ($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $image)
                                    <div class="col-md-2">
                                        <img src="{{asset($image->image)}}"
                                            style="height:80px; border:1px solid #897a97a8" alt="img" class="me-3 p-2">
                                        <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                            class="d-block">Remove</a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5>No Image Added</h5>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-primary float-end">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection