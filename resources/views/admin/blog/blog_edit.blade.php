@extends('admin.app_admin')

@section('dashboard_profile')
    <h2>Blog</h2>
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
    <form action="{{route('blog.update', ['id' => $blog['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-10">
            <label for="" class="">Judul</label>
            <input type="text" name="judul" placeholder="Judul" value="{{old('judul', $blog['judul'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Gambar</label>
            <img src="/storage/images/{{$blog['gambar']}}" class="d-block" style="width: 50%"  alt="" srcset="">
            <input type="file" name="gambar"  class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Kategori</label>
            <input type="text" name="kategori" placeholder="Kategori, pisahkan dengan koma" value="{{old('kategori', $blog['kategori'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Tag</label>
            <input type="text" name="tag" placeholder="Tag, pisahkan dengan koma" value="{{old('tag', $blog['tag'])}}" required class="single-input">
        </div>
        <div class="mt-10">
            <label for="" class="">Isi</label>
            <textarea name="isi" placeholder="Isi" required class="single-textarea">{{old('isi', $blog['isi'])}}    </textarea>
        </div>
        <div class="mt-10">
            <button type="submit" class="genric-btn primary single-input">Edit Blog</button>
        </div>
    <form>
@endsection