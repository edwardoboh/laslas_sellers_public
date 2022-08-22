<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">{{ \Carbon\Carbon::now()->format('Y') }}&copy;</span>
            <a href="{{ env('APP_URL') }}" target="_blank" class="text-dark-75 text-hover-primary">LasLas</a>
        </div>
        <!--end::Copyright-->

        <!--begin::Nav-->
        <div class="nav nav-dark">
            <a href="{{ url('') }}" target="_blank" class="nav-link pl-0 pr-5">{{ __('words.about') }}</a>
            <a href="{{ url('') }}" target="_blank" class="nav-link pl-0 pr-5">{{ trans_choice('words.term', 2) }}</a>
            <a href="{{ url('') }}" target="_blank" class="nav-link pl-0 pr-0">{{ __('messages.contact_us') }}</a>
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Container-->
</div>
