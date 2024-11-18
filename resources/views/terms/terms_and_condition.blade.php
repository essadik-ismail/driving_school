@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="terms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h3 class="text-capitalize breadcrumb-title">{{ trans('menu.terms-menu-title') }}</h3>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Pages</a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.terms-menu-title') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="terms-breadcrumb">
                    <div class="display-1">
                        Terms & Conditions
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-50">
            <div class="col-xl-6 col-sm-8 col-10">
                <div class="terms-content">
                    <div class="terms-content__group">
                        <h1>Privacy Policy</h1>
                        <p>Your privacy is important to us. Any information submitted by the buyer for completing the transaction, delivering the product, informing about new product releases, and addressing any customer service issues are strictly confidential. We don’t share this information with anyone.</p>
                    </div>
                    <div class="terms-content__group">
                        <h1>Payment</h1>
                        <p>To Purchase any of our products, you have the option of paying via PayPal or any major credit and debit cards. Extensions and Themes are licensed for one year at a time. After that you may renew your license to continue updates and support. We do not store your payment or credit card information for your security.</p>
                    </div>
                    <div class="terms-content__group">
                        <h1>License Usage</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    <div class="terms-content__group">
                        <h1>Product Updates</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
                    </div>
                    <div class="terms-content__group">
                        <h1>Media</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
                    </div>
                    <div class="terms-content__group">
                        <h1>Cookies</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
                    </div>
                    <div class="terms-content__group mb-40">
                        <h1>Support</h1>
                        <p>Please, refer <a href="#">Support Policy</a> page for details.</p>
                    </div>
                    <div class="terms-content__update">
                        Last update: May 05, 2021
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection