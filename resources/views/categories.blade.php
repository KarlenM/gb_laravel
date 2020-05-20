@extends('layouts.master')

@section('content')
<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">
                @if(isset($selectedCategory))
                    @foreach($news as $key => $categoryNews)
                        @if(strtolower($categoryNews['name_lat']) == $selectedCategory)
                        <!-- Single Featured Post -->
                        @if($skey == 0)
                        <div class="col-12 col-lg-7">
                        @elseif($skey == 1)
                        <div class="col-12 @if($skey == 0) col-lg-7 @else col-lg-5 @endif">
                        @endif
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="/img/bg-img/{{ $key }}.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{ $categoryNews['name_cyr'] }}</a>
                                    <a href="{{ route('news') . '/' . strtolower($categoryNews['name_lat']) . '/' . $categoryNews['id'] }}" class="post-title">
                                        <h6>{{ $categoryNews['title'] }}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-excerp">{{ $categoryNews['id'] }}{{ Str::limit($categoryNews['text'], 327, ' ...') }}</p>
                                    </div>
                                </div>
                            </div>
                        @if($skey == 0) </div> @endif
                        @php $skey++ @endphp
                        @endif
                    @endforeach
                @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
            @foreach($news as $key => $allNews)
                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="/img/bg-img/{{ $allNews['id'] }}.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="{{ route('news') . '/' . strtolower($allNews['name_lat']) }}" class="post-catagory">{{ $allNews['name_cyr'] }}</a>
                        <div class="post-meta">
                        <a href="{{ route('news') . '/' . strtolower($allNews['name_lat']) . '/' . $allNews['id'] }}" class="post-title">
                                <h6>{{ $allNews['title'] }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@stop