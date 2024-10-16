<div class="container-fluid" style="box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.1);"> <!-- Membuat container tetap penuh -->
    <div class="container-md"> <!-- Ini membungkus logo dan menu agar di tengah -->
        <header class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 ">
            <a href="{{ route('landing.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ env('APP_LOGO_URL') }}" alt="ubah logo di env" style="width: 30px;" class="me-2">
            </a>
            <style>
                .nav-link,
                .btn {
                    font-family: 'DM Sans', sans-serif;
                    font-size: 1em;
                }
            </style>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('landing.index') }}" class="nav-link {{ request()->routeIs('landing.index') ? 'active' : '' }}">Home</a></li>

                <li class="nav-item"><a href="{{ route('dumptoseed') }}" class="nav-link {{ request()->routeIs('dumptoseed') ? 'active' : '' }}">dumptoseed</a></li>

                <li class="nav-item"><a href="{{ route('videos.index') }}" class="nav-link {{ request()->routeIs('videos.index') ? 'active' : '' }}">videos</a></li>

                {{-- <div class="vr mx-3"></div> <!-- Garis vertikal --> --}}
            </ul>
        </header>
    </div>
</div>
