@extends('layouts.master')
@extends('forum.create')


@section('tittle') Forum @endsection

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
            @if (session('sukses'))
                <a href="#" class="notification-item"><span class="dot bg-success"></span>{{session('sukses')}}</a>
            @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>Forum Diskusi</h3>
                                <div class="right">
                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#createModal"> Buat Post </a>
                                </div>
                            </div>
                            <div class="panel-body">
							<!-- TIMELINE -->
                                @foreach($forum as $frm) <br>
                                <div class="panel">
                                    <div style="margin-bottom:7px;" class=" col-sm-12 btn-primary btn-lg">
                                        <div class="left">
                                            <p>
                                                {{ $frm->user->name }} : {{ $frm->judul }}
                                                <br>
                                                <span class="timestamp" class=" text-black-50">{{ $frm->created_at->diffForHumans() }}</span>
                                            </p>                 
                                        </div>
                                        <div class="right">
                                            <a href="/forum/{{$frm->id}}/view" class="btn btn-success btn-xs">Lihat</a>
                                        </div>
                                    </div>
                                </div><br/>
                                @endforeach
							<!-- END TIMELINE -->
						    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection