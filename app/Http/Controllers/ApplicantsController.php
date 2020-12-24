<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestServiceHandler;
use App\Career;
use App\Applicant;
use App\Applicantedu;
use App\Applicantexp;
use App\Applicantlang;
use Lang;

class ApplicantsController extends Controller
{

    function echoAll(){
        echo '
        <!DOCTYPE html>
        <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
        <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
        <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
        <!--[if (gte IE 9)|!(IE)]><!-->
        <html lang="en">
        <!--<![endif]-->



        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <!-- Basic Page Needs
          ================================================== -->
          <title>Momentum Group Career</title>
          <link rel="shortcut icon" href="/favicon.png">
            <meta name="keywords" content="momentum,group,branding,services,development,video production,animation,design,web,eden,breeze">
            <meta name="description" content="Vacancies in Momentum Group.">
            <meta name="author" content="">
            <!-- Mobile Specific Meta
            ================================================== -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- All Css -->
            <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/et-line.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/animate.css" media="screen">
            <!--Owl Carousel-->
            <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/owl.theme.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/owl.transitions.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/slimbox.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/sp-portfolio.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/featherlight.min.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen">
            <link rel="stylesheet" type="text/css" href="/css/responsive.css" media="screen">
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
                                <a href="/" class="menu-logo"><img src="/logo-momentum.png"></a>
                            </div>
                            <!--Nav links-->
                            <div class=" navbar-collapse col-sm-9 col-md-9" id="menu_nav">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="/">HOME</a>
                                    </li>
                                    <li>
                                        <a href="/projects">PROJECTS</a>
                                    </li>
                                    <li>
                                        <a href=" /blogs">BLOG</a>
                                    </li>
                                    <li>
                                        <a href="/about">ABOUT US</a>
                                    </li>
                                    <li>
                                        <a href="/careers">CAREERS</a>
                                    </li>
                                    <li class="dropdown mega">
                                        <a href="#"><img src="/images/united-kingdom-flag-round-small.png" style="height: 25px;"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
            </section>


            <!--BreadCrumb-->
            <section id="breadcrumb" class="overlay three">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 page-heading">
                            <h3>Careers</h3>
                        </div>
                        <div class="col-sm-6 breadcrumb-block text-right">
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li><a href="/careers">Careers</a></li>
                                <li class="active">'.$_POST['position'].'</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!--about-->
            <section id="about" class="one space" style="padding-bottom: 0px;">
                <div class="container">
                    <!--main heading-->
                    <div class="col-sm-12 main-heading text-center">
                        <h3>'.$_POST['position'].'</h3>
                    </div>
                </div>
            </section>
            <!--Contact Form-->
            <section id="contact-form" class="space" style="padding-top: 0px;">
                <div class="container">
                    <div class="row">
                    <form method="post" enctype="multipart/form-data" action="/application" class="sppb-ajaxt-contact-form">';
                echo   '<input name="_token" type="hidden" value="'.csrf_token().'">
                        <div class="col-sm-12 form-block">
                            <h4>Personal Information</h4>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="text" required="required" placeholder="Name" class="input-name form-control" name="fname">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" required="required" placeholder="Surname" class="input-name form-control" name="lname">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="email" required="required" placeholder="Email" class="input-email form-control" name="email">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="tel" required="required" placeholder="Phone Number" class="input-email form-control" name="phone" pattern="[0-9]+" title="Please enter numbers only">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Your Birthdate" class="input-email form-control" name="birthdate">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" placeholder="Mother Language" class="input-email form-control" name="motherlanguage">
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="country" class="countries order-alpha" id="countryId" style="width: 100%; border-radius: 0; height: 40px;">
                                        <option value="">Select Country</option>
                                        <option hidden value="Albania" selected>Albania</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="city" class="states order-pop" id="stateId" style="width: 100%; border-radius: 0; height: 40px;">
                                        <option value="">Select City</option>
                                        <option hidden value="Tirane" selected>Tirane</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <input type="text" placeholder="Address" class="input-email form-control" name="address">
                                </div>
                                <div class="form-group col-sm-12">
                                    <small>Social Skills</small>
                                    <textarea placeholder="Social Skills" class="input-text form-control" name="social_skills"></textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <small>Organisational Skills</small>
                                    <textarea placeholder="Organisational Skills" class="input-text form-control" name="organisational_skills"></textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <small>Job Related Skills</small>
                                    <textarea placeholder="Job Related Skills" class="input-text form-control" name="jobrelated_skills"></textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <small>Computer Skills</small>
                                    <textarea placeholder="Computer Skills" class="input-text form-control" name="computer_skills"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-block">
                            <br>

                            <h4>Work Experience</h4>
                                <div class="form-group col-sm-12">
                                    <hr>
                                </div>


                                <div id="workexp">
                                    <div class="row">
                                        <span id="lol" onclick="removeparent(this)" class="xlart">X</span>
                                        <div class="form-group col-sm-2">
                                            <small>Start Date</small>
                                            <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="work_startdate[]">
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <small>End Date</small>
                                            <input type="date" class="input-email form-control" name="work_enddate[]">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <small>Position</small>
                                            <input type="text" required="required" placeholder="Title" class="input-name form-control" name="position[]">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <small>Employer</small>
                                            <input type="text" required="required" placeholder="Company&#039;s / Office&#039;s Name" class="input-name form-control" name="employer[]">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="text" placeholder="Employer&#039;s City" class="input-email form-control" name="employer_city[]">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="text" placeholder="Employer&#039;s Country" class="input-email form-control" name="employer_country[]">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <textarea placeholder="Activities / Responsibilities" class="input-text form-control" name="activities[]"></textarea>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group col-sm-12">
                                <button type="button" onclick="addwork()">Add Work Experience</button>
                        </div>

                        <div class="col-sm-12 form-block">
                            <br>

                            <h4>Education History</h4>
                                <div class="form-group col-sm-12">
                                    <hr>
                                </div>


                                <div id="eduhis">
                                    <div class="row">
                                        <span id="lol" onclick="removeparent(this)" class="xlart">X</span>
                                        <div class="form-group col-sm-2">
                                            <small>Start Date</small>
                                            <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="edu_startdate[]">
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <small>End Date</small>
                                            <input type="date" class="input-email form-control" name="edu_enddate[]">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <small>Academic Degree</small>
                                            <input type="text" required="required" placeholder="Title" class="input-name form-control" name="title[]">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <small>Academic Institution</small>
                                            <input type="text" required="required" placeholder="Institution&#039;s Name" class="input-name form-control" name="org_name[]">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="text" placeholder="Institution&#039;s City" class="input-email form-control" name="org_city[]">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="text" placeholder="Institution&#039;s Country" class="input-email form-control" name="org_country[]">
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group col-sm-12">
                                <button type="button" onclick="addedu()">Add Education</button>
                        </div>

                        <div class="col-sm-12 form-block">
                            <br>

                            <h4>Languages</h4>
                                <div class="form-group col-sm-12">
                                    <hr>
                                </div>


                                <div id="langu">
                                    <div class="row">
                                        <span id="lol" onclick="removeparent(this)" class="xlart">X</span>
                                        <div class="form-group col-sm-7">
                                            <small>Language</small>
                                            <input type="text" required="required" placeholder="Language" class="input-name form-control" name="language[]">
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <small>Listening</small>
                                            <select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <small>Reading</small>
                                            <select name="reading[]" style="width: 100%; border-radius: 0; height: 40px;">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <small class="icikmeshumemajtas">Spoken&nbsp;Interaction</small>
                                            <select name="spoken_interaction[]" style="width: 100%; border-radius: 0; height: 40px;">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <small class="icikmajtas">Spoken&nbsp;Production</small>
                                            <select name="spoken_production[]" style="width: 100%; border-radius: 0; height: 40px;">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <small>Writing</small>
                                            <select name="writing[]" style="width: 100%; border-radius: 0; height: 40px;">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="button" onclick="addlang()">Add Language</button>
                            </div>
                            <div class="col-sm-12 form-block">
                                <br>
                                <h4>Related Documents:</h4>
                            </div>
                            <div class="col-sm-12 form-block">
                                <hr>
                            </div>

                            <div class="form-group col-sm-12 no-padding">
                                <div class="form-group col-sm-4">
                                    <p>Upload additional document (PDF)</p>
                                </div>
                                <div class="form-group col-sm-8">
                                    <input name="other_file" type="file">
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <p>By clicking on "Apply" you will be agreeing with company\'s <a href="/privacy-policy" target="_blank">privacy policies</a>.</p><br>
                            </div>

                            <input type="hidden" id="career_id" name="career_id" value="'.$_POST['id'].'">

                                <div class="form-group col-sm-12 mt-4">
                                    <button class="btn-style-two contact-btn" type="submit"><i class="fa"></i>Apply</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </section>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="//geodata.solutions/includes/countrystate.js"></script>

        <!-- Script qe te duhet o raku -->
        <script>
            function addwork(){
            $(\'#workexp\').append( \'
            <div class="row">
                <span id="lol" onclick="removeparent(this)" class="xlart">X</span>
                <div class="form-group col-sm-2">
                    <small>Start Date</small>
                    <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="work_startdate[]">
                </div>
                <div class="form-group col-sm-2">
                    <small>End Date</small>
                    <input type="date" class="input-email form-control" name="work_enddate[]">
                </div>
                <div class="form-group col-sm-3">
                    <small>Position</small>
                    <input type="text" required="required" placeholder="Title" class="input-name form-control" name="position[]">
                </div>
                <div class="form-group col-sm-5">
                    <small>Employer</small>
                    <input type="text" required="required" placeholder="Company&#039;s / Office&#039;s Name" class="input-name form-control" name="employer[]">
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" placeholder="Employer&#039;s City" class="input-email form-control" name="employer_city[]">
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" placeholder="Employer&#039;s Country" class="input-email form-control" name="employer_country[]">
                </div>
                <div class="form-group col-sm-12">
                    <textarea placeholder="Activities / Responsibilities" class="input-text form-control" name="activities[]"></textarea>
                </div>
                    <div class="form-group col-sm-12">
                    <hr>
                </div>
            </div>\');
            }

            function addedu(){
            $(\'#eduhis\').append( \'<div class="row"><span id="lol" onclick="removeparent(this)" class="xlart">X</span><div class="form-group col-sm-2"><small>Start Date</small><input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="edu_startdate[]"></div><div class="form-group col-sm-2"><small>End Date</small><input type="date" class="input-email form-control" name="edu_enddate[]"></div><div class="form-group col-sm-3"><small>Academic Degree</small><input type="text" required="required" placeholder="Title" class="input-name form-control" name="title[]"></div><div class="form-group col-sm-5"><small>Academic Institution</small><input type="text" required="required" placeholder="Institution&#039;s Name" class="input-name form-control" name="org_name[]"></div><div class="form-group col-sm-6"><input type="text" required="required" placeholder="Institution&#039;s City" class="input-email form-control" name="org_city[]"></div><div class="form-group col-sm-6"><input type="text" required="required" placeholder="Institution&#039;s Country" class="input-email form-control" name="org_country[]"></div><div class="form-group col-sm-12"><hr></div></div>\');
            }

            function addlang(){
            $(\'#langu\').append( \'<div class="row"><span id="lol" onclick="removeparent(this)" class="xlart">X</span><div class="form-group col-sm-7"><small>Language</small><input type="text" required="required" placeholder="Language" class="input-name form-control" name="language[]"></div><div class="form-group col-sm-1"><small>Listening</small><select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small>Reading</small><select name="reading[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small class="icikmeshumemajtas">Spoken&nbsp;Interaction</small><select name="spoken_interaction[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small class="icikmajtas">Spoken&nbsp;Production</small><select name="spoken_production[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small>Writing</small><select name="writing[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-12"><hr></div></div>\')}2

            function removeparent(x){
                $(x).parent().remove();
            }
        </script>




                <!--footer-->
        <footer class="space footer-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 footer-block">
                        <h3>ABOUT MOMENTUM</h3>
                        <div class="footer-inner">
                            <p class="point-1">MOMENTUM GROUP Corp. – a group of companies with years of experience in several directions. We are constantly evolving and becoming more aware. The desire to become better constantly yielding results in the form of recognition and customer appreciation.</p>
                            <ul class="contact">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Rruga Ibrahim Rugova || Tirana, Albania </li>
                                <li><a href="mailto:info@momentumo.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@momentumo.com</a> </li>
                                <li><a href="tel:355672040099"><i class="fa fa-phone" aria-hidden="true"></i>+355 67 20 400 99</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                <a href="/">HOME</a>
                            </li>
                            <li>
                                <a href="/projects">PROJECTS</a>
                            </li>
                            <li>
                                <a href=" /blogs">BLOG</a>
                            </li>
                            <li>
                                <a href="/about">ABOUT US</a>
                            </li>
                            <li>
                                <a href="/careers">CAREERS</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Language</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><img src="/images/albania-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; Albanian</a></li>
                                    <li><a href="#"><img src="/images/united-kingdom-flag-round-small.png" style="height: 25px;">&nbsp; &nbsp; English</a></li>
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
        <script type="text/javascript" src="/js/jquery.min.js"></script>

        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script src="https://use.fontawesome.com/e18447245b.js"></script>
        <!--Owl Carousel-->
        <script type="text/javascript" src="/js/owl.carousel.js"></script>
        <script type="text/javascript" src="/js/appear.js"></script>
        <script type="text/javascript" src="/js/steller.js"></script>
        <script type="text/javascript" src="/js/smooth-scrol.js"></script>
        <!--Portfolios-->
        <script type="text/javascript" src="/js/isotope.js"></script>
        <script type="text/javascript" src="/js/slimbox.js"></script>
        <script type="text/javascript" src="/js/jquery.shuffle.modernizr.min.js"></script>
        <script type="text/javascript" src="/js/spsimpleportfolio.js"></script>
        <script type="text/javascript" src="/js/featherlight.min.js"></script>
        <!--Pie Chart-->
        <script type="text/javascript" src="/js/jquery.easypiechart.js"></script>
        <script type="text/javascript" src="/js/count-down.js"></script>
        <script type="text/javascript" src="/js/wow-animation.js"></script>
        <script type="text/javascript" src="/js/jquery.nav.js"></script>
        <script type="text/javascript" src="/js/custom.js"></script>





        </body>



        </html>
        ';
    }


    public function show($id){
        //
        $career = Career::find($id);

        if (Lang::locale() == 'al'){
            $title = $career->title;
            $metadesc = strip_tags($career->description);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
        }else if (Lang::locale() == 'en'){
            $title = $career->titlen;
            $metadesc = strip_tags($career->description);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
        }else if (Lang::locale() == 'it'){
            $title = $career->description;
            $metadesc = strip_tags($career->description);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
        }

        return view ('applicants.index')->with('career',$career)->with('title',$title)->with('description',$description);
    }
    //

    public function redirect(Request $request)
    {
        return redirect('/careers');
    }


    public function application(Request $request)
    {
        $applicant = new Applicant;

        $applicant->fname = $request->input('fname');
        $applicant->lname = $request->input('lname');
        $applicant->phone = $request->input('phone');
        $applicant->birthdate = $request->input('birthdate');
        $applicant->email = $request->input('email');
        $applicant->mother_language = $request->input('motherlanguage');
        $applicant->address = $request->input('address');
        $applicant->country = $request->input('country');
        $applicant->city = $request->input('city');
        $applicant->social_skills = $request->input('social_skills');
        $applicant->organisational_skills = $request->input('organisational_skills');
        $applicant->jobrelated_skills = $request->input('jobrelated_skills');
        $applicant->computer_skills = $request->input('computer_skills');
        $applicant->career_id = $request->input('career_id');

        if($request->hasFile('other_file')){

            $filenameWithExt = $request->file('other_file')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('other_file')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('other_file')->storeAs('public/related_files', $fileNameToStore);

            $applicant->other_document = $fileNameToStore;

        }

        $applicant->save();

        if ($request->has('position')){
            for ($i = 0; $i < count($request->input('position')); $i++){
                $workexp = new Applicantexp;
                $workexp->start_date = $request->input('work_startdate')[$i];
                $workexp->end_date = $request->input('work_enddate')[$i];
                $workexp->position = $request->input('position')[$i];
                $workexp->employer = $request->input('employer')[$i];
                $workexp->employer_city = $request->input('employer_city')[$i];
                $workexp->employer_country = $request->input('employer_country')[$i];
                $workexp->activities = $request->input('activities')[$i];
                $workexp->applicant_id = $applicant->id;
                $workexp->save();
            }
        }

        if ($request->has('title')){
            for ($i = 0; $i < count($request->input('title')); $i++){
                $edu = new Applicantedu;
                $edu->start_date = $request->input('edu_startdate')[$i];
                $edu->end_date = $request->input('edu_enddate')[$i];
                $edu->title = $request->input('title')[$i];
                $edu->org_name = $request->input('org_name')[$i];
                $edu->org_city = $request->input('org_city')[$i];
                $edu->org_country = $request->input('org_country')[$i];
                $edu->applicant_id = $applicant->id;
                $edu->save();
            }
        }

        if ($request->has('language')){
            for ($i = 0; $i < count($request->input('language')); $i++){
                $lang = new Applicantlang;
                $lang->language = $request->input('language')[$i];
                $lang->listening = $request->input('listening')[$i];
                $lang->reading = $request->input('reading')[$i];
                $lang->spoken_interaction = $request->input('spoken_interaction')[$i];
                $lang->spoken_production = $request->input('spoken_production')[$i];
                $lang->writing = $request->input('writing')[$i];
                $lang->applicant_id = $applicant->id;
                $lang->save();
            }
        }

        return redirect('thankyou');

    }

    public function upload(){

            /*
            * Copyright European Union 2002-2010
            *
            *
            * Licensed under the EUPL, Version 1.1 or � as soon they
            * will be approved by the European Commission - subsequent
            * versions of the EUPL (the "Licence");
            * You may not use this work except in compliance with the
            * Licence.
            * You may obtain a copy of the Licence at:
            *
            * http://ec.europa.eu/idabc/eupl.html
            *
            *
            * Unless required by applicable law or agreed to in
            * writing, software distributed under the Licence is
            * distributed on an "AS IS" basis,
            * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
            * express or implied.
            * See the Licence for the specific language governing
            * permissions and limitations under the Licence.
            *
            */
        /* upload.php
        * The file used to upload the XML or PDF+XML file.
        */



        // Get RestServiceHandler instance
        $rsHandlerInstance = RestServiceHandler::getInstance();


        $upload_path = "tmp/";
        $output_filename = "xmlOutput.xml";

        /* @var $target_path
        * Temporary path for input xml.
        * */
        $target_path = $upload_path.basename($_FILES['uploadedxml']['name']);

        /* @var $target_output_path
        * Temporary path for output xml (from pdf).
        * */
        $target_output_path = $upload_path.basename($output_filename);

        /* @var $maxfilesize
        * Maximum file size.
        *  */
        $maxfilesize=10240000;

        #Check if the file exceeds the specified file size.
        if ($_FILES['uploadedxml']['size'] > $maxfilesize) {
            echo '<center><img src="./images/cv_top_banner1.jpg" alt="Europass CV" /></center><br/><HR size="2"/><br/>';
            echo 'Your file is too large.<br/><center><a href="index.html">Go Back</a></center>';
            unlink($_FILES['uploadedxml']['tmp_name']); #Delete the temp file
        }

        #Check if the file is a XML or PDF+XML file.

        if ($_FILES['uploadedxml']['type'] == NULL) {
            $this->echoAll();
        }

        #If everything is ok we try to upload it and start the parsing.
        else {
            if(move_uploaded_file($_FILES['uploadedxml']['tmp_name'], $target_path)) {
                #Check if the file is PDF/ XML
                if ($_FILES['uploadedxml']['type'] == "application/pdf") {
                    $requestResult = $rsHandlerInstance->xmlExtractFromPDF($target_path, $upload_path, $output_filename);

                    if ($requestResult['status'] != 200) {
                        $this->echoAll();
                        //   unlink($_FILES['uploadedxml']['tmp_name']);
                        return;
                    }
                    else {
                        $xml = $target_output_path;
                        unlink($target_path);
                    }

                } else {
                    $xml = $target_path;
                }
                #Check if the user wants to upload the file to the database or to a form.
                if ($_POST['upload'] == 'form')	{include('europass/xml2form.php');} #User wants to upload the file in a form
            } else {
                echo '<center><img src="./images/cv_top_banner1.jpg" alt="Europass CV" />';
                echo 'Sorry, there was a problem uploading your file.<br />';
                echo '<a href="index.html">Go Back</a>';
                unlink($_FILES['uploadedxml']['tmp_name']); #Delete the temp file
            }
        }

    }


}
