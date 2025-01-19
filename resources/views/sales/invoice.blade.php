 @extends('layouts.app')

 @section('content')

 <div class="page-header d-print-none">
     <div class="container-xl">
         <div class="row g-2 align-items-center">
             <div class="col">
                 <!-- Page pre-title -->
                 <h2 class="page-title">
                     Invoice
                 </h2>
             </div>
             <!-- Page title actions -->
             <div class="col-auto ms-auto d-print-none">
                 <div class="btn-list">
                     <button onclick="window.print()" class="btn btn-primary d-none d-sm-inline-block">
                         Print Invoice
                     </button>
                     <a href="{{ route('sales.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                         Back to Sales
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

                     <div class="container mx-auto px-4 py-6 max-w-4xl">
                         <div class="bg-white shadow-lg p-8" id="printable-area">


                             <div class="row justify-content-between">
                                 <div class="col-4">
                                     <h1 class="text-3xl font-bold">INVOICE</h1>
                                     <p>#{{ $sale->invoice_number }}</p>
                                     <p>Date: {{ $sale->created_at->format('M d, Y') }}</p>
                                 </div>
                                 <div class="col-4">
                                     <h2 class="text-xl font-bold">BABY PLUS</h2>
                                     <p>123 Business Street</p>
                                     <p>City, State ZIP</p>
                                     <p>Phone: 9969217</p>
                                 </div>
                                 <div class="col-12">
                                     <h3 class="font-bold text-gray-700 mb-2">Bill To:</h3>
                                     @if($sale->customer)
                                     <p>{{ $sale->customer->first_name }} {{ $sale->customer->last_name }}</p>
                                     @if($sale->customer->email)
                                     <p>{{ $sale->customer->email }}</p>
                                     @endif
                                     @if($sale->customer->phone)
                                     <p>{{ $sale->customer->phone }}</p>
                                     @endif
                                     @if($sale->customer->address)
                                     <p>{{ $sale->customer->address }}</p>
                                     @endif
                                     @else
                                     <p>Walk-in Customer</p>
                                     @endif
                                 </div>
                                 <div class="col-12">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <th>Item</th>
                                                 <th>Quantity</th>
                                                 <th>Unit Price</th>
                                                 <th style="text-align: right;">Total</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach($sale->items as $item)
                                             <tr>
                                                 <td>
                                                     {{ $item->inventory->name }}
                                                 </td>
                                                 <td>{{ $item->quantity }}</td>
                                                 <td>
                                                     Mrf {{ number_format($item->unit_price, 2) }}</td>
                                                 <td style="text-align: right;">
                                                     Mrf {{ number_format($item->subtotal, 2) }}</td>
                                             </tr>
                                             @endforeach
                                             <tr>
                                                 <td colspan="3"> </td>
                                                 <td style="text-align: right;">

                                                     <span>Subtotal: Mrf
                                                         {{ number_format($sale->subtotal, 2) }}</span><br>
                                                     <span>Tax :Mrf
                                                         {{ number_format($sale->tax, 2) }}</span><br>
                                                     @if($sale->discount > 0)
                                                     <span>Discount: - Mrf
                                                         {{ number_format($sale->discount, 2) }}</span><br>
                                                     @endif
                                                     <span>Total : Mrf
                                                         {{ number_format($sale->total, 2) }}</span><br>

                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                                 <div class="col-12">
                                     <div class="mb-2">
                                         <p class="font-medium">Payment Method: {{ ucfirst($sale->payment_method) }}</p>
                                         <p class="font-medium">Payment Status: {{ ucfirst($sale->payment_status) }}</p>
                                         <p style="text-align: center;">Thank you for your business!</p>
                                     </div>
                                 </div>
                             </div>
                         </div>


                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>



 @endsection













 <style>
@media print {
    body * {
        visibility: hidden;
    }

    #printable-area,
    #printable-area * {
        visibility: visible;
    }

    #printable-area {
        position: absolute;
        left: 0;
        top: 0;
    }

    .print\:hidden {
        display: none;
    }
}
 </style>