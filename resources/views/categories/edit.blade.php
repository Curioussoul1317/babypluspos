
@extends('layouts.app')

@section('content')



<div class="page-header d-print-none">
    <div class="container-xl">
            <div class="row g-2 align-items-center">
        <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
            Cateogory
        </div>
        <h2 class="page-title">
           Edit Category: {{ $categories->name }}
        </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">                  
            <a href="{{ route('categories.index') }}" class="btn btn-primary d-none d-sm-inline-block"  >
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            Back To List
            </a>
            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            </a>
        </div>
        </div>
    </div>
    </div>
</div>



<div class="page-body">
    <div class="container-xl">
    <!-- CONTENTS -->
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('categories.update', $categories) }}" 
                    method="POST" 
                    enctype="multipart/form-data" 
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label"for="name">
                            Name
                        </label>
                        <input type="text" 
                            name="name" 
                            id="name" 
                              value="{{ old('name', $categories->name) }}" 
                            class="form-control"
                            required>
                    </div>
        

                    <div class="flex items-center justify-between">
                        <button type="submit" 
                                class="btn btn-primary">
                            Update Cateogory
                        </button>
                    </div>
                </form>
                
            </div>
        </div>    
    </div>
    </div>
</div>

 
 
@endsection
 
 