@extends('layouts.default')
@section('meta')
    <meta property="og:image" content="{{ asset('assets/media/logos/logo2_dark.png') }}">
@endsection

@section('styles')
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
        @include('includes.notifications')
        <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label" style="background-image:url({{ asset($userProfilePicture) }})"></div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="{{ route('myProfile') }}" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                        {{ \Illuminate\Support\Str::limit($userFullName, 15, $end='...') }}
                                    </a>
                                    <div class="text-muted">
                                        @foreach($userRoles as $key=>$userRole)
                                            {{ $userRole->name }} {{ $key==0?'|':'' }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">{{ trans_choice('words.email', 1) }}:</span>
                                    <a href="javascript:;" class="text-muted text-hover-primary">{{ $user->email }}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">{{ __('words.phone_number') }}:</span>
                                    <span class="text-muted">{{ $user->country_prefix.'-'.$user->phone_number }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">{{ __('words.nationality') }}:</span>
                                    <span class="text-muted">{{ $user->nationality }}</span>
                                </div>
                            </div>
                            <!--end::Contact-->

                            <!--begin::Nav-->
                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">

                                <div class="navi-item mb-2">
                                    <a href="{{ route('myProfile') }}" class="navi-link py-4 active">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                {{ Metronic::getSVG("assets/media/svg/icons/Design/Layers.svg", "svg-icon-xl") }}
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Profile Overview</span>
                                    </a>
                                </div>

                                <div class="navi-item mb-2">
                                    <a href="{{ route('changePassword') }}" class="navi-link py-4">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                {{ Metronic::getSVG("assets/media/svg/icons/Code/Lock-circle.svg", "svg-icon-xl") }}
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Change Password</span>
                                    </a>
                                </div>

                                <div class="navi-item mb-2">
                                    <a href="{{ route('myProfile') }}" class="navi-link py-4 ">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                {{ Metronic::getSVG("assets/media/svg/icons/General/Notifications1.svg", "svg-icon-xl") }}
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Notification Configuration</span>
                                    </a>
                                </div>

                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">{{ __('messages.user_profile') }}</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">{{ __('messages.update_your_personal_info') }}</span>
                            </div>
                            <div class="card-toolbar">
                                <button type="reset" class="btn btn-success mr-2" id="kt_submit">Save Changes</button>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" id="kt_form_1" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <h1>{{ __('messages.personal_info') }}</h1>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.profile_picture') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('assets/media/users/blank.png') }})">
                                            <div class="image-input-wrapper" style="background-image: url({{ asset($userProfilePicture) }})"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_picture" accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">{{ trans_choice('messages.allowed_file_type', 2) }}:  png, jpg, jpeg.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.title') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-lg form-control-solid" type="text" name="title">
                                            <option {{ $user->title == 'Mr.'?'selected':'' }} value="Mr.">{{ __('words.mr') }}</option>
                                            <option {{ $user->title == 'Mrs.'?'selected':'' }} value="Mrs.">{{ __('words.mrs') }}</option>
                                            <option {{ $user->title == 'Miss.'?'selected':'' }} value="Miss.">{{ __('words.miss') }}</option>
                                            <option {{ $user->title == 'Master.'?'selected':'' }} value="Master.">{{ __('words.master') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.first_name') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" value="{{ $user->first_name }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.middle_name') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="middle_name" value="{{ $user->middle_name }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.last_name') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" value="{{ $user->last_name }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.gender') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-lg form-control-solid" type="text" name="gender">
                                            <option value="">Select Your Gender</option>
                                            <option {{ $user->gender == 'Male'?'selected':'' }} value="Male">{{ __('words.male') }}</option>
                                            <option {{ $user->gender == 'Female'?'selected':'' }} value="Female">{{ __('words.female') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.martial_status') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-lg form-control-solid" type="text" name="marital_status">
                                            <option value="">Select Your Marital Status</option>
                                            <option {{ $user->marital_status == 'Married'?'selected':'' }} value="Married">{{ __('words.married') }}</option>
                                            <option {{ $user->marital_status == 'Single'?'selected':'' }} value="Single">{{ __('words.single') }}</option>
                                            <option {{ $user->marital_status == 'Divorced'?'selected':'' }} value="Divorced">{{ __('words.divorced') }}</option>
                                            <option {{ $user->marital_status == 'Others'?'selected':'' }} value="Others">{{ trans_choice('words.other', 2) }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('messages.date_of_birth') }}</label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <div class="input-group date">
                                            <input id="kt_datepicker_1" type="text" class="form-control form-control-lg form-control-solid" placeholder="Select date" name="date_of_birth" value="{{ $user->date_of_birth }}"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.religion') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-lg form-control-solid" type="text" name="religion">
                                            <option value="">Select Your Religion</option>
                                            <option {{ $user->religion == 'Christian'?'selected':'' }} value="Married">{{ __('words.christian') }}</option>
                                            <option {{ $user->religion == 'Muslim'?'selected':'' }} value="Single">{{ __('words.muslim') }}</option>
                                            <option {{ $user->religion == 'Others'?'selected':'' }} value="Others">{{ trans_choice('words.other', 2) }}</option>
                                        </select>
                                    </div>
                                </div>

                                <h1>{{ __('messages.contact_info') }} </h1>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ trans_choice('words.email', 1) }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                            <input type="text" class="form-control form-control-solid" readonly disabled value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                        {{ __('words.phone_number') }}
                                    </label>
                                    <div class="col-lg-9 col-xl-6">
                                        <small>{{ __('messages.note_changing_phone_number_would') }}</small>
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="form-control form-control-lg form-control-solid" type="text" name="country_prefix">
                                                    @foreach($countries as $country)
                                                        <option {{ $user->country_prefix == '+'.$country->prefix?'selected':'' }} value="{{ $country->prefix }}">{{ $country->prefix }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-lg form-control-solid" type="number" name="phone_number" value="{{ $user->phone_number }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ trans_choice('words.country', 1) }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select id="country_id" class="form-control form-control-lg form-control-solid" type="text" name="country_id" onchange="getStates('country_id','state_id')">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option {{ !empty($user->country->id) && $user->country->id == $country->id?'selected':'' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ trans_choice('words.state', 1) }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select id="state_id" class="form-control form-control-lg form-control-solid" type="text" name="state_id" onchange="getLGAs('state_id','lga_id')">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                                <option {{ !empty($user->state->id) && $user->state->id == $state->id?'selected':'' }} value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ trans_choice('words.lga', 1) }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select id="lga_id" class="form-control form-control-lg form-control-solid" type="text" name="lga_id" onchange="getWards('lga_id','ward_id')">
                                            <option value="">Select Lga</option>
                                            @foreach($lgas as $lga)
                                                <option {{ !empty($user->lga->id) && $user->lga->id == $lga->id?'selected':'' }} value="{{ $lga->id }}">{{ $lga->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ trans_choice('words.ward', 1) }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select id="ward_id" class="form-control form-control-lg form-control-solid" type="text" name="ward_id">
                                            <option value="">Select Ward</option>
                                            @foreach($wards as $ward)
                                                <option {{ empty($user->ward->id) && $user->ward->id == $ward->id?'selected':'' }} value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('messages.house_address') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" class="form-control form-control-solid" name="house_address" value="{{ $user->house_address }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('words.nationality') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" class="form-control form-control-solid" name="nationality" value="{{ $user->nationality }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ __('messages.state_of_origin') }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" class="form-control form-control-solid" name="state_of_origin" value="{{ $user->state_of_origin }}" />
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Personal Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('scripts')
    @include('modules.user.includes.general_js')
    @include('modules.user.includes.profile_js')
@endsection
