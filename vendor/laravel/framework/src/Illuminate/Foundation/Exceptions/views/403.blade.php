@extends('errors::minimal')

@section('title', __('Sin permisos'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'No tienes los permisos requeridos'))
