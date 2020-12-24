<?php
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
/* xml2form.php
 * This file is for parsing the XML file and uploading the data in a form.
 *  */
/* ini_set() is used to include in the search path list the directory that we upload the XML or PDF file.
 */
ini_set('include_path', $upload_path);
$xfile = $xml;


/* @var DOMDocument
 * Load the XML File in a DOM Document.
 * */
$doc = new DOMDocument();
$doc->load($xfile);



#Create the page header
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

';
# Get from the XML all the elements with tag name 'Identification' and load them in a list.
$identifications = $doc->getElementsByTagName("Identification");

/* For each on of the list elements get the various elements included in the identification entity
 * and load them in the coresponding variables. */
$gender = NULL;
foreach($identifications as $identification)
{
    if ($identification->getElementsByTagName("FirstName") && $identification->getElementsByTagName("FirstName")->item(0)) {
        $firstname    = $identification->getElementsByTagName("FirstName")->item(0)->nodeValue;
    } else {$firstname = NULL;}
    if ($identification->getElementsByTagName("Surname") && $identification->getElementsByTagName("Surname")->item(0)) {
        $lastname     = $identification->getElementsByTagName("Surname")->item(0)->nodeValue;
    } else {$lastname = NULL;}
    if ($identification->getElementsByTagName("AddressLine") && $identification->getElementsByTagName("AddressLine")->item(0)) {
        $addressLine  = $identification->getElementsByTagName("AddressLine")->item(0)->nodeValue;
    } else {$addressLine = NULL;}
    if ($identification->getElementsByTagName("Municipality") && $identification->getElementsByTagName("Municipality")->item(0)) {
        $municipality = $identification->getElementsByTagName("Municipality")->item(0)->nodeValue;
    } else {$municipality = NULL;}
    if ($identification->getElementsByTagName("PostalCode") && $identification->getElementsByTagName("PostalCode")->item(0)) {
        $postalCode   = $identification->getElementsByTagName("PostalCode")->item(0)->nodeValue;
    } else {$postalCode = NULL;}
    if ($identification->getElementsByTagName("ContactInfo") && $identification->getElementsByTagName("ContactInfo")->item(0)) {
        $contactInfoNode = $identification->getElementsByTagName("ContactInfo")->item(0);
        if ($contactInfoNode->getElementsByTagName("Country")) {
            $country    = $contactInfoNode->getElementsByTagName("Country")->item(0);
            if ($country != null && $country->getElementsByTagName("Code") && $country->getElementsByTagName("Code")->item(0)) {
                $code  = $country->getElementsByTagName("Code")->item(0)->nodeValue;
            } else {$code = NULL;}
            if ($country != null && $country->getElementsByTagName("Label") && $country->getElementsByTagName("Label")->item(0)) {
                $label = $country->getElementsByTagName("Label")->item(0)->nodeValue;
            } else {$label = NULL;}
        }
        else {$code = NULL; $label = NULL;}
    } else {
        $code = NULL;
        $label = NULL;
    }
    if ($identification->getElementsByTagName("TelephoneList")) {
        $telephones = $identification->getElementsByTagName("TelephoneList");
        if ($telephones->length < 1) {$telephone=NULL; $telephone2=NULL; $telephone3=NULL;}
        foreach ($telephones as $telephone) {
            $index = 0;
            foreach ($identification->getElementsByTagName("Telephone") as $telephoneNode) {
                if ($index == 0 && $telephoneNode->getElementsByTagName("Contact")) {
                    $telephone = $telephoneNode->getElementsByTagName("Contact")->item(0)->nodeValue;
                }
                if ($index == 1 && $telephoneNode->getElementsByTagName("Contact")) {
                    $telephone2 = $telephoneNode->getElementsByTagName("Contact")->item(0)->nodeValue;
                }
                else {$telephone2 = NULL;}
                if ($index == 2 && $telephoneNode->getElementsByTagName("Contact")) {
                    $telephone3 = $telephoneNode->getElementsByTagName("Contact")->item(0)->nodeValue;
                }
                else {$telephone3 = NULL;}
                $index ++;
            }
        }
    }
    if ($identification->getElementsByTagName("Email") && $identification->getElementsByTagName("Email")->item(0)) {
        $email      = $identification->getElementsByTagName("Email")->item(0)->nodeValue;
    } else {$email = NULL;}
    if ($identification->getElementsByTagName("Gender") && $identification->getElementsByTagName("Gender")->item(0)) {
        $genderNode     = $identification->getElementsByTagName("Gender")->item(0);
        if ($genderNode->getElementsByTagName("Code") && $identification->getElementsByTagName("Code")->item(0)) {
            $gender =  $genderNode->getElementsByTagName("Code")->item(0)->nodeValue;
        }
        else {$gender = NULL;}
    } else {$gender = NULL;}
    if ($identification->getElementsByTagName("Birthdate")) {
        if ($identification->getElementsByTagName('Birthdate')->length <1) { $birthdate = NULL; }
        foreach ($identification->getElementsByTagName('Birthdate') as $birthday) {
            $birthdate = $birthday->getAttribute('year') . '/ ' . trim($birthday->getAttribute('month'),'-') . '/ ' . trim($birthday->getAttribute('day'),'-');
        }
    } else {$birthdate = NULL;}
    if ($identification->getElementsByTagName("Photo") && $identification->getElementsByTagName("Photo")->item(0)) {
        $photoNode      = $identification->getElementsByTagName("Photo")->item(0);
        if ($photoNode->getElementsByTagName("Data") && $photoNode->getElementsByTagName("Data")->item(0)) {
            $photo =  $photoNode->getElementsByTagName("Data")->item(0)->nodeValue;
            $photo_type =  $photoNode->getElementsByTagName("MimeType")->item(0)->nodeValue;
        }
    } else {$photo = NULL; $photo_type = NULL;}

    #If the data exist, load the first step data in the form
    #echo '<br/><h2>Identification</h2><br/><img src="./images/bg_win.jpg" /><br/>';
    #if ($photo != NULL) {
    #    $img = include('photo.php');
    #}

    if ($firstname != NULL)	{echo '
        <div class="form-group col-sm-6">
            <input type="text" required="required" placeholder="Name" class="input-name form-control" name="fname" value="'.$firstname.'">
        </div>';}else{
            echo '
        <div class="form-group col-sm-6">
            <input type="text" required="required" placeholder="Name" class="input-name form-control" name="fname">
        </div>';
        }
    if ($lastname != NULL)	{echo '
            <div class="form-group col-sm-6">
                <input type="text" required="required" placeholder="Name" class="input-name form-control" name="lname" value="'.$lastname.'">
            </div>';}else{
                echo '
            <div class="form-group col-sm-6">
                <input type="text" required="required" placeholder="Name" class="input-name form-control" name="lname">
            </div>';
            }

    if ($email != NULL)			{echo '
        <div class="form-group col-sm-6">
            <input type="email" required="required" placeholder="Name" class="input-name form-control" name="email" value="'.$email.'">
        </div>';}else{
            echo '
        <div class="form-group col-sm-6">
            <input type="email" required="required" placeholder="Name" class="input-name form-control" name="email">
        </div>';
        }

    if ($telephone != NULL || $telephone2 != NULL || $telephone3 != NULL) {
        if ($telephone != NULL)		{echo '<div class="form-group col-sm-6">
            <input type="tel" required="required" placeholder="Phone Number" class="input-email form-control" pattern="[0-9]+" title="Please enter numbers only" name="phone" value="'.$telephone.'">
        </div>';}else{
            echo '<div class="form-group col-sm-6">
            <input type="tel" required="required" placeholder="Phone Number" class="input-email form-control" pattern="[0-9]+" title="Please enter numbers only" name="phone">
        </div>';
        }

    }

    if ($birthdate != NULL)	{
        $newdate = explode("/ ",$birthdate);
        echo '<div class="form-group col-sm-6">
                    <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Your Birthdate" class="input-email form-control" name="birthdate" value="'.$newdate[0].'-'.$newdate[1].'-'.$newdate[2].'">
                </div>
        ';}else{
            echo '<div class="form-group col-sm-6">
            <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Your Birthdate" class="input-email form-control" name="birthdate">
        </div>
        ';
        }


        $motherLanguagelists = $doc->getElementsByTagName("MotherTongue");
        if ($motherLanguagelists->length > 0) {

                if ($motherLanguagelists[0]->getElementsByTagName("Code")->item(0)) {
                    $mlcode  = $motherLanguagelists[0]->getElementsByTagName("Code")->item(0)->nodeValue;
                } else {$mlcode = NULL;}
                $mllabel = $motherLanguagelists[0]->getElementsByTagName("Label")->item(0)->nodeValue;

                #Load Mother Language in the form
                if ($mllabel != NULL) {

                    echo '
                    <div class="form-group col-sm-6">
                        <input type="text" placeholder="Mother Language" class="input-email form-control" name="motherlanguage" value="'.$mllabel.'">
                    </div>
                    ';
            }
        }else{
            echo '
            <div class="form-group col-sm-6">
                <input type="text" placeholder="Mother Language" class="input-email form-control" name="motherlanguage">
            </div>
            ';
        }

        if ($label != NULL)			{echo
            '<div class="form-group col-sm-4">
                <select name="country" class="countries order-alpha" id="countryId" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="">Select Country</option>
                    <option hidden value="'.$label.'" selected>'.$label.'</option>
                </select>
            </div>';
        }else{echo
            '<div class="form-group col-sm-4">
                <select name="country" class="countries order-alpha" id="countryId" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="">Select Country</option>
                </select>
            </div>';
        }

        if ($municipality != NULL)	{echo '
            <div class="form-group col-sm-4">
                <select name="city" class="states order-pop" id="stateId" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="">Select City</option>
                    <option hidden value="'.$municipality.'" selected>'.$municipality.'</option>
                </select>
            </div>';}else{ echo '
                <div class="form-group col-sm-4">
                <select name="city" class="states order-pop" id="stateId" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="">Select City</option>
                </select>
            </div>';
            }

        if ($postalCode != NULL)	{$posta = $postalCode;}
        else {$posta = "";}

        if ($addressLine != NULL)	{echo '
            <div class="form-group col-sm-4">
                <input type="text" placeholder="Address" class="input-email form-control" name="address" value="'.$addressLine.' '.$posta.'">
            </div>';
        }else{
            echo '
            <div class="form-group col-sm-4">
                <input type="text" placeholder="Address" class="input-email form-control" name="address">
            </div>';
        }
    }

