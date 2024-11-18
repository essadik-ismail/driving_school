@section('title', trans('employee.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Employee',
        'heads' => $heads,
        'title' => trans('employee.index_page.title'),
        'editRoute' => 'employees.show',
        'addRoute' => 'employees.create',
    ])
@endsection