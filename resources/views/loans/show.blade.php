@extends('layouts.app')

@section('content') 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Loan Details</h2>
                        <div class="flex items-center">
                        
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Loan Information</h3>
                            <dl class="grid grid-cols-1 gap-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Amount</dt>
                                    <dd class="mt-1 text-sm text-gray-900">${{ number_format($loan->amount, 2) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Remaining Amount</dt>
                                    <dd class="mt-1 text-sm text-gray-900">${{ number_format($loan->remaining_amount, 2) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Interest Rate</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $loan->interest_rate }}%</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                                    <dd class="mt-1 text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $loan->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                               ($loan->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                               ($loan->status === 'paid' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800')) }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Dates and Details</h3>
                            <dl class="grid grid-cols-1 gap-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Loan Date</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $loan->loan_date->format('F j, Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Due Date</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $loan->due_date->format('F j, Y') }}
                                        @if($loan->is_overdue)
                                            <span class="text-red-600 ml-2">(Overdue)</span>
                                        @endif
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Lender</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $loan->lender_name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Purpose</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $loan->purpose }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    @if($loan->status === 'approved' && $loan->remaining_amount > 0)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">Make a Payment</h3>
                            <form action="{{ route('loan-payments.store') }}" method="POST" class="max-w-md">
                                @csrf
                                <input type="hidden" name="loan_id" value="{{ $loan->id }}">
                                
                                <div class="mb-4">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Payment Amount</label>
                                    <input type="number" step="0.01" name="amount" id="amount" 
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           max="{{ $loan->remaining_amount }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="payment_date" class="block text-sm font-medium text-gray-700">Payment Date</label>
                                    <input type="date" name="payment_date" id="payment_date" 
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           value="{{ date('Y-m-d') }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                                    <select name="payment_method" id="payment_method" 
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank_transfer">Bank Transfer</option>
                                        <option value="check">Check</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="reference_number" class="block text-sm font-medium text-gray-700">Reference Number (Optional)</label>
                                    <input type="text" name="reference_number" id="reference_number" 
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>

                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Submit Payment
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Payment History</h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reference</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($loan->payments as $payment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $payment->payment_date->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">${{ number_format($payment->amount, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ ucfirst($payment->payment_method) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $payment->reference_number ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No payments recorded yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('loans.index') }}" class="text-indigo-600 hover:text-indigo-900">← Back to Loans</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


@endsection