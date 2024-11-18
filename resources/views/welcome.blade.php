@section('title', '')
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Category',
        'join' => [
                'table' => 'test',
                'id' => 'users.id',
                'foreign_key' => 'test.user_id',
            ],
        'conditions' => [
            'type' => 'supplier',
        ],
        'heads' => $heads,
        'title' => 'Categories List',
        'editRoute' => 'categories.show',
        'addRoute' => 'categories.create',
    ])
@endsection
