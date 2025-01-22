@extends('layouts.app')
@section('content')
<div class="page-header d-print-none">
   <div class="container-xl">
      <div class="row justify-content-center">
         <!-- ///////// TOP -->
         <div class="col-8" style="margin-bottom: 25px;">
            <div class="row justify-content-between">
               <div class="col-4">
                  <h2 class="page-title">
                      Edit Brand: {{ $brand->name }}
                  </h2>
               </div>
               <div class="col-4">
                  <div class="btn-list btn-sm " style=" float: right;">
                      <a href="{{ route('brands.index') }}" class="btn btn-primary d-none d-sm-inline-block btn-sm"  >
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            Back To List
            </a> 
                  </div>
               </div>
            </div>
         </div>
         <!-- /////////// BOTTOM  -->
         <div class="col-8">
              <div class="card">
                <form action="{{ route('brands.update', $brand) }}" 
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
                            value="{{ old('name', $brand->name) }}" 
                            class="form-control"
                            required>
                    </div>
        

                    <div class="flex items-center justify-between">
                        <button type="submit" 
                                class="btn btn-primary">
                            Update Brand
                        </button>
                    </div>
                </form>
                
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
 