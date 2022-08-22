{{--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.png') }}" />

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
        <!--end::Fonts-->

        {{-- Includable CSS --}}
        @yield('styles')

    <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->
        <link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css"/>
        <!--end::Layout Themes-->
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
        <!--begin::Logo-->
        <a href="{{ url('/') }}">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo1_dark.png') }}" style="width:100%; max-height: 50px;"/>
        </a>
        <!--end::Logo-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->

            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->

            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
            {{ Metronic::getSVG("assets/media/svg/icons/General/User.svg", "svg-icon-xl") }}
            <!--end::Svg Icon-->
            </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto " id="kt_brand">
                    <!--begin::Logo-->
                    <a href="{{ route('dashboard') }}" class="brand-logo">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo1_dark.png') }}" style="width:100%; max-height: 55px !important;"/>
                    </a>
                    <!--end::Logo-->

                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                            {{ Metronic::getSVG("assets/media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->

                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    @include('includes.menu')
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                @include('includes.header')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    @include('includes.'.$subheader)
                    <!--end::Subheader-->
                    @yield('content')
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('includes.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1400
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <script>
        localStorage.removeItem('waitTime');
        localStorage.removeItem('onetimeEmail');
    </script>
        @include('includes.javascripts.general')
        @include('includes.javascripts.toastr')

        {{-- Includable JS --}}
        @yield('scripts')
{{--    // TODO remember to clear Onetime Local storage data on arrival to dashboard--}}
    {{--        @include('layout.js.sessionCheck')--}}
    </body>
</html>

