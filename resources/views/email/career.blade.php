<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<div style="background-color: black; text-align: center">
<a href="https://momentumo.com/" target="_blank"><img src="http://momentumo.com/logo-momentum.png" style="padding-top: 10px; padding-bottom: 10px"></a>
</div>
<div class="container" style="text-align: center;">

    <br>
<h2 style="padding-bottom: 20px">New Job Opportunity</h2>
<hr>
<h3 style="padding-bottom: 20px">{{$career->title}}</h3>
<h4 style="padding-bottom: 20px">Përshëndetje, një pozicion i ri vakant sapo u hap pranë Kompanisë tonë!<br>Kjo është mundësia që ju/ një mik ose i afërm i juaji po prisnit.<br><br>Bashkohu me skuadrën tonë ose sugjero pozicion vakant tek një mik i juaji!</h4>

<div class="text-left">
{!!$career->description!!}</div>
<div>
   <a href="https://momentumo.com/careers/{{$career->id}}" target="_blank"><button class="btn btn-dark" type="normal">Apliko Tani</button></a>
</div>
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
        <a href="https://momentumo.com/career/unsubscribe/{{$applicant->id}}" target="_blank"><button class="btn btn-dark" type="normal">Unsubscribe</button></a>
    </div>
</div>
