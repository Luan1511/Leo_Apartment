@extends('layouts.user-layout')

<<<<<<< HEAD
@section('content')
    <style>
        .form-control {
            border: none !important;
            border-bottom: 1px solid #dee2e6 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }

        .avatar-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .admin-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #dee2e6;
        }

        .update-avatar-btn {
            margin-top: 8px;
            font-size: 12px;
            padding: 5px 10px;
            background-color: #e9d790;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .update-avatar-btn i {
            margin-right: 5px;
            font-size: 14px;
        }

        .update-avatar-btn:hover {
            background-color: #efecdd;
        }
    </style>
    <form action="{{ route('user-update', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="avatar-container">
            <img id="avatar-preview" src="{{ $user->img ? asset('storage/' . $user->img) : '/images/user/admin.jpg' }}"
                alt="Avatar" class="img-fluid admin-avatar">

=======
@section('content-user')
    <h3 class="mb-4 text-center">UPDATE MY ACCOUNT</h3>
    {{-- <div class="avatar-container">
    <img src="/images/user/admin.jpg" alt="Admin Avatar" class="img-fluid admin-avatar">
    <button type="button" class="btn update-avatar-btn">
        <i class="bi bi-camera"></i> Update image
    </button>
</div> --}}

    <form action="{{ route('user-update', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="avatar-container">
            <img id="avatar-preview" src="{{ $user->img ? asset('storage/' . $user->img) : '/images/user/admin.jpg' }}"
                alt="Avatar" class="img-fluid admin-avatar">

>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
            <label class="btn update-avatar-btn">
                <i class="bi bi-camera"></i> Update image
                <input type="file" name="image" id="image" accept="image/*" style="display: none;"
                    onchange="previewImage(event)">
            </label>
        </div>
        <div class="mb-12 row">
            <div class="col-md-11">
                <input type="text" class="form-control bang" id="name" name="name" value="{{ $user->name }}"
                    placeholder="name">
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-11">
                <input type="text" class="form-control border-bottom-only" id="email" name="email"
                    placeholder="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-11">
                <select class="form-select border-bottom-only" id="gender" name="gender">
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-11">
                <input type="tel" class="form-control border-bottom-only" id="phone" name="phone"
                    placeholder='Phone' value="{{ $user->phone }}">
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-11">
                <input type="text" class="form-control border-bottom-only" id="address" name="address"
                    placeholder="address" value="{{ $user->address }}">
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-11">
                <input type="date" class="form-control border-bottom-only" id="birthdate" name="birthday"
                    value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}">
            </div>
        </div>

        <div class="text-center">
<<<<<<< HEAD
            <button type="submit" class="btn btn-primary" style="background: #61CFD3">Update</button>
        </div>
    </form>

    <div class="col-md-1"></div>
=======
            <button type="submit" class="btn btn-primary" style="background: #90e0ef">Update</button>
        </div>
    </form>

    </div>
    </div>

    <div class="col-md-1"></div>
    </div>
    </form>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#purchase-nav').removeClass('active-nav-user');
            $('#account-nav').addClass('active-nav-user');
            $('#voucher-nav').removeClass('active-nav-user');
            $('#report-nav').removeClass('active-nav-user');
        });

        function previewImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const preview = document.getElementById("avatar-preview");

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status') === 'Updated')
                Swal.fire({
                    icon: 'success',
                    title: 'Updated!',
                    text: 'Laptop has been Updated to your wishlist.',
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
<<<<<<< HEAD
                });
=======
                }); 
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
            @endif
        });
    </script>
@endsection