#Load the data of the third step, included in the skills and competences

$communicList = $doc->getElementsByTagName("Communication");
if ($communicList->length > 0) {
    $social         = trim($communicList->item(0)->nodeValue);
    if ($social != NULL){
        $social = html_entity_decode($social, ENT_QUOTES, 'UTF-8');
        echo '
        <div class="form-group col-sm-12">
        <small>Social Skills</small>

            <textarea placeholder="Social Skills" class="input-text form-control" name="social_skills">'.preg_replace([
                '/<(?:br|p|li)[^>]*>/i', //replace br p with ' '
                '/<[^>]*>/',  //replace any tag with ''
                '/\s+/u', //remove run on space - replace using the unicode flag
                '/^\s+|\s+$/u' //trim - replace using the unicode flag
            ],[
                '&#13;&#10;', ' ', ' ', ''
            ], $social).'</textarea>
        </div>';}
        else{echo '
            <div class="form-group col-sm-12">
            <small>Social Skills</small>

                <textarea placeholder="Social Skills" class="input-text form-control" name="social_skills"></textarea>
            </div>';}
        }
        else{echo '
        <div class="form-group col-sm-12">
        <small>Social Skills</small>

            <textarea placeholder="Social Skills" class="input-text form-control" name="social_skills"></textarea>
        </div>';}

$organisList = $doc->getElementsByTagName("Organisational");
if ($organisList->length > 0) {
    $organisational = trim($organisList->item(0)->nodeValue);
    if ($organisational != NULL)	{
        $organisational = html_entity_decode($organisational, ENT_QUOTES, 'UTF-8');
        echo '
        <div class="form-group col-sm-12">
        <small>Organisational Skills</small>

            <textarea placeholder="Organisational Skills" class="input-text form-control" name="organisational_skills">'.preg_replace([
                '/<(?:br|p|li)[^>]*>/i', //replace br p with ' '
                '/<[^>]*>/',  //replace any tag with ''
                '/\s+/u', //remove run on space - replace using the unicode flag
                '/^\s+|\s+$/u' //trim - replace using the unicode flag
            ],[
                '&#13;&#10;', ' ', ' ', ''
            ], $organisational).'</textarea>
        </div>';}else{echo '
            <div class="form-group col-sm-12">
            <small>Organisational Skills</small>

                <textarea placeholder="Organisational Skills" class="input-text form-control" name="organisational_skills"></textarea>
            </div>';}
}
else{echo '
    <div class="form-group col-sm-12">
    <small>Organisational Skills</small>

        <textarea placeholder="Organisational Skills" class="input-text form-control" name="organisational_skills"></textarea>
    </div>';}


$jobRelList = $doc->getElementsByTagName("JobRelated");
if ($jobRelList->length > 0) {
    $jobRelated         = trim($jobRelList->item(0)->nodeValue);
    if ($jobRelated != NULL)			{

        $jobRelated = html_entity_decode($jobRelated, ENT_QUOTES, 'UTF-8');
        echo '
        <div class="form-group col-sm-12">
        <small>Job Related Skills</small>

            <textarea placeholder="Job Related Skills" class="input-text form-control" name="jobrelated_skills">'.preg_replace([
                '/<(?:br|p|li)[^>]*>/i', //replace br p with ' '
                '/<[^>]*>/',  //replace any tag with ''
                '/\s+/u', //remove run on space - replace using the unicode flag
                '/^\s+|\s+$/u' //trim - replace using the unicode flag
            ],[
                '&#13;&#10;', ' ', ' ', ''
            ], $jobRelated).'</textarea>
        </div>';}else{echo '
            <div class="form-group col-sm-12">
            <small>Job Related Skills</small>

                <textarea placeholder="Job Related Skills" class="input-text form-control" name="jobrelated_skills"></textarea>
            </div>';}
        }else{echo '
            <div class="form-group col-sm-12">
            <small>Job Related Skills</small>

                <textarea placeholder="Job Related Skills" class="input-text form-control" name="jobrelated_skills"></textarea>
            </div>';}


$computerList = $doc->getElementsByTagName("Computer");
if ($computerList->length > 0) {
    $computer         = trim($computerList->item(0)->nodeValue);
    if ($computer != NULL)			{
        $computer = html_entity_decode($computer, ENT_QUOTES, 'UTF-8');
        echo '
        <div class="form-group col-sm-12">
        <small>Computer Skills</small>

            <textarea placeholder="Computer Skills" class="input-text form-control" name="computer_skills">'.preg_replace([
                '/<(?:br|p|li)[^>]*>/i', //replace br p with ' '
                '/<[^>]*>/',  //replace any tag with ''
                '/\s+/u', //remove run on space - replace using the unicode flag
                '/^\s+|\s+$/u' //trim - replace using the unicode flag
            ],[
                '&#13;&#10;', ' ', ' ', ''
            ], $computer).'</textarea>
        </div>';}else{
            echo '
            <div class="form-group col-sm-12">
            <small>Computer Skills</small>

                <textarea placeholder="Computer Skills" class="input-text form-control" name="computer_skills"></textarea>
            </div>';
        }
}else{
    echo '
    <div class="form-group col-sm-12">
    <small>Computer Skills</small>

        <textarea placeholder="Computer Skills" class="input-text form-control" name="computer_skills"></textarea>
    </div>';
}

