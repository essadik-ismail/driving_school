@section('title', trans('category.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Category',
        'join' => [
            [
                'table' => 'units',
                'id' => 'units.id',
                'foreign_key' => 'categories.unit_id',
            ],
        ],
        'conditions' => [
            'categories.tenant_id' => tenant(),
        ],
        'heads' => $heads,
        'title' => trans('category.index_page.title'),
        'editRoute' => 'categories.show',
        'addRoute' => 'categories.create',
    ])
@endsection