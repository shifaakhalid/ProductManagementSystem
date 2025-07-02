
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register & Login Buttons</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="styleSheet" href="\css\welcome.css">
</head>

<div class="header">
  <div class="header-left">
    <img src= "{{  asset('Assets/logo1.png') }}"  alt="">
     <h1>Product Manager</h1>
  </div>
  <div class="header-right">

    <body class=" h-screen bg-white-100">
      <div class="space-x-4">
        <button onclick="window.location.href='{{ route('register') }}'" class="px-6 py-2 bg-blue-400 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
          Register
        </button>
        <button onclick="window.location.href='{{route('login')}}'" class="px-6 py-2 bg-pink-600 text-white font-semibold rounded-lg shadow-md hover:bg-pink-700 transition">
          Login
          
        </button>
      </div>
  </div>
</div>

<div class="body">

<div class="body-left">
  <h2>Product Management System
</h2>
  <p>A web-based application that allows users to add, update, view, and delete products efficiently. It manages product details like name, SKU, price, stock, image, category, and supplier, providing a streamlined way to organize and monitor inventory in real-time.</p>
</div>
<div class="body-right">
  <img src= "{{  asset('Assets/body-image.png') }}" alt="" />
</div>

</div>
</body>

</html>