echo '
</div>
</div>
<div class="col-sm-12 form-block">
    <br>
    <h4>Work Experience</h4>
        <div class="form-group col-sm-12">
            <hr>
        </div>
        ';


#Load the data of the third step, included in the <workexperiencelist> tag.
$workexperiencelist = $doc->getElementsByTagName("WorkExperience");
if ($workexperiencelist->length > 0){
    echo '<div id="workexp">';
foreach ($workexperiencelist as $workexperience) {
    echo '<div class="row">
            <span id="lol" onclick="removeparent(this)" class="xlart">X</span>
            <div class="form-group col-sm-2">
            <small>Start Date</small>
            ';

    $froms = $workexperience->getElementsByTagName("From");
    if ($froms->length <1) { $fyear = NULL; $fmonth = NULL; $fday = NULL;}
    foreach ($froms as $from) {
        if ($from->getAttribute('year')) { $fyear = $from->getAttribute('year');}
        else {$fyear = NULL;}
        if ($from->getAttribute('month')) { $fmonth = trim($from->getAttribute('month'),'-');}
        else {$fmonth = "01";}
        if ($from->getAttribute('day')) { $fday = trim($from->getAttribute('day'), '-');}
        else {$fday = "01";}
    }
    echo '<input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="work_startdate[]" value="'.$fyear.'-'.$fmonth.'-'.$fday.'">
    </div>
    <div class="form-group col-sm-2">
        <small>End Date</small>';
    $tos = $workexperience->getElementsByTagName("To");
    if ($tos->length <1 ) {$tyear = NULL; $tmonth = NULL; $tday = NULL;}
    foreach ($tos as $to) {
        if ($to->getAttribute('year')) { $tyear = $to->getAttribute('year');}
        else {$tyear = NULL;}
        if ($to->getAttribute('month')) { $tmonth = trim($to->getAttribute('month'),'-');}
        else {$tmonth = "01";}
        if ($to->getAttribute('day')) { $tday = trim($to->getAttribute('day'), '-');}
        else {$tday = "01";}
    }
    echo '
    <input type="date" class="input-email form-control" name="work_enddate[]" value="'.$tyear.'-'.$tmonth.'-'.$tday.'">
    </div>
    <div class="form-group col-sm-3">
        <small>Position</small>
        ';

    $positions = $workexperience->getElementsByTagName("Position");
    $plabel = NULL;
    foreach ($positions as $position) {
        if($position->getElementsByTagName("Label")->item(0)) {
            $plabel = $position->getElementsByTagName("Label")->item(0)->nodeValue;
        } else {$plabel = NULL;}
    }
    echo '
    <input type="text" required="required" placeholder="Title" class="input-name form-control" name="position[]" value="'.$plabel.'">
    </div>
    ';
    if ($workexperience->getElementsByTagName("Name")->item(0)) {
        $wname = $workexperience->getElementsByTagName("Name")->item(0)->nodeValue;
    } else {$wname = "";}
    echo '
    <div class="form-group col-sm-5">
        <small>Employer</small>
        <input type="text" required="required" placeholder="Company\'s / Office\'s Name" class="input-name form-control" name="employer[]" value="'.$wname.'">
    </div>
    ';

    if ($workexperience->getElementsByTagName("Municipality")->item(0)) {
        $wcity = $workexperience->getElementsByTagName("Municipality")->item(0)->nodeValue;
    } else {$wcity = "";}

    echo '<div class="form-group col-sm-6">
            <input type="text" placeholder="Employer\'s City" class="input-email form-control" name="employer_city[]" value="'.$wcity.'">
          </div>';

          $countries = $workexperience->getElementsByTagName("Country");
    if ($countries->length <1 ) {$weccode = NULL; $weclabel = NULL;}
    $weclabel = NULL;
    foreach ($countries as $country) {
        if($country->getElementsByTagName("Label")->item(0)) {
            $weclabel = $country->getElementsByTagName("Label")->item(0)->nodeValue;
        } else {$weclabel = "";}
    }

    echo '<div class="form-group col-sm-6">
                <input type="text" placeholder="Employer\'s Country" class="input-email form-control" name="employer_country[]" value="'.$weclabel.'">
            </div>';

    if ($workexperience->getElementsByTagName("Activities")->item(0)) {
        $wactivities = $workexperience->getElementsByTagName("Activities")->item(0)->nodeValue;
        $wactivities = html_entity_decode($wactivities, ENT_QUOTES, 'UTF-8');

    } else {$wactivities = "";}

    echo '<div class="form-group col-sm-12">
            <textarea placeholder="Activities / Responsibilities" class="input-text form-control" name="activities[]">'.preg_replace([
                '/<(?:br|p|li)[^>]*>/i', //replace br p with ' '
                '/<[^>]*>/',  //replace any tag with ''
                '/\s+/u', //remove run on space - replace using the unicode flag
                '/^\s+|\s+$/u' //trim - replace using the unicode flag
            ],[
                '&#13;&#10;', ' ', ' ', ''
            ], $wactivities).'</textarea>
        </div>
        <div class="form-group col-sm-12">
        <hr>
    </div>
