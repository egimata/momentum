@extends('layouts.main')

@section('content')

<section id="breadcrumb" class="overlay ten">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 page-heading">
                <h3>{{$title}}</h3>
            </div>
            <div class="col-sm-6 breadcrumb-block text-right">
                <ol class="breadcrumb">
                    <li><a href="/">{{__('custom.home-menu')}}</a></li>
                    <li><a href="/blogs">{{__('custom.home-blog')}}</a></li>
                    <li class="active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Blog -->
<section id="blog" class="space two">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 block-left no-padding">
                <div class="all-post col-sm-12 no-padding">
                    <article class="col-sm-12 col-xs-12 blog-block">
                        <img src="/storage/cover_images/{{$blog->mainphoto}}" alt="{{$title}}">
                        <div class="blog-info col-sm-12">
                            <div class="blog-info-inner">
                                <h4><a href="#">{{$title}} </a> </h4>
                            </div>
                            {!!$deschtml!!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
