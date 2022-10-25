<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<form method="post" action="{{ url('/products-add') }}">
    {{ csrf_field() }}
  <div class="mb-3">
    <label for="exampleInputEmail1"  class="form-label">Title</label>
    <input type="text" name="title" placeholder = "Title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <label for="exampleInputEmail1" class="form-label">Category</label>

  <select name="category_id" class="form-select" aria-label="Default select example">
  <option selected></option>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{ $category->name }}</option>
  @endforeach
</select>
  <button type="submit"  class="btn btn-primary mt-5 ml-5" >Submit</button>
</form>
