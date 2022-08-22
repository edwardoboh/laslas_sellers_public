<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ $header_title }} </h5>
            <!--end::Page Title-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                @foreach($breadcrumbs as $breadcrumb)
                    <li class="breadcrumb-item">
                        <a href="{{ route($breadcrumb['url']) }}" class="text-muted">{{ $breadcrumb['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--end::Info-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Daterange-->
            <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker">
                <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">{{ __('words.today') }}</span>
                <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">{{ \Carbon\Carbon::now()->format('F d') }}</span>
            </a>
            <!--end::Daterange-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>
