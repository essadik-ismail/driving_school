@section('title', trans('tenant.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('tenants.store')" :title="trans('tenant.create_page.title')" :heads="$heads" >
        <x-form.select col="col-12 col-sm-12" :data="$plans" id="id" searchkey="plan_name" name="subscription_plan_id" :label="trans('tenant.subscription_plan_id')" />
    </x-form.form>
@endsection