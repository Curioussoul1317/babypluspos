@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Add New Inventory Item</h1>
            <a href="{{ route('inventory.index') }}" 
               class=" ">
                Back to List
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inventory.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf


 
             <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="item_code">
                    Item code
                </label>
                <input type="text" 
                       name="item_code" 
                       id="item_code" 
                       value="{{ old('item_code') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

             <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="barcode">
                    barcode
                </label>
                <input type="text" 
                       name="barcode" 
                       id="barcode" 
                       value="{{ old('barcode') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="brand_id">
                    Brand
                </label>
                <select name="brand_id" 
                        id="brand_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

               <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                    Category
                </label>
                <select name="category_id" 
                        id="category_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea name="description" 
                          id="description" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                    gender
                </label>
                <input type="text" 
                       name="gender" 
                       id="gender" 
                       value="{{ old('gender') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
                    age
                </label>
                <input type="text" 
                       name="age" 
                       id="age" 
                       value="{{ old('age') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="colour">
                    colour
                </label>
                <input type="text" 
                       name="colour" 
                       id="colour" 
                       value="{{ old('colour') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="volume">
                    volume
                </label>
                <input type="text" 
                       name="volume" 
                       id="volume" 
                       value="{{ old('volume') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
        
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="unit_cost">
                    unit_cost
                </label>
                <input type="number" 
                       name="unit_cost" 
                       id="unit_cost" 
                       value="{{ old('unit_cost') }}" 
                       step="0.01" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>



            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="unit_price">
                    Unit Price
                </label>
                <input type="number" 
                       name="unit_price" 
                       id="unit_price" 
                       value="{{ old('unit_price') }}" 
                       step="0.01" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock_quantity">
                    Stock Quantity
                </label>
                <input type="number" 
                       name="stock_quantity" 
                       id="stock_quantity" 
                       value="{{ old('stock_quantity') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>

            

            

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Images
                </label>
                <input type="file" 
                       name="images[]" 
                       multiple 
                       accept="image/*" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-sm text-gray-500 mt-1">You can select multiple images. The first image will be set as primary.</p>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" 
                        class=" ">
                    Create Item
                </button>
            </div>
        </form>
    </div>
</div>
@endsection