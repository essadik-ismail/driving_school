@section('title', trans('employee.edit_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @isset($data)
        <x-form.form method="post" :action="route('employees.update', $data->id)" :title="trans('employee.edit_page.title')" :heads="$heads" :data="$data" />
    @endisset
@endsection