@extends('layouts.guest')
@section('meta')
    <meta property="og:image" content="{{ asset('assets/media/logos/logo.png') }}">
@endsection

@section('styles')
    <link href="{{ asset('assets/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login" style="background-image: linear-gradient(to right, #ddedf3 , white);">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #ffffff;">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="text-center mb-10">
                    <img class="max-h-70px constant-tilt-shake" src="{{ asset('assets/media/logos/logo1_light.png') }}" alt=""/>
                </a>
                <!--end::Aside header-->

                <!--begin::Aside title-->
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
                    {!! __('messages.login_welcome') !!}
                </h3>
                <!--end::Aside title-->
            </div>
            <!--end::Aside Top-->

            <!--begin::Aside Bottom-->
            <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-image: url({{ asset('assets/media/logos/basket1.gif') }}); z-index: 1;"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->


        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Top-->
            <div class="container">
                <div class="text-right">
                    <!--begin::Languages-->
                    <div class="dropdown">
                        <!--begin::Toggle-->
                        <div class="topbar-item" data-toggle="dropdown" data-offset="30px,0px">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" style="width:100px;">
                                <img class="h-20px w-20px rounded-sm mr-1" src="{{ asset('assets/media/svg/flags/086-nigeria.svg') }}" alt=""/>{{ Config::get('languages')[App::getLocale()] }}
                            </div>
                        </div>
                        <!--end::Toggle-->

                        <!--begin::Dropdown-->
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Nav-->
                            <ul class="navi navi-hover py-4">
                                @foreach(Config::get('languages') as $lang => $language)
                                    @if($language != Config::get('languages')[App::getLocale()])
                                        <!--begin::Item-->
                                        <li class="navi-item">
                                            <a href="{{ route('switchLanguage', $lang) }}" class="navi-link">
                                                <span class="symbol symbol-20 mr-3">
                                                    <img class="h-20px w-20px rounded-sm mr-1" src="{{ asset('assets/media/svg/flags/086-nigeria.svg') }}" alt=""/>
                                                </span>
                                                <span class="navi-text">{{ $language }}</span>
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                    @endif
                                @endforeach
                            </ul>
                            <!--end::Nav-->
                        </div>
                        <!--end::Dropdown-->
                    </div>
                    <!--end::Languages-->
                </div>
            </div>
            <!--end::Top-->
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Signin-->
                @include('modules.authentication.includes.signin')
                <!--end::Signin-->

                <!--begin::oneTime-->
                @include('modules.authentication.includes.onetime_login')
                <!--end::Signin-->

                <!--begin::oneTime-->
                @include('modules.authentication.includes.verify_onetime_login')
            </div>
            <!--end::Content body-->

            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <a href="#" class="text-primary font-weight-bolder font-size-h5">{{ trans_choice('words.term', 2) }}</a>
                <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">{{ trans_choice('words.plan', 1) }}</a>
                <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">{{ __('messages.contact_us') }}</a>
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@section('script')
    @include('modules.authentication.includes.js.login_general')
@endsection
