@extends('layouts.master')
@extends('forum.create')

@section('tittle') Diskusi : {{$forum->user->name}} @endsection

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <!-- Postingan Utama -->
                                <h3 class="panel-title">{{$forum->user->name}} : {{$forum->judul}}</h3>
                                <p class="panel-subtitle">{{$forum->created_at->diffForHumans()}}</p>
                                <div class="right">
                                            @if( auth()->user()->id == $forum->user_id )
                                                <span class="dropdown" style="margin-right:30px;">
                                                    <a href="" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/forum/{{$forum->id}}/delete"> <span>Hapus</span></a></li>
                                                    </ul>
                                                </span>
                                            @endif
                                </div>
                            </div>
                            <div class="panel-body">
                                {{$forum->konten}} <br> <br>
                            <div class="btn-group">
                                <button type="button" id="btn-komentar" class="btn btn-outline-secondary btn-sm"><i class="lnr lnr-bubble"></i> Komentar</button>
                            </div>
                            <form action="" style="margin-top:10px; display:none;" id="komentar-utama" method="POST">
                                @csrf
                                <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                <input type="hidden" name="parent" value="0">
                                <textarea required name="konten" class="form-control" rows="3"></textarea>
                                <input style="margin-top:10px;" type="submit" class="btn btn-primary" value="Balas">
                            </form>
                            <h4 style="margin-top:30px;">Komentar</h4>
                            <ul class="list-unstyled activity-list">
                                @foreach($forum->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komen)
                                <li>
                                    <!-- Komentar 1 -->
                                    <div class="panel-body">
                                        <!-- Isi komentar 1 -->
                                        <div class=" bg-info">
                                            <a href="#">{{$komen->user->name}}</a>
                                            @if( auth()->user()->id == $komen->user_id )
                                                    <span style="margin-left:20px;" class="dropdown top-0 end-0">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/komentar/{{$komen->id}}/delete"> <span>Hapus</span></a></li>
                                                        </ul>
                                                    </span>
                                            @endif
                                            <p>{{$komen->konten}} <span class="timestamp"> {{$komen->created_at->diffForHumans()}} </span>
                                        </div>

                                        <!-- Kolom Balas -->
                                        <form action="" method="POST" id="kolom-balas">
                                            @csrf
                                            <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                            <input type="hidden" name="parent" value=" {{$komen->id}} ">
                                            <input required type="text" name="konten" class="form-control">
                                            <input style="margin-top:10px;" type="submit" class="btn btn-primary btn-xs" value="Balas">
                                        </form>
                                    </div>
                                    
                                    <!-- Komentar 2 -->
                                    <div class="panel-body">
                                        @foreach($komen->childs as $child)
                                        <a style="margin-top:10px; padding-left:5em;" href="#">{{$child->user->name}}</a>
                                        @if( auth()->user()->id == $child->user_id )
                                            <span class="dropdown top-0 end-0" style="margin-left:20px;">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/komentar/{{$child->id}}/delete2"> <span>Hapus</span></a></li>
                                                </ul>
                                            </span>
                                        @endif
                                        <p style="margin-top:10px; padding-left:5em;">{{$child->konten}} <span class="timestamp"> {{$child->created_at->diffForHumans()}} </span></p>
                                        @endforeach
                                    </div>
                                </li>
                                @endforeach
							</ul>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $('#btn-komentar').on('click', function(){
                $('#komentar-utama').toggle('slide');
            });
        });
    </script>
@endsection