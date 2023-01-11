@extends('dashboard.app_dashboard')

@section('dashboard_profile')
    <h2>Job Submission</h2>
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
    <div class="row">
        <div class="job_lists m-0">
            <div class="row">
                @if(count($apply) == 0)
                <div class="col-lg-12 col-md-12">
                    <div class="border p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="fs-5">Belum ada Submission</div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach($apply as $j)
                <div class="col-lg-12 col-md-12">
                    <div class="border p-3 mb-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="fs-4">{{$j->job_nama}}</div>
                                <div>Nama Pengirim : {{$j->nama}}</div>
                                <div>Email : {{$j->apply_email}}</div>
                                <div>CV : <a href="/storage/{{$j->cv}}">Akses CV</a></div>
                                <div>Link Portofolio: <a href="{{$j->link}}">Akses Link</a></div>
                                <div>Dikirim pada : {{$j->apply_created_at}}</div>
                                <div class="flex mt-2">
                                    <a href="{{route('job_details', ['id' => $j->job_id])}}" class="genric-btn info">Job Detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <div>
                                            <form action="{{route('apply.applyDecision', ['id' => $j->apply_id, 'status' => 'accept'])}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="genric-btn primary">Terima</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{route('apply.applyDecision', ['id' => $j->apply_id, 'status' => 'decline'])}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="genric-btn danger">Tolak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection