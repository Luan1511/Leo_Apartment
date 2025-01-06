@extends('layouts.community-layout')

@section('content-post')
    <form id="postForm" action="/community/community-posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter the post title" required>
        </div>

        <div class="mt-20">
            <label for="content">Content:</label>
            <textarea id="content" name="content" placeholder="Write your post content here..." required></textarea>
        </div>

        <div class="mt-20">
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div class="mt-20">
            <label for="video">Upload Video:</label>
            <input type="file" id="video" name="video" accept="video/*">
        </div>

        <div class="text-center mt-10">
            <button type="submit" class="detail-btn pl-20 pr-20" style="font-weight: 500 !important">Post</button>
        </div>
    </form>

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('status') === 'success')
                    Swal.fire({
                        icon: 'success',
                        title: 'Posted!',
                        text: 'Posted successfully!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'existed')
                    Swal.fire({
                        icon: 'info',
                        title: 'Already Exists!',
                        text: 'Laptop is already in your wishlist.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
            });
        </script>
    @endif
@endsection
