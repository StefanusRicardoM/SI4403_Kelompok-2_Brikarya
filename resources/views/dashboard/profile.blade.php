@extends('dashboard.app_dashboard')

@section('dashboard_profile')
    <h2>Profile</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    @if (Session::has('error'))
        <div id="error" class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <form action="{{route('user.update', ['id' => Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-10">
            <label for="" class="">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" value="{{Auth::user()->nama}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Email</label>
            <input type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Nomor Handphone</label>
            <input type="text" name="no_hp" placeholder="Nomor Handphone" value="{{Auth::user()->no_hp}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Foto</label>
            <input type="file" name="foto"  required class="single-input">
        </div>
        <div class="mt-10">
            <button type="submit" class="genric-btn primary single-input">Ubah Data</button>
        </div>
    <form>
@endsection