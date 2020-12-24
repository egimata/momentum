<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->



<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Basic Page Needs
  ================================================== -->
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="/favicon.png">
    <meta name="keywords" content="momentum,group,branding,services,development,video production,animation,design,web,eden,breeze">
    <meta name="description" content="{{$description}}">
    <meta name="author" content="Eixhan Gruja">
    <!-- Mobile Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- All Css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/et-line.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">
    <!--Owl Carousel-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/owl.transitions.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/slimbox.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/sp-portfolio.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/featherlight.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140674607-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140674607-1');
</script>



</head>

<body class="body-innerwrapper">
    <!--Top Section-->
    <section>
        <!--Header-->
        <header>
            <nav class="navbar" data-spy="affix" data-offset-top="1" id="slide-nav">
                <div class="container">
                    <div class="navbar-header col-sm-3 col-md-3 col-xs-12">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="menu-logo"><img src="logo-momentum.png"></a>
                    </div>
                    <!--Nav links-->
                    <div class=" navbar-collapse col-sm-9 col-md-9" id="menu_nav">
                        <ul class="nav navbar-nav">
                            <li class="mega active">
                                <a href="/">{{__('custom.home-menu')}}</a>
                            </li>
                            <?php
                            $cntproj = App\Project::count();
                            ?>
                            @if($cntproj > 0)
                            <li>
                                <a href="/projects">{{__('custom.projects-menu')}}</a>
                            </li>
                            @endif
                            <li>
                                <a href=" /blogs">{{__('custom.blog-menu')}}</a>
                            </li>
                            <li>
                                <a href="/about">{{__('custom.about-us-menu')}}</a>
                            </li>
                            <li>
                                <a href="/careers">{{__('custom.careers-menu')}}</a>
                            </li>
                            <li class="dropdown mega">
                                <a href="#"><img src="{{__('custom.flag')}}" style="height: 25px;"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/lang/al"><img src="images/albania-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; {{__('custom.albanian')}}</a></li>
                                    <li><a href="/lang/en"><img src="images/united-kingdom-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; {{__('custom.english')}}</a></li>
                            <!--        <li><a href="/lang/it"><img src="images/italy-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; {{__('custom.italian')}}</a></li>  -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        @yield('content')


            <!--footer-->
    <footer class="space footer-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 footer-block">
                    <h3>{{__('custom.about-heading')}}</h3>
                    <div class="footer-inner">
                        <p class="point-1">MOMENTUM GROUP Corp. – a group of companies with years of experience in several directions. We are constantly evolving and becoming more aware. The desire to become better constantly yielding results in the form of recognition and customer appreciation.</p>
                        <ul class="contact">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Rruga Ibrahim Rugova || Tirana, Albania </li>
                            <li><a href="mailto:info@momentumo.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@momentumo.com</a> </li>
                            <li><a href="tel:355672040099"><i class="fa fa-phone" aria-hidden="true"></i>+355 67 20 400 99</a> </li>
                        </ul>
                    </div>
                </div>
                @if(count($blogs) > 0)
                    <div class="col-sm-3 footer-block">
                        <h3>{{__('custom.our-blog')}}</h3>
                        <div class="blog">
                            @foreach ($blogs as $blog)
                            <article class="block-block">
                                <img src="/storage/cover_images/{{$blog->photo}}" style="width: 60px; height: 50px" alt="Blog">
                                <div class="blog-info">
                                    @if ($lang == 'en')
                                    <h4><a href="/blogs/{{$blog->slug}}">{{$blog->titlen}}</a> </h4>
                                    @elseif ($lang == 'al')
                                    <h4><a href="/blogs/{{$blog->slug}}">{{$blog->titlealb}}</a> </h4>
                                    @elseif ($lang == 'it')
                                    <h4><a href="/blogs/{{$blog->slug}}">{{$blog->titleit}}</a> </h4>
                                    @endif
                                    <ul class="post-info">
                                        <li><?php echo $blog->created_at ?>
                                        </li>
                                    </ul>
                                </div>
                            </article>

                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <hr>
                <div class="col-sm-12 text-center footer-block">
			        ©2020 All Right Reserved Momentum Group
                </div>
            </div>
        </div>
    </footer>
    <!--Mobile Menu-->
    <div class="offcanvas-menu">
        <a class="close-offcanvas" href="#"><i class="fa fa-remove"></i></a>
        <div class="offcanvas-inner">
            <div class="sp-module ">
                <div class="sp-module-content">
                    <ul class="nav menu">
                        <li>
                            <a href="/">{{__('custom.home-menu')}}</a>
                        </li>
                    <!--
                        <li>
                            <a href="/projects">{{__('custom.projects-menu')}}</a>
                        </li>
                    -->
                        <li>
                            <a href=" /blogs">{{__('custom.blog-menu')}}</a>
                        </li>
                        <li>
                            <a href="/about">{{__('custom.about-us-menu')}}</a>
                        </li>
                        <li>
                            <a href="/careers">{{__('custom.careers-menu')}}</a>
                        </li>
                        <li class="dropdown">
                            <a href="#">LANGUAGE</a>
                            <ul class="dropdown-menu">
                                <li><a href="/lang/al"><img src="images/albania-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; {{__('custom.albanian')}}</a></li>
                                <li><a href="/lang/en"><img src="images/united-kingdom-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; {{__('custom.english')}}</a></li>
                      <!--          <li><a href="/lang/it"><img src="images/italy-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; {{__('custom.italian')}}</a></li> -->
                        </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- all your content here -->
    <a href="#0" class="cd-top">Top</a>
    <!-- link to scripts here -->
    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="https://use.fontawesome.com/e18447245b.js"></script>
    <!--Owl Carousel-->
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/appear.js"></script>
    <script type="text/javascript" src="js/steller.js"></script>
    <script type="text/javascript" src="js/smooth-scrol.js"></script>
    <!--Portfolios-->
    <script type="text/javascript" src="js/isotope.js"></script>
    <script type="text/javascript" src="js/slimbox.js"></script>
    <script type="text/javascript" src="js/jquery.shuffle.modernizr.min.js"></script>
    <script type="text/javascript" src="js/spsimpleportfolio.js"></script>
    <script type="text/javascript" src="js/featherlight.min.js"></script>
    <!--Pie Chart-->
    <script type="text/javascript" src="js/jquery.easypiechart.js"></script>
    <script type="text/javascript" src="js/count-down.js"></script>
    <script type="text/javascript" src="js/wow-animation.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>





</body>



</html>
