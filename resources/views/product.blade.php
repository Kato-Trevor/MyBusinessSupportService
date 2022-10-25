@extends('layouts.app3')
@section('content')
<head>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <style>
          * {
    box-sizing: border-box;
  }
  
  html {
    font-size: 16px;
  }
  
  body {
    font-family: 'Open Sans', sans-serif;
  }
  </style>
</head>
<body>
<div >
<div style=" border: 2px solid #C689C6;
    width: 50%;
    margin: 20px auto;
    padding: 0 7px;
   
    border-radius: 15px;">

<div class="divider lg" style=" border-bottom: 1px solid #C689C6;
    margin: 2px 0;
    clear: right;
    height: 10px;"></div>
      <div class="calories-info">
      <h1>{{$product->name}}<span class="right" style="float: right;">{{$product->price}}</span></h1>

        <p class="bold sm-text"></p>{{$product->description}}
        <form method="POST" action="/booked">
          @csrf
          <input type="hidden" name='id' value="{{$product->product_number}}"/>
          <input min="0" max="{{$product->stock_quantity}}" name="stock_quantity" type='number' value="0" style="float: right; width: 60px; display:inline;"/>
        <button class="mr-2" style="float: right; display:block; border-color: #C689C6 ; border-radius:15px; color:#C689C6;" type='submit'>Book</button>
        </form>
      </div>
      <div class="divider md" style=" border-bottom: 1px solid #C689C6;
    margin: 2px 0;
    clear: right;
    height: 10px;"></div>
    </div>
    
  <div style="position:absolute; margin-left: 400px">
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
Owner details
</button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <p>Name: {{$participant->name}}</p>
    <p>Date of Birth: {{$participant->date_of_birth}}</p>
    <p>Points earned: {{$participant->points}}</p>
  </div>
</div></div>
    
  </div>
</body>
@endsection