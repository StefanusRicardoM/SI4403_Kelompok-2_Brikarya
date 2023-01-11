@extends('dashboard.app_dashboard')

@section('dashboard_profile')
    <h2>Your Job Application</h2>
    <div class="row">
        <div class="job_lists m-0">
            <div class="row">
                @if(count($apply) == 0)
                <div class="col-lg-12 col-md-12">
                    <div class="border p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="fs-5">Anda belum pernah apply</div>
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
                                <div>CV : <a href="/cv/{{$j->cv}}">Akses CV</a></div>
                                <div>Link Portofolio: <a href="/cv/{{$j->link}}">Akses Link</a></div>
                                <div>Dikirim pada : {{$j->apply_created_at}}</div>
                                <div class="flex mt-2">
                                    <a href="{{route('job_details', ['id' => $j->job_id])}}" class="genric-btn info">Job Detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    @if($j->status == 'accept')
                                        <div class="genric-btn info">Diterima</div>
                                    @elseif($j->status == 'pending')
                                        <div class="genric-btn warning">Pending</div>
                                    @elseif($j->status == 'decline')
                                        <div class="genric-btn danger">Ditolak</div>
                                    @endif
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