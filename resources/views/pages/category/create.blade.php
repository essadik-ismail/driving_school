@section('title', trans('category.create_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <x-form.form method="post" :action="route('categories.store')" :title="trans('category.create_page.title')" :heads="$heads" >
        <x-form.select col="col-12 col-sm-12" :data="$units" id="id" searchkey="unit_name" name="unit_id" :label="trans('category.unit_id')" />
    </x-form.form>
@endsection