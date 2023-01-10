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
    <h2>Job</h2>
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
            
            @if(count($jobs) == 0)
            <tr>
                <td colspan='9' class="text-center">Job kosong</td>
            </tr>
            @endif
            @foreach($jobs as $job)
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$job->nama}}</td>
                <td>{{$job->deskripsi}}</td>
                <td>{{$job->kategori}}</td>
                <td>{{$job->lowongan}}</td>
                <td>{{$job->gaji}}</td>
                <td>{{$job->lokasi}}</td>
                <td>{{$job->tipe_pekerjaan}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('admin.job.edit', ['id'  => $job->id])}}" class="mr-2 text-black genric-btn warning">Edit</a>
                        <a href="{{route('admin.job.destroy', ['id'  => $job->id])}}" class="text-black genric-btn danger">Hapus</a>
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