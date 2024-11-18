@section('title', trans('tenant.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\Tenant',
        'join' => [
            [
                'table' => 'subscription_plans',
                'id' => 'subscription_plans.id',
                'foreign_key' => 'tenants.subscription_plan_id',
            ],
        ],
        'heads' => $heads,
        'title' => trans('tenant.index_page.title'),
        'editRoute' => 'tenants.show',
        'addRoute' => 'tenants.create',
    ])
@endsection
