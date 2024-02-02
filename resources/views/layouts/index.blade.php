<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>RecipeBook</title>

  @include('layouts.head')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand mx-auto" href="index.php">
            <span>
              RecipeBook
            </span>
          </a>
          <a class="navbar-brand mx-auto" href="create">
            <span class="text-warning">
              +
            </span>
          </a>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section ">
      <div class="container ">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="detail-box">
              <h1>
                Discover Our Recipes
              </h1>
              <!-- <p>
                when looking at its layout. The point of using Lorem Ipsum
              </p> -->
            </div>
            <div class="find_container ">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <form method="GET" action="{{ route('search') }}" class="mb-4">
                      <div class="form-row">
                          <div class="form-group col-lg-5">
                              <input type="text" class="form-control" name="query" placeholder="Search for a Recipe Name or Category">
                          </div>
                          <div class="form-group col-lg-3">
                              <div class="btn-box">
                                  <button type="submit" class="btn">Search</button>
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- recipe section -->

  <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Recipes
        </h2>
      </div>
      <div class="row">
        @foreach($recipes as $r)
          <div class="col-sm-6 col-md-4 mx-auto">
              <div class="box">
                <div class="img-box">
                      <img src="{{ asset('storage/' . $r->image) }}" class="box-img" alt="">
                  </div>
                  <div class="detail-box">
                      <h4>
                          {{ $r->name }}
                      </h4>
                      <a href="#" data-toggle="modal" data-target="#recipeModal{{ $r->id }}">
                          👁️
                      </a>
                  </div>
                </div>
          </div>

        <!-- Modal -->
        <div class="modal fade" id="recipeModal{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="recipeModalLabel{{ $r->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="recipeModalLabel{{ $r->id }}">✨🍽️<em>{{ $r->name }}</em>🍽️✨</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $r->image) }}" class="img-fluid" alt="{{ $r->name }}">
                            </div>
                            <div class="col-md-6">
                                <p>{{ $r->description }}</p>
                                <p> <b> Category: </b>{{ $r->category }}</p>
                                <p> <b> Ingredients: </b><br>{{ $r->ingredients }}</p>
                                <p> <b> Instructions: </b>{{ $r->instructions }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <div>
                        <a class="btn btn-outline-primary" href="{{route('edit', ['Recette' => $r])}}" >✍ Edit</a>
                        <form method="POST" action="{{ route('delete', ['Recette' => $r->id]) }}" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">❌ Delete</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- <div class="btn-box">
        <a href="">
          Order Now
        </a>
      </div> -->
    </div>
  </section>

  <!-- end recipe section -->

  

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="col-md-11 col-lg-10 mx-auto">
        <div class="heading_container heading_center">
          <h2>
            About Us
          </h2>
        </div>
        <div class="box">
          <div class="col-md-7 mx-auto">
            <div class="img-box">
              <img src="images/about-img.jpg" class="box-img" alt="">
            </div>
          </div>
          <div class="detail-box">
            <p>
              
              Welcome to Recipe Book, your online haven for sharing and discovering delightful recipes!
               Whether you're a seasoned chef or a novice in the kitchen, our platform is a community-driven space where culinary enthusiasts come together to exchange, inspire, and indulge in the art of cooking. Join us on this flavorful journey, where every recipe tells a unique story, and each shared dish adds a pinch of joy to our collective cookbook.
              Cheers to a community united by a love for great food!
            </p>
            <a href="">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <div class="footer_container">
    


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