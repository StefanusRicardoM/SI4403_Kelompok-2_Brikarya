@extends('admin.app_admin')

@section('dashboard_profile')
    <h2>Blog</h2>
    <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Gambar</th>
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
                <td>
                    <img src="/storage/images/{{$blog->gambar}}" width='250px' alt="" srcset="">
                </td>
                <td>{{$blog->tag}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('admin.blog.edit', ['id'  => $blog->id])}}" class="mr-2 text-black genric-btn warning">Edit</a>
                        <a href="{{route('admin.blog.destroy', ['id'  => $blog->id])}}" class="text-black genric-btn danger">Hapus</a>
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