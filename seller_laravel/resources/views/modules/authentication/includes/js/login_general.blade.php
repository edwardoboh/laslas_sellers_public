<script>
    "use strict";

    // Class Definition
    var KTLogin = function() {
        var _login;

        var _showForm = function(form) {
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';

            _login.removeClass('login-verifyOneTime-on');
            _login.removeClass('login-oneTime-on');
            _login.removeClass('login-signin-on');

            _login.addClass(cls);

            KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
        }

        var _handleSignInForm = function() {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_signin_form'),
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.email', 1)]) }}'
                                },
                                emailAddress: {
                                    message: '{{ __('validation.email',['attribute'=>trans_choice('words.email', 1)]) }}'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.password', 1)]) }}'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signin_submit').on('click', function (e) {
                e.preventDefault();
                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        KTApp.blockPage({
                            overlayColor: 'black',
                            opacity: 0.3,
                        });
                        swal.fire({
                            text: "",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('messages.please_wait') }}....",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        });
                        //Send API call to the backend
                        $.ajax({
                            url: '{{ config("app.api_auth_url") }}/login',
                            type: 'POST',
                            contentType:'application/json',
                            headers: {
                                'content-type':'application/x-www-form-urlencoded',
                                'Accept':'application/json',
                                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                                'Authorization':''
                            },
                            data: {
                                'email':document.getElementById("email").value,
                                'password':document.getElementById("password").value,
                                'user_agent':'{{ request()->server('HTTP_USER_AGENT') }}',
                            },
                        }).done(function(data) {
                            if(data.status && data.status === 200){
                                swal.fire({
                                    text: "",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{ __('messages.logged_in_successfully_fetching_your') }}...",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-info"
                                    }
                                });
                                //Save User accesstoken to session
                                $.ajax({
                                    url: "{{ route('saveToSession') }}",
                                    data: {
                                        'session_function': 'put',
                                        'session_name': 'accessToken',
                                        'session_value': JSON.stringify(data.data.access_token),
                                        '_token':'{{ csrf_token() }}',
                                    },
                                    type: 'post',
                                    success: function(response){}
                                });
                                getUserDetails(data);
                                getUserRoles(data);
                            } else if (data.status && data.status !== 200) {
                                KTApp.unblockPage();
                                toastr.error(data.message);
                                swal.fire({
                                    text: data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: '{{ __('messages.close_and_try_again') }}.',
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-danger"
                                    }
                                });
                            } else {
                                KTApp.unblockPage();
                                toastr.error('{{ __('messages.failed_no_response_found') }}.');
                                swal.fire({
                                    text: "{{ __('messages.failed_no_response_found') }}.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: '{{ __('messages.close_and_try_again') }}.',
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-danger"
                                    }
                                });
                            }
                        });
                        // $("#kt_login_signin_form").submit(); // Submit the form
                    } else {
                        swal.fire({
                            text: "{{ __('messages.sorry_looks_like_there_are_some_errors') }}",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('messages.ok_got_it') }}",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Handle oneTime button
            $('#kt_login_oneTime').on('click', function (e) {
                e.preventDefault();
                var onetimeEmail = localStorage.getItem('onetimeEmail');
                var waitTime = localStorage.getItem('waitTime');
                document.getElementById("kt_login_oneTime_email").value = onetimeEmail;
                if (waitTime && onetimeEmail){
                    // Set the date we're counting down to
                    var countDownDate = new Date(waitTime).getTime();
                    // Update the count down every 1 second
                    var x = setInterval(function() {
                        // Get today's date and time
                        var now = new Date().getTime();
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        // Output the result in an element with id="demo"
                        document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";
                        // If the count down is over, write some text
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("resendOTP").style.display = 'block';
                            document.getElementById("timer").style.display = 'none';
                        }
                    }, 1000);
                    document.getElementById("kt_login_verifyOneTime_form").reset();
                    document.getElementById("kt_login_verifyOneTime_email").value = onetimeEmail;
                    _showForm('verifyOneTime');
                } else {
                    _showForm('oneTime');
                }
            });
        }

        var _handleOneTimeForm = function(e) {
            var validation;
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_oneTime_form'),
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.email', 1)]) }}'
                                },
                                emailAddress: {
                                    message: '{{ __('validation.email',['attribute'=>trans_choice('words.email', 1)]) }}'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_oneTime_submit').on('click', function (e) {
                e.preventDefault();
                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        KTApp.blockPage({
                            state: 'primary',
                            size: 'lg',
                            message: '{{ __('messages.please_wait') }}...',
                            overlayColor: 'black',
                            opacity: 0.5,
                        });

                        //Save the email in localstorage'
                        localStorage.setItem("onetimeEmail", document.getElementById("kt_login_oneTime_email").value);

                        //Send API call to the backend to send code to user's email
                        $.ajax({
                            url: '{{ config("app.api_auth_url") }}/forgot-password-onetime-login',
                            type: 'POST',
                            contentType:'application/json',
                            headers: {
                                'content-type':'application/x-www-form-urlencoded',
                                'Accept':'application/json',
                                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                                'Authorization':''
                            },
                            data: {
                                'verificationType':'One Time Login',
                                'app':'Seller',
                                'email':document.getElementById("kt_login_oneTime_email").value
                            },
                        }).done(function(data) {
                            KTApp.unblockPage();
                            if(data.status && data.status === 200){
                                var onetimeEmail = localStorage.getItem('onetimeEmail');
                                var waitTime = localStorage.getItem('waitTime');
                                const now = new Date();

                                if (waitTime && Date.parse(waitTime) < now){
                                    localStorage.setItem("waitTime", new Date(now.getTime() + 5*60000));
                                } else if(!waitTime){
                                    localStorage.setItem("waitTime", new Date(now.getTime() + 5*60000));
                                    {{--localStorage.setItem("waitTime", '{{ \Carbon\Carbon::now()->addMinutes(5) }}');--}}
                                }

                                document.getElementById("timer").style.display = 'block';
                                document.getElementById("resendOTP").style.display = 'none';
                                var waitTime1 = localStorage.getItem('waitTime');
                                // Set the date we're counting down to
                                var countDownDate = new Date(waitTime1).getTime();
                                // Update the count down every 1 second
                                var x = setInterval(function() {
                                    // Get today's date and time
                                    var now = new Date().getTime();
                                    // Find the distance between now and the count down date
                                    var distance = countDownDate - now;
                                    // Time calculations for days, hours, minutes and seconds
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    // Output the result in an element with id="demo"
                                    document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";
                                    // If the count down is over, write some text
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("resendOTP").style.display = 'block';
                                        document.getElementById("timer").style.display = 'none';
                                    }
                                }, 1000);
                                e.preventDefault();
                                document.getElementById("kt_login_verifyOneTime_form").reset();
                                document.getElementById("kt_login_verifyOneTime_email").value = onetimeEmail;
                                _showForm('verifyOneTime');
                                toastr.success(data.message);
                            } else {
                                toastr.error(data.message);
                            }
                        });
                    } else {
                        swal.fire({
                            text: "{{ __('messages.sorry_looks_like_there_are_some_errors') }}",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('messages.ok_got_it') }}",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_oneTime_cancel').on('click', function (e) {
                e.preventDefault();

                _showForm('signin');
            });
        }

        var _handleVerifyOneTimeForm = function(e) {
            var validation;
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_verifyOneTime_form'),
                {
                    fields: {
                        code: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.email', 1)]) }}'
                                },
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_verifyOneTime_submit').on('click', function (e) {
                e.preventDefault();
                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        KTApp.blockPage({
                            state: 'primary',
                            size: 'lg',
                            message: '{{ __('messages.please_wait') }}...',
                            overlayColor: 'black',
                            opacity: 0.5,
                        });
                        swal.fire({
                            text: "",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('messages.please_wait') }}....",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                        $("#kt_login_verifyOneTime_form").submit(); // Submit the form
                    } else {
                        swal.fire({
                            text: "{{ __('messages.sorry_looks_like_there_are_some_errors') }}",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('messages.ok_got_it') }}",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_verifyOneTime_cancel').on('click', function (e) {
                e.preventDefault();
                _showForm('signin');
            });

            // Handle cancel button
            $('#resendOTP').on('click', function (e) {
                document.getElementById("kt_login_oneTime_email").value = localStorage.getItem('onetimeEmail');
                _showForm('oneTime');
            });
        }

        // Public Functions
        return {
            // public functions
            init: function() {
                _login = $('#kt_login');
                _handleSignInForm();
                _handleOneTimeForm();
                _handleVerifyOneTimeForm();
            }
        };
    }();

    // Class Initialization
    jQuery(document).ready(function() {
        document.getElementById('password').onkeydown = function(e){
            if(e.keyCode === 13){
                document.getElementById('kt_login_signin_submit').click();
            }
        };
        document.getElementById("resendOTP").style.display = 'none';
        KTLogin.init();
    });


    function getUserDetails(data)
    {
        $.ajax({
            url: '{{ config("app.api_user_manager_url") }}/users/'+data.data.id,
            type: 'GET',
            contentType:'application/json',
            headers: {
                'content-type':'application/x-www-form-urlencoded',
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                'Authorization':data.data.access_token
            },
        }).done(function(data_1) {
            if(data_1.status && data_1.status === 200){
                //Save User details to session
                $.ajax({
                    url: "{{ route('saveToSession') }}",
                    data: {
                        'session_function': 'put',
                        'session_name': 'userDetails',
                        'session_value': JSON.stringify(data_1.data),
                        '_token':'{{ csrf_token() }}',
                    },
                    type: 'post',
                    success: function(response){}
                });
                swal.fire({
                    text: "",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('messages.fetching_your_roles_permission_few_secs_more') }}...",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-info"
                    }
                });
            } else if (data.status && data.status !== 200) {
                KTApp.unblockPage();
                toastr.error(data.message);
                swal.fire({
                    text: data.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: '{{ __('messages.close_and_try_again') }}.',
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-danger"
                    }
                });
            } else {
                KTApp.unblockPage();
                toastr.error('{{ __('messages.failed_no_response_found') }}.');
                swal.fire({
                    text: "{{ __('messages.failed_no_response_found') }}.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: '{{ __('messages.close_and_try_again') }}.',
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-danger"
                    }
                });
            }
        });
    }

    function getUserRoles(data)
    {
        $.ajax({
            url: '{{ config("app.api_authorization_url") }}/get-user-roles/'+data.data.id,
            type: 'POST',
            contentType:'application/json',
            headers: {
                'content-type':'application/x-www-form-urlencoded',
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                'Authorization':data.data.access_token
            },
        }).done(function(data_1) {
            if(data_1.status && data_1.status === 200){
                //Save user roles to session
                $.ajax({
                    url: "{{ route('saveToSession') }}",
                    data: {
                        'session_function': 'put',
                        'session_name': 'userRoles',
                        'session_value': JSON.stringify(data_1.data),
                        '_token':'{{ csrf_token() }}',
                    },
                    type: 'post',
                    success: function(response){}
                });
                setTimeout(function(){
                    swal.fire({
                        text: "",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "{{ __('messages.all_done_you_are_now') }}",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-info"
                        }
                    });
                    setTimeout(function(){
                        window.location = "/signin";
                    }, 2000);
                }, 2000);
            } else if (data_1.status && data_1.status !== 200) {
                KTApp.unblockPage();
                toastr.error(data.message);
                swal.fire({
                    text: data.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: '{{ __('messages.close_and_try_again') }}.',
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-danger"
                    }
                });
            } else {
                KTApp.unblockPage();
                toastr.error('{{ __('messages.failed_no_response_found') }}.');
                swal.fire({
                    text: "{{ __('messages.failed_no_response_found') }}.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: '{{ __('messages.close_and_try_again') }}.',
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-danger"
                    }
                });
            }
        });
    }
</script>
