@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Album Foto</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{-- apakah tabel album sudah terisi ? --}}
                    @if (App\Models\Album::count() > 0) 
                        {{-- apakah user sudah login ? --}}
                        @auth 
                            {{-- apakah user ybs sudah memiliki album ? --}}
                            @if (App\Models\Album::where('user_id',Auth::user()->id)->count() > 0) 
                                <h2>Album Foto {{ Auth::user()->name }}</h2>
                                @include('album.list')
                            @else
                                Anda belum memiliki album foto.<br>
                                <a class="btn btn-primary" href="{{ route('album.create') }}">Tambah Album</a>
                            @endif  
                        @else 
                            <h2>Album Foto</h2>
                            @include('album.list')
                        @endif    
                    @else
                        Belum ada album foto yang ditambahkan.<br>
                        @auth 
                            <a class="btn btn-primary" href="{{ route('album.create') }}">Tambah Album</a>
                        @endauth
                    @endif
         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection