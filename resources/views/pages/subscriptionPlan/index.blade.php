@section('title', trans('subscriptionPlan.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @livewire('datatable', [
        'model' => 'App\\Models\\SubscriptionPlan',
        'heads' => $heads,
        'title' => trans('subscriptionPlan.index_page.title'),
        'editRoute' => 'subscriptionplans.show',
        'addRoute' => 'subscriptionplans.create',
    ])
@endsection