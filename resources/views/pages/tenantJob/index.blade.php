@section('title', trans('tenantjob.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Tenantjob',
        'heads' => $heads,
        'title' => trans('tenantjob.index_page.title'),
        'editRoute' => 'tenantjobs.show',
        'addRoute' => 'tenantjobs.create',
    ])
@endsection