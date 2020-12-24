<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Momentum</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    




</head>
<body>
    <div id="app">
            <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">

                        <li class="nav-item active" style="margin-right: 20px;">
                            <a class="nav-link" style='font-size: 20px' href="/home">
                            <i class="fab fa-skyatlas" style='font-size: 35px'></i>
                            Momentum CMS
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        @if(Auth::check())

                        @if (Auth::user()->role == 1)

                          <li class="nav-item">
                              <a class="nav-link" href="/admin/projects">
                                <i class="fas fa-ruler">

                                </i>
                                Projects
                              </a>
                            </li>


                          <li class="nav-item">
                            <a class="nav-link" href="/admin/blogs">
                              <i class="fas fa-blog">

                              </i>
                              Blog
                            </a>
                          </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/admin/messages">
                                    <i class="fa fa-newspaper">  </i>
                                  Messages
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="/admin/newsletters">
                                    <i class="far fa-envelope">  </i>
                                  Newsletters
                                </a>
                              </li>

                              @endif

                              @if (Auth::user()->role == 0)

                              <li class="nav-item">
                                <a class="nav-link" href="/admin/careers">
                                    <i class="far fa-file">  </i>
                                  Careers
                                </a>
                              </li>


                              <li class="nav-item">
                                <a class="nav-link" href="/admin/applicants">
                                    <i class="fa fa-users">  </i>
                                  Applications
                                </a>
                              </li>



                              @endif
                              @endif
                      </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    <i class="fa fa-user-circle">
                                      </i>
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

            <div class="container">
            @include('inc.messages')

            @yield('content')
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    if ($('#description-alb').length)
{
    CKEDITOR.replace( 'description-alb' );
};

if ($('#description-en').length)
{
    CKEDITOR.replace( 'description-en' );
};

if ($('#description-it').length)
{
    CKEDITOR.replace( 'description-it' );
};

if ($('#description').length)
{
    CKEDITOR.replace( 'description' );
};

function ConfirmDelete()
{
var x = confirm("Are you sure you want to delete this tour?");
if (x)
  return true;
else
  return false;
}

$("#datepicker1").datepicker({
    format: "mm/yyyy",
    viewMode: "months",
minViewMode: "months",
    todayBtn: "linked",
    toggleActive: true,
    orientation: "bottom left",
}).datepicker('update', new Date());


$("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years",
minViewMode: "years",
    todayBtn: "linked",
    toggleActive: true,
    orientation: "top left",
}).datepicker('update', new Date());

$("#datepicker3").datepicker({
    format: "dd-mm-yyyy",
    viewMode: "days",
    minViewMode: "days",
    weekStart: 1,
    todayBtn: "linked",
    toggleActive: true,
    orientation: "bottom left",
}).datepicker('update', new Date());

$("#datepicker4").datepicker({
    format: "dd-mm-yyyy",
    viewMode: "days",
    minViewMode: "days",
    weekStart: 1,
    todayBtn: "linked",
    toggleActive: true,
    orientation: "bottom left",
}).datepicker();

$("#datepicker5").datepicker({
    format: "dd-mm-yyyy",
    viewMode: "days",
    minViewMode: "days",
    weekStart: 1,
    todayBtn: "linked",
    toggleActive: true,
    orientation: "bottom left",
}).datepicker();


if ($('#toggle').length)
{
    $("#toggle").click(function() {
    $("#panel").slideToggle("slow");
    });
};

if ($('#toggle2').length)
{
    $("#toggle2").click(function() {
    $("#panel2").slideToggle("slow");
    });
};


</script>

@yield('ajaxend')

</html>
