@extends('layouts.main',['activePage' => 'dashboard', 'titlePage' => __('Usuarios')])

@section('template_title')
    Create User
@endsection

@section('content')
    
    {{$user->roles->name}}
@endsection
