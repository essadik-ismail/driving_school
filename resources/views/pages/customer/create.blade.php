@section('title', trans('customer.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('customers.store')" :title="trans('customer.create_page.title')" :heads="$heads" />
@endsection