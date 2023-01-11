<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req = request()->all();
        if(count($req) == 0){
            $jobs = DB::table('jobs')->where('is_freelance', 0)->get()->toArray();
        }else{
            $jobs = DB::table('jobs')->where('is_freelance', 0)->where(function ($jobs){
                $req = request()->all();
                if($req['keyword'] != null){
                    $jobs->where('nama', 'like', '%'.$req['keyword'].'%')->where(function($jobs){
                        $req = request()->all();
                        if($req['location']  != null){
                            $jobs->where('lokasi', 'like', '%'.$req['location'].'%')->where(function($jobs){
                                $req = request()->all();
                                if($req['category'] != null){
                                    $jobs->where('tipe_pekerjaan', 'like', '%'.$req['category'].'%');
                                }
                            });
                        }
                    });
                }
            })->get()->toArray();
        }
        $count = count($jobs);
        $tipe_pekerjaan = Job::select('tipe_pekerjaan')->where('is_freelance', 0)->distinct()->get();
        $lokasi = Job::select('lokasi')->where('is_freelance', 0)->distinct()->get();
        return view('jobs', ['jobs' => $jobs, 'count' => $count, 'tipe_pekerjaan' => $tipe_pekerjaan, 'lokasi' => $lokasi]);
    }

    public function job()
    {
        $jobs = Job::all()->where('is_freelance')->where('user_id', Auth::user()->id);
        return view('dashboard.postjob', ['jobs' => $jobs]);
    }

    public function yourJob()
    {
        // apply inner join job
        $apply = DB::table('apply')
            ->join('jobs', 'apply.job_id', '=', 'jobs.id')
            ->select('apply.*','jobs.*', 'jobs.nama as job_nama','apply.id as apply_id','apply.email as apply_email', 'apply.created_at as apply_created_at')
            ->where('jobs.user_id', Auth::user()->id)
            ->where('is_freelance', 0)
            ->get();
        return view('dashboard.jobApplication', ['apply' => $apply]);
    }

    public function yourFreelance()
    {
        $apply = DB::table('apply')
            ->join('jobs', 'apply.job_id', '=', 'jobs.id')
            ->select('apply.*','jobs.*', 'jobs.nama as job_nama','apply.id as apply_id','apply.email as apply_email', 'apply.created_at as apply_created_at')
            ->where('jobs.user_id', Auth::user()->id)
            ->where('is_freelance', 1)
            ->get();
        // dd($apply);
        return view('dashboard.freelance',  ['apply' => $apply]);
    }

    public function jobSubmit()
    {
        // inner join apply, job, user 
        $apply = DB::table('apply')
            ->join('jobs', 'apply.job_id', '=', 'jobs.id')
            ->join('users', 'apply.user_id', '=', 'users.id')
            ->select('apply.*','jobs.*', 'jobs.nama as job_nama','users.*' ,'users.nama','apply.id as apply_id','apply.email as apply_email', 'apply.created_at as apply_created_at')
            ->where('jobs.user_id', Auth::user()->id)
            ->where('apply.status', "pending")
            ->where('is_freelance', 0)
            ->get();

        // dd($apply);
        return view('dashboard.jobsubmit', ['apply' => $apply]);
    }

    public function freelanceSubmit()
    {
        $apply = DB::table('apply')
            ->join('jobs', 'apply.job_id', '=', 'jobs.id')
            ->join('users', 'apply.user_id', '=', 'users.id')
            ->select('apply.*','jobs.*', 'jobs.nama as job_nama','users.*' ,'users.nama','apply.id as apply_id','apply.email as apply_email', 'apply.created_at as apply_created_at')
            ->where('jobs.user_id', Auth::user()->id)
            ->where('apply.status', "pending")
            ->where('is_freelance', 1)
            ->get();

        return view('dashboard.freelancesubmit', ['apply' => $apply]);
    }

    public function freelance()
    {
        // $jobs = Job::all()->where('is_freelance', 1);
        $req = request()->all();
        if(count($req) == 0){
            $jobs = DB::table('jobs')->where('is_freelance', 1)->get()->toArray();
        }else{
            $jobs = DB::table('jobs')->where('is_freelance', 1)->where(function ($jobs){
                $req = request()->all();
                if($req['keyword'] != null){
                    $jobs->where('nama', 'like', '%'.$req['keyword'].'%')->where(function($jobs){
                        $req = request()->all();
                        if($req['location']  != null){
                            $jobs->where('lokasi', 'like', '%'.$req['location'].'%')->where(function($jobs){
                                $req = request()->all();
                                if($req['category'] != null){
                                    $jobs->where('tipe_pekerjaan', 'like', '%'.$req['category'].'%');
                                }
                            });
                        }
                    });
                }
            })->get()->toArray();
        }
        $count = count($jobs);
        $tipe_pekerjaan = Job::select('tipe_pekerjaan')->where('is_freelance', 1)->distinct()->get();
        $lokasi = Job::select('lokasi')->where('is_freelance', 1)->distinct()->get();
        return view('freelance', ['jobs' => $jobs, 'count' => $count, 'tipe_pekerjaan' => $tipe_pekerjaan, 'lokasi' => $lokasi]);
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
            'deskripsi' => 'required',
            'lowongan' => 'required',
            'gaji' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'tipe_pekerjaan' => 'required',
            'tanggungjawab' => 'required',
            'kualifikasi' => 'required',
            'benefit' => 'required',
            'deadline' => 'required',
            'is_freelance' => 'required',
        ]);

        $job = Job::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lowongan' => $request->lowongan,
            'kategori' => $request->kategori,
            'gaji' => $request->gaji,
            'lokasi' => $request->lokasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'tanggungjawab' => $request->tanggungjawab,
            'kualifikasi' => $request->kualifikasi,
            'benefit' => $request->benefit,
            'deadline' => $request->deadline,
            'is_freelance' => $request->is_freelance,
        ]);

        $job->save();
        return back()->with('success', 'Job berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        return view('job_details', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('dashboard.postjob_edit', ['job' => $job]);
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
        $job = Job::find($id);
        $job->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lowongan' => $request->lowongan,
            'kategori' => $request->kategori,
            'gaji' => $request->gaji,
            'lokasi' => $request->lokasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'tanggungjawab' => $request->tanggungjawab,
            'kualifikasi' => $request->kualifikasi,
            'benefit' => $request->benefit,
            'deadline' => $request->deadline,
            'is_freelance' => $request->is_freelance,
        ]);

        $job->save();

        return back()->with('success', 'Job berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
 
        return back()->with('success', 'Job berhasil dihapus');
    }
}
