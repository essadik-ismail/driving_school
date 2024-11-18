@section('title', trans('employee.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('employees.store')" :title="trans('employee.create_page.title')" :heads="$heads" >
        <x-form.select col="col-12 col-sm-12" :data="$tenantjobs" id="id" searchkey="title" name="tenant_job_id" />
    </x-form.form>
@endsection