@extends('layouts.master')

@section('content')
<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="row">
                    <!-- Single Featured Post -->
                    <div class="col-12 col-lg-12">
                        <div class="single-blog-post featured-post">
                            <div class="post-data">
                                <a href="#" class="post-catagory">{{ $news['name_cyr'] }}</a>
                                <a href="#" class="post-title">
                                    <h6>{{ $news['title'] }}</h6>
                                </a>
                                <div class="post-meta">
                                @foreach(explode("\n", $news['text']) as $text)
                                    <p class="post-author">{{ $text }}</p>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="post-thumb">
                            <img src="/img/bg-img/{{ $news['img'] }}.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop