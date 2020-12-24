
@extends('layouts.main')

@section('content')
    <!--BreadCrumb-->
    <section id="breadcrumb" class="overlay three">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 page-heading">

                </div>
                <div class="col-sm-6 breadcrumb-block text-right">
                    <ol class="breadcrumb">

                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="one space">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h3>Sorry for the disturbance.</h3>
                <h4>You have unsubscribed from Momentum Group.</h4>
            </div>
        </div>
    </section>


    <script>
        window.setTimeout(function() {
            location.href = "/";
        }, 4000);
    </script>
@endsection