</div>
';
}
echo '</div>
<div class="form-group col-sm-12">
<button type="button" onclick="addwork()">Add Work Experience</button>
</div>
<div class="col-sm-12 form-block">
<br>

<h4>Education History</h4>
    <div class="form-group col-sm-12">
        <hr>
    </div>
';

}else{
    echo '
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
            <input type="text" required="required" placeholder="Company\'s / Office\'s Name" class="input-name form-control" name="employer[]">
        </div>
        <div class="form-group col-sm-6">
            <input type="text" placeholder="Employer\'s City" class="input-email form-control" name="employer_city[]">
        </div>
        <div class="form-group col-sm-6">
            <input type="text" placeholder="Employer\'s Country" class="input-email form-control" name="employer_country[]">
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
';
}


#Load the data of the third step, included in the <Education> tag.
$educationlist = $doc->getElementsByTagName("Education");
if ($educationlist->length > 0){
    echo '<div id="eduhis">';

foreach ($educationlist as $education) {

    $efroms = $education->getElementsByTagName("From");
    if ($efroms->length <1) { $efyear = NULL; $efmonth = NULL; $efday = NULL;}
    foreach ($efroms as $efrom) {
        if ($efrom->getAttribute('year')) { $efyear = $efrom->getAttribute('year');}
        else {$efyear = NULL;}
        if ($efrom->getAttribute('month')) { $efmonth = trim($efrom->getAttribute('month'),'-');}
        else {$efmonth = "01";}
        if ($efrom->getAttribute('day')) { $efday = trim($efrom->getAttribute('day'), '-');}
        else {$efday = "01";}
    }

    echo '
    <div class="row">
    <span id="lol" onclick="removeparent(this)" class="xlart">X</span>
    <div class="form-group col-sm-2">
            <small>Start Date</small>
            <input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="edu_startdate[]" value="'.$efyear.'-'.$efmonth.'-'.$efday.'">
           </div>';


    $etos = $education->getElementsByTagName("To");
    if ($etos->length <1) { $etyear = NULL; $etmonth = NULL; $etday = NULL;}
    foreach ($etos as $eto) {
        if ($eto->getAttribute('year')) { $etyear = $eto->getAttribute('year');}
        else {$etyear = NULL;}
        if ($eto->getAttribute('month')) { $etmonth = trim($eto->getAttribute('month'),'-');}
        else {$etmonth = "01";}
        if ($eto->getAttribute('day')) { $etday = trim($eto->getAttribute('day'), '-');}
        else {$etday = "01";}
    }

    echo '<div class="form-group col-sm-2">
            <small>End Date</small>
            <input type="date" class="input-email form-control" name="edu_enddate[]" value="'.$etday.'-'.$etmonth.'-'.$etyear.'">
        </div>';

    if ($education->getElementsByTagName("Title")->item(0)) {
        $title = $education->getElementsByTagName("Title")->item(0)->nodeValue;
    } else {$title = "";}

    echo '<div class="form-group col-sm-3">
            <small>Academic Degree</small>
            <input type="text" required="required" placeholder="Title" class="input-name form-control" name="title[]" value="'.$title.'">
        </div>';

    if ($education->getElementsByTagName("Name")->item(0)) {
        $ename = $education->getElementsByTagName("Name")->item(0)->nodeValue;
    } else {$ename = "";}

    echo '<div class="form-group col-sm-5">
            <small>Academic Institution</small>
            <input type="text" required="required" placeholder="Institution\'s Name" class="input-name form-control" name="org_name[]" value="'.$ename.'">
        </div>';

    if ($education->getElementsByTagName("Municipality")->item(0)) {
        $ecity = $education->getElementsByTagName("Municipality")->item(0)->nodeValue;
    } else {$ecity = "";}

    echo'
    <div class="form-group col-sm-6">
        <input type="text" placeholder="Institution\'s City" class="input-email form-control" name="org_city[]" value="'.$ecity.'">
    </div>
    ';

    $ecountries = $education->getElementsByTagName("Country");
    $educlabel = NULL;
    foreach ($ecountries as $ecountry) {
        if($ecountry->getElementsByTagName("Label")->item(0)) {
            $educlabel = $ecountry->getElementsByTagName("Label")->item(0)->nodeValue;
        } else {$educlabel = "";}
    }

    echo '<div class="form-group col-sm-6">
            <input type="text" placeholder="Institution\'s Country" class="input-email form-control" name="org_country[]" value="'.$educlabel.'">
        </div>';

    echo '<div class="form-group col-sm-12">
        <hr>
    </div>
    </div>

    ';
}

echo '</div>
</div>

<div class="form-group col-sm-12">
        <button type="button" onclick="addedu()">Add Education</button>
</div>
';

}else{
echo '
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
        <input type="text" required="required" placeholder="Institution\'s Name" class="input-name form-control" name="org_name[]">
    </div>
    <div class="form-group col-sm-6">
        <input type="text" placeholder="Institution\'s City" class="input-email form-control" name="org_city[]">
    </div>
    <div class="form-group col-sm-6">
        <input type="text" placeholder="Institution\'s Country" class="input-email form-control" name="org_country[]">
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
';
}

