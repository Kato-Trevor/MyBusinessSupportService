

@extends('layouts.app2', ['pageSlug' => 'dashboard'])

@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
    <!-- <link href="mine.css" rel="stylesheet"> -->
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
  
  .label {
    border: 2px solid black;
    width: 270px;
    margin: 20px auto;
    padding: 0 7px;
  }
  .divider {
    border-bottom: 1px solid #888989;
    margin: 2px 0;
    clear: right;
  }
  
  .bold {
    font-weight: 800;
  }
  
  .right {
    float: right;
  }
  .lg {
    height: 10px;
  }
  .sm-text {
    font-size: 0.85rem;
  }
  
  .calories-info h1 {
    margin: -5px -2px;
    overflow: hidden;
  }
  
  .calories-info span {
    font-size: 1.2em;
    margin-top: -7px;
  }
    </style>
    <title>Customer Page</title>
</head>
<body >
<div>
<div class="container mb-10" style="margin-top: 10px; margin-bottom: 200px; display: block; ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header" style='text-align: center;'>Our Top Product Owner!!</div>

                <div class="card-body" style='text-align: center;'>
                    @if(session('login-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('login-success') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $participant)
                       <p>{{$participant->name}}</p>
                       <p>Points earned: {{$participant->points}}</p>
                       <p>Product: {{$participant->product}}</p>

                    @endforeach

</div></div></div></div></div></div>
     
<div class="container" style="margin-top: 10px; margin-bottom: 10px;  display:block;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
<div>
<h1 id="products" style='text-align: center;'><strong>Our Products</strong></h1>
                    
@foreach($products as $product)
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
      <h1>{{$product->name}}<span class="right">{{$product->price}}</span></h1>

        <p class="bold sm-text"></p>{{$product->description}}
      </div>
      <div class="divider md" style=" border-bottom: 1px solid #C689C6;
    margin: 2px 0;
    clear: right;
    height: 10px;"></div>
    </div>
   
   <a href="{{ url('/product/'.$product->product_number)}}" class="btn btn-primary" style="text-align: center;"> View details</a>
   <div class="divider lg"  style=" border: 1px solid #C689C6;
    margin: 2px 0;
    clear: right;
    height: 8px;
    background-color: #C689C6;"></div>
  @endforeach 

</div>
</div>
</div>
</div>
  
  
          
</div>
          
</body>

                          
                                        
                          
       
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush






































