@section('title', trans('supplier.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Supplier',
        'heads' => $heads,
        'title' => trans('supplier.index_page.title'),
        'editRoute' => 'suppliers.show',
        'addRoute' => 'suppliers.create',
    ])
@endsection