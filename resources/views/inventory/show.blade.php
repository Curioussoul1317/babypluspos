@extends('layouts.app')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Brands
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('inventory.edit', $inventory) }}"
                        class="btn btn-primary d-none d-sm-inline-block">
                        Edit Item
                    </a>
                    <a href="{{ route('inventory.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="page-body">
    <div class="container-xl">
        <!-- CONTENTS -->
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="badges-list">
                            <span class="badge bg-blue text-blue-fg">Item Code
                                :{{ $inventory->item_code ?? 'N/A' }}</span>
                            <span class="badge bg-azure text-azure-fg"> Name: {{ $inventory->name }}</span>
                            <span class="badge bg-indigo text-indigo-fg">Brand:
                                {{ $inventory->brand->name ?? 'N/A' }}</span>
                            <span class="badge bg-purple text-purple-fg"> Category:
                                {{ $inventory->category->name ?? 'N/A' }}</span>
                            <span class="badge bg-pink text-pink-fg">Gender: {{ $inventory->gender ?? 'N/A' }}</span>
                            <span class="badge bg-red text-red-fg">Age: {{ $inventory->age ?? 'N/A' }}</span>
                            <span class="badge bg-orange text-orange-fg">colour:
                                {{ $inventory->colour ?? 'N/A' }}</span>
                            <span class="badge bg-yellow text-yellow-fg">volume:
                                {{ $inventory->volume ?? 'N/A' }}</span>
                            <span class="badge bg-lime text-lime-fg">unit_cost:
                                {{ $inventory->unit_cost ?? 'N/A' }}</span>
                            <span class="badge bg-green text-green-fg"> unit_price:
                                {{ $inventory->unit_price ?? 'N/A' }}</span>
                            <span class="badge bg-teal text-teal-fg"> stock_quantity:
                                {{ $inventory->stock_quantity ?? 'N/A' }}</span>
                            <span class="badge bg-cyan text-cyan-fg">barcode:
                                {{ $inventory->barcode ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-status-top bg-danger"></div>
                    <div class="card-body">
                        <h3 class="card-title">Description</h3>
                        <p class="text-secondary">{{ $inventory->description ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Images</h3>



                        <div class="row row-cards">

                            @forelse($inventory->images as $image)
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $inventory->name }}"
                                        class="card-img-top">
                                </div>
                                @if($image->is_primary)
                                <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded">
                                    Primary
                                </span>
                                @endif
                            </div>
                            @empty
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    No images available
                                </div>
                            </div>
                            @endforelse

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Stock Management</h3>


                        <form action="{{ route('inventory.stock.adjust', $inventory) }}" method="POST">
                            @csrf



                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Operation</div>
                                <select class="form-select" name="operation" id="operation">
                                    <<option value="add">Add Stock</option>
                                        <option value="subtract">Remove Stock</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Update Stock
                            </button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection