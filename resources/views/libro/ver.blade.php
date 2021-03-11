
<div>{{$libro->titulo}}</div>
<div>{{$libro->isbn}}</div>
<div>{{$libro->autor}}</div>
{{-- Local --}}
<div><img src="{{Storage::url("imagenes/caratulas/$libro->foto")}}" alt="Caratula del libro"></div>

{{-- Dropbox --}}
{{-- <div><img src="{{$libro->foto}}" alt="Caratula del libro"></div> --}}