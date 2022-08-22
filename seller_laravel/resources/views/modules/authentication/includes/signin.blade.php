<!--begin::Signin-->
<div class="login-form login-signin">
    <!--begin::Form-->
    <form class="form" novalidate="novalidate" id="kt_login_signin_form" action="{{ url('signin') }}" method="post">
    @csrf
    @include('includes.notifications')

    <!--begin::Title-->
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ ucfirst(__('words.sign_in')) }}</h3>
            <span class="text-muted font-weight-bold font-size-h4">{{ ucfirst(__('messages.new_here')) }}?
                <a href="{{ url('register') }}" class="text-primary font-weight-bolder">{{ __('messages.create_an_account') }}</a>
            </span>
        </div>
        <!--begin::Title-->

        <!--begin::Form group-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" id="email" name="email" autocomplete="off"/>
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group">
            <div class="d-flex justify-content-between mt-n5">
                <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{ ucfirst(trans_choice('words.password', 1)) }}</label>
                <a href="{{ url('https://laslas.com.ng/forgot-password') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">
                    {{ __('messages.forgot_password') }} ?
                </a>
            </div>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" id="password"  name="password" autocomplete="off"/>
        </div>
        <!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group" style="text-align:right;">
            <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_oneTime">
                {{ __('messages.one_time_login') }}?
            </a>
        </div>
        <!--end::Form group-->

        <!--begin::Action-->
        <div class="form-group">
            <div class="pb-lg-0 pb-5">
                <button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{ ucwords(__('words.sign_in')) }}</button>
                <a href="{{ url('/auth/google') }}" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
                    <span class="svg-icon svg-icon-md">{{ Metronic::getSVG("assets/media/svg/social-icons/google.svg", "svg-icon-xl") }}</span>{{ __('messages.signin_with_google') }}
                </a>
            </div>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
</div>
<!--end::Signin-->
