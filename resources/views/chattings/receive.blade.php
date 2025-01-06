@php
    use Carbon\Carbon;
@endphp

@if (isset($messages))
    @foreach ($messages as $message)
        @if (Auth::user()->authority == 1)
            @if ($message->admin_id == null)
                <div class="left message left-message d-flex">
                    @if (isset($message->user->img))
                        <img src="{{ asset('storage/' . $message->user->img) }}" alt="Avatar" height="30px"
                            width="30px" style="border-radius: 50%">
                    @else
<<<<<<< HEAD
                        <img src="{{ asset('storage/images/users/1.png') }}" alt="Avatar" height="30px" width="30px"
=======
                        <img src="{{ asset('storage/images/User/1.png') }}" alt="Avatar" height="30px" width="30px"
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                            style="border-radius: 50%">
                    @endif
                    <p>{{ $message->content }}</p>
                    <div class="date-mess"> {{ Carbon::parse($message->created_at)->format('H:i - d/m/y') }} </div>
                </div>
            @else
                @include('chattings.broadcast')
            @endif
        @else
            @if ($message->admin_id != null)
                <div class="left message left-message d-flex">
                    @if (isset($message->user->img))
                        <img src="{{ asset('storage/' . $message->user->img) }}" alt="Avatar" height="30px"
                            width="30px" style="border-radius: 50%">
                    @else
<<<<<<< HEAD
                        <img src="{{ asset('storage/images/users/1.png') }}" alt="Avatar" height="30px"
=======
                        <img src="{{ asset('storage/images/User/1.png') }}" alt="Avatar" height="30px"
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                            width="30px" style="border-radius: 50%">
                    @endif
                    <p>{{ $message->content }}</p>
                    <div class="date-mess"> {{ Carbon::parse($message->created_at)->format('H:i - d/m/y') }} </div>
                </div>
            @else
                @include('chattings.broadcast')
            @endif
        @endif
    @endforeach
@else
    <div class="left message left-message d-flex">
<<<<<<< HEAD
        <img src="{{ asset('storage/images/users/1.png') }}" alt="Avatar" height="30px" width="30px"
=======
        <img src="{{ asset('storage/images/User/1.png') }}" alt="Avatar" height="30px" width="30px"
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
            style="border-radius: 50%">
        <p>{{ $message }}</p>
        <div class="date-mess"> {{ Carbon::parse(now())->format('H:i - d/m/y') }} </div>
    </div>
@endif
