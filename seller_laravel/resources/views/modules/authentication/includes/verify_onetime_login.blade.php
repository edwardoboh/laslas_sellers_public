<!--begin::Forgot-->
<div class="login-form login-verifyOneTime">
    <!--begin::Form-->
    <form class="form" novalidate="novalidate" id="kt_login_verifyOneTime_form" action="{{ url('verify-onetime-login') }}" method="post">
        @csrf
        <!--begin::Title-->
        <div class="text-center pb-8">
            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('messages.one_time_login') }}</h2>
            <small class="text-muted font-weight-bold font-size-h4">{{ __('messages.check_email_for_otp') }}</small>
            <p id="timer" class="text-muted font-weight-bold font-size-h4">{{ __('messages.resend_otp_in') }} <span style="color:#69aff3;" id="countdown"></span> Time</p>
            <a id="resendOTP" href="javascript:;" class="text-muted font-weight-bold font-size-h4" style="color:#69aff3 !important;">
                {{ __('messages.send_otp_again') }}
            </a>
            <p class="text-muted font-weight-bold font-size-h4">{{ __('messages.enter_your_otp') }}</p>
        </div>
        <!--end::Title-->

        <!--begin::Form group-->
        <input type="hidden" name="user_agent" value="{{ request()->header('user-agent') }}">
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="{{ ucfirst(trans_choice('words.code', 1)) }}" name="code" autocomplete="off"/>
        </div>
        <div class="form-group">
            <input id="kt_login_verifyOneTime_email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" readonly="readonly" autocomplete="off"/>
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
            <button type="button" id="kt_login_verifyOneTime_submit"
                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                {{ __('words.login') }}
            </button>
            <button type="button" id="kt_login_verifyOneTime_cancel"
                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                {{ __('words.cancel') }}
            </button>
        </div>
        <!--end::Form group-->
    </form>
    <!--end::Form-->
</div>
<!--end::Forgot-->
