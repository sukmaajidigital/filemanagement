@extends('layouts.app')
@section('title')
    halo
@endsection
@section('content')
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="img/assets/assets1.png" class="d-block mx-lg-auto img-fluid" alt="img" width="400" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-7 fw-bold text-body-emphasis lh-1 mb-3">Selamat Datang</h1>
                <p class="lead  text-body-emphasis lh-1 ">Di <strong style="color:#2657A3">{{ config('app.name') }}</strong></p>
                <p>{{ env('APP_DESCRIPTION', 'Default description if not set') }}</p>
            </div>
        </div>
    </div>
@endsection
