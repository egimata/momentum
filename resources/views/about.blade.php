
@extends('layouts.main')

@section('content')
    <!--BreadCrumb-->
    <section id="breadcrumb" class="overlay three">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 page-heading">
                    <h3>About us</h3>
                </div>
                <div class="col-sm-6 breadcrumb-block text-right">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">About us</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <!--about-->
    <section id="about" class="one space">
        <div class="container">
            <div class="col-sm-12 text-center main-heading">
                <h4>{{__('custom.about-heading')}}</h4>
            </div>
            <div class="row">
                <div class="col-sm-12 about-block border-left">
                    {!!__('custom.about-section')!!}
                </div>
            </div>
        </div>
    </section>
    <!--Our Team-->
    <section class=" team space-bottom">
        <div class="container">
            <!--Main Heading-->
            <div class="col-sm-12 text-center main-heading">
                <h4>{{__('custom.our-team')}}</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 team-block text-center">
                    <div class="team-image president">
                    </div>
                    <div class="person-information">
                        <span class="person-name">Flladi Malaj</span>
                        <span class="person-designation">President</span>
                    </div>
                </div>
                <div class="col-sm-4 team-block text-center">
                    <div class="team-image chief-hr">
                    </div>
                    <div class="person-information">
                        <span class="person-name">Arisela Hebovija</span>
                        <span class="person-designation">{{__('custom.chief-hr')}}</span>
                    </div>
                </div>
                <div class="col-sm-4 team-block text-center">
                    <div class="team-image proj-coor">
                    </div>
                    <div class="person-information">
                        <span class="person-name proj-coor">Xhorxh Xhani</span>
                        <span class="person-designation">{{__('custom.proj-coor')}}</span>
                    </div>
                </div>
                <div class="col-sm-4 team-block text-center">
                    <div class="team-image cfo">
                    </div>
                    <div class="person-information">
                        <span class="person-name">Endrit Pupuleku</span>
                        <span class="person-designation">{{__('custom.cfo')}}</span>
                    </div>
                </div>
                <div class="col-sm-4 team-block text-center">
                    <div class="team-image exec-assist">
                    </div>
                    <div class="person-information exec-assist">
                        <span class="person-name">Arta Petaj</span>
                        <span class="person-designation">{{__('custom.exec-assis')}}</span>
                    </div>
                </div>
                <div class="col-sm-4 team-block text-center">
                    <div class="team-image our-staff">
                    </div>
                    <div class="person-information">
                        <span class="person-name">{{__('custom.our-staff')}}</span>
                        <span class="person-designation">{{__('custom.bunch')}}</span>
                    </div>
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

    <!--Contact Form-->
    <section id="contact-form" class="space">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h4>{{__('custom.contact-us')}}</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 address">
                    <div class="address-block">
                        <div class="icon center">
                            <i class="fa fa-map-o"></i>
                        </div>
                        <div class="address-info">
                            <h5>{{__('custom.visit-us')}}</h5>
                            <a>Rruga Ibrahim Rugova | Tirana, Albania</a>
                        </div>
                    </div>
                    <div class="address-block">
                        <div class="icon center">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="address-info">
                            <h5>{{__('custom.email-us')}}</h5>
                            <a href="mailto:info@momentumo.com">info@momentumo.com</a>
                        </div>
                    </div>
                    <div class="address-block">
                        <div class="icon center">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="address-info">
                            <h5>{{__('custom.call-us')}}</h5>
                            <a href="tel:+355672040099">+(355) 67 20 400 99</a>
                        </div>
                    </div>
                    <div class="address-block">
                        <div class="icon center">
                            <i class="fa fa-bookmark-o"></i>
                        </div>
                        <div class="address-info">
                            <h5>{{__('custom.appointment-us')}}</h5>
                            <a href="tel:+355672040099">+(355) 67 20 400 99</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 form-block">
                    {!! Form::open(['action' => 'HomeController@store', 'class'
                    => 'sppb-ajaxt-contact-form', 'method' => 'POST']) !!}
                        <div class="form-group col-sm-6 padding-right">
                            <input type="text" required="required" placeholder="{{__('custom.your-name')}}" class="input-name form-control" name="name">
                        </div>
                        <div class="form-group col-sm-6 padding-left">
                            <input type="email" required="required" placeholder="{{__('custom.your-email')}}" class="input-email form-control" name="email">
                        </div>
                        <div class="form-group col-sm-12 no-padding">
                            <input type="text" required="required" placeholder="{{__('custom.your-about')}}" class="input-subject form-control" name="subject">
                        </div>
                        <div class="form-group col-sm-12 no-padding">
                            <textarea placeholder="{{__('custom.your-message')}}" class="input-text form-control" rows="5" name="comment"></textarea>
                        </div>
                        {{Form::submit(Lang::get('custom.your-send'), ['class' => 'btn-style-two contact-btn', 'type' => 'submit', 'name' => 'submit'] )}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <!--Map-->
    <section id="googlemap" style="height: 450px">
        <div class="container-fluid">
            <div class="row">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </section>

<!-- Google Map js -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeOL-nZTPWGVHM5mKH4V4-xZ75galGtK0&callback=initMap">
</script>
<script>
function initMap() {
  var mapOptions = {
    zoom: 15,
    scrollwheel: false,
    center: new google.maps.LatLng(41.313555389599586, 19.802536737970442)
  };
  var map = new google.maps.Map(document.getElementById('googlemap'),
      mapOptions);
  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map
  });
}
/*END GOOGLE MAP*/
</script>


@endsection
