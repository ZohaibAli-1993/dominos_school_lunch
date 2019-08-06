<!doctype html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <link rel="stylesheet" type="text/css" href="/css/app.css"  />
        <script src="/js/app.js" ></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,400,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="/css/custom.css" />
        <link rel="stylesheet" type="text/css" href="/css/calendarorganizer.css" />
        
    </head>

    <body>

    <!-- Main container of the header -->
    <header>
        <div id="top_header">
            <!-- Top portion of header -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <!-- Logo of the site -->
                        <img id="logo" src="/img/logo.png" alt="logo" />
                    </div><!-- .col-->

                    <div class="col-lg-2">
                        <!-- Header icons-->
                        <div id="header_icons">
                            <p class="user_icon">
                                <a href="#"  data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="far fa-user"></i>
                                </a>
                            </p>

                            <p class="contact_icon">
                                <a href="/contact">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </p>
                        </div><!--/header_icons-->
                    </div><!-- .col-->
                </div><!-- .row-->
            </div><!-- .container-->
        </div><!-- .top_header-->

        <!-- *****Bottom portion of the header**** -->
        <div id="bottom_header">

            <div class="container {{ (Request::path() == '/') ? 'home' : '' }}">
                <div class="row">
                    <div class="col">
                        <!-- Brand name -->
                        <div id="brand_name">
                            <div class="name_first_part">
                                <p>Domino
                                    <code id="quote">&#10076;</code>s
                                </p>
                            </div> <!--/first_part-->

                            <div class="name_second_part">
                                <p>School Lunch</p>
                            </div><!--/second_part-->

                        </div> <!--/brand_name-->
                    </div><!-- .col-->

                    <!-- Main Navigation -->
                    <div id="main_nav_bar" class="col">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="/schools">School Coordinator</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="/parents">Parents</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link disabled" href="/about">About Us</a>
                                </li>
                            </ul>
                            </div>
                            </nav>
                    </div><!-- .col-->
                </div><!-- .row-->
            </div><!-- .container-->

            <div class="hero">
                @if(request()->route()->getName() == 'home')
                    <div class="cta">
                        <h1>With Domino</h1>
                        <h2>School Lunch is easier than ever</h2>
                        <a class="button" href="">Lunch Order</a>
                    </div>
                @endif
            </div>
        </div> <!-- /bottom header -->
            
        
    </header><!--/header-->
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div id="loginformContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
          <h2 class="my-5">Sign In</h2>
        </div>

        <!-- Login Form -->
        <form>
          <input type="email" id="email" class="fadeIn second zero-raduis" name="email" placeholder="email">
          <input type="text" id="password" class="fadeIn third zero-raduis" name="login" placeholder="password">
              <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
          <input type="submit" class="fadeIn fourth zero-raduis" value="login">
          <h3>You don't have a account ?</h2>
          <input type="button" class="fadeIn fourth zero-raduis pc" value="register" data-toggle="modal" data-target="#exampleModalRegister" class="close" data-dismiss="modal" aria-label="Close">
        </form>
        

      </div>
  </div>
     
      
    </div>
  </div>
</div> 
    <div class="modal fade" id="exampleModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <h2> Registration</h2>
      <div class="modal-body" style="padding:45px">
      <a href="/parents_registration">
      <img src="/img/parents.jpg" alt="HTML tutorial" style="width:150px;height:150px;border:0; ">
         </a> 
         <a href="/school_registration">
      <img src="/img/school.jpg" alt="HTML tutorial" style="width:150px;height:150px;border:0; ">
         </a>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
       

    <div class="" id="main_content">
