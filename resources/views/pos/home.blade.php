@extends('layouts.poslayout')

@section('content')
<style>
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fadeInUp 1s ease-out both;
  }
</style>

<!-- Hero Section -->
<section class="text-center py-24 px-4 bg-gradient-to-br from-pink-50 to-blue-50">
  <div class="max-w-3xl mx-auto animate-fade-in-up">
    <h2 class="text-5xl font-extrabold mb-4 gradient-text">Revolutionize Your Sales</h2>
    <p class="text-lg text-gray-600 mb-8">Smart inventory, fast checkout, secure payments — all in one POS system.</p>
    <a href="{{ route('freetrial') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-pink-500 to-blue-500 text-white rounded-full text-lg font-semibold shadow-lg hover:scale-105 transition">Start Free Trial</a>
  </div>
</section>

<!-- Features -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h3 class="text-3xl font-bold mb-12 text-gray-800 animate-fade-in-up">POS Features That Empower You</h3>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white/80 backdrop-blur p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2 animate-fade-in-up">
        <div class="text-pink-500 text-4xl mb-4">📦</div>
        <h4 class="text-xl font-semibold mb-2">Live Inventory</h4>
        <p>Track your stock in real-time to avoid shortages or overstocking.</p>
      </div>
      <div class="bg-white/80 backdrop-blur p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2 animate-fade-in-up delay-100">
        <div class="text-blue-500 text-4xl mb-4">⚡</div>
        <h4 class="text-xl font-semibold mb-2">Speedy Checkout</h4>
        <p>Complete transactions in seconds with barcode and quick-pay support.</p>
      </div>
      <div class="bg-white/80 backdrop-blur p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2 animate-fade-in-up delay-200">
        <div class="text-pink-500 text-4xl mb-4">🔒</div>
        <h4 class="text-xl font-semibold mb-2">Secure Payments</h4>
        <p>Accept cards and wallets with end-to-end encryption and fraud detection.</p>
      </div>
    </div>
  </div>
</section>

<!-- Stats -->
<section class="bg-gradient-to-r from-blue-100 to-pink-100 py-16">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-4 gap-6 text-center text-gray-800 animate-fade-in-up">
    <div>
      <h5 class="text-4xl font-bold text-pink-600">5K+</h5>
      <p>Businesses Served</p>
    </div>
    <div>
      <h5 class="text-4xl font-bold text-blue-600">99.99%</h5>
      <p>Uptime Guaranteed</p>
    </div>
    <div>
      <h5 class="text-4xl font-bold text-pink-600">24/7</h5>
      <p>Support</p>
    </div>
    <div>
      <h5 class="text-4xl font-bold text-blue-600">10M+</h5>
      <p>Transactions Handled</p>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h3 class="text-3xl font-bold mb-12 text-gray-800 animate-fade-in-up">What Our Users Say</h3>
    <div class="grid md:grid-cols-2 gap-10">
      <div class="bg-pink-50 p-6 rounded-xl shadow-md transform hover:scale-105 transition duration-500 ease-in-out animate-fade-in-up">
        <p class="italic text-gray-700">“This POS system transformed my retail workflow. I love the clean interface and instant updates!”</p>
        <div class="mt-4 text-blue-600 font-semibold">— Zara, Boutique Owner</div>
      </div>
      <div class="bg-blue-50 p-6 rounded-xl shadow-md transform hover:scale-105 transition duration-500 ease-in-out delay-150 animate-fade-in-up">
        <p class="italic text-gray-700">“Fast, reliable, and super intuitive. Our team adapted in no time. Highly recommended!”</p>
        <div class="mt-4 text-pink-600 font-semibold">— Ahmed, Store Manager</div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-pink-500 to-blue-500 text-white text-center">
  <div class="max-w-4xl mx-auto px-4 animate-fade-in-up">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Simplify Your Sales?</h2>
    <p class="mb-6 text-lg">Get started with POSMaster today. It's free and powerful!</p>
    <a href="" class="inline-block px-6 py-3 bg-white text-pink-600 font-semibold rounded-full hover:bg-gray-100 transition">Try POS Now</a>
  </div>
</section>
@endsection

@section('scripts')
<script>
  const csrfToken = '{{ csrf_token() }}';
  const searchInput = document.getElementById('search');
  const resultsDiv = document.getElementById('search-results');
  const cartItems = document.getElementById('cart-items');
  let cart = [];

  searchInput.addEventListener('input', async function () {
    const query = this.value;
    if (!query) {
      resultsDiv.innerHTML = '';
      return;
    }

    const res = await fetch(`/pos/search?q=${query}`);
    const products = await res.json();

    resultsDiv.innerHTML = '';
    products.forEach(product => {
      const card = document.createElement('div');
      card.className = 'bg-white p-4 rounded-xl shadow hover:shadow-md transition';
      card.innerHTML = `
        <h4 class="text-lg font-semibold text-blue-600">${product.name}</h4>
        <p class="text-pink-600 font-medium mb-2">PKR ${product.price}</p>
        <button onclick="addToCart(${product.id}, '${product.name}', ${product.price})" 
                class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-1 rounded">
          Add
        </button>
      `;
      resultsDiv.appendChild(card);
    });
  });

  function addToCart(id, name, price) {
    const index = cart.findIndex(item => item.id === id);
    if (index !== -1) {
      cart[index].qty++;
    } else {
      cart.push({ id, name, price, qty: 1 });
    }
    renderCart();
  }

  function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    renderCart();
  }

  function renderCart() {
    cartItems.innerHTML = '';
    let subtotal = 0;

    cart.forEach(item => {
      const row = document.createElement('tr');
      subtotal += item.price * item.qty;
      row.innerHTML = `
        <td class="p-2">${item.name}</td>
        <td class="p-2">${item.qty}</td>
        <td class="p-2">PKR ${item.price * item.qty}</td>
        <td class="p-2"><button onclick="removeFromCart(${item.id})" class="text-red-600">Remove</button></td>
      `;
      cartItems.appendChild(row);
    });

    const tax = subtotal * 0.1;
    document.getElementById('subtotal').textContent = `PKR ${subtotal}`;
    document.getElementById('tax').textContent = `PKR ${tax}`;
    document.getElementById('total').textContent = `PKR ${subtotal + tax}`;
  }

  document.getElementById('complete-sale').addEventListener('click', async () => {
    const name = document.getElementById('customer_name').value;
    const phone = document.getElementById('customer_phone').value;
    const method = document.getElementById('payment_method').value;

    if (!cart.length) return alert('Cart is empty');
    if (!name || !phone) return alert('Enter customer details');

    const res = await fetch('/pos/complete-sale', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({ cart, name, phone, method })
    });

    const data = await res.json();
    if (data.success) {
      alert('Sale completed!');
      cart = [];
      renderCart();
      searchInput.value = '';
      resultsDiv.innerHTML = '';
    } else {
      alert('Error: ' + data.message);
    }
  });
</script>
@endsection






</body>


</html>