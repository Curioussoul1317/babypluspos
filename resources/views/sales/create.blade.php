@extends('layouts.app')

@section('content')

<div class="page-body">
    <div class="container-xl" style=" height: 100vh;
    overflow: hidden;
    position: fixed;">
        <div class="col-12">
            <div class="card card-active">
                <div class="card-body">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                New Sale
                            </h2>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list" style="float: right;">
                                <a href="{{ route('sales.index') }}" class="btn btn-primary d-none d-sm-inline-block"
                                    style="float: right;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    History
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <form id="checkout-form">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-1 col-sm-8 col-md-4">
                                <input type="text" id="product-search" placeholder="Search " class="form-control">

                            </div>
                            <div class="mb-1 col-sm-4 col-md-4">
                                <select name="customer_id" id="customer_id" class="form-select">
                                    <option value="">Walk-in Customer</option>
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{ $customer->first_name }} {{ $customer->last_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1 col-sm-4 col-md-4">
                                <input type="number" id="discount_amount" step="0.01" min="0" placeholder="Discount "
                                    class="form-control" onchange="updateTotals()">
                            </div>
                            <div class="row justify-content-md-center">
                                <div id="search-results" class="col-md-10 overflow-auto" style="position: absolute; top: 75px;  z-index: 3; height:500px; background-color:rgb(255 255 255 / 52%);border-radius: 15px;
                                    -webkit-box-shadow: 2px 10px 21px 1px rgba(0,0,0,0.33);
-moz-box-shadow: 2px 10px 21px 1px rgba(0,0,0,0.33);
box-shadow: 2px 10px 21px 1px rgba(0,0,0,0.33); padding: 20px;">
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr
                                        style=" display: table;  width: 100%; table-layout: fixed;  height: 20px;  line-height: 20px; ">
                                        <th class="px-4 py-2 border">Product</th>
                                        <th class="px-4 py-2 border">Quantity</th>
                                        <th class="px-4 py-2 border">Price</th>
                                        <th class="px-4 py-2 border">Subtotal</th>
                                        <th class="px-4 py-2 border">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-items" style=" height: 50vh; overflow: scroll; ">
                                </tbody>
                                <tfoot>

                                    <tr
                                        style=" display: table; width: 100%; table-layout: fixed; height: 20px;  line-height: 20px; ">

                                        <td colspan="4" class="px-4 py-2 text-right font-bold"
                                            style="text-align: right;">
                                            <strong>Subtotal: <span id="subtotal-amount" class="font-bold">Mrf
                                                    0.00 |</span>
                                            </strong><strong>Tax: <span id="tax-amount" class="font-bold">Mrf
                                                    0.00</span> |</strong>
                                            <strong>Discount: <span id="discount-amount" class="font-bold text-lg">Mrf
                                                    0.00</span>
                                            </strong>
                                        </td>
                                        <td class="px-4 py-2 border" style="text-align: center;  font-size:  large;
                                         background-color: #e7e7e7; ">
                                            <strong><span id="total-amount" class="font-bold">
                                                    Mrf 0.00 /-</span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row">
                            <div class="mb-6 col-sm-6 col-md-6">
                                <select name="payment_method" id="payment_method" class="form-select" required
                                    style="background-color:#71b9ff;">
                                    <option value="">Select Payment Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="mb-6 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    Complete Sale
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<style>
/* Make table rows display properly in scrollable tbody */
#cart-items tr {
    display: table;
    width: 100%;
    table-layout: fixed;
    height: 20px;
    /* Fixed height for rows */
    line-height: 20px;
    /* Match line height to row height */
}

#cart-items td {
    padding: 0 8px !important;
    /* Reduce padding */
    white-space: nowrap;
    /* Prevent text wrapping */
    overflow: hidden;
    /* Hide overflow content */
    text-overflow: ellipsis;
    /* Add ellipsis for overflow text */
    height: 20px;
    line-height: 20px;
    vertical-align: middle;
}

#cart-items input[type="number"] {

    /* Slightly smaller than row height */
}

/* Fix header and footer width to match scrollable body */
thead tr {
    display: table;
    width: calc(100% - 1rem);
    /* Adjust for scrollbar */
    table-layout: fixed;
    height: 30px;
    /* Slightly larger for header */
}

tfoot tr {
    display: table;
    width: calc(100% - 1rem);
    /* Adjust for scrollbar */
    table-layout: fixed;
    height: 30px;
    /* Slightly larger for footer */
}

/* Make delete button smaller */
#cart-items button svg {
    width: 16px;
    height: 16px;
}
</style>


