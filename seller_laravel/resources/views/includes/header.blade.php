<div id="kt_header" class="header  header-fixed ">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                <!--begin::Header Nav-->
                <ul class="menu-nav ">
                    <li class="menu-item  menu-item-submenu menu-item-rel menu-item-active">
                        <h4>{{__('messages.welcome', ['name' => \App\Models\UserManagement\User::getUserFullName()])}}</h4>
                    </li>
                </ul>
                <!--end::Header Nav-->
            </div>
        </div>
        <!--end::Header Menu Wrapper-->

        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            {{ Metronic::getSVG("assets/media/svg/icons/Code/Compiling.svg", "svg-icon-xl") }}
                            <!--end::Svg Icon-->
                        </span>
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                @include('includes.topbars.notification')
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->

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

            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                     id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{ __('words.hi') }},</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ \App\Models\UserManagement\User::getUserFullName() }}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">{{ substr(strtoupper(\App\Models\UserManagement\User::getUserFullName()), 0, 1) }}</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
