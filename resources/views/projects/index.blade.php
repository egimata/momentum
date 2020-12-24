@extends('layouts.main')

@section('content')

<section id="breadcrumb" class="overlay nine">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 page-heading">
                <h3>{{__('custom.projects-menu')}}</h3>
            </div>
            <div class="col-sm-6 breadcrumb-block text-right">
                <ol class="breadcrumb">
                    <li><a href="/">{{__('custom.home-menu')}}</a></li>
                    <li><a href="#">{{__('custom.projects-menu')}}</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--Portfolio-->
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

                    @if(count($projects) > 0)
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
                                                <a href="#"> {{$project->titlealb}} </a>
                                                @elseif ($lang == 'en')
                                                <a href="#"> {{$project->titlen}} </a>
                                                @elseif ($lang == 'it')
                                                <a href="#"> {{$project->titleit}} </a>
                                                @endif
                                        </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