<script>
// public/js/sales.js
let cart = [];
let searchTimeout;
 
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search');
    const searchResults = document.getElementById('search-results');
    const cartTable = document.getElementById('cart-items');
    const checkoutForm = document.getElementById('checkout-form');
    document.getElementById("search-results").style.visibility = "hidden";


    // Product search with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();

        if (query.length < 2) {
            searchResults.innerHTML = '';
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/babypluspos/sales/search/products?search=${encodeURIComponent(query)}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Accept': 'application/json'
                    }
                })


                .then(response => response.json())
                .then(products => {
                    if (products != 0) {
                        document.getElementById("search-results").style.visibility =
                            "visible";
                    }
                    searchResults.innerHTML = '';
                    products.forEach(product => {
                        const div = document.createElement('div');
                        div.innerHTML = `
                        <div class="row mb-1"style="border-bottom:2px solid #bfbebe; background-color: #f7f7f7;" >
                        <div class="col" style="margin: auto;"> ${product.image ? 
                        `<img src="${product.image}" class="avatar me-2">` : 
                        '<span class="avatar me-2" style="background-image: url(./static/avatars/008f.jpg)"></span> '} </div>
                        <div class="col" style="margin: auto;">${product.name}</div>
                        <div class="col"style="margin: auto;"> Mrf${product.price}</div>
                        <div class="col"style="margin: auto;"> ${product.stock}</div>
                        </div>                        
 
                    `;
                        div.addEventListener('click', () => addToCart(product));
                        searchResults.appendChild(div);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    searchResults.innerHTML =
                        '<div class="p-2 text-red-600">Error loading products</div>';
                });
        }, 300);
    });

    // Add to cart function
    window.addToCart = function(product) {
        const existingItem = cart.find(item => item.id === product.id);

        if (existingItem) {
            if (existingItem.quantity >= product.stock) {
                alert('Cannot exceed available stock');
                return;
            }
            existingItem.quantity++;
        } else {
            cart.push({
                id: product.id,
                name: product.name,
                price: parseFloat(product.price),
                quantity: 1,
                stock: product.stock
            });
        }

        updateCartDisplay();
        searchInput.value = '';
        searchResults.innerHTML = '';
        document.getElementById("search-results").style.visibility =
            "hidden";
    };

    // Update quantity in cart
    window.updateQuantity = function(index, newQuantity) {
        newQuantity = parseInt(newQuantity);
        if (newQuantity < 1) newQuantity = 1;
        if (newQuantity > cart[index].stock) {
            alert('Cannot exceed available stock');
            newQuantity = cart[index].stock;
        }
        cart[index].quantity = newQuantity;
        updateCartDisplay();
    };

    // Remove from cart
    window.removeFromCart = function(index) {
        cart.splice(index, 1);
        updateCartDisplay();
    };

    // Update totals calculation
    window.updateTotals = function() {
        let subtotal = 0;
        cart.forEach(item => {
            subtotal += item.price * item.quantity;
        });

        const discountAmount = parseFloat(document.getElementById('discount_amount').value || 0);
        const taxRate = 0.08; // 8% tax rate

        // Prevent negative totals after discount
        const discountedSubtotal = Math.max(subtotal - discountAmount, 0);
        const tax = Math.round(discountedSubtotal * taxRate);
        const total = Math.round(discountedSubtotal + tax);

        // Update display
        document.getElementById('subtotal-amount').textContent = `Mrf ${subtotal.toFixed(2)}`;
        document.getElementById('discount-amount').textContent = `-Mrf ${discountAmount.toFixed(2)}`;
        document.getElementById('tax-amount').textContent = `Mrf ${tax.toFixed(2)}`;
        document.getElementById('total-amount').textContent = `Mrf ${total} /-`;
    };

    // Update cart display
    window.updateCartDisplay = function() {
        cartTable.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';
            row.innerHTML = `
                <td class="px-4 py-2 border-b">${item.name}</td>
                <td class="border-b " style="margin: auto;">
                    <input type="number" 
                           value="${item.quantity}" 
                           min="1" 
                           max="${item.stock}"
                           class="form-control"
                           onchange="updateQuantity(${index}, this.value)">
                </td>
                <td class="px-4 py-2 border-b text-right">$${item.price.toFixed(2)}</td>
                <td class="px-4 py-2 border-b text-right">$${(item.price * item.quantity).toFixed(2)}</td>
                <td class="px-4 py-2 border-b ">
                    <button onclick="removeFromCart(${index})" 
                            class="btn btn-danger btn-sm" style="float: right;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            `;
            cartTable.appendChild(row);
            total += item.price * item.quantity;
        });

        updateTotals();
    };

    // Handle checkout
    checkoutForm.addEventListener('submit', function(e) {
        e.preventDefault();

        if (cart.length === 0) {
            alert('Cart is empty');
            return;
        }

        const discountAmount = parseFloat(document.getElementById('discount_amount').value || 0);

        const formData = {
            customer_id: document.getElementById('customer_id').value || null,
            payment_method: document.getElementById('payment_method').value,
            discount: discountAmount,
            items: cart.map(item => ({
                inventory_id: item.id,
                quantity: item.quantity,
                unit_price: item.price
            }))
        };

        fetch('/babypluspos/sales',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => Promise.reject(data));
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.href = `/babypluspos/sales/${data.sale.id}/invoice`;
                } else {
                    alert(data.message || 'Error processing sale');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Error processing sale');
            });
    });
});
</script>

@endsection