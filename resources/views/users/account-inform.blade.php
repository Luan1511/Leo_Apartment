<div class="col-md-6">
    <div class="shadow-sm rounded-3 p-4">
        <h3 class="mb-4 text-center">MY ACCOUNT</h3>
        <form action="{{ route('user-update', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="avatar-container">
                <img id="avatar-preview"
                    src="{{ $user->img ? asset('storage/' . $user->img) : '/images/user/admin.jpg' }}" alt="Avatar"
                    class="img-fluid admin-avatar">

                <label class="btn update-avatar-btn">
                    <i class="bi bi-camera"></i> Update image
                    <input type="file" name="image" id="image" accept="image/*" style="display: none;"
                        onchange="previewImage(event)">
                </label>
            </div>
            <div class="mb-12 row">
                <div class="col-md-11">
                    <input type="text" class="form-control bang" id="name" name="name"
                        value="{{ $user->name }}" placeholder="name">
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
                <button type="submit" class="btn btn-primary" style="background: #61CFD3">Update</button>
            </div>
        </form>

        <div class="col-md-1"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#inform-nav').addClass('active-nav-user');
        $('#bills-nav').removeClass('active-nav-user');
        $('#request-nav').removeClass('active-nav-user');
        $('#maintain-nav').removeClass('active-nav-user');
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
            });
        @endif
    });
</script>
