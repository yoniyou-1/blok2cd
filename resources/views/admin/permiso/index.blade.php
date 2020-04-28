@extends("theme.$theme.layout")
@section('titulo')
Permisos
@endsection
@section('contenido')

@php
	// $permisos = ['id'=>'1','name'=>'permisoarr1']; 
var_dump(json_encode($permissions));
@endphp


@endsection


