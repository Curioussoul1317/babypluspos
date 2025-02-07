@extends('layouts.app')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Edit
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('inventory.show', $inventory) }}"
                        class="btn btn-primary d-none d-sm-inline-block">
                        Back to Details
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('inventory.update', $inventory) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Barcode</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="barcode" id="barcode"
                                                    value="{{ old('barcode', $inventory->barcode) }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label class="form-label">Item code</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="item_code" id="item_code"
                                                    value="{{ old('item_code', $inventory->item_code) }}"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"> Name</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name', $inventory->name) }}" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Brand</label>
                                            <div class="input-group input-group-flat">
                                                <select name="brand_id" id="brand_id" class="form-select">
                                                    <option value="">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ old('brand_id', $inventory->brand_id) == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    
                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <div class="input-group input-group-flat">
                                                <select name="category_id" id="category_id" class="form-select">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $inventory->category_id) == $category->id ? 'selected' : '' }}>
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
                                                    <option value=" {{ $inventory->gender }}"> {{ $inventory->gender }}
                                                    </option>
                                                    <option value="Boys">Boys</option>
                                                    <option value="Girls">Girls</option>
                                                    <option value="Uni">Uni</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> Age</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="age" id="age"
                                                    value="{{ old('age', $inventory->age) }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> colour</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="colour" id="colour"
                                                    value="{{ old('colour', $inventory->colour) }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> Volume</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="volume" id="volume"
                                                    value="{{ old('volume', $inventory->volume) }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> unit_cost</label>
                                            <div class="input-group input-group-flat">
                                                <input type="number" name="unit_cost" id="unit_cost"
                                                    value="{{ old('unit_cost', $inventory->unit_cost) }}" step="0.01"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> Unit Price</label>
                                            <div class="input-group input-group-flat">
                                                <input ype="number" name="unit_price" id="unit_price"
                                                    value="{{ old('unit_price', $inventory->unit_price) }}" step="0.01"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> Stock Quantity</label>
                                            <div class="input-group input-group-flat">
                                                <input type="number" name="stock_quantity" id="stock_quantity"
                                                    value="{{ old('stock_quantity', $inventory->stock_quantity) }}"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="col-lg-1">
                                        <div class="mb-3">
                                            <label class="form-label"> Discount Percentage</label>
                                            <div class="input-group input-group-flat">
                                                <input type="number" name="discount_percentage" id="discount_percentage"
                                                    value="{{ old('discount_percentage', $inventory->discount_percentage) }}"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="4">{{ old('description', $inventory->description) }}</textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Current Images</label>
                                    <div class="row row-deck row-cards">
                                        @foreach($inventory->images as $image)
                                        <div class="col-sm-6 col-lg-2">
                                            <div class="card card-sm">
                                                <a href="#" class="d-block"><img
                                                        src="{{ asset('storage/' . $image->image_path) }}"
                                                        alt="Product image" class="card-img-top"></a>
                                                <div class="card-body">
                                                    <div class="ms-auto">
                                                        <button type="button"
                                                            onclick="setPrimaryImage({{ $image->id }})"
                                                            class="btn btn-blue  px-2 py-1 rounded text-sm">
                                                            {{ $image->is_primary ? 'Primary' : 'Set Primary' }}
                                                        </button>
                                                        <button type="button" onclick="deleteImage({{ $image->id }})"
                                                            class="btn btn-red  px-2 py-1 rounded text-sm">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Update Item
                        </button>

                    </div>
                    </form>


                </div>

                <div class="card-footer d-flex align-items-center">

                </div>
            </div>
        </div>
    </div>
</div>
</div>

























































<script>
function setPrimaryImage(imageId) {
    // Show confirmation
    if (!confirm('Set this as the primary image?')) {
        return;
    }

    // Get CSRF token
    const token = document.querySelector('meta[name="csrf-token"]').content;

    console.log('Setting primary image:', imageId); // Debug log

    fetch(`/inventory/images/${imageId}/primary`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(async response => {
            console.log('Response status:', response.status); // Debug log
            const text = await response.text();
            console.log('Raw response:', text); // Debug log

            try {
                const data = JSON.parse(text);
                return data;
            } catch (error) {
                console.error('JSON parse error:', error);
                console.log('Non-JSON response:', text);
                throw new Error('Invalid JSON response');
            }
        })
        .then(data => {
            console.log('Processed data:', data); // Debug log
            if (data.success) {
                window.location.reload();
            } else {
                alert(data.message || 'Error updating primary image');
            }
        })
        .catch(error => {
            console.error('Error details:', error);
            alert('Error updating primary image. Please try again.');
        });
}

function deleteImage(imageId) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch(`/inventory/images/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
</script>
@endsection