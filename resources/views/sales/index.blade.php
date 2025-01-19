@extends('layouts.app')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Sales History
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('sales.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        New Sale
                    </a>
                </div>
            </div>
        </div>
        <!-- ////////////////// -->

        <div class="card card-active">
            <div class="card-body">
                <form action="{{ route('sales.index') }}" method="GET">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">By Day</label>
                            <select name="quick_date" id="quick_date" class="form-select"
                                onchange="handleQuickDateChange(this.value)">
                                <option value="">Select Filter</option>
                                <option value="today" {{ request('quick_date') == 'today' ? 'selected' : '' }}>Today
                                </option>
                                <option value="yesterday" {{ request('quick_date') == 'yesterday' ? 'selected' : '' }}>
                                    Yesterday</option>
                                <option value="this_week" {{ request('quick_date') == 'this_week' ? 'selected' : '' }}>
                                    This
                                    Week</option>
                                <option value="this_month"
                                    {{ request('quick_date') == 'this_month' ? 'selected' : '' }}>
                                    This Month</option>
                                <option value="last_month"
                                    {{ request('quick_date') == 'last_month' ? 'selected' : '' }}>
                                    Last Month</option>
                                <option value="custom" {{ request('quick_date') == 'custom' ? 'selected' : '' }}>Custom
                                    Range</option>
                            </select>
                        </div>
                        <div class="col">
                            <div id="custom_dates"
                                class="grid grid-cols-2 gap-2 {{ request('quick_date') == 'custom' ? '' : 'hidden' }}">
                                <div>
                                    <label class="form-label">Start Date</label>
                                    <input type="date" name="start_date" value="{{ request('start_date') }}"
                                        class="form-control">
                                </div>
                                <div>
                                    <label class="form-label">End Date</label>
                                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <label class="form-label">Payment Status</label>
                                <select name="payment_status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>
                                        Paid
                                    </option>
                                    <option value="pending"
                                        {{ request('payment_status') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="voided"
                                        {{ request('payment_status') == 'voided' ? 'selected' : '' }}>Voided
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select">
                                <option value="">All Methods</option>
                                <option value="cash" {{ request('payment_method') == 'cash' ? 'selected' : '' }}>Cash
                                </option>
                                <option value="card" {{ request('payment_method') == 'card' ? 'selected' : '' }}>Card
                                </option>
                                <option value="bank_transfer"
                                    {{ request('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer
                                </option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Filters</label>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-danger"> Apply Filters</button>
                                <a href="{{ route('sales.index') }}" class="btn btn-success">
                                    Clear Filters
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /////////////// -->
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- CONTENTS -->
        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Sales Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                <tr>
                                    <td>
                                        {{ $sale->invoice_number }}
                                    </td>
                                    <td>
                                        @if(isset($sale->customer_id))
                                        {{ $sale->customer->first_name . ' ' . $sale->customer->last_name  }}
                                        @else
                                        Walk-in Customer
                                        @endif
                                    </td>
                                    <td>
                                        {{ $sale->items->count() }}
                                    </td>
                                    <td>
                                        Mrf {{ number_format($sale->total, 2) }}
                                    </td>
                                    <td>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                       {{ $sale->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                                          ($sale->payment_status === 'voided' ? 'bg-red-100 text-red-800' : 
                                           'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($sale->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $sale->created_at->format('M d, Y H:i') }}
                                    </td>
                                    <td>
                                        {{ $sale->sales_type }}
                                        @if($sale->sales_type=="online")
                                        No: {{$sale->cart_number  }}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example"
                                            style="float: right;">
                                            <a href=" {{ route('sales.show', $sale) }}" class="btn btn-primary btn-sm">
                                                View
                                            </a>
                                            <a href="{{ route('sales.invoice', $sale) }}"
                                                class="btn btn-success btn-sm">
                                                Invoice
                                            </a>
                                            @if($sale->payment_status !== 'voided')
                                            <form action="{{ route('sales.void', $sale) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to void this sale?')">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Void
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        {{ $sales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection