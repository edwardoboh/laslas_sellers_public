<!--begin::Forgot-->
<div class="login-form login-oneTime">
    <!--begin::Form-->
    <form class="form" novalidate="novalidate" id="kt_login_oneTime_form" action="#" method="get">
        <!--begin::Title-->
        <div class="text-center pb-8">
            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('messages.one_time_login') }}</h2>
            <p class="text-muted font-weight-bold font-size-h4">
                {{ __('messages.enter_email_receive_otp') }}
            </p>
        </div>
        <!--end::Title-->

        <!--begin::Form group-->
        <div class="form-group">
            <input type="hidden" name="verificationType" value="One Time Login">
            <input type="hidden" name="app" value="Seller">
            <input type="hidden" name="user_agent" value="{{ request()->header('user-agent') }}">
            <input id="kt_login_oneTime_email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off"/>
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
            <button type="button" id="kt_login_oneTime_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">{{ __('words.submit') }}</button>
            <button type="button" id="kt_login_oneTime_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">{{ __('words.cancel') }}</button>
        </div>
        <!--end::Form group-->
    </form>
    <!--end::Form-->
</div>
<!--end::Forgot-->
