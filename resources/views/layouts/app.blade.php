<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.0/dist/jquery.fancybox.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/LuNi_icon.png') }}">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/tables.css'])
    @vite(['resources/css/custom.css'])
    @vite(['resources/css/event.css'])
<<<<<<< HEAD
    {{-- @vite(['resources/css/cluster.css']) --}}
=======
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/6e70409343.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.0/dist/jquery.fancybox.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
=======
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
</head>

<body>
    {{-- Include Header --}}
    @include('components.header')

    {{-- Main Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('components.footer')

<<<<<<< HEAD
    {{-- Event --}}
=======
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    <div class="event-btn">
        <div class="note">Click to hide/display effect</div>
        <a class="" onclick="display_hide_event()">❄️</a>
    </div>

    <div class="event-container">
        @if (date('m') == 11 || date('m') == 12)
            <audio src="{{ asset('storage/audios/we-wish-you-a-merry-christmas-126685.mp3') }}" autoplay loop></audio>
            <div class="main-snow">
                <div class="initial-snow ">
                    @for ($i = 0; $i < 50; $i++)
                        <div class="snow">&#10052;</div>
                    @endfor
                </div>
            </div>
        @elseif (date('m') == 1 || date('m') == 2)
            <audio src="{{ asset('storage/audios/Tet (mp3cut.net).mp3') }}" autoplay hidden></audio>
            <div class="main-gold">
                <div class="initial-gold">
                    @for ($i = 0; $i < 30; $i++)
                        <div class="gold"><img src="{{ asset('storage/images/others/image.png') }}" alt=""
                                width="25px"></div>
                    @endfor
                </div>
                <div class="pendulum-left">
                    <div class="rope"></div>
                    <div class="pendulum-banner">
                        Happy <br>
                        New <br>
                        Year
                    </div>
                    <div class="tail"></div>
                </div>
                <div class="pendulum-right">
                    <div class="rope"></div>
                    <div class="pendulum-banner">
                        Wish <br>
                        The <br>
                        Best <br>
                        For <br>
                        You
                    </div>
                    <div class="tail"></div>
                </div>
            </div>
        @endif
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script>
        $.scrollUp({
            scrollText: '<i class="fa fa-angle-double-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900
        });

        function display_hide_event() {
            $(".event-container").toggleClass('invisible');
<<<<<<< HEAD

=======
 
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
            let savedEvent = localStorage.getItem('event');
            if (savedEvent == null || savedEvent == 'visible') {
                localStorage.setItem('event', 'invisible');
            } else {
                localStorage.setItem('event', 'visible');
            }
<<<<<<< HEAD

            const audio = document.querySelector('.event-container audio');
            if (audio) {
                if ($(".event-container").hasClass('invisible')) {
                    audio.pause();
                } else {
                    audio.play();
=======
 
            const audio = document.querySelector('.event-container audio');
            if (audio) {
                if ($(".event-container").hasClass('invisible')) {
                    audio.pause();  
                } else {
                    audio.play(); 
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            let savedEvent = localStorage.getItem('event');

            if (savedEvent == null || savedEvent == 'visible') {
                $(".event-container").removeClass('invisible');
            } else {
                $(".event-container").addClass('invisible');
            }

            const audio = document.querySelector('.event-container audio');
            if (audio) {
                if ($(".event-container").hasClass('invisible')) {
                    audio.pause();
                } else {
                    audio.play();
                }
            }
        });
<<<<<<< HEAD

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status') === 'Posted Successfully')
                Swal.fire({
                    icon: 'success',
                    title: 'Posted!',
                    text: 'Posted Successfully',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'existed')
                Swal.fire({
                    icon: 'info',
                    title: 'Already Exists!',
                    text: 'Apartment is already in your wishlist.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'addedCart')
                Swal.fire({
                    icon: 'success',
                    title: 'Added!',
                    text: 'Apartment has been added to your cart.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'plused')
                Swal.fire({
                    icon: 'success',
                    title: 'Plus!',
                    text: 'Apartment has been plused to your Apartment quantity.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
        });
=======
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    </script>

</body>

</html>
