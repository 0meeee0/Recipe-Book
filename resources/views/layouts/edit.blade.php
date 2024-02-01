<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
      @include('layouts.head')
</head>
<body class="sub_page">

    <div class="hero_area">
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand mx-auto" href="/">
                    <span>
                    RecipeBook
                    </span>
                </a>
                </nav>
            </div>
        </header>
    </div>

    <!-- <div class="container-fluid col-md-6">
      <img class="img-fluid d-flex mx-auto" src="{{ asset('assets/images/about-img.jpg') }}" alt="">
    </div> -->
    <div class="container">
      <div class="heading_container heading_center">
        <h2 id="here">Edit Recipe</h2>
      </div>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="container">
          <form class="col-9 mx-auto" method="POST" action="{{route('update',$recipe->id)}}" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{$recipe->name}}" required>
              </div>

              <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea name="description" id="description" class="form-control" value="" required>{{$recipe->description}}</textarea>
              </div>

              <div class="form-group">
                  <label for="ingredients">Ingredients:</label>
                  <textarea name="ingredients" id="ingredients" class="form-control" required>{{$recipe->ingredients}}</textarea>
              </div>

              <div class="form-group">
                  <label for="instructions">Instructions:</label>
                  <textarea name="instructions" id="instructions" class="form-control" required>{{$recipe->instructions}}</textarea>
              </div>

              <div class="form-group">
                  <label for="category">Category:</label>
                  <input type="text" name="category" id="category" class="form-control" value="{{$recipe->category}}" required>
              </div>

              <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" name="image" id="image" class="form-control" accept="image/*">
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
    </div>
  </section>
  <div class="footer_container mt-1">

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          <br>
          RecipeBook
          &copy; <span id="displayYear"></span> All Rights Reserved
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </div>
      @include('layouts.scripts')

</body>
</html>