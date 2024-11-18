@section('title','dashboard')
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="crm mb-25">
    <div class="container-fluid">
        <div class="row ">
            @include('components.dashboard.demo_one.overview_cards')
            @include('components.dashboard.demo_one.sales_growth')
            @include('components.dashboard.demo_one.top_sale_products')
            @include('components.dashboard.demo_one.browser_state')
        </div>
    </div>
</div>
@endsection