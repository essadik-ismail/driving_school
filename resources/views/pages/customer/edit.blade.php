@section('title', trans('customer.edit_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @isset($data)
        <x-form.form method="post" :action="route('customers.update', $data->id)" :title="trans('customer.edit_page.title')" :heads="$heads" :data="$data" />
    @endisset
@endsection