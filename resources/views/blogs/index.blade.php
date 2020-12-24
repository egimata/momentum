@extends('layouts.main')

@section('content')


    <!--BreadCrumb-->
    <section id="breadcrumb" class="overlay ten">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 page-heading">
                    <h3>{{__('custom.blog-menu')}}</h3>
                </div>
                <div class="col-sm-6 breadcrumb-block text-right">
                    <ol class="breadcrumb">
                        <li><a href="/">{{__('custom.home-menu')}}</a></li>
                        <li class="active">{{__('custom.blog-menu')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog -->
    <section id="blog" class="space two">
        <div class="container">
            <div class="row">
                @if (count($blogs) > 0)
                <div class="col-sm-8 col-md-9 block-left no-padding">
                    <div class="all-post col-sm-12 no-padding">
                        @foreach ($blogs as $blog)

                        @if ($lang == 'en')

                        <article class="col-sm-12 col-xs-12 blog-block">
                            <a href="/blogs/{{$blog->slug}}"> <img src="/storage/cover_images/{{$blog->mainphoto}}" alt="{{$blog->titlen}}"></a>
                            <div class="blog-info col-sm-12">
                                <div class="blog-info-inner">
                                    <h4><a href="/blogs/{{$blog->slug}}">{{$blog->titlen}}</a> </h4>
                                    <ul>
                                        <li><a data-toggle="tooltip" data-placement="top" title="Acrtical Category" href="#"><i class="fa fa-folder-open-o"></i>Blog</a> </li>
                                        <li data-toggle="tooltip" data-placement="top" title="Published date"><i class="fa fa-calendar-o"></i>{{$blog->created_at}}</li>
                                    </span>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                $metadesc = strip_tags($blog->descriptionen);
                                $description = substr($metadesc, 0, 325);
                                $description = $description.'...';
                                ?>
                                <p>{!!$description!!}</p>
                                <a href="/blogs/{{$blog->slug}}" class="btn-style-two">read more</a>
                            </div>
                        </article>

                        @elseif ($lang == 'al')

                        <article class="col-sm-12 col-xs-12 blog-block">
                            <a href="/blogs/{{$blog->slug}}"> <img src="/storage/cover_images/{{$blog->mainphoto}}" alt="{{$blog->titlealb}}"></a>
                            <div class="blog-info col-sm-12">
                                <div class="blog-info-inner">
                                    <h4><a href="/blogs/{{$blog->slug}}">{{$blog->titlealb}}</a> </h4>
                                    <ul>
                                        <li><a data-toggle="tooltip" data-placement="top" title="Acrtical Category" href="#"><i class="fa fa-folder-open-o"></i>Blog</a> </li>
                                        <li data-toggle="tooltip" data-placement="top" title="Published date"><i class="fa fa-calendar-o"></i>{{$blog->created_at}}</li>
                                    </span>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                $metadesc = strip_tags($blog->descriptionalb);
                                $description = substr($metadesc, 0, 325);
                                $description = $description.'...';
                                ?>
                                <p>{!!$description!!}</p>
                                <a href="/blogs/{{$blog->slug}}" class="btn-style-two">read more</a>
                            </div>
                        </article>

                        @elseif ($lang == 'it')

                        <article class="col-sm-12 col-xs-12 blog-block">
                            <a href="/blogs/{{$blog->slug}}"> <img src="/storage/cover_images/{{$blog->mainphoto}}" alt="{{$blog->titleit}}"></a>
                            <div class="blog-info col-sm-12">
                                <div class="blog-info-inner">
                                    <h4><a href="/blogs/{{$blog->slug}}">{{$blog->titleit}}</a> </h4>
                                    <ul>
                                        <li><a data-toggle="tooltip" data-placement="top" title="Acrtical Category" href="#"><i class="fa fa-folder-open-o"></i>Blog</a> </li>
                                        <li data-toggle="tooltip" data-placement="top" title="Published date"><i class="fa fa-calendar-o"></i>{{$blog->created_at}}</li>
                                    </span>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                $metadesc = strip_tags($blog->descriptionit);
                                $description = substr($metadesc, 0, 325);
                                $description = $description.'...';
                                ?>
                                <p>{!!$description!!}</p>
                                <a href="/blogs/{{$blog->slug}}" class="btn-style-two">read more</a>
                            </div>
                        </article>

                        @endif

                        @endforeach

                    </div>
                    {{$blogs->links()}}

                </div>
                @else
                <div class="col-sm-8 col-md-9 block-left no-padding">
                <h1>No Blogs Available</h1>
                </div>
                @endif
                <!-- side bar-->
                <aside class="col-sm-4 col-md-3">
                    <!-- search-->
                    <div class="search widget">
                            <div class="form-group">
                                <input type="search" class="form-control" id="searchplace" name="search" placeholder="Search...">
                                <button type="button" onclick="dosearch()"><i class="fa fa-search"></i> </button>
                            </div>
                    </div>
                    <!-- news-->
                    @if (count($latestblogs) > 0)
                    <div class="widget new">
                        <h4>{{__('custom.latest-articles')}}</h4>
                        <ul class="news">
                            @if ($lang == 'en')
                            @foreach ($latestblogs as $latestblog)
                            <li>
                                <a href="/blogs/{{$latestblog->slug}}">{{$latestblog->titlen}} </a>
                                <div class="date">{{$latestblog->created_at}}</div>
                            </li>
                            @endforeach
                            @elseif  ($lang == 'al')
                            @foreach ($latestblogs as $latestblog)
                            <li>
                                <a href="/blogs/{{$latestblog->slug}}">{{$latestblog->titlealb}} </a>
                                <div class="date">{{$latestblog->created_at}}</div>
                            </li>
                            @endforeach
                            @elseif ($lang == 'it')
                            @foreach ($latestblogs as $latestblog)
                            <li>
                                <a href="/blogs/{{$latestblog->slug}}">{{$latestblog->titleit}} </a>
                                <div class="date">{{$latestblog->created_at}}</div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>


    <script defer>
        function dosearch(){
            var searchplace = $('#searchplace').val();
            var search = convertToSlug(searchplace);

            if (search === "" ){
                location.replace("/blogs")
            }else{
                location.replace("/blogs/search/"+search)
            }
        }

        function convertToSlug(str){
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to   = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
        };


    </script>
@endsection
