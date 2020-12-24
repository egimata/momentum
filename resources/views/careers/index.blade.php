@extends('layouts.main')

@section('content')


    <!--BreadCrumb-->
    <section id="breadcrumb" class="overlay three">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 page-heading">
                    <h3>Careers</h3>
                </div>
                <div class="col-sm-6 breadcrumb-block text-right">
                    <ol class="breadcrumb">
                        <li><a href="/">{{__('custom.home-menu')}}</a></li>
                        <li class="active">{{__('custom.careers-menu')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--about-->
    <section id="about" class="one space">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h3>{{__('custom.careers-menu')}}</h3>
            </div>
            <div class="col-sm-12" style="margin-bottom: 100px;">
                <p><strong>Our company is expanding and we are happy to see you in our team!</strong></br>
                Please take a look at our advantages and benefits. Also check the list of vacancies in our company. Recruitment has been the personnel department. We are looking for both professionals and are willing to offer a job to students and young professionals. When employment in our company you get the full package of documents.</p>
                <p>If you are from another country, we have to find a job using the H1B visa workers, J1, H2B, O1, L1, S1D, H2A, E2.</p>
                <p>Our lawyers will help you to draw up the documents and obtain all necessary permits to obtain a work visa. We provide advice on the list of necessary documents, taking into account the type of visa and the individual characteristics of the client.</p>
                <p>HR department is always concerned about the development of our team members. Depending on in which a branch of our company you will work, we will offer several options for software. Be prepared for a pleasant surprise! It is very important that you have worked in a high comfort.</p>
                <p><strong>Checking the completeness of the whole package of documents issued.</strong></p>
            </div>


            @if (count($careers) >0)
            <div class="col-sm-12 main-heading text-center">
                <h3>Job list</h3>
            </div>
            @foreach($careers as $career)
            <div class="row">
                <div class="col-sm-9 about-block border-left">
                    <blockquote style="padding: 0px 20px"><h2 style="margin-top: 0px;">{{$career->position}}</h2>
                    </blockquote>
                </div>
                <div class="about-block col-sm-3">
                    <a href="/careers/{{$career->id}}" class="btn-style-two">Apply now</a>
                </div>
            </div>
            <hr style="margin-top: 10px; margin-bottom: 25px">
            @endforeach
            @endif
        </div>
    </section>

    <!--newsletter
    <section id="newsletter" class="space">
        <div class="container">
            <div class="col-sm-12 main-heading-2 text-center newstitle">
                <h5>{{__('custom.stay-updatepos')}}</h5>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center newsletter-block">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-MAIL">
                        </div>
                        <button type="submit">{{__('custom.subscribe')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    -->

    @endsection
