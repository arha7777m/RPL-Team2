@extends('layouts.master')

@section('tittle') Profil Saya @endsection

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
        @if (session('sukses'))
            <a href="#" class="notification-item"><span class="dot bg-success"></span>{{session('sukses')}}</a>
        @endif
            <div class="panel">
                <div class="panel-body">
                    <h1>Profil Saya</h1> <br>
                    <form method="POST" action="/profilsaya">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}" required autocomplete="name">
                                
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong> {{$message}} </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input name="nim" type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" value="{{$user->nim}}" required autocomplete="nim">
                                
                                @error('nim')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-2 col-form-label">Program Studi</label>
                            <div class="col-sm-10">
                                <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{$user->jurusan}}" required autocomplete="jurusan">
                                
                                @error('jurusan')
                                    <span class="invalid-feedback">
                                        <strong> {{$message}} </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}" required autocomplete="email">
                                
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Kosongkan jika tidak ingin diubah">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection