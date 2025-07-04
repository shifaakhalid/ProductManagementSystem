@extends('layouts.app2')


<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <title>Product Manager</title>
  <link rel="styleSheet" href="\css\style.css">
  <script src="https://cdn.tailwindcss.com"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

@section('content')


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
@endsection
</body>

</html>