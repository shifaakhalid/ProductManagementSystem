@extends('layouts.app2')

@section('content')

<div class="flex flex-col md:flex-row items-center justify-between px-6 py-12 bg-white ">
  
  <div class="md:w-1/2 mb-8 md:mb-0 text-center md:text-left">
    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">
      Product Management System
    </h2>
    <p class="text-gray-600 text-lg leading-relaxed">
      A web-based application that allows users to add, update, view, and delete products efficiently.
      It manages product details like name, SKU, price, stock, image, category, and supplier, providing a streamlined way to organize and monitor inventory in real-time.
    </p>
  </div>

  <div class="md:w-1/2 flex justify-center">
    <img src="{{ asset('Assets/body-image.png') }}" alt="Dashboard Illustration" class="w-[280px] md:w-[350px]">
  </div>

</div>
@endsection
