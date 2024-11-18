@section('title', trans('supplier.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('suppliers.store')" :title="trans('supplier.create_page.title')" :heads="$heads" />
@endsection