


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />
     <link rel="shortcut icon" href="/backend/images/app-logo.png" height="10" width="20"
         type="image/x-icon" />
     <title>The Real World University Platform - Register Form</title>
     <meta name="description" content="Register Form " />
     <meta name="author" content="harnishdesign.net" />

     <!-- Web Fonts
========================= -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900"
         type="text/css" />

     <!-- Stylesheet
========================= -->
     <link rel="stylesheet" type="text/css" href="/style/css/bootstrap.min.css" />
     <link rel="stylesheet" type="text/css" href="/style/css/all.min.css" />
     <link rel="stylesheet" type="text/css" href="/style/css/stylesheet.css" />
     <!-- Colors Css -->
     <link id="color-switcher" type="/style/text/css" rel="stylesheet" href="#" />
 </head>

 <body>


     <div id="main-wrapper" class="oxyy-login-register">
         <div class="container-fluid px-0">
             <div class="row g-0 min-vh-100">
                 <!-- Welcome Text
      ========================= -->
                 <div class="col-md-4">
                     <div class="hero-wrap h-100">
                         <div class="hero-mask opacity-5 bg-dark"></div>
                         <div class="hero-bg hero-bg-scroll"
                             style="background-image: url('/style/images/login-bg-6.jpg')">
                         </div>
                         <div class="hero-content mx-auto w-100 h-100">
                             <div class="container d-flex flex-column h-100">
                                 <div class="row g-0">
                                     <div class="col-11 col-lg-9 mx-auto">
                                         <div class="logo mt-5 mb-5">
                                             <a href="#"><img src="/backend/images/app-logo.png" height="70"
                                                     width="120" alt="150x50" /></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row g-0 mt-3">
                                     <div class="col-11 col-lg-9 mx-auto">
                                         <h1 class="text-9 text-white fw-300 mb-5">
                                             <span class="fw-500">Welcome</span>, Looks like you're
                                             new here!
                                         </h1>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Welcome Text End -->

                 <!-- Register Form
      ========================= -->
                 <div class="col-md-8 d-flex flex-column align-items-center bg-dark">
                     <div class="container my-auto py-5">
                         <div class="row g-0">
                             <div class="col-11 col-md-8 col-lg-7 col-xl-6 mx-auto">
                                 <p class="text-2 text-light">
                                     Already a member?
                                     <a class="fw-500" href="{{ route('login') }}">Login</a>
                                 </p>
                                 <h3 class="text-white mb-4">Register Your Account</h3>

                                 <div class="d-flex align-items-center my-4">
                                     <hr class="col-1 border-secondary" />
                                     <span class="mx-3 text-2 text-white-50"></span>
                                     <hr class="flex-grow-1 border-secondary" />
                                 </div>
                                 <form method="POST" action="{{ route('register') }}">
                                     @csrf
                                     <div class="mb-3">
                                         <label class="form-label text-light" for="fullName">Full Name</label>
                                         <input class="form-control" id="fullName" placeholder="Enter Your Name"
                                             type="text" name="name" :value="old('name')" required autofocus
                                             autocomplete="name" />
                                     </div>
                                     <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                     <div class="mb-3">
                                         <label class="form-label text-light" for="emailAddress">Email Address</label>
                                         <input class="form-control" id="emailAddress" required=""
                                             placeholder="Enter Your Email" type="email" name="email"
                                             :value="old('email')" required autocomplete="username" />
                                     </div>
                                     <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                     <div class="mb-3">
                                         <label class="form-label text-light" for="loginPassword">Password</label>
                                         <input class="form-control" id="loginPassword" placeholder="Enter Password"
                                             type="password" name="password" required autocomplete="new-password" />
                                     </div>
                                     <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                     <div class="mb-3">
                                         <label class="form-label text-light" for="loginPassword"> Confirm
                                             Password</label>
                                         <input class="form-control" id="loginPassword" placeholder="Enter Password"
                                             type="password" name="password_confirmation" required
                                             autocomplete="new-password" />
                                     </div>
                                     <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />

                                     <div class="form-check text-light my-4">
                                         <input id="agree" name="agree" class="form-check-input"
                                             type="checkbox" />
                                         <label class="form-check-label" for="agree">I agree to the <a
                                                 href="#">Terms</a> and
                                             <a href="#">Privacy Policy</a>.</label>
                                     </div>
                                     <button class="btn btn-primary shadow-none my-2" type="submit">
                                         Register
                                     </button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Register Form End -->
             </div>
         </div>
     </div>

     <!-- Styles Switcher -->
     <div id="styles-switcher" class="right">
         <h5>Color Switcher</h5>
         <hr />
         <ul class="mb-0">
             <li class="blue" data-bs-toggle="tooltip" title="Blue" data-path="#"></li>
             <li class="indigo" data-bs-toggle="tooltip" title="Indigo" data-path="css/color-indigo.css"></li>
             <li class="purple" data-bs-toggle="tooltip" title="Purple" data-path="css/color-purple.css"></li>
             <li class="pink" data-bs-toggle="tooltip" title="Pink" data-path="css/color-pink.css"></li>
             <li class="red" data-bs-toggle="tooltip" title="Red" data-path="css/color-red.css"></li>
             <li class="orange" data-bs-toggle="tooltip" title="Orange" data-path="css/color-orange.css"></li>
             <li class="yellow" data-bs-toggle="tooltip" title="Yellow" data-path="css/color-yellow.css"></li>
             <li class="teal" data-bs-toggle="tooltip" title="Teal" data-path="css/color-teal.css"></li>
             <li class="green" data-bs-toggle="tooltip" title="Green" data-path="css/color-green.css"></li>
             <li class="cyan" data-bs-toggle="tooltip" title="Cyan" data-path="css/color-cyan.css"></li>
             <li class="brown" data-bs-toggle="tooltip" title="Brown" data-path="css/color-brown.css"></li>
         </ul>
         <button class="btn switcher-toggle"><i class="fas fa-cog"></i></button>
     </div>
     <!-- Styles Switcher End -->

     <!-- Script -->
     <script src="/style/js/jquery.min.js"></script>
     <script src="/style/js/bootstrap.bundle.min.js"></script>
     <!-- Style Switcher -->
     <script src="/style/js/switcher.min.js"></script>
     <script src="/style/js/theme.js"></script>
 </body>

 </html>
