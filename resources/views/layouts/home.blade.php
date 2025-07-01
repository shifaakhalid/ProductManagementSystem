<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register & Login Buttons</title>
  <link rel="styleSheet" href="\css\style.css">
  <script src="https://cdn.tailwindcss.com"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="header pr-10" > 
  <div class="header-left mb-6 ">
    <img src= "{{  asset('Assets/logo1.png') }}"  alt="">
     <h1>Product Manager</h1>
  </div>
  <div class="header-right mt-4">

    <body class="flex items-center justify-center h-screen  ">
      <div class="space-x-4">
          <div>
<a href="{{ route('products.create') }}"
   class="px-6 py-2.5 text-black font-semibold rounded-lg no-underline 
          outline outline-1 outline-gray-300  mr-4 
          hover:bg-pink-600 hover:!text-white hover:outline-white 
          transition duration-200 ">
   + Add Product
</a>
<a href=""
   class="px-3 py-2.5 text-white font-semibold rounded-lg no-underline 
          outline outline-1 outline-white-300 mr-5 bg-pink-600 
          hover:bg-white hover:!text-black hover:outline-gray-300
          transition duration-200 ">
   LogOut
</a>
            </div>
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