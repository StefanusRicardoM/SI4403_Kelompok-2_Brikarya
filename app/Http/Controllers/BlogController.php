<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog', ['blogs' => $blogs]);
    }

    public function blog()
    {
        $blogs = Blog::all()->where('user_id', auth()->user()->id);
        return view('dashboard.postblog', ['blogs' => $blogs]);
    }

    public function commentStore(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'komentar' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $komen = new Comment([
            'blog_id' => $id,
            'nama' => $request->get('nama'),
            'komentar' => $request->get('komentar'),
            'email' => $request->get('email'),
            'website' => $request->get('website'),
        ]);

        $komen->save();
        return back()->with('success', 'Komentar telah berhasil ditambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        $file = $request->file('gambar');
        $filename = uniqid() . "_" . $file->getClientOriginalName();
        $file->storeAs('public/images/', $filename);

        $blog = new Blog([
            'user_id' => $request->get('user_id'),
            'judul' => $request->get('judul'),
            'kategori' => $request->get('kategori'),
            'isi' => $request->get('isi'),
            'tag' => $request->get('tag'),
            'gambar' => $filename,
        ]);

        $blog->save();
        return back()->with('success', 'Blog telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $komentar = Comment::all()->where('blog_id', $id);
        $count = Comment::all()->where('blog_id', $id)->count();
        return view('single-blog', ['blog' => $blog, 'komentar' => $komentar, 'count' => $count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('dashboard.postblog_edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->judul = $request->get('judul');
        $blog->kategori = $request->get('kategori');
        $blog->isi = $request->get('isi');
        $blog->tag = $request->get('tag');

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/images/', $filename);
            $blog->gambar = $filename;
        }

        $blog->save();
        return back()->with('success', 'Blog telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        unlink("storage/images/$blog->gambar");
        $blog->delete();
        return back()->with('success', 'Blog berhasil dihapus');
    }
}
