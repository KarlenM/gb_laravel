@extends('layouts.master', ['categories' => $categories])

@section('content')
{{-- @dd($news); --}}
<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">
                    <!-- Single Featured Post -->
                    <div class="col-12 col-lg-7">
                        <div class="single-blog-post featured-post">
                            <div class="post-thumb">
                                <a href="{{
                                    route('news.show', 
                                        [
                                            'category' => $news[0]->categories->name_lat, 
                                            'id' => $news[0]->id
                                        ]
                                    )
                                }}"><img src="img/bg-img/3.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{
                                    route('news.category', 
                                        [
                                            'category' => $news[0]->categories->name_lat
                                            ]
                                    )
                                }}" class="post-catagory">{{ $news[0]->categories->name_cyr }}</a>
                                <a href="{{
                                    route('news.show',
                                    [
                                        'category' => $news[0]->categories->name_lat, 
                                        'id' => $news[0]->id
                                    ])
                                }}" class="post-title">
                                    <h6>{{ $news[0]['title'] }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{ $news[0]['author'] }}</a></p>
                                    <p class="post-excerp">{{ Str::limit($news[0]['text'], 327, ' ...') }}</p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like">
                                            <img src="img/core-img/like.png" alt=""> 
                                            <span>392</span>
                                        </a>
                                        <a href="#" class="post-comment">
                                            <img src="img/core-img/chat.png" alt=""> 
                                            <span>10</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                    @foreach($news as $key => $newsCategory)
                        @if(($key != 0 && $key < 3))
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post-2">
                            <div class="post-thumb">
                                <a href="{{
                                    route('news.show', 
                                        [
                                            'category' => $newsCategory->categories->name_lat, 
                                            'id' => $newsCategory->id
                                        ]
                                    )
                                }}"><img src="img/bg-img/{{ $key }}.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{
                                    route('news.category', 
                                        [
                                            'category' => $newsCategory->categories->name_lat
                                        ]
                                    )
                                }}" class="post-catagory">{{ $newsCategory->categories->name_cyr }}</a>
                                <div class="post-meta">
                                    <a href="{{
                                        route('news.show', 
                                            [
                                                'category' => $newsCategory->categories->name_lat,
                                                'id' => $newsCategory->id
                                            ]
                                        )
                                    }}" class="post-title">
                                        <h6>{{ $newsCategory['title'] }}</h6>
                                    </a>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like">
                                            <img src="img/core-img/like.png" alt=""> 
                                            <span>392</span>
                                        </a>
                                        <a href="#" class="post-comment">
                                            <img src="img/core-img/chat.png" alt=""> 
                                            <span>10</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
            @foreach($news as $key => $news)
                @if($key > 2 && $key < 10)
                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="{{
                            route('news.show',
                            [
                                'category' => $news->categories->name_lat, 
                                'id' => $news->id
                            ])
                        }}"><img src="img/bg-img/{{ $key }}.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="{{
                            route('news.category',
                                [
                                    'category' => $news->categories->name_lat
                                ]
                            )
                        }}" class="post-catagory">{{ $news->categories->name_cyr }}</a>
                        <div class="post-meta">
                            <a href="{{
                                route('news.show',
                                    [
                                        'category' => $news->categories->name_lat,
                                        'id' => $news->id
                                    ]
                                )
                            }}" class="post-title">
                                <h6>{{ $news['title'] }}</h6>
                            </a>
                            <p class="post-date">
                                <span>{{ date('H:m', strtotime($news['created_at'])) }}</span> | 
                                <span>{{ date('d M', strtotime($news['created_at'])) }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
</div>
@stop