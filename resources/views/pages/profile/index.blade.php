@section('title', trans('supplier.index_page.head_title'))
@section('description', '')
@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xxl-3 col-lg-4 col-sm-5">
            <div class="card mb-25">
                <div class="card-body text-center p-0">

                    <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">

                        <div class="ap-img mb-20 pro_img_wrapper">
                            <input id="file-upload" type="file" name="fileUpload" class="d-none" accept="image/*">
                            <label for="file-upload" class="cursor-pointer">
                                @if (auth()->user()->tenant?->logo)
                                    <img class="ap-img__main rounded-circle wh-120"
                                        src="{{ asset('storage/' . auth()->user()->tenant->logo) }}" alt="profile">
                                @else
                                    <img class="ap-img__main rounded-circle wh-120" src="{{ asset('default-profile.png') }}"
                                        alt="default profile">
                                @endif
                            </label>
                        </div>

                        <div class="ap-nameAddress pb-3">
                            <h5 class="ap-nameAddress__title"> {{ auth()->user()->name }} </h5>
                            <p class="ap-nameAddress__subTitle fs-14 m-0"> {{ auth()->user()->role }} </p>
                        </div>
                    </div>

                    <div class="ps-tab p-20 pb-25">
                        <div class="nav flex-column text-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-selected="false">
                                <i class="fas fa-cog text-primary me-2"></i> <!-- Icon for Account setting -->
                                Account setting
                            </a>

                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-pwd"
                                role="tab" aria-selected="false">
                                <i class="fas fa-key text-primary me-2"></i> <!-- Icon for Change password -->
                                Change password
                            </a>

                            <a class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-tenant"
                                role="tab" aria-selected="true">
                                <i class="fas fa-user text-primary me-2"></i> <!-- Icon for Edit Tenant -->
                                Edit Tenant
                            </a>

                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-invoice"
                                role="tab" aria-selected="false">
                                <i class="fas fa-users text-primary me-2"></i> <!-- Icon for Invoice setting -->
                                Invoice setting
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-xxl-9 col-lg-8 col-sm-7">
            <div class="mb-50">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <!-- Edit Profile -->
                        <div class="edit-profile">
                            <div class="card py-3">
                                <div class="card-header  px-sm-25 px-3">
                                    <div class="edit-profile__title">
                                        <h6>Account setting</h6>
                                        <span class="fs-13 color-light fw-400">Update your username and manage your
                                            account</span>
                                    </div>
                                </div>
                                <form id="profileForm" method="POST" action="{{ route('profile.settings') }}">
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-6">
                                                <div class="edit-profile__body mx-xl-20">
                                                    @csrf
                                                    <div class="form-group mb-20">
                                                        <label for="name1">username</label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="name1" value="{{ auth()->user()->name }}" />

                                                    </div>
                                                    <div class="form-group mb-1">
                                                        <label for="email45">email</label>
                                                        <input type="email" name="email"
                                                            value="{{ auth()->user()->email }}" class="form-control"
                                                            id="email45" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-xxl-6">
                                                <div class="button-group d-flex flex-wrap pt-35 mb-35">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-default btn-squared me-15 text-capitalize">
                                                        {{ trans('app.submit') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Edit Profile End -->
                    </div>


                    <div class="tab-pane fade" id="v-pills-pwd" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <!-- Edit Profile -->
                        <div class="edit-profile mt-25">
                            <div class="card">
                                <div class="card-header  px-sm-25 px-3">
                                    <div class="edit-profile__title">
                                        <h6>change password</h6>
                                        <span class="fs-13 color-light fw-400">Change or reset your account
                                            password</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-6">
                                            <div class="edit-profile__body mx-xl-20">
                                                <form method="post" action="{{ route('profile.pwd') }}" id="profilePwd">
                                                    @csrf
                                                    <div class="form-group mb-20">
                                                        <label for="name">old passowrd</label>
                                                        <input type="text" name="oldpwd" class="form-control"
                                                            id="name">
                                                    </div>
                                                    <div class="form-group mb-1">
                                                        <label for="password-field">new password</label>
                                                        <div class="position-relative">
                                                            <input id="password-field" type="password"
                                                                class="form-control" name="password"
                                                                placeholder="Password">
                                                            <span
                                                                class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></span>
                                                        </div>
                                                        <small id="passwordHelpInline" class="text-light fs-13">Minimum
                                                            6
                                                            characters
                                                        </small>
                                                        <div class="button-group d-flex flex-wrap pt-45 mb-35">

                                                            <button form="profilePwd" type="submit"
                                                                class="btn btn-primary btn-default btn-squared me-15 text-capitalize">

                                                                {{ trans('app.submit') }}
                                                            </button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Profile End -->
                    </div>


                    <div class="tab-pane fade " id="v-pills-tenant" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <!-- Edit Profile -->
                        <div class="edit-profile">
                            <div class="card">
                                <div class="card-header px-sm-25 px-3">
                                    <div class="edit-profile__title">
                                        <h6>Tenant Settings</h6>
                                        <span class="fs-13 color-light fw-400">Set up tenant information</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-6">
                                            <div class="edit-profile__body mx-xl-20">
                                                <form action="{{ route('profile.tenant') }}" method="post"
                                                    id="profileTenant" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-20">
                                                        <label for="logo">logo</label>
                                                        <input type="file" name="logo" class="form-control"
                                                            id="logo">
                                                    </div>
                                                    <div class="form-group mb-20">
                                                        <label for="names">name</label>
                                                        <input type="text" name="companyName" class="form-control"
                                                            id="names"
                                                            value="{{ auth()->user()->tenant?->companyName }}">
                                                    </div>
                                                    <div class="form-group mb-20">
                                                        <label for="phoneNumber1">phone number</label>
                                                        <input type="tel" name="tel" class="form-control"
                                                            id="phoneNumber1" value="{{ auth()->user()->tenant?->tel }}">
                                                    </div>
                                                    <div class="form-group mb-20">
                                                        <label for="phoneNumber1">GSM</label>
                                                        <input type="tel" name="gsm" class="form-control"
                                                            id="phoneNumber1" value="{{ auth()->user()->tenant?->gsm }}">
                                                    </div>

                                                    <div class="form-group mb-20">
                                                        <label for="phoneNumber1">Adress</label>
                                                        <input type="text" name="address" class="form-control"
                                                            id="phoneNumber1"
                                                            value="{{ auth()->user()->tenant->address }}">
                                                    </div>

                                                    <div class="form-group mb-20">
                                                        <label for="email">Adress</label>
                                                        <input type="email" name="email" class="form-control"
                                                            id="email" value="{{ auth()->user()->tenant->email }}">
                                                    </div>

                                                    <div class="form-group mb-20">
                                                        <label for="website">website</label>
                                                        <input type="website" name="website" class="form-control"
                                                            id="website"
                                                            value="{{ auth()->user()->tenant?->website }}">
                                                    </div>

                                                    <div class="button-group d-flex flex-wrap pt-30 mb-15">

                                                        <button type="submit" form="profileTenant"
                                                            class="btn btn-primary btn-default btn-squared me-15 text-capitalize btn-sm">
                                                            {{ trans('app.submit') }}
                                                        </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Profile End -->
                    </div>



                    <div class="tab-pane fade " id="v-pills-invoice" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <!-- Edit Profile -->
                        <div class="edit-profile edit-social mt-25">
                            <div class="card">
                                <div class="card-header  px-sm-25 px-3">
                                    <div class="edit-profile__title">
                                        <h6>social profiles</h6>
                                        <span class="fs-13 color-light fw-400">Add elsewhere links to your
                                            profile</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-6">
                                            <div class="edit-profile__body mx-xl-20">
                                                <form>
                                                    <div class=" mb-30">
                                                        <label for="socialUrl">facebook</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-facebook bg-facebook text-white wh-44 radius-xs justify-content-center"
                                                                    id="addon-wrapping1">
                                                                    <i class="lab la-facebook-f fs-18"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control--social"
                                                                placeholder="Url" aria-label="Username"
                                                                aria-describedby="addon-wrapping1" id="socialUrl">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-30">
                                                        <label for="twitterUrl">twitter</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-twitter bg-twitter text-white wh-44 radius-xs justify-content-center"
                                                                    id="addon-wrapping2">
                                                                    <i class="lab la-twitter fs-18"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control--social"
                                                                placeholder="@Username" aria-label="Username"
                                                                aria-describedby="addon-wrapping2" id="twitterUrl">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-30">
                                                        <label for="webUrl">Website</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-ruby  bg-ruby text-white wh-44 radius-xs justify-content-center"
                                                                    id="addon-wrapping3">
                                                                    <i class="las la-basketball-ball fs-18"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control--social"
                                                                placeholder="Url" aria-label="Username"
                                                                aria-describedby="addon-wrapping3" id="webUrl">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-30">
                                                        <label for="instagramUrl">instagram</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-instagram  bg-instagram text-white wh-44 radius-xs justify-content-center"
                                                                    id="addon-wrapping4">
                                                                    <i class="lab la-instagram fs-18"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control--social"
                                                                aria-describedby="addon-wrapping4" placeholder="Url"
                                                                id="instagramUrl">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-30">
                                                        <label for="githubUrl">github</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-dark  bg-dark  text-white wh-44 radius-xs justify-content-center"
                                                                    id="addon-wrapping5">
                                                                    <i class="lab la-github fs-18"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control--social"
                                                                placeholder="Username" aria-label="Username"
                                                                aria-describedby="addon-wrapping5" id="githubUrl">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-0">
                                                        <label for="mediumUrl">medium</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-dark bg-dark text-white wh-44 radius-xs justify-content-center"
                                                                    id="addon-wrapping6">
                                                                    <i class="lab la-medium fs-18"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control--social"
                                                                placeholder="Username" aria-label="medium"
                                                                aria-describedby="addon-wrapping6" id="mediumUrl">
                                                        </div>
                                                    </div>
                                                    <div class="button-group d-flex flex-wrap pt-50 mb-15">


                                                        <button
                                                            class="btn btn-primary btn-default btn-squared me-15 text-capitalize">Update
                                                            Social Profiles
                                                        </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Profile End -->
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
