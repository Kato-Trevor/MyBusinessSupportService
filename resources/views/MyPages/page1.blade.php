<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>
<a href="{{ route('page2') }}">Page 2</a>
<h1>Hello</h1>
<a href="{{ url('/products-add') }}">Add products</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">category_id</th>
    </tr >
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->title}}</td>
      <td>{{$product->price}}</td>
      <td>{{ $product->category->id }}</td>
    </tr>
    @endforeach
  </tbody>
</table>