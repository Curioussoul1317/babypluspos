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
                  LOANS
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
                   
               <div class="mb-4">
                        <select id="statusFilter" class="rounded border-gray-300" onchange="window.location.href=this.value">
                            <option value="{{ route('loans.index') }}">All Status</option>
                            @foreach(['pending', 'approved', 'rejected', 'paid'] as $status)
                                <option value="{{ route('loans.status', $status) }}" 
                                    {{ request()->segment(3) == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>


    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Remaining</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($loans as $loan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan->loan_date->format('M d, Y') }}</td>
                                    <td class="px-6 py-4">${{ number_format($loan->amount, 2) }}</td>
                                    <td class="px-6 py-4">${{ number_format($loan->remaining_amount, 2) }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $loan->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                               ($loan->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                               ($loan->status === 'paid' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800')) }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loan->due_date->format('M d, Y') }}
                                        @if($loan->is_overdue)
                                            <span class="text-red-600 text-sm">(Overdue)</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('loans.show', $loan) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a> 
                                        @if($loan->status === 'pending')
                                            <a href="{{ route('loans.edit', $loan) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        @endif
                                        <a href="{{ route('loans.payments', $loan) }}" class="text-green-600 hover:text-green-900">Payments</a>
                                        <a href="{{ route('loan-payments.create', $loan) }}" class="text-green-600 hover:text-green-900">  Make Payment
</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center">No loans found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $loans->links() }}
                    </div>

                  
                </div>
         </div>
      </div>
   </div>
</div>
 
 
 
    @endsection
 