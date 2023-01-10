<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{

    public function applyDecision(Request $request, $id, $status)
    {
        $apply = Apply::find($id);
        if($status == "accept"){
            
            $apply->update([
                'status' => $status
            ]);
            $apply->save();

            $job = Job::find($apply->job_id);
            $job->update([
                'lowongan' => $job->lowongan - 1
            ]);
            $job->save();

            return redirect()->back()->with('success', 'Berhasil menerima aplikasi');
        }else{
            $apply->update([
                'status' => $status
            ]);
            return redirect()->back()->with('success', 'Berhasil menolak aplikasi');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
            'nama' => 'required',
            'email' => 'required',
            'link' => 'required',
            'cv' => 'required',
            'coverletter' => 'required',
        ]);

        $check = Apply::where('job_id', $request->id)->where('user_id', Auth::user()->id)->first();
        if($check){
            return back()->with('error', 'Anda sudah melamar pada lowongan ini');
        }else{
            $file = $request->file('cv');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);
            
            $apply = new Apply([
                'job_id' => $request->id,
                'user_id' => Auth::user()->id,
                'nama' => $request->nama,
                'email' => $request->email,
                'link' => $request->link,
                'cv' => $filename,
                'coverletter' => $request->coverletter,
            ]);
            
            $apply->save();
            
        }

    
        return back()->with('success', 'Apply Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
