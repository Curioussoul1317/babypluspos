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
                 PAY LOAN
                  </h2>
               </div>
               <div class="col-4">
                  <div class="btn-list btn-sm " style=" float: right;">
                     <a href="{{ route('loans.index') }}" class="btn btn-primary d-none d-sm-inline-block btn-sm " >
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 5l0 14"></path>
                           <path d="M5 12l14 0"></path>
                        </svg>   P LOAN
                      
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- /////////// BOTTOM  -->
         <div class="col-8">
 <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">Loan Amount</p>
                                <p class="font-semibold">${{ number_format($loan->amount, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Remaining Amount</p>
                                <p class="font-semibold">${{ number_format($loan->remaining_amount, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('loan-payments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="loan_id" value="{{ $loan->id }}">

                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Payment Amount</label>
                            <input type="number" step="0.01" name="amount" id="amount" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   max="{{ $loan->remaining_amount }}"
                                   value="{{ old('amount') }}" required>
                            @error('amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="payment_date" class="block text-gray-700 text-sm font-bold mb-2">Payment Date</label>
                            <input type="date" name="payment_date" id="payment_date" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('payment_date', date('Y-m-d')) }}" required>
                            @error('payment_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="payment_method" class="block text-gray-700 text-sm font-bold mb-2">Payment Method</label>
                            <select name="payment_method" id="payment_method" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Select Payment Method</option>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                <option value="check" {{ old('payment_method') == 'check' ? 'selected' : '' }}>Check</option>
                            </select>
                            @error('payment_method')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="reference_number" class="block text-gray-700 text-sm font-bold mb-2">Reference Number (Optional)</label>
                            <input type="text" name="reference_number" id="reference_number" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('reference_number') }}">
                            @error('reference_number')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Submit Payment
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
 