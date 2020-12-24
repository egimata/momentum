@extends('layouts.home')

@section('content')

            <!--Banner-->
            <video autoplay="" muted="" loop="" id="myVideo" style="
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            top: 0;
            max-width: 100%;
            max-height: 100%;
        ">
        <source src="akademia.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>    </section>
    <!--Services-->
    <section id="services" class="space one">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h3>{{__('custom.our-services')}}</h3>
            </div>
            <div class="row">
                <div class="col-sm-12 no-padding service-base">
                    {!!__('custom.services')!!}
            </div>
        </div>
    </section>
    <!--action-->
    <section id="action" class="one space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 action-base no-padding">
                    <div class="col-sm-6 action-block center sppb-wow fadeInLeft">
                        <div class="inner">
                            {!!__('custom.stay-ahead')!!}
                        </div>
                    </div>
                    <div class="col-sm-6 action-block sppb-wow fadeInRight" data-sppb-wow-delay="100ms">
                        <img src="images/with-us.jpg" alt="Brand">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--feature-->
    <section id="feature" class="one">
        {!!__('custom.feature')!!}
    </section>
    <!--Why Choose Us-->
    <section id="choose" class="space">
        {!!__('custom.why-us')!!}
    </section>
    <!--counter-->
    <section id="counter" class="space" data-stellar-background-ratio="0.6">
        <div class="container">
            {!!__('custom.some-data')!!}
        </div>
    </section>
    <!--Portfolio-->
    @if(count($projects) > 0)

    <section id="portfolio" class="space one">
        <div class="container">
            <div class="row">
                <div id="sp-simpleportfolio" class="sp-simpleportfolio sp-simpleportfolio-view-items layout-gallery-space">
                    <div class="sp-simpleportfolio-filter">
                        <ul>
                            <li class="active" data-group="all"><a href="#">{{__('custom.filter-showall')}}</a></li>
                            <li data-group="design-marketing"><a href="#">{{__('custom.filter-design-marketing')}}</a></li>
                            <li data-group="events"><a href="#">{{__('custom.filter-events')}}</a></li>
                            <li data-group="branding"><a href="#">{{__('custom.filter-branding')}}</a></li>
                        </ul>
                    </div>
                    <div class="sp-simpleportfolio-items sp-simpleportfolio-columns-3">

                    @foreach ($projects as $project)

                        <div class="sp-simpleportfolio-item" data-groups='[{{$project->filters}}]'>
                            <div class="sp-simpleportfolio-overlay-wrapper clearfix">
                                @if ($lang == 'al')
                                <img class="sp-simpleportfolio-img" src="/storage/cover_images/{{$project->photo}}" alt="{{$project->titlealb}}">
                                @elseif ($lang == 'en')
                                <img class="sp-simpleportfolio-img" src="/storage/cover_images/{{$project->photo}}" alt="{{$project->titlen}}">
                                @elseif ($lang == 'it')
                                <img class="sp-simpleportfolio-img" src="/storage/cover_images/{{$project->photo}}" alt="{{$project->titleit}}">
                                @endif
                                <div class="sp-simpleportfolio-overlay">
                                    <div class="sp-vertical-middle">
                                        <div>
                                            <div class="sp-simpleportfolio-btns">
                                                <a class="btn-view" href="/projects/{{$project->slug}}">View</a>
                                            </div>
                                            <h3 class="sp-simpleportfolio-title">
                                                @if ($lang == 'al')
                                                <a href="/projects/{{$project->slug}}"> {{$project->titlealb}} </a>
                                                @elseif ($lang == 'en')
                                                <a href="/projects/{{$project->slug}}"> {{$project->titlen}} </a>
                                                @elseif ($lang == 'it')
                                                <a href="/projects/{{$project->slug}}"> {{$project->titleit}} </a>
                                                @endif
                                        </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 no-padding button text-center">
                    <a href="/projects">{{__('custom.see-all')}} <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    @endif

        <!--Brands-->
        <section id="brands" class="space">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 brand-block text-center">
                        <a href="#"><img src="images/140x95-1.png" alt="Brands"></a>
                    </div>
                    <div class="col-sm-2 brand-block text-center">
                        <a href="#"><img src="images/140x95-2.png" alt="Brands"></a>
                    </div>
                    <div class="col-sm-2 brand-block text-center">
                        <a href="#"><img src="images/140x95-3.png" alt="Brands"></a>
                    </div>
                    <div class="col-sm-2 brand-block text-center">
                        <a href="#"><img src="images/140x95-4.png" alt="Brands"></a>
                    </div>
                    <div class="col-sm-2 brand-block text-center">
                        <a href="#"><img src="images/140x95-5.png" alt="Brands"></a>
                    </div>
                    <div class="col-sm-2 brand-block text-center">
                        <a href="#"><img src="images/140x95-6.png" alt="Brands"></a>
                    </div>
                </div>
            </div>
        </section>

    <!--Testimonial-->
    <section id="testimonial" class="space overlay" data-stellar-background-ratio="0.6">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h4>{{__('custom.testimonial')}}</h4>
            </div>
            <div class="row">
                <div class="col-sm-12 testimonial-base no-padding text-center">
                    <div id="testi-slider" class="owl-carousel owl-theme">
                        <div class="item">
                            {!!__('custom.testimonial-first')!!}
                            <div class="name">-- Sidorela Gjoka </div>
                            <img src="images/sign1.png" alt="Signature">
                        </div>
                        <div class="item">
                            {!!__('custom.testimonial-second')!!}
                            <div class="name">-- Arben Bajraktari</div>
                            <img src="images/sign2.png" alt="Signature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!--price plans-->
        <section class="price-plans space" id="packages">
            <div class="container">
                <!--main heading-->
                <div class="col-sm-12 main-heading text-center">
                    <h4>{{__('custom.join-momentum')}}</h4>
                </div>
                    {!!__('custom.packages-single')!!}
                </div>
        </section>

    <!--Action 3-->
    <section id="action-3" class="space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 action-base no-padding">
                    <div class="col-sm-6 action-block sppb-wow fadeInLeft">
                        <img src="images/image-1.png" alt="Brands">
                    </div>
                    <div class="col-sm-6 action-block padding-left center sppb-wow fadeInRight">
                        <div class="inner">
                            <h4>{{__('custom.about-heading')}}</h4>
                            {!!__('custom.about-section')!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($blogs) > 0)

    <!--Blog-->
    <section id="blog" class="space border-bottom one">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h4>Blog</h4>
            </div>
            <div class="row">

                @foreach($blogs as $blog)

                @if($lang == 'al')

                <?php
                $metadesc = strip_tags($blog->descriptionalb);
                $description = substr($metadesc, 0, 150);
                $description = $description.'...';
                ?>

                <div class="col-sm-4 blog-block">
                    <div class="blog-image">
                        <img src="/storage/cover_images/{{$blog->photo}}" alt="Blog">
                        <div class="date">{{$blog->created_at}}</div>
                    </div>
                    <div class="blog-info">
                        <h5><a href="/blogs/{{$blog->slug}}">{{$blog->titlealb}} </a> </h5>
                        <p>{!!$description!!}</p>
                        <a href="/blogs/{{$blog->slug}}" class="btn-services">more<i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>

                @elseif($lang == 'en')

                <?php
                $metadesc = strip_tags($blog->descriptionen);
                $description = substr($metadesc, 0, 150);
                $description = $description.'...';
                ?>

                <div class="col-sm-4 blog-block">
                    <div class="blog-image">
                        <img src="/storage/cover_images/{{$blog->photo}}" alt="Blog">
                        <div class="date">{{$blog->created_at}}</div>
                    </div>
                    <div class="blog-info">
                        <h5><a href="/blogs/{{$blog->slug}}">{{$blog->titlen}} </a> </h5>
                        <p>{!!$description!!}</p>
                        <a href="/blogs/{{$blog->slug}}" class="btn-services">more<i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>


                @elseif($lang == 'it')

                <?php
                $metadesc = strip_tags($blog->descriptionen);
                $description = substr($metadesc, 0, 150);
                $description = $description.'...';
                ?>

                <div class="col-sm-4 blog-block">
                    <div class="blog-image">
                        <img src="/storage/cover_images/{{$blog->photo}}" alt="Blog">
                        <div class="date">{{$blog->created_at}}</div>
                    </div>
                    <div class="blog-info">
                        <h5><a href="/blogs/{{$blog->slug}}">{{$blog->titleit}} </a> </h5>
                        <p>{!!$description!!}</p>
                        <a href="/blogs/{{$blog->slug}}" class="btn-services">more<i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>


                @endif
                @endforeach

            </div>
        </div>
    </section>
    @endif
    <!--newsletter-->
    <section id="newsletter" class="space">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading-2 text-center newstitle">
                <h5>{{__('custom.stay-updated')}}</h5>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center newsletter-block">
                    {!! Form::open(['action' => 'HomeController@subscribstore', 'class'
                    => 'sppb-ajaxt-contact-form', 'method' => 'POST']) !!}
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-MAIL">
                        </div>
                        {{Form::submit(Lang::get('custom.subscribe'), ['class' => 'btn-style-two contact-btn', 'type' => 'submit', 'name' => 'submit'] )}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>


@endsection
