@extends('admin.app_admin')

@section('dashboard_profile')
    <h2>Edit User</h2>
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
    <form action="{{route('user.update', ['id' => $user['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-10">
            <label for="" class="">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" value="{{$user['nama']}}" required class="single-input">
        </div>
        <div class="input-group-icon mt-10">
            <label for="" class="">Role</label>
            <div class="default-select" id="default-select"">
                <select name="role">
                    @if($user['role'] == 'admin')
                        <option value="admin" selected>Admin</option>
                        <option value="user">User</option>
                        @else
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="mt-10">
            <label for="" class="">Email</label>
            <input type="email" name="email" placeholder="Email" value="{{$user['email']}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Nomor Handphone</label>
            <input type="text" name="no_hp" placeholder="Nomor Handphone" value="{{$user['no_hp']}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Foto</label>
            <img src="/storage/images/profil/{{$user->foto}}" class="d-block" style="width: 50%" alt="" srcset="">
            <input type="file" name="foto" class="single-input">
        </div>
        <div class="mt-10">
            <button type="submit" class="genric-btn primary single-input">Ubah Data</button>
        </div>
    <form>

@endsection