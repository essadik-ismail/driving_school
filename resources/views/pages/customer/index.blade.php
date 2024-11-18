@section('title', trans('customer.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Customer',
        'heads' => $heads,
        'title' => trans('customer.index_page.title'),
        'editRoute' => 'customers.show',
        'addRoute' => 'customers.create',
    ])
@endsection