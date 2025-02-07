@extends('layouts.app')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center" style="margin-bottom: 10px;">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Inventory
                </div>
                <h2 class="page-title">
                    Baby Plus Inventory
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    
                     <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-brand">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Create new Brand
                    </a>
                     <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-category">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Create new Category
                    </a>
                </div>
            </div>
        </div>
        <!-- ////////////////// -->

        <div class="card card-active">
            <div class="card-body"> 
                <form action="{{ route('inventory.index') }}" method="GET">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3">
                            <div class="input-icon">
                                <input type="text" name="search" id="search" value="{{ request('search') }}"
                                    placeholder="Search by name, or barcode" class="form-control">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M21 21l-6 -6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2">
                            <select name="brand" id="brand" class="form-select">
                                <option value="">All Brands</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-2"> <select name="category" id="category" class="form-select">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select></div>
                        <div class="col-sm-12 col-lg-2"><select name="stock_status" id="stock_status" class="form-select">
                                <option value="">All Stock Status</option>
                                <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>
                                    In Stock
                                </option>
                                <option value="low_stock"
                                    {{ request('stock_status') == 'low_stock' ? 'selected' : '' }}>Low
                                    Stock
                                </option>
                                <option value="out_of_stock"
                                    {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>
                                    Out
                                    of Stock</option>
                            </select></div>
                        <div class="col-sm-12 col-lg-2">
                            <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-danger "> Apply Filters</button>
                                <a href="{{ route('inventory.index') }}" class="btn btn-success">
                                    Clear Filters
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /////////////// --> 
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- CONTENTS -->

   <button class="btn btn-primary col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
 ADD NEW ITEM
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body card-active">
        <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Barcode</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="barcode" id="barcode" value="{{ old('barcode') }}"
                                        class="form-control"  autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Item code</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="item_code" id="item_code" value="{{ old('item_code') }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label"> Name</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <div class="input-group input-group-flat">
                                    <select name="brand_id" id="brand_id" class="form-select">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <div class="input-group input-group-flat">
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> Gender</label>
                                <div class="input-group input-group-flat">
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="">Select Gender</option>
                                        <option value="">Boys</option>
                                        <option value="">Girls</option>
                                        <option value="">Uni</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> Age</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="age" id="age" value="{{ old('age') }}" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> colour</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="colour" id="colour" value="{{ old('colour') }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> Volume</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="volume" id="volume" value="{{ old('volume') }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> unit_cost</label>
                                <div class="input-group input-group-flat">
                                    <input type="number" name="unit_cost" id="unit_cost" value="{{ old('unit_cost') }}"
                                        step="0.01" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> Unit Price</label>
                                <div class="input-group input-group-flat">
                                    <input type="number" name="unit_price" id="unit_price"
                                        value="{{ old('unit_price') }}" step="0.01" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label"> Stock Quantity</label>
                                <div class="input-group input-group-flat">
                                    <input type="number" name="stock_quantity" id="stock_quantity"
                                        value="{{ old('stock_quantity') }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="description"
                                id="description">{{ old('description') }}</textarea>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <label class="form-label">
                            Images
                        </label>
                        <input type="file" name="images[]" multiple accept="image/*" class="form-control">
                        <p class="text-sm text-gray-500 mt-1">You can select multiple images. The first image will be
                            set as primary.</p>
                    </div>


                </div>

                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Add Item
                    </button>

                </div>
            </form>

  </div>
</div>





        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name and Item Code</th>
                                    <th>Barcode</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>QTY</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Colour</th>
                                    <th>Volume</th>
                                    <th>Cost</th>
                                    <th>Price</th>
                                    <th>Discounted</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex py-1 align-items-center">
                                            @if($item->getPrimaryImage())
                                            <span class="avatar me-2"
                                                style="background-image: url({{ asset('storage/' . $item->getPrimaryImage()->image_path) }})"></span>
                                            @else
                                            @endif
                                            <div class="flex-fill">
                                                <div class="font-weight-medium"> {{ $item->name}}</div>
                                                <div class="text-secondary"><a href="#"
                                                        class="text-reset">{{ $item->item_code}}</a></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $item->barcode}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->brand->name}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->category->name}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->stock_quantity}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->gender}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->age}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->colour}}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->volume}}</div>
                                    </td>
                                    <td>
                                        <div>{{ number_format($item->unit_cost, 2) }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->unit_price}}</div>
                                    </td>
                                     <td>
                                        <div>{{ $item->discount_percentage}}</div>
                                    </td> 
                                    <td>
                                        <div class="flex space-x-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('inventory.show', $item) }}"
                                                    class="btn btn-secondary">View</a>
                                                <a href="{{ route('inventory.edit', $item) }}"
                                                    class="btn btn-primary">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal modal-blur fade" id="modal-full-width" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        
        </div>
    </div>
</div>

<script>
    document.getElementById('barcode-input').addEventListener('keypress', function(event) {
    // Prevent form submission on Enter key
    if (event.key === 'Enter') {
        event.preventDefault(); 
        let barcodeValue = this.value; 
    }
});
    </script>

@endsection