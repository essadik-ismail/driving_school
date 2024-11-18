@section('title', trans('subscriptionPlan.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('subscriptionplans.store')" :title="trans('subscriptionPlan.create_page.title')" :heads="$heads" />
@endsection