@extends('layouts.community-layout')

@section('content-post')
    <!-- Begin Li's Main Content Area -->
    <div class="col-lg-9 order-lg-2 order-1">
        <div class="row li-main-content">
            <div class="col-lg-12">
                <div class="li-blog-single-item pb-30">
                    <div class="li-blog-banner">
                        @if ($post->image != null && $post->image != '')
                            <a href="blog-details.html"><img class="img-full" src="{{ asset('storage/' . $post->image) }}"
                                    alt=""></a>
                        @elseif ($post->video != null && $post->video != '')
                            <video controls width="100%">
                                <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                    <div class="li-blog-content">
                        <div class="li-blog-details">
                            <h3 class="li-blog-heading pt-25"><a href="#">{{ $post->title }}</a></h3>
                            <div class="li-blog-meta">
                                <a class="author" href="#"><i
                                        class="fa fa-user"></i>{{ $post->resident->user->name }}</a>
                                <a class="comment" href="#"><i
                                        class="fa fa-comment-o"></i>{{ $post->comment_count->count() }} comment</a>
                                <a class="post-time" href="#"><i
                                        class="fa fa-calendar"></i>{{ $post->created_at }}</a>
                                @auth
                                    @if (Auth::user()->authority == 1)
                                        <a class="post-time delete-btn"
                                            href="{{ url('community/post/' . $post->id . '/delete') }}"><i
                                                class="fa fa-trash"></i>Delete</a>
                                    @endif
                                @endauth
                            </div>
                            {{-- <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere
                                libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p> --}}
                            <div class="li-blog-blockquote">
                                <blockquote>
                                    <p>{{ $post->content }}</p>
                                </blockquote>
                            </div>
                            <div class="li-blog-sharing text-center pt-30">
                                <h4>share this post:</h4>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Begin Li's Blog Comment Section -->
                <div class="li-comment-section">
                    <h3>{{ $post->comment_count->count() }} comment</h3>
                    <ul>
                        @foreach ($post->comments as $comment)
                            <li>
                                <div class="author-avatar pt-15">
                                    <img src="{{ asset('storage/' . $comment->resident->user->img) }}" alt="User"
                                        width="40px" height="60px" style="border-radius: 100%">
                                </div>
                                <div class="comment-body pl-15">
                                    <span class="reply-btn pt-15 pt-xs-5"><a href="javascript:void(0)" class="reply-link"
                                            data-comment-id="{{ $comment->id }}">reply</a></span>
                                    <h5 class="comment-author pt-15">{{ $comment->resident->user->name }}</h5>
                                    <div class="comment-post-date">
                                        {{ $comment->created_at }}
                                    </div>
                                    <p>{{ $comment->content }}</p>
                                </div>

                                <div class="reply-form ml-10" id="reply-form-{{ $comment->id }}"
                                    style="display: none; margin-top: 10px;">
                                    <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                                        @csrf
                                        <textarea name="content" rows="2" class="form-control" placeholder="Write your reply here..."></textarea>
                                        <button type="submit" class="send-btn btn-sm mt-2">Send</button>
                                    </form>
                                </div>
                            </li>
                            @foreach ($comment->replies as $reply)
                                <li class="comment-children">
                                    <div class="author-avatar pt-15">
                                        <img src="{{ asset('storage/' . $reply->resident->user->img) }}" alt="User"
                                            width="40px" height="60px" style="border-radius: 100%">
                                    </div>
                                    <div class="comment-body pl-15">
                                        <span class="reply-btn pt-15 pt-xs-5"><a href="javascript:void(0)"
                                                class="reply-link" data-comment-id="{{ $reply->id }}">reply</a></span>
                                        <h5 class="comment-author pt-15">{{ $reply->resident->user->name }}</h5>
                                        <div class="comment-post-date">
                                            {{ $reply->created_at }}
                                        </div>
                                        <p>{{ $reply->content }}</p>
                                    </div>

                                    <div class="reply-form ml-10" id="reply-form-{{ $reply->id }}"
                                        style="display: none; margin-top: 10px;">
                                        <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                                            @csrf
                                            <textarea name="content" rows="2" class="form-control" placeholder="Write your reply here..."></textarea>
                                            <button type="submit" class="send-btn btn-sm mt-2">Send</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                <!-- Li's Blog Comment Section End Here -->
                <!-- Begin Blog comment Box Area -->
                <div class="li-blog-comment-wrapper">
                    <h3>leave a reply</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form action="{{ url('/community/post/' . $post->id . '/comment') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="comment-post-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>comment</label>
                                    <textarea name="content" id="content" placeholder="Write a comment"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                        <input class="li-btn-2" type="submit" name="submit" value="post comment">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Blog comment Box Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Main Content Area End Here -->

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('status') === 'success')
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: 'Thank you for the comment!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'replied')
                    Swal.fire({
                        icon: 'success',
                        title: 'Sent!',
                        text: 'Thanks',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('.reply-link').on('click', function(e) {
                e.preventDefault();

                const commentId = $(this).data('comment-id');
                $(`#reply-form-${commentId}`).toggle();
            });
        });
    </script>
@endsection
