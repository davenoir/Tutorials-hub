<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
    <meta name="api-token" content="{{ \Auth::user()->api_token }}">
    @endauth


    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1785dc68a2.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-md" style="background-color: black; box-shadow: 5px 5px 15px 0px rgba(0,0,0,0.75);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="filter:invert(100%)" src="{{asset('img/brainster.png')}}" width="50" height="50" alt="brainster logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto pages" style="color:white">
                        <li class="nav-item">
                        <a id="programming" href="{{route('programming')}}" class="Active"><i class="fas fa-code"></i> <span class="font-900">Programming</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </li>
                        <li class="nav-item">
                        <a id="DataScience" href="{{route('datascience')}}"><i class="fas fa-atom"></i> <span class="font-900">Data Science</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </li>
                        <li class="nav-item">
                        <a id="DevOps" href="{{route('devops')}}"><i class="fas fa-infinity"></i> <span class="font-900">DevOps</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </li>
                        <li class="nav-item">
                        <a id="Design" href="{{route('design')}}"><i class="fas fa-paint-brush"></i> <span class="font-900">Design</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="color:white">
                        <li class="nav-item">
                            <a class="nav-link" @if(Auth::check()) data-target='#addTutorial' @else data-target='#register' @endif data-toggle="modal"><span style="color:#90EE90"><i class="fas fa-plus"></i></span> <span style="cursor:pointer; color:white; font-weight:900">Submit a tutorial</span></a>
                        </li> &nbsp; &nbsp;
                        <!-- Authentication Links -->
                        @if(Auth::check() && Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" style="cursor:pointer; color:white; font-weight:900" href="{{route('managecourses')}}"><i class="fa fa-cog" style="font-size:15px; color:#90EE90"></i> Manage Courses </a>
                            </li>
                        @endif
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="cursor:pointer; color:white; font-weight:900" data-toggle="modal" data-target="#register">Sign Up <span style="color:#90EE90; font-weight:900">/</span> Sign In</a>
                                </li>
                            @endif
                        @else
                        @if(Auth::user()->avatar != null)
                        <img src="{{ Auth::user()->avatar }}" width="50" height="50" style="border-radius:50%; border: 3px solid #90EE90; outline-radius:60%">
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
                <!-- Register Modal -->
                <div  class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header" style="margin-bottom:2%; background-color:black; color:white; border-bottom: 1px solid black; box-shadow: 5px 5px 15px 0px rgba(0,0,0,0.75);">
                            <div class="w-100 text-center">
                                <h2 style="font-weight:900" class="modal-title" id="exampleModalLongTitle">Welcome to Brainster Tutorials Hub!</h2>
                                <p>Signup to submit and upvote tutorials, follow topics, and more.</p>
                            </div>
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="w-100 text-center">
                                <h6>CONTINUE WITH:</h6>
                                <hr style="width:80%">
                                <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-lg socialbtns">
                                    <i class="fab fa-facebook-square" style="font-size:x-large"></i> Sign up with Facebook
                                </a>
                                <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger btn-lg socialbtns">
                                    <i class="fab fa-google-plus-square" style="font-size:x-large"></i> Sign up with Google
                                </a>
                                <a href="{{ route('social.oauth', 'github') }}" class="btn btn-dark btn-lg socialbtns">
                                    <i class="fab fa-github-square" style="font-size:x-large"></i> Sign up with Github
                                </a>
                            </div>
                            <div class="w-100 text-center" style="margin-top:1%">
                                <h6>OR:</h6>
                                <hr style="width:80%">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success btn-block greenBtn">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center" style=" margin-top: 2%; background-color:black; color:white; border-top: 1px solid black; box-shadow: 0px -11px 23px -11px rgba(0,0,0,0.75);">
                        <p>Already have an account? <a href="#"  data-dismiss="modal" data-toggle="modal" id="forgotPassword" data-target="#login" class="lightGreen">Sign In</a></p>
                        </div>
                    </div>
                    </div>
                </div>
                  <!-- Login Modal -->
                  <div  class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header" style="margin-bottom:2%; background-color:black; color:white; border-bottom: 1px solid black; box-shadow: 5px 5px 15px 0px rgba(0,0,0,0.75);">
                            <div class="w-100 text-center">
                                <h2 style="font-weight:900" class="modal-title" id="exampleModalLongTitle">Welcome Back!</h2>
                            </div>
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="w-100 text-center">
                                <h6>CONTINUE WITH:</h6>
                                <hr style="width:80%">
                                <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-lg socialbtns">
                                    <i class="fab fa-facebook-square" style="font-size:x-large"></i> Sign in with Facebook
                                </a>
                                <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger btn-lg socialbtns">
                                    <i class="fab fa-google-plus-square" style="font-size:x-large"></i> Sign in with Google
                                </a>
                                <a href="{{ route('social.oauth', 'github') }}" class="btn btn-dark btn-lg socialbtns">
                                    <i class="fab fa-github-square" style="font-size:x-large"></i> Sign in with Github
                                </a>
                            </div>
                            <div class="w-100 text-center" style="margin-top:1%">
                                <h6>OR:</h6>
                                <hr style="width:80%">
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success greenBtn">
                                            Sign In
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" id="forgotPassword" data-target="#reset">
                                                <span style="color:green">{{ __('Forgot Your Password?') }}</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center" style=" margin-top: 2%; background-color:black; color:white; border-top: 1px solid black; box-shadow: 0px -11px 23px -11px rgba(0,0,0,0.75);">
                        <p>Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" id="forgotPassword" data-target="#register"  class="lightGreen">Sign Up</a></p>
                        </div>
                    </div>
                    </div>
                </div>
                 <!-- Reset Password -->
                 <div  class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header" style="margin-bottom:2%; background-color:black; color:white; border-bottom: 1px solid black; box-shadow: 5px 5px 15px 0px rgba(0,0,0,0.75);">
                            <div class="w-100 text-center">
                                <h2 style="font-weight:900" class="modal-title" id="exampleModalLongTitle">Reset Password</h2>
                            </div>
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success greenBtn">
                                                Send Password Reset Link
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Add tutorial-->
                <div  class="modal fade" id="addTutorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header" style="margin-bottom:2%; background-color:black; color:white; border-bottom: 1px solid black; box-shadow: 5px 5px 15px 0px rgba(0,0,0,0.75);">
                            <div class="w-100 text-center headerModal">
                                <h2 style="font-weight:900" class="modal-title" id="exampleModalLongTitle">Add Tutorial</h2>
                            </div>
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form method="" action="" id="addingTutorials" name="addingTutorials">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-8 offset-md-2">
                                        <label for="name" class="boldFilter">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name of tutorial" name="tutorialName">
                                        </div>
                                    </div>
                                    <div class="form-group row spaceOut">
                                        <div class="col-md-8 offset-md-2">
                                        <label for="link" class="boldFilter">Link</label>
                                        <input type="text" class="form-control" id="link" placeholder="Enter the URL of the tutorial" name="link">
                                        </div>
                                    </div>
                                    <div class="form-group row spaceOut">
                                        <div class="col-md-8 offset-md-2">
                                            <h6 class="boldFilter">Select Technology</h6>
                                            <select class="form-control form-control-sm" id="versionList" name="version" style="width: 100%">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row spaceOut">
                                        <div class="col-md-4 col-sm-6 col-6 offset-md-2">
                                            <h6 class="boldFilter">Type</h6>
                                            <br>
                                            <input class="form-check-input switch" type="checkbox" value="1" id="free" name="type">
                                            <label class="form-check-label" for="free">
                                              Free
                                            </label>
                                            <input class="form-check-input switch" type="checkbox" value="2" id="paid" name="type">
                                            <label class="form-check-label" for="paid">
                                              Paid
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6  col-6 offset-md-1">
                                            <h6 class="boldFilter">Format</h6>
                                            <br>
                                            <input class="form-check-input switch" type="checkbox" value="1" id="video" name="format">
                                            <label class="form-check-label" for="video">
                                              Video
                                            </label>
                                            <input class="form-check-input switch" type="checkbox" value="2" id="book" name="format">
                                            <label class="form-check-label" for="book">
                                              Book
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row spaceOut">
                                        <div class="col-md-4 col-sm-6 col-6 offset-md-2">
                                            <h6 class="boldFilter">Level</h6>
                                            <br>
                                            <input class="form-check-input switch" type="checkbox" value="1" id="beginner" name="level">
                                            <label class="form-check-label" for="beginner">
                                              Beginner
                                            </label>
                                            <input class="form-check-input switch" type="checkbox" value="2" id="advanced" name="level">
                                            <label class="form-check-label" for="advanced">
                                              Advanced
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-6 offset-md-1">
                                            <h6 class="boldFilter">Language</h6>
                                            <br>
                                            <select class="form-control form-control-sm" id="languages" name="language">

                                              </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-2">
                                            <button type="submit" class="btn btn-success greenBtn">
                                                Add Tutorial
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </main>
        <div class="row" style="margin-top: 15%; max-width: 100%">
            <div class="col-md-12 col-sm-12 col-12 text-center ">
                <p class="text-muted " style="font-size: small; ">Created with &#9829; by  <span style="font-weight: 900;">&COPY; Dave_Noir </span></p>
            </div>
        </div>
    </div>

<script type="text/javascript">

$(function() {

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //get languages and add them to tutorial form
    $.get('/languages').then(function(data) {
        create(data);
    });
    function create(data) {
        $('#languages').html('');
      var container = $('#languages');
        var content = "";
        data.forEach(element => {
            content += `
            <option data-id='${element.id}' value="${element.id}">${element.name}</option>`
    });
    $(content).appendTo(container);
    };
    //Get technology versions and add them to tutorial form
    $.get('/version').then(function(data) {
        createVer(data);
    });
    function createVer(data) {
        $('#versionList').html('');
      var container = $('#versionList');
        var content = "";
        data.forEach(element => {
            content += `
            <option data-id='${element.id}' value="${element.id}" data-name="${element.name}">${element.name}</option>`
    });
    $(content).appendTo(container);
    };

    //search select plugin init
    $(document).ready(function() {
    $('#versionList').select2();
    });

    //Adding and validating new tutorial
    $(document).ready(function() {
    $("#addingTutorials").validate({
    // Specify validation rules
    rules: {
        tutorialName : {
        required: true,
        minlength: 5
      },
      link : {
        required: true,
        url: true,
      },
      version : {
        required: true,

      },
      type : {
        required: true,
      },
      format : {
        required: true,
      },
      level : {
        required: true,
      },
      language : {
        required: true,
      },
    },
    messages: {
        tutorialName: {
        minlength: "Name should be at least 5 characters"
    },
    },
    submitHandler: function(form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var name = $('input[name="tutorialName"]').val();
        var link = $('input[name="link"]').val();
        var version = $("#versionList > option:selected").attr("value");
        var type = $('input[name="type"]:checked').val();
        var format = $('input[name="format"]:checked').val();
        var level = $('input[name="level"]:checked').val();
        var language = $("#languages > option:selected").attr("value");
        $.ajax({
                type:'POST',
                url : '/addTutorial',
                data:{'name':name,'link': link , 'version': version , 'type': type , 'format': format , 'level': level , 'language': language ,"_method": 'POST'},
            }).done(function (data) {
                $('.headerModal').html(`<p style="font-weight:900; color:#90EE90">${data.success}</p>`);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
    }
  });

});


});

</script>
</body>
</html>
