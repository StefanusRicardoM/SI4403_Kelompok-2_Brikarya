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
    <h2>Freelance</h2>
    <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Kategori</th>
            <th scope="col">Lowongan</th>
            <th scope="col">Gaji</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Tipe Pekerjaan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            
            @if(count($freelance) == 0)
            <tr>
                <td colspan='9' class="text-center">Freelance kosong</td>
            </tr>
            @endif
            @foreach($freelance as $f)
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$f->nama}}</td>
                <td>{{$f->deskripsi}}</td>
                <td>{{$f->kategori}}</td>
                <td>{{$f->lowongan}}</td>
                <td>{{$f->gaji}}</td>
                <td>{{$f->lokasi}}</td>
                <td>{{$f->tipe_pekerjaan}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('admin.freelance.edit', ['id'  => $f->id])}}" class="mr-2 text-black genric-btn warning">Edit</a>
                        <a href="{{route('admin.freelance.destroy', ['id'  => $f->id])}}" class="text-black genric-btn danger">Hapus</a>
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