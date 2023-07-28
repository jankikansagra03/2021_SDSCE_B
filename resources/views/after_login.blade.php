@if (session()->has('uname'))
    Welcome {{ session('uname') }}

    <a href="{{ URL::to('/') }}/logout">Logout
    @endif
