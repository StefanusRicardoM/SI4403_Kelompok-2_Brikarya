@extends('admin.app_admin')

@section('dashboard_profile')
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
    <h2>User</h2>

    <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No Handphone</th>
            <th scope="col">Foto</th>
            <th scope="col">Status</th>
            <th scope="col">role</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            
            @if(count($users) == 0)
            <tr>
                <td colspan='9' class="text-center">User kosong</td>
            </tr>
            @endif
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$user->nama}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->no_hp}}</td>
                <td>
                    <img src="/storage/images/profil/{{$user->foto}}" width='250px' alt="" srcset="">
                </td>
                <td>{{$user->status}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <div class="d-flex">
                        @if($user->status == 'pending')
                            <form action="{{route('admin.user.status', ['id'  => $user->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="mr-2 text-black genric-btn primary ">Aktifkan</button>
                            </form>
                        @else
                            <a href="{{route('admin.user.edit', ['id'  => $user->id])}}" class="mr-2 text-black genric-btn warning">Edit</a>
                            <a href="{{route('admin.user.destroy', ['id'  => $user->id])}}" class="text-black genric-btn danger">Hapus</a>
                        @endif
                    </div>
                </td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach

        </tbody>
    </table>
    
@endsection