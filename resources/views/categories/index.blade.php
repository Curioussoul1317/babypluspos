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
                        Categories
                  </h2>
               </div>
               <div class="col-4">
                  <div class="btn-list btn-sm "  style=" float: right;">
                     <a href="#" class="btn btn-primary d-none d-sm-inline-block btn-sm" data-bs-toggle="modal"
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
         </div>
         <!-- /////////// BOTTOM  -->
         <div class="col-8">
               <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>No Items</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td class="text-secondary">
                                        {{ $category->products_count ?? 0 }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-blue btn-sm"
                                                href="{{ route('categories.edit', $category) }}">
                                                Edit
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        {{ $categories->links() }}
                    </div>
                </div>
         </div>
      </div>
   </div>
</div>
@endsection