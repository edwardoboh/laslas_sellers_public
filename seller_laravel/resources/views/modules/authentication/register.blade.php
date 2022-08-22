@extends('layouts.guest')
@section('meta')
    <meta property="og:image" content="{{ asset('assets/media/logos/logo.png') }}">
@endsection

@section('styles')
    <style>
        .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple {
            border: 1px solid #ffffff !important;
            height: 65px !important;
        }
    </style>
    <link href="{{ asset('assets/css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-5 px-10">
                <!--begin::Aside header-->
                <a href="#" class="login-logo py-6" style="text-align:center;">
                    <img src="{{ asset('assets/media/logos/logo1_light.png') }}" class="max-h-70px constant-tilt-shake" alt=""/>
                </a>
                <!--end::Aside header-->
                <!--begin::Title-->
                <div class="pb-4 pb-lg-5" style="text-align:center;">
                    <h3 class="font-weight-bolder text-dark display5">{{ __('messages.start_selling_4mins') }}</h3>
                </div>
                <!--begin::Title-->
                <!--begin: Wizard Nav-->
                <div class="wizard-nav d-block d-sm-none mb-3" style="text-align:center;">
                    <span>Seller's Information</span><br>
                    <span>Login Credentials</span><br>
                    <span>Store Information</span><br>
                    <span>Bank Account</span>
                </div>
                <div class="wizard-nav pt-5 d-none d-md-block">
                    <!--begin::Wizard Steps-->
                    <div class="wizard-steps">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">1</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        {{ __('messages.sellers_info') }}
                                    </h3>
                                    <div class="wizard-desc">
                                        {{ __('messages.tell_us_more_about_you') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->

                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">2</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        {{ __('messages.login_credentials') }}
                                    </h3>
                                    <div class="wizard-desc">
                                        {{ __('messages.login_details_such_as') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->

                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">3</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        {{ __('messages.store_info') }}
                                    </h3>
                                    <div class="wizard-desc">
                                        {{ __('messages.tell_us_abt_ur_store') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->

                        <!--begin::Wizard Step 4 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">4</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        {{ __('messages.bank_acct') }}
                                    </h3>
                                    <div class="wizard-desc">
                                        {{ __('messages.you_would_def_need_a_bank') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 4 Nav-->
                    </div>
                    <!--end::Wizard Steps-->
                </div>
                <!--end: Wizard Nav-->
            </div>
            <!--end::Aside Top-->

            <!--begin::Aside Bottom-->
            <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-image: url({{ asset('assets/media/logos/basket.gif') }}); z-index: 1;"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->

        <!--begin::Content-->
        <div class="login-content flex-column-fluid d-flex flex-column p-10">
            <!--begin::Top-->
            <div class="text-right d-flex justify-content-center">
                <div class="top-signup text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
                    <span class="font-weight-bold text-muted font-size-h4">{{ __('messages.already_have_acct') }}?</span>
                    <a href="{{ url('login') }}" class="font-weight-bolder text-primary font-size-h4 ml-2" id="kt_login_signup">{{ __('words.login') }}</a>
                </div>
                <!--begin::Languages-->
                <div class="dropdown" style="margin-left:20px;">
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
            <!--end::Top-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-form-signup">
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" id="kt_login_signup_form" action="{{ url('register') }}" method="post" autocomplete="off">
                        @csrf
                            <input type="hidden" name="role" value="Seller">
                            <input type="hidden" name="user_agent" value="{{ request()->header('user-agent') }}">
                        <!--begin: Wizard Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <!--begin::Title-->
                            <div class="pb-10 pb-lg-15">
                                <h3 class="font-weight-bolder text-dark display5">{{ __('messages.sellers_info') }}</h3>
                            </div>
                            <!--begin::Title-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('words.title') }}</label>
                                    <select class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="title" id="title">
                                        <option value="Mr.">{{ __('words.mr') }}</option>
                                        <option value="Mrs.">{{ __('words.mrs') }}</option>
                                        <option value="Miss">{{ __('words.miss') }}</option>
                                        <option value="Master">{{ __('words.master') }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('words.first_name') }}</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="first_name" placeholder="First Name" value=""/>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('words.last_name') }}</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="last_name" placeholder="Last Name" value=""/>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('words.phone_number') }}</label>
                                    <p>{{ __('messages.if_you_already_signed') }}, <a href="{{ url('become-a-seller') }}">{{ __('messages.click_here') }}</a> {{ __('messages.to_become_a_seller') }}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="country_prefix" id="country_prefix">
                                                @foreach($countries as $country)
                                                    <option {{ $country->prefix == '+234'?'selected':'' }}>{{ $country->prefix }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="number" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" id="phone_number" name="phone_number" placeholder="9012344321" onblur="confirmPhoneNumber('country_prefix','phone_number')" autocomplete="off"/>
                                    </div>
                                    <div class="input-group-prepend">
                                        <p id="showPhoneNumberErr" class="text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form Group-->
                        </div>
                        <!--end: Wizard Step 1-->

                        <!--begin: Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <!--begin::Title-->
                            <div class="pt-lg-0 pt-5 pb-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('messages.login_credentials') }}</h3>
                            </div>
                            <!--begin::Title-->

                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">{{ ucfirst(trans_choice('words.email',1)) }}</label>
                                        <input type="email" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="{{ ucfirst(trans_choice('words.email',1)) }}"/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">{{ ucfirst(trans_choice('words.password',1)) }}</label>
                                        <input type="password" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" placeholder="{{ ucfirst(trans_choice('words.password',1)) }}"/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.confirm_password') }}</label>
                                        <input type="password" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password_confirmation" placeholder="{{ __('messages.confirm_password') }}"/>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end: Wizard Step 2-->

                        <!--begin: Wizard Step 3-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <!--begin::Title-->
                            <div class="pt-lg-0 pt-5 pb-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('messages.store_info') }}</h3>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_type') }}:</label>
                                    <select name="store_type" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option value="">{{ __('messages.select_your_store_type') }}</option>
                                        <option value="individual">{{ __('words.individual') }}</option>
                                        <option value="business">{{ trans_choice('words.business', 1) }}</option>
                                        <option value="company">{{ __('words.company') }}</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 register-class">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_pry_cat') }}:</label>
                                    <select id="category_id" name="category_id" class="form-control select2 h-auto py-7 px-6 border-0 rounded-lg font-size-h6" style="width:100% !important;">
                                        <option value="">{{ __('messages.select_store_pry_cat') }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ trans_choice('messages.store_name',1) }}</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="store_name" id="store_name" placeholder="Store Name" oninput="storeUrl()" onblur="checkStoreName()"/>
                                    <p id="showStoreNameErr" class="text-danger">{{ __('messages.store_name_taken') }}!</p>
                                    <p id="showStoreUrlErr" class="text-danger">{{ __('messages.store_url_taken') }}!</p>
                                    <input type="hidden" name="store_url" id="store_url">
                                </div>
                                <div class="col-lg-12" style="text-align: right;">
                                    <span style="color:#721005; font-weight:bold;">{{ trans_choice('messages.store_url', 1) }}:</span><span style="color:#032a41">(https://laslas.com.ng/store/<span id="showURL"></span>)</span>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_des') }}</label>
                                    <textarea class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" rows="3" name="store_description" id="store_description" placeholder="{{ __('messages.store_des') }}"></textarea>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_country') }}:</label>
                                    <select id="store_country" name="store_country" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" onchange="getStates('store_country', 'store_state')">
                                        <option value="">{{ __('messages.select_country') }}</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_state') }}:</label>
                                    <select id="store_state" name="store_state" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" onchange="getLGAs('store_state', 'store_lga')">
                                        <option value="">{{ __('messages.select_state') }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_lga') }}:</label>
                                    <select id="store_lga" name="store_lga" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" onchange="getWards('store_lga', 'store_ward')">
                                        <option value="">{{ __('messages.select_lga') }}</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_ward') }}:</label>
                                    <select id="store_ward" name="store_ward" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option value="">{{ __('messages.select_ward') }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.store_address') }}</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="store_address" id="store_address" placeholder="{{ __('messages.store_address') }}"/>
                                </div>
                            </div>
                            <!--end::Form Group-->

                        </div>
                        <!--end: Wizard Step 3-->

                        <!--begin: Wizard Step 4-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <!--begin::Title-->
                            <div class="pt-lg-0 pt-5 pb-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('messages.bank_account') }}</h3>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.select_bank') }}:</label>
                                    <select name="bank_id" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option value="">{{ __('messages.select_bank') }}</option>
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.select_bank_type') }}:</label>
                                    <select name="bank_account_type" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option value="">{{ __('messages.select_bank_type') }}</option>
                                        <option value="current">{{ __('messages.current_account') }}</option>
                                        <option value="savings">{{ __('messages.savings_account') }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.account_name') }}</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="bank_account_name" id="bank_account_name" placeholder="{{ __('messages.account_name') }}"/>
                                </div>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('messages.account_number') }}</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="bank_account_number" id="bank_account_number" placeholder="{{ __('messages.account_number') }}"/>
                                </div>
                            </div>
                            <!--end::Form Group-->

                        </div>
                        <!--end: Wizard Step 4-->

                        <!--begin: Wizard Actions-->
                        <div class="d-flex justify-content-between pt-3">
                            <div class="mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pl-6 pr-8 py-4 my-3 mr-3" data-wizard-type="action-prev">
                                    <span class="svg-icon svg-icon-md mr-1">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg-->
                                        {{ Metronic::getSVG("assets/media/svg/icons/Navigation/Left-2.svg", "svg-icon-xl") }}
                                    <!--end::Svg Icon-->
                                    </span>
                                    {{ __('words.previous') }}
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" data-wizard-type="action-submit" id="kt_login_signup_form_submit_button" >
                                    {{ __('words.submit') }}
                                    <span class="svg-icon svg-icon-md ml-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
                                    {{ Metronic::getSVG("assets/media/svg/icons/Navigation/Right-2.svg", "svg-icon-xl") }}
                                        <!--end::Svg Icon-->
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">
                                    {{ trans_choice('messages.next_step', 1) }}
                                    <span class="svg-icon svg-icon-md ml-1">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
                                    {{ Metronic::getSVG("assets/media/svg/icons/Navigation/Right-2.svg", "svg-icon-xl") }}
                                        <!--end::Svg Icon-->
                                    </span>
                                </button>
                            </div>
                        </div>
                        <!--end: Wizard Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@section('script')
    @include('modules.authentication.includes.js.signup')
    @include('modules.authentication.includes.js.select2')
@endsection
