@extends('layouts.app')
@section('title')
    halo
@endsection
@section('content')
    <div class="container col-xxl-8 px-4">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <div id="lottie-animation" class="d-block mx-lg-auto img-fluid" style="width:400px; height:500px;"></div>
            </div>
            <div class="col-lg-6">
                <h1 class="display-7 fw-bold text-body-emphasis lh-1 mb-3">Selamat Datang</h1>
                <p class="lead  text-body-emphasis lh-1 ">Di <strong style="color:#2657A3">{{ config('app.name') }}</strong></p>
                <p>{{ env('APP_DESCRIPTION', 'Default description if not set') }}</p>
            </div>
        </div>
    </div>
    <!-- Tambahkan library lottie-web -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

    <!-- Inisialisasi animasi Lottie -->
    <script>
        var animation = lottie.loadAnimation({
            container: document.getElementById('lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://lottie.host/d4c0e013-0b66-4c4f-b4f5-41a66990cef1/Nn30CIIc28.json'
        });
    </script>
@endsection
