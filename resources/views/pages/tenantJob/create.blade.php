@section('title', trans('tenantjob.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('tenantjobs.store')" :title="trans('tenantjob.create_page.title')" :heads="$heads" />
@endsection