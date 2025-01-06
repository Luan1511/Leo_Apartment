@extends('layouts.community-layout')

@section('content-post')
    <div class="row li-main-content">
        @foreach ($posts as $post)
            <div class="col-lg-6 col-md-6">
                <div class="li-blog-single-item pb-25">
                    <div class="li-blog-banner">
                        @if ($post->image != null && $post->image != '')
                            <a href="{{ url('community/post/' . $post->id) }}"><img class="img-full" src="{{ asset('storage/' . $post->image) }}"
                                    alt="" height="270px"></a>
                        @elseif ($post->video != null && $post->video != '')
                            <video controls width="100%" height="270px">
                                <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                    <div class="li-blog-content">
                        <div class="li-blog-details">
                            <h3 class="li-blog-heading pt-25"><a
                                    href="{{ url('community/post/' . $post->id) }}">{{ $post->title }}</a></h3>
                            <div class="li-blog-meta">
                                <a class="author" href="#"><i
                                        class="fa fa-user"></i>{{ $post->resident->user->name }}</a>
                                <a class="comment" href="{{ url('community/post/' . $post->id) }}"><i class="fa fa-comment-o"></i> {{ $post->comment_count->count()}}
                                    comment</a>
                                <a class="post-time" href="#"><i
                                        class="fa fa-calendar"></i>{{ $post->created_at }}</a>
                            </div>
                            <p>{{ $post->content }}</p>
                            <a class="read-more" href="{{ url('community/post/' . $post->id) }}">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Begin Li's Pagination Area -->
        {{-- <div class="col-lg-12">
            <div class="li-paginatoin-area text-center pt-25">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="li-pagination-box">
                            <li><a class="Previous" href="#">Previous</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a class="Next" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Li's Pagination End Here Area -->
    </div>
@endsection
