<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register & Login Buttons</title>
  <script src="https://cdn.tailwindcss.com"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">

</head>



<div class="header " > 
  <div class="header-left mt-6  ">
    <img src= "{{  asset('Assets/logo1.png') }}"  alt="">
     <h1>Product Manager</h1>
  </div>
  <div class="header-right">

   
      <div class="space-x-4 mt-10">
          <div>
<a href="{{ route('products.create') }}"
   class="px-6 py-2.5 text-black font-semibold rounded-lg no-underline 
          outline outline-1 outline-gray-300  mr-4  mt-10
          hover:bg-blue-400 hover:!text-white hover:outline-white 
          transition duration-200 ">
   + Add Product
</a>
<a href=""
   class="px-3 py-2.5 text-white font-semibold rounded-lg no-underline 
          outline outline-1 outline-white-300 mr-5 bg-pink-600 mt-10
          hover:bg-white hover:!text-black hover:outline-gray-300
          transition duration-200 ">
   LogOut
</a>
            </div>
      </div>
  </div>


     <main class=" mt-10 ">
        @if(session(key: 'success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <!-- {{-- Footer --}}
    <footer class="bg-dark text-white text-center  mt-auto">
        <div class="container">
            <small>&copy; {{ now()->year }} Product Management System | Built with Laravel & Bootstrap</small>
        </div>
    </footer> -->

</body>
</html>
