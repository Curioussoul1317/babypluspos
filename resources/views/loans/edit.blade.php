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
                EDIT Loan
                  </h2>
               </div>
               <div class="col-4">
                  <div class="btn-list btn-sm " style=" float: right;">
                     <a href="{{ route('loans.create') }}" class="btn btn-primary d-none d-sm-inline-block btn-sm " >
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 5l0 14"></path>
                           <path d="M5 12l14 0"></path>
                        </svg>   NEW LOAN
                      
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- /////////// BOTTOM  -->
         <div class="col-8"> 
             <div class="card">
    

                  <form action="{{ route('loans.update', $loan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Loan Amount</label>
                            <input type="number" step="0.01" name="amount" id="amount" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('amount', $loan->amount) }}" required>
                            @error('amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
 

                        <div class="mb-4">
                            <label for="loan_date" class="block text-gray-700 text-sm font-bold mb-2">Loan Date</label>
                            <input type="date" name="loan_date" id="loan_date" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('loan_date', $loan->loan_date->format('Y-m-d')) }}" required>
                            @error('loan_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="due_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                            <input type="date" name="due_date" id="due_date" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('due_date', $loan->due_date->format('Y-m-d')) }}" required>
                            @error('due_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="lender_name" class="block text-gray-700 text-sm font-bold mb-2">Lender Name</label>
                            <input type="text" name="lender_name" id="lender_name" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('lender_name', $loan->lender_name) }}" required>
                            @error('lender_name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="purpose" class="block text-gray-700 text-sm font-bold mb-2">Purpose</label>
                            <textarea name="purpose" id="purpose" rows="3" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>{{ old('purpose', $loan->purpose) }}</textarea>
                            @error('purpose')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Loan
                            </button>
                            <a href="{{ route('loans.show', $loan) }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Cancel
                            </a>
                        </div>
                    </form>
 

                  
                </div>
         </div>
      </div>
   </div>
</div>
 
 
 
    @endsection
 