@extends('dashboard.app_dashboard')

@section('dashboard_profile')
    <h2>Post Blog</h2>
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
    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <div class="mt-10">
            <label for="" class="">Judul</label>
            <input type="text" name="judul" placeholder="Judul" value="{{old('judul')}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Gambar</label>
            <input type="file" name="gambar"  required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Kategori</label>
            <input type="text" name="kategori" placeholder="Kategori, pisahkan dengan koma" value="{{old('kategori')}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Tag</label>
            <input type="text" name="tag" placeholder="Tag, pisahkan dengan koma" value="{{old('tag')}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Isi</label>
            <textarea name="isi" placeholder="Isi" value="{{old('isi')}}" required class="single-textarea"></textarea>
        </div>
        <div class="mt-10">
            <button type="submit" class="genric-btn primary single-input">Tambah Blog</button>
        </div>
    <form>

    <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tag</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($blogs as $blog)
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$blog->judul}}</td>
                <td>{{$blog->kategori}}</td>
                <td>{{$blog->tag}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('blog.edit', ['id'  => $blog->id])}}" class="mr-2 text-black genric-btn warning">Edit</a>
                        <a href="{{route('blog.destroy', ['id'  => $blog->id])}}" class="text-black genric-btn danger">Hapus</a>
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