<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Product Manager</title>
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
        class="px-[13px] py-[8px] flex-col items-center text-gray-300 font-semibold rounded-full no-underline 
          outline outline-1 outline-gray-300  mr-4
          hover:bg-gray-300 hover:!text-white hover:outline-white 
          transition duration-200 ">+</a>


      <a href="{{ route('products.index') }}"
        class="px-6 py-2.5 text-black font-semibold rounded-lg no-underline 
          outline outline-1 outline-gray-300  mr-6  
          hover:bg-blue-400 hover:!text-white hover:outline-white 
          transition duration-200 ">
        Products
      </a>
      <a href="{{ route('login')}}">

        <button type="submit"
          class="px-6 py-2 text-white font-semibold rounded-lg no-underline 
             outline outline-1 outline-white-300 mr-5 bg-pink-600 mt-2
             hover:bg-white hover:!text-black hover:outline-gray-300
             transition duration-200 ">
          LogOut
        </button>

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
</body>

</html>