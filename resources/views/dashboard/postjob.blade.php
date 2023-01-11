@extends('dashboard.app_dashboard')

@section('dashboard_profile')
    <h2>Post Job</h2>
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
    <form action="{{route('job.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mt-10">
            <label for="" class="">Nama Job</label>
            <input type="text" name="nama" placeholder="Nama Job" value="{{old('nama')}}" required class="single-input">
        </div>
        <div class="input-group-icon mt-10">
            <label for="" class="">Untuk Freelance?</label>
            <div class="default-select" id="default-select"">
                <select name="is_freelance">
                    <option value="0">Tidak</option>
                    <option value="1">Iya</option>
                </select>
            </div>
        </div>
        <div class="mt-10">
            <label for="" class="">Deskripsi</label>
            <input type="text" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi')}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Deadline</label>
            <input type="date" name="deadline" placeholder="Deadline" value="{{old('deadline')}}" required class="single-input">
        </div>
        <div>
            <div class="input-group-icon mt-10">
                <label for="" class="">Kategori</label>
                <div class="default-select" id="default-select"">
                    <select name="kategori">
                        <option value="Teknologi">Teknologi</option>
                        <option value="Website">Website</option>
                        <option value="Aplikasi">Aplikasi</option>
                        <option value="Visual Grafik">Visual Grafik</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <label for="" class="">Lowongan untuk berapa orang?</label>
            <input type="number" name="lowongan" placeholder="Lowongan untuk berapa orang?" value="{{old('lowongan')}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Gaji</label>
            <input type="number" name="gaji" placeholder="Gaji" value="{{old('gaji')}}" required class="single-input">
        </div>
        <div class="input-group-icon mt-10">
            <label for="" class="">Tipe Pekerjaan</label>
            <div class="default-select" id="default-select"">
                <select name="tipe_pekerjaan">
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                </select>
            </div>
        </div>
        <div class="mt-10">
            <label for="" class="">Lokasi</label>
            <input type="text" name="lokasi" placeholder="Lokasi" value="{{old('lokasi')}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Tanggung Jawab Karyawan</label>
            <textarea name="tanggungjawab" placeholder="Tanggung Jawab Karyawan" required class="single-textarea">{{old('tanggungjawab')}}</textarea>
        </div>
        <div class="mt-10">
            <label for="" class="">Kualifikasi</label>
            <textarea name="kualifikasi" placeholder="Kualifikasi" required class="single-textarea">{{old('kualifikasi')}}</textarea>
        </div>
        <div class="mt-10">
            <label for="" class="">Benefit</label>
            <textarea name="benefit" placeholder="Benefit" required class="single-textarea">{{old('benefit')}}</textarea>
        </div>
        
        <div class="mt-10">
            <button type="submit" class="genric-btn primary single-input">Tambah Data</button>
        </div>
    <form>

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
                        <a href="{{route('job.edit', ['id'  => $job->id])}}" class="mr-2 text-black genric-btn warning">Edit</a>
                        <a href="{{route('job.destroy', ['id'  => $job->id])}}" class="text-black genric-btn danger">Hapus</a>
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