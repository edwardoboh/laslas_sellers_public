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
                                            {{ $userRole['name'] }} {{ $key==0?'|':'' }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <a href="javascript:;" class="text-muted text-hover-primary">{{ $user->email }}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Phone:</span>
                                    <span class="text-muted">{{ $user->country_prefix.'-'.$user->phone_number }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Nationality:</span>
                                    <span class="text-muted">{{ $user->nationality }}</span>
                                </div>
                            </div>
                            <!--end::Contact-->

                            <!--begin::Nav-->
                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">

                                <div class="navi-item mb-2">
                                    <a href="{{ route('myProfile') }}" class="navi-link py-4 ">
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
                                    <a href="{{ route('myProfile') }}" class="navi-link py-4 ">
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
                                                {{ Metronic::getSVG("assets/media/svg/icons/Design/Layers.svg", "svg-icon-xl") }}
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Email Configuration</span>
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
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Personal
                                    Information</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                            </div>
                            <div class="card-toolbar">
                                <button type="reset" class="btn btn-success mr-2">Save Changes</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Form-->
                        <form class="form">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">Customer Info</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                             style="background-image: url(assets/media/users/blank.png)">
                                            <div class="image-input-wrapper"
                                                 style="background-image: url(assets/media/users/300_21.jpg)"></div>

                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                   data-action="change" data-toggle="tooltip" title=""
                                                   data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar"
                                                       accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>

                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                  data-action="cancel" data-toggle="tooltip"
                                                  title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                  data-action="remove" data-toggle="tooltip"
                                                  title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                        </div>
                                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="text" value="Nick"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="text" value="Bold"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="text" value="Loop Inc."/>
                                        <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-phone"></i></span></div>
                                            <input type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   value="+35278953712" placeholder="Phone"/>
                                        </div>
                                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-at"></i></span></div>
                                            <input type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   value="nick.bold@loop.com" placeholder="Email"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="Username" value="loop"/>
                                            <div class="input-group-append"><span class="input-group-text">.com</span>
                                            </div>
                                        </div>
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

@section('script')
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
@endsection
