@extends('admin.app_admin')

@section('dashboard_profile')
    <h2>Edit Post Freelance</h2>
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
    <form action="{{route('job.update', ['id' => $freelance['id']])}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="is_freelance" value="1">
        <div class="mt-10">
            <label for="" class="">Nama Job</label>
            <input type="text" name="nama" placeholder="Nama Job" value="{{old('nama', $freelance['nama'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Deskripsi</label>
            <input type="text" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi', $freelance['deskripsi'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Deadline</label>
            <input type="date" name="deadline" placeholder="Deadline" value="{{old('deadline', $freelance['deadline'])}}" required class="single-input">
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
            <input type="number" name="lowongan" placeholder="Lowongan untuk berapa orang?" value="{{old('lowongan',$freelance['lowongan'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Gaji</label>
            <input type="number" name="gaji" placeholder="Gaji" value="{{old('gaji', $freelance['gaji'])}}" required class="single-input">
        </div>
        <div class="input-group-icon mt-10">
            <label for="" class="">Tipe Pekerjaan</label>
            <div class="default-select" id="default-select"">
                <select name="tipe_pekerjaan">
                    @if($freelance['tipe_pekerjaan'] == 'fulltime')
                        <option value="fulltime" selected>Full Time</option>
                        <option value="parttime">Part Time</option>
                    @else
                        <option value="fulltime">Full Time</option>
                        <option value="parttime" selected>Part Time</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="mt-10">
            <label for="" class="">Lokasi</label>
            <input type="text" name="lokasi" placeholder="Lokasi" value="{{old('lokasi', $freelance['lokasi'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Tanggung Jawab Karyawan</label>
            <textarea name="tanggungjawab" placeholder="Tanggung Jawab Karyawan" required class="single-textarea">{{old('tanggungjawab', $freelance['tanggungjawab'])}}</textarea>
        </div>
        <div class="mt-10">
            <label for="" class="">Kualifikasi</label>
            <textarea name="kualifikasi" placeholder="Kualifikasi" required class="single-textarea">{{old('kualifikasi', $freelance['kualifikasi'])}}</textarea>
        </div>
        <div class="mt-10">
            <label for="" class="">Benefit</label>
            <textarea name="benefit" placeholder="Benefit" required class="single-textarea">{{old('benefit', $freelance['benefit'])}}</textarea>
        </div>
        
        <div class="mt-10">
            <button type="submit" class="genric-btn primary single-input">Edit Data</button>
        </div>
    <form>

@endsection