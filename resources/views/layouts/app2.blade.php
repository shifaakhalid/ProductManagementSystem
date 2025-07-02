<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register & Login Buttons</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">

</head>



<div class="header flex ">
  <div class="header-left  ">
    <img src="{{  asset('Assets/logo1.png') }}" alt="">
    <h1>Product Manager</h1>
  </div>
  <div class="header-right ">

  <div>
<a href="{{ route('products.create') }}"
      class="px-3 py-2 text-black font-semibold rounded-full no-underline 
          outline outline-1 outline-gray-300  mr-6  
          hover:bg-blue-400 hover:!text-white hover:outline-white 
          transition duration-200 ">
      + 
    </a>
      <!-- <a href="{{ route('products.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="" class="bi bi-plus-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>
      </a> -->

    <a href="{{ route('products.index') }}"
      class="px-6 py-2.5 text-black font-semibold rounded-lg no-underline 
          outline outline-1 outline-gray-300  mr-6  
          hover:bg-blue-400 hover:!text-white hover:outline-white 
          transition duration-200 ">
      Products
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

<main class="  ">
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