#Languages step
echo '
<div class="col-sm-12 form-block">
<br>
<h4>Languages</h4>
    <div class="form-group col-sm-12">
        <hr>
    </div>
';


$foreignLanguagelists = $doc->getElementsByTagName("ForeignLanguage");
if ($foreignLanguagelists->length > 0) {
    echo '<div id="langu">';
foreach ($foreignLanguagelists as $language) {
    echo '<div class="row">
    <span id="lol" onclick="removeparent(this)" class="xlart">X</span>';

    if ($language->getElementsByTagName("Label") && $language->getElementsByTagName("Label")->item(0)) {
        $fllabel            = $language->getElementsByTagName("Label")->item(0)->nodeValue;
        echo '<div class="form-group col-sm-7">
                <small>Language</small>
                <input type="text" required="required" placeholder="Language" class="input-name form-control" name="language[]" value="'.$fllabel.'">
            </div>';

    }else {echo '<div class="form-group col-sm-7">
                <small>Language</small>
                <input type="text" required="required" placeholder="Language" class="input-name form-control" name="language[]">
            </div>';}

    if ($language->getElementsByTagName("Listening") && $language->getElementsByTagName("Listening")->item(0)) {
        $listening          = $language->getElementsByTagName("Listening")->item(0)->nodeValue;
        echo '<div class="form-group col-sm-1">
        <small>Listening</small>
        <select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;">';
            if ($listening == 'A1')  echo '<option value="A1" selected>A1</option>';
            else echo '<option value="A1">A1</option>';
            if ($listening == 'A2')  echo '<option value="A2" selected>A2</option>';
            else echo '<option value="A2">A2</option>';
            if ($listening == 'B1')  echo '<option value="B1" selected>B1</option>';
            else echo '<option value="B1">B1</option>';
            if ($listening == 'B2')  echo '<option value="B2" selected>B2</option>';
            else echo '<option value="B2">B2</option>';
            if ($listening == 'C1')  echo '<option value="C1" selected>C1</option>';
            else echo '<option value="C1">C1</option>';
            if ($listening == 'C2')  echo '<option value="C2" selected>C2</option>';
            else echo '<option value="C2">C2</option>';
            echo '</select>
        </div>';
    }
    else {
        echo '<div class="form-group col-sm-1">
        <small>Listening</small>
        <select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;">
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
            </select>
        </div>';
    }
    if ($language->getElementsByTagName("Reading") && $language->getElementsByTagName("Reading")->item(0)) {
        $reading            = $language->getElementsByTagName("Reading")->item(0)->nodeValue;
        echo '<div class="form-group col-sm-1">
            <small>Reading</small>
            <select name="reading[]" style="width: 100%; border-radius: 0; height: 40px;">';
            if ($reading == 'A1')  echo '<option value="A1" selected>A1</option>';
            else echo '<option value="A1">A1</option>';
            if ($reading == 'A2')  echo '<option value="A2" selected>A2</option>';
            else echo '<option value="A2">A2</option>';
            if ($reading == 'B1')  echo '<option value="B1" selected>B1</option>';
            else echo '<option value="B1">B1</option>';
            if ($reading == 'B2')  echo '<option value="B2" selected>B2</option>';
            else echo '<option value="B2">B2</option>';
            if ($reading == 'C1')  echo '<option value="C1" selected>C1</option>';
            else echo '<option value="C1">C1</option>';
            if ($reading == 'C2')  echo '<option value="C2" selected>C2</option>';
            else echo '<option value="C2">C2</option>';
            echo '</select>
            </div>';
    }
    else {
        echo '<div class="form-group col-sm-1">
                <small>Reading</small>
                <select name="reading[]" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
            </div>';
    }
    if ($language->getElementsByTagName("SpokenInteraction") && $language->getElementsByTagName("SpokenInteraction")->item(0)) {
        $spokeninteraction  = $language->getElementsByTagName("SpokenInteraction")->item(0)->nodeValue;
        echo '<div class="form-group col-sm-1">
                <small class="icikmeshumemajtas">Spoken&nbsp;Interaction</small>
                <select name="spoken_interaction[]" style="width: 100%; border-radius: 0; height: 40px;">';
                    if ($spokeninteraction == 'A1')  echo '<option value="A1" selected>A1</option>';
                    else echo '<option value="A1">A1</option>';
                    if ($spokeninteraction == 'A2')  echo '<option value="A2" selected>A2</option>';
                    else echo '<option value="A2">A2</option>';
                    if ($spokeninteraction == 'B1')  echo '<option value="B1" selected>B1</option>';
                    else echo '<option value="B1">B1</option>';
                    if ($spokeninteraction == 'B2')  echo '<option value="B2" selected>B2</option>';
                    else echo '<option value="B2">B2</option>';
                    if ($spokeninteraction == 'C1')  echo '<option value="C1" selected>C1</option>';
                    else echo '<option value="C1">C1</option>';
                    if ($spokeninteraction == 'C2')  echo '<option value="C2" selected>C2</option>';
                    else echo '<option value="C2">C2</option>';
                echo '</select>
                </div>';
        }
    else {
        echo '<div class="form-group col-sm-1">
                <small class="icikmeshumemajtas">Spoken&nbsp;Interaction</small>
                <select name="spoken_interaction[]" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
            </div>';
    }
    if ($language->getElementsByTagName("SpokenProduction") && $language->getElementsByTagName("SpokenProduction")->item(0)) {
        $spokenproduction   = $language->getElementsByTagName("SpokenProduction")->item(0)->nodeValue;
            echo '<div class="form-group col-sm-1">
                <small class="icikmajtas">Spoken&nbsp;Production</small>
                <select name="spoken_production[]" style="width: 100%; border-radius: 0; height: 40px;">';
                if ($spokenproduction == 'A1')  echo '<option value="A1" selected>A1</option>';
                else echo '<option value="A1">A1</option>';
                if ($spokenproduction == 'A2')  echo '<option value="A2" selected>A2</option>';
                else echo '<option value="A2">A2</option>';
                if ($spokenproduction == 'B1')  echo '<option value="B1" selected>B1</option>';
                else echo '<option value="B1">B1</option>';
                if ($spokenproduction == 'B2')  echo '<option value="B2" selected>B2</option>';
                else echo '<option value="B2">B2</option>';
                if ($spokenproduction == 'C1')  echo '<option value="C1" selected>C1</option>';
                else echo '<option value="C1">C1</option>';
                if ($spokenproduction == 'C2')  echo '<option value="C2" selected>C2</option>';
                else echo '<option value="C2">C2</option>';
            echo ' </select>
            </div>';
    }
    else {
        echo '<div class="form-group col-sm-1">
                <small class="icikmajtas">Spoken&nbsp;Production</small>
                <select name="spoken_production[]" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
            </div>';
    }
    if ($language->getElementsByTagName("Writing") && $language->getElementsByTagName("Writing")->item(0)) {
        $writing            = $language->getElementsByTagName("Writing")->item(0)->nodeValue;

        echo '<div class="form-group col-sm-1">
            <small>Writing</small>
            <select name="writing[]" style="width: 100%; border-radius: 0; height: 40px;">';
                if ($writing == 'A1')  echo '<option value="A1" selected>A1</option>';
                else echo '<option value="A1">A1</option>';
                if ($writing == 'A2')  echo '<option value="A2" selected>A2</option>';
                else echo '<option value="A2">A2</option>';
                if ($writing == 'B1')  echo '<option value="B1" selected>B1</option>';
                else echo '<option value="B1">B1</option>';
                if ($writing == 'B2')  echo '<option value="B2" selected>B2</option>';
                else echo '<option value="B2">B2</option>';
                if ($writing == 'C1')  echo '<option value="C1" selected>C1</option>';
                else echo '<option value="C1">C1</option>';
                if ($writing == 'C2')  echo '<option value="C2" selected>C2</option>';
                else echo '<option value="C2">C2</option>';
        echo ' </select>
            </div>';

    }
    else {
        echo '<div class="form-group col-sm-1">
                <small>Writing</small>
                <select name="writing[]" style="width: 100%; border-radius: 0; height: 40px;">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
            </div>';
    }

    echo '<div class="form-group col-sm-12">
    <hr>
    </div>
</div>
';
}
echo '</div>
</div>
<div class="form-group col-sm-12">
    <button type="button" onclick="addlang()">Add Language</button>
</div>';
}else{
echo '<div id="langu">
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
';
}

#Delete the uploaded file
unlink($xml);
echo '

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

<div class="form-group col-sm-12">
<p>By clicking on "Apply" you will be agreeing with company\'s <a href="/privacy-policy" target="_blank">privacy policies</a>.</p><br>
</div>

<div class="form-group col-sm-8">
    <input name="other_file" type="file">
</div>
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
    console.log("lol");
$(\'#workexp\').append(\'<div class="row"><span id="lol" onclick="removeparent(this)" class="xlart">X</span><div class="form-group col-sm-2"><small>Start Date</small><input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="work_startdate[]"></div><div class="form-group col-sm-2"><small>End Date</small><input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="End Date" class="input-email form-control" name="work_enddate[]"></div><div class="form-group col-sm-3"><small>Position</small><input type="text" required="required" placeholder="Title" class="input-name form-control" name="position[]"></div><div class="form-group col-sm-5"><small>Employer</small><input type="text" required="required" placeholder="Company&#039;s / Office&#039;s Name" class="input-name form-control" name="employer[]"></div><div class="form-group col-sm-6"><input type="text" placeholder="Employer&#039;s City" class="input-email form-control" name="employer_city[]"></div><div class="form-group col-sm-6"><input type="text" placeholder="Employer&#039;s Country" class="input-email form-control" name="employer_country[]"></div><div class="form-group col-sm-12"><textarea placeholder="Activities / Responsibilities" class="input-text form-control" name="activities[]"></textarea></div><div class="form-group col-sm-12"><hr></div></div>\');}

function addedu(){$(\'#eduhis\').append( \'<div class="row"><span id="lol" onclick="removeparent(this)" class="xlart">X</span><div class="form-group col-sm-2"><small>Start Date</small><input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="Start Date" class="input-email form-control" name="edu_startdate[]"></div><div class="form-group col-sm-2"><small>End Date</small><input type="date" required="required" pattern="\d{4}-\d{2}-\d{2}" placeholder="End Date" class="input-email form-control" name="edu_enddate[]"></div><div class="form-group col-sm-3"><small>Academic Degree</small><input type="text" required="required" placeholder="Title" class="input-name form-control" name="title[]"></div><div class="form-group col-sm-5"><small>Academic Institution</small><input type="text" required="required" placeholder="Institution&#039;s Name" class="input-name form-control" name="org_name[]"></div><div class="form-group col-sm-6"><input type="text" required="required" placeholder="Institution&#039;s City" class="input-email form-control" name="org_city[]"></div><div class="form-group col-sm-6"><input type="text" required="required" placeholder="Institution&#039;s Country" class="input-email form-control" name="org_country[]"></div><div class="form-group col-sm-12"><hr></div></div>\');}

function addlang(){$(\'#langu\').append( \'<div class="row"><span id="lol" onclick="removeparent(this)" class="xlart">X</span><div class="form-group col-sm-7"><small>Language</small><input type="text" required="required" placeholder="Language" class="input-name form-control" name="language[]"></div><div class="form-group col-sm-1"><small>Listening</small><select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small>Reading</small><select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small class="icikmeshumemajtas">Spoken&nbsp;Interaction</small><select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small class="icikmajtas">Spoken&nbsp;Production</small><select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-1"><small>Writing</small><select name="listening[]" style="width: 100%; border-radius: 0; height: 40px;"><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select></div><div class="form-group col-sm-12"><hr></div></div>\')}

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
?>
