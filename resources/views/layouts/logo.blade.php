<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Product Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="styleSheet" href="css\logo.css">
</head>

  <div class="header-left">
    <img src= "{{  asset('Assets/logo1.png') }}"  alt="">
     <h1>Product Manager</h1>
  </div>  {{-- Page Content --}}
    <main class="content" style="width:100%; height: 80%; position: relative; top: 20%; display: flex;">
        

        @yield('content')
    </main>

