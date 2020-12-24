<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<div style="background-color: black; text-align: center">
<a href="https://momentumo.com/" target="_blank"><img src="https://momentumo.com/logo-momentum.png" style="padding-top: 10px; padding-bottom: 10px"></a>
</div>
<div class="container" style="text-align: center;">
<img src="https://momentumo.com/storage/cover_images/{{$subscribetext->image}}" style=" padding-bottom: 10px; width: 100%">
<br>
<br>
<h2 style="padding-bottom: 20px">{{$subscribetext->title}}</h2>
<div class="text-left">
{!!$subscribetext->description!!}
</div>

@if ($subscribetext->buttonurl == '' || $subscribetext->buttonurl == null || $subscribetext->buttontext == '' || $subscribetext->buttontext == null )
<div>
   <a href="{{$subscribetext->buttonurl}}" target="_blank"><button class="btn btn-dark" type="normal">{{$subscribetext->buttontext}}</button></a>
</div>
@endif
</div>
<br>
<br>

<footer class="space footer-2" style="background-color: black">
  <div class="container">
      <div class="row">
          <div class="col-sm-12 footer-block">
              <h3 style="color: white">ABOUT MOMENTUM</h3>
              <div class="footer-inner" style="color: white">
                  <p class="point-1">MOMENTUM GROUP Corp. – a group of companies with years of experience in several directions. We are constantly evolving and becoming more aware. The desire to become better constantly yielding results in the form of recognition and customer appreciation.</p>
                  <ul class="contact">
                      <li><i class="fa fa-map-marker" aria-hidden="true"></i>Rruga Ibrahim Rugova || Tirana, Albania </li>
                      <li><a style="color: white" href="mailto:info@momentumo.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@momentumo.com</a> </li>
                      <li><a style="color: white" href="tel:355672040099"><i class="fa fa-phone" aria-hidden="true"></i>+355 67 20 400 99</a> </li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="row">
          <div style="color: white; padding: 20px" class="col-sm-12 text-center footer-block">
              ©2020 All Right Reserved Momentum Group
          </div>
      </div>
  </div>
</footer>
<div class="container" style="padding: 20px">
    <div class="row text-center">
        <small>You are recieving this e-mail because you subscribed to our newsletters.</small>
    </div>
    <div class="row text-center" style="padding: 20px">
        <a href="https://momentumo.com/unsubscribe/{{$subscribe->id}}" target="_blank"><button class="btn btn-dark" type="normal">Unsubscribe</button></a>
    </div>
</div>
