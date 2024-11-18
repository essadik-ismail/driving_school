@section('title', trans('category.edit_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    @isset($data)
        <x-form.form method="post" :action="route('categories.update', $data->id)" :title="trans('category.edit_page.title')" :heads="$heads" :data="$data" />
    @endisset
@endsection