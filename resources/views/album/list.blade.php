<ul>
    @auth
        @php   
            $albums = App\Models\Album::where('user_id', Auth::user()->id)->get();
        @endphp
    @else
        @php
            $albums = App\Models\Album::get();
        @endphp
    @endauth

    @foreach ($albums as $album)
        <li>
            {{ $album->nama }} ({{ App\Models\Foto::where('album_id', $album->id)->count() }} foto)
            @auth
                <a href="{{ route('foto.create') }}" class="btn btn-sm btn-primary">Tambah Foto</a>
                <a href="{{ route('album.edit', [$album->id]) }}" class="btn btn-sm btn-warning">Edit Album</a>
            @endauth    
        </li> 
    @endforeach
</ul>       