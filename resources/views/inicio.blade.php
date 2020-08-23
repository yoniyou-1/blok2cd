<!--script type="text/javascript"> window.location = "{{url('/admin')}}";    </script-->

@if (Auth::guest())
<script type="text/javascript"> window.location = "{{url('/seguridad/login')}}";    </script>
@else
@extends("theme.$theme.layout")
@include('includes.mensaje')
@endif