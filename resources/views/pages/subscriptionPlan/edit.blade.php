@section('title', trans('subscriptionPlan.edit_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @isset($data)
        <x-form.form method="post" :action="route('subscriptionplans.update', $data->id)" :title="trans('SubscriptionPlan.edit_page.title')" :heads="$heads" :data="$data" />
    @endisset
@endsection