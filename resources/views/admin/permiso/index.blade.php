@extends("theme.$theme.layout")
@section('titulo')
Permisos
@endsection
@section('contenido')
hola
@php
	// $permisos = ['id'=>'1','name'=>'permisoarr1']; 
//var_dump(json_encode($permissions));
@endphp

@foreach($permissions as $permission)
<br>
{{ $permission->name }}
<br>
@endforeach
@endsection


