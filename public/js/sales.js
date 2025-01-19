// public/js/sales.js

let cart = [];
let searchTimeout;

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search');
    const searchResults = document.getElementById('search-results');
    const cartTable = document.getElementById('cart-items');
    const totalElement = document.getElementById('total-amount');
    const checkoutForm = document.getElementById('checkout-form');

    // Product search with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        if (query.length < 2) {
            searchResults.innerHTML = '';
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/sales/search/products?search=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(products => {
                    searchResults.innerHTML = '';
                    products.forEach(product => {
                        const div = document.createElement('div');
                        div.className = 'p-2 hover:bg-gray-100 cursor-pointer';
                        div.innerHTML = `
                            <div class="flex items-center">
                                ${product.image ? 
                                    `<img src="${product.image}" class="w-12 h-12 object-cover mr-2">` : 
                                    '<div class="w-12 h-12 bg-gray-200 mr-2"></div>'}
                                <div>
                                    <div class="font-bold">${product.name}</div>
                                    <div class="text-sm">SKU: ${product.sku}</div>
                                    <div class="text-sm">Price: $${product.price}</div>
                                    <div class="text-sm">Stock: ${product.stock}</div>
                                </div>
                            </div>
                        `;
                        div.addEventListener('click', () => addToCart(product));
                        searchResults.appendChild(div);
                    });
                })
                .catch(error => console.error('Error:', error));
        }, 300);
    });

    // Add to cart function
    function addToCart(product) {
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
                price: product.price,
                quantity: 1,
                stock: product.stock
            });
        }
        
        updateCartDisplay();
    }

    // Update cart display
    function updateCartDisplay() {
        cartTable.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="border px-4 py-2">${item.name}</td>
                <td class="border px-4 py-2">
                    <input type="number" 
                           value="${item.quantity}" 
                           min="1" 
                           max="${item.stock}"
                           class="w-20 p-1 border rounded"
                           onchange="updateQuantity(${index}, this.value)">
                </td>
                <td class="border px-4 py-2">$${item.price}</td>
                <td class="border px-4 py-2">$${(item.price * item.quantity).toFixed(2)}</td>
                <td class="border px-4 py-2">
                    <button onclick="removeFromCart(${index})" 
                            class="bg-red-500 text-white px-2 py-1 rounded">
                        Remove
                    </button>
                </td>
            `;
            cartTable.appendChild(row);
            total += item.price * item.quantity;
        });

        totalElement.textContent = `$${total.toFixed(2)}`;
    }

    // Update quantity
    window.updateQuantity = function(index, quantity) {
        quantity = parseInt(quantity);
        if (quantity < 1) quantity = 1;
        if (quantity > cart[index].stock) {
            alert('Cannot exceed available stock');
            quantity = cart[index].stock;
        }
        cart[index].quantity = quantity;
        updateCartDisplay();
    }

    // Remove from cart
    window.removeFromCart = function(index) {
        cart.splice(index, 1);
        updateCartDisplay();
    }

    // Handle checkout
    checkoutForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (cart.length === 0) {
            alert('Cart is empty');
            return;
        }

        const formData = {
            customer_id: document.getElementById('customer_id').value,
            payment_method: document.getElementById('payment_method').value,
            items: cart.map(item => ({
                inventory_id: item.id,
                quantity: item.quantity,
                unit_price: item.price
            }))
        };

        fetch('/sales', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Sale completed successfully');
                window.location.href = `/sales/${data.sale.id}/invoice`;
            } else {
                alert(data.message || 'Error processing sale');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error processing sale');
        });
    });
});