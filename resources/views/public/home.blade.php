@extends('layouts.master')

@section('content')
    <!-- Slider Area -->
    <section class="welcome-area">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slider-img slider-bg-2"></div>
                    <div class="carousel-caption">
                        <h2>Book Shop</h2>
                        <p class="d-none d-md-block">Hệ thống bán sách online uy tín, chất lượng với nhiều đầu sách bán chạy, hay, hấp dẫn và nhiều chính sách ưu đãi, giảm giá</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Sidebar Content -->
                @include('layouts.includes.side-bar')
                <!-- //Sidebar End -->
                <div class="col-md-8">
                    <div class="content-area">
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4><a href="{{route('category', 'vanhoc')}}" class="text-white">Sách Văn Học</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(! $vanhoc_books->count())
                                       <div class="alert alert-warning">Không có sách nào phù hợp</div>
                                    @else
                                        @foreach($vanhoc_books as $book)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                                        @if($book->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Giảm Giá {{$book->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        <small>Của <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($book->discount_rate)
                                                            <span class="line-through mr-3">{{$book->init_price}} VNĐ</span>
                                                        @endif
                                                        <span class=""><strong>{{$book->price}} VNĐ</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="show-more pt-2 text-right">
                                    <a href="{{route('category', 'vanhoc')}}" class="text-secondary">Xem Thêm <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4><a href="{{route('category', 'cntt')}}" class="text-white">Sách Công Nghệ Thông Tin</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(! $cntt_books->count())
                                        <div class="alert alert-warning">Không có sách nào phù hợp</div>
                                    @else
                                        @foreach($cntt_books as $book)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                                        @if($book->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Giảm Giá {{$book->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        <small>Của <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($book->discount_rate)
                                                            <span class="line-through mr-3">{{$book->init_price}} VNĐ</span>
                                                        @endif
                                                        <span class=""><strong>{{$book->price}} VNĐ</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="show-more pt-2 text-right">
                                    <a href="{{route('category', 'cntt')}}" class="text-secondary">Xem Thêm <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="discount-book mb-5" id="discount-books">
        <div class="container">
            <div class="card mb-10">
                <div class="card-header bg-dark text-white">
                    <h4><a href="{{route('discount-books')}}" class="text-white">Sách Giảm Giá</a></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(! $discount_books->count())
                            <div class="alert alert-warning">Không có sách nào phù hợp</div>
                        @else
                            @foreach($discount_books as $book)
                                <div class="col-lg-2 col-6">
                                    <div class="book-wrap">
                                        <div class="book-image mb-2">
                                            <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                            @if($book->discount_rate)
                                                <h6><span class="badge badge-warning discount-tag">Giảm giá {{$book->discount_rate}}%</span></h6>
                                            @endif
                                        </div>
                                        <div class="book-title mb-2">
                                            <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                        </div>
                                        <div class="book-author mb-2">
                                            <small>Của <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                        </div>
                                        <div class="pbook-price mb-3">
                                            @if($book->discount_rate)
                                                <span class="line-through mr-3">{{$book->init_price}} VNĐ</span>
                                            @endif
                                            <span class=""><strong>{{$book->price}} VNĐ</strong></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="show-more pt-2 text-right">
                        <a href="{{route('discount-books')}}" class="text-secondary">Xem Thêm <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
