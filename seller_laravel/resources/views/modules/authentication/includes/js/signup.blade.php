<script>
    "use strict";

    // Class Definition
    var KTLogin = function() {
        var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

        var _handleFormSignup = function() {
            // Base elements
            var wizardEl = KTUtil.getById('kt_login');
            var form = KTUtil.getById('kt_login_signup_form');
            var wizardObj;
            var validations = [];

            if (!form) {
                return;
            }

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            // Step 1
            validations.push(FormValidation.formValidation(
                form,
                {
                    fields: {
                        first_name: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('words.first_name')]) }}'
                                }
                            }
                        },
                        last_name: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('words.last_name')]) }}'
                                }
                            }
                        },
                        country_prefix: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.country_prefix')]) }}'
                                }
                            }
                        },
                        phone_number: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.phone_number')]) }}'
                                },
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            ));

            // Step 2
            validations.push(FormValidation.formValidation(
                form,
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.email', 1)]) }}'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.password', 1)]) }}'
                                }
                            }
                        },
                        confirmation_password: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.confirm_password')]) }}'
                                },
                                identical: {
                                    compare: function () {
                                        return form.querySelector('[name="password"]').value;
                                    },
                                    message: '{{ __('validation.confirmed',['attribute'=>trans_choice('words.password', 1)]) }}'
                                },
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            ));

            // Step 3
            validations.push(FormValidation.formValidation(
                form,
                {
                    fields: {
                        category_id: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.store_cat')]) }}'
                                }
                            }
                        },
                        store_type: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.store_type')]) }}'
                                }
                            }
                        },
                        store_name: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('messages.store_name',1)]) }}'
                                }
                            }
                        },
                        store_description: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.store_des')]) }}'
                                }
                            }
                        },
                        store_country: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.country', 1)]) }}'
                                }
                            }
                        },
                        store_state: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.state', 1)]) }}'
                                }
                            }
                        },
                        store_lga: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.lga', 1)]) }}'
                                }
                            }
                        },
                        store_ward: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('words.ward', 1)]) }}'
                                }
                            }
                        },
                        store_address: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.store_address')]) }}'
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            ));

            // Step 4
            validations.push(FormValidation.formValidation(
                form,
                {
                    fields: {
                        bank_id: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>trans_choice('word.bank', 1)]) }}'
                                }
                            }
                        },
                        bank_account_type: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.bank_account_type')]) }}'
                                },
                            }
                        },
                        bank_account_name: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.account_name')]) }}'
                                }
                            }
                        },
                        bank_account_number: {
                            validators: {
                                notEmpty: {
                                    message: '{{ __('validation.required',['attribute'=>__('messages.account_number')]) }}'
                                },
                                digits: {
                                    message: '{{ __('validation.numbers') }}'
                                },
                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: '{{ __('validation.digits',['attribute'=>__('messages.account_number'), 'digits'=>10]) }}'
                                },
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            ));

            // Initialize form wizard
            wizardObj = new KTWizard(wizardEl, {
                startStep: 1, // initial active step number
                clickableSteps: false // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
            });

            // Validation before going to next page
            wizardObj.on('beforeNext', function (wizard) {
                validations[wizard.getStep() - 1].validate().then(function (status) {
                    if (status == 'Valid') {
                        if(wizardObj.currentStep === 4){
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
                                confirmButtonText: "{{ __('messages.please_wait_registration_in_progress') }}....",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            }).then(function() {
                                KTUtil.scrollTop();
                            });
                            $("#kt_login_signup_form").submit(); // Submit the form
                        } else {
                            wizardObj.goNext();
                            KTUtil.scrollTop();
                        }
                    } else {
                        Swal.fire({
                            text: "{{ __('messages.sorry_looks_like_there_are_some_errors')  }}.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
                wizardObj.stop();  // Don't go to the next step
            });

            // Change event
            wizardObj.on('change', function (wizard) {
                KTUtil.scrollTop();
            });
        }

        // Public Functions
        return {
            init: function() {
                _handleFormSignup();
            }
        };
    }();

    // Class Initialization
    jQuery(document).ready(function() {
        KTLogin.init();
    });
</script>

<script>
    function storeUrl()
    {
        document.getElementById("store_url").value = document.getElementById("store_name").value.replace(/\s+/g, '-').toLowerCase();;
        document.getElementById("showURL").innerHTML = document.getElementById("store_name").value.replace(/\s+/g, '-').toLowerCase();;
    }

    function checkStoreName()
    {
        var storeName = document.getElementById("store_name").value;
        var storeURL = document.getElementById("store_url").value;
        document.getElementById("showStoreNameErr").style.display = 'none';
        document.getElementById("showStoreUrlErr").style.display = 'none';

        KTApp.blockPage({
            state: 'primary',
            size: 'lg',
            message: '{{ __('messages.please_wait') }}...',
            overlayColor: 'black',
            opacity: 0.5,
        });

        //Send Api request to check store name
        $.ajax({
            url: '{{ config("app.api_store_url") }}/store-name-check/'+storeName,
            type: 'GET',
            contentType:'application/json',
            headers: {
                'content-type':'application/x-www-form-urlencoded',
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                'Authorization':''
            },
        }).done(function(data) {
            if(data.status && data.status === 200){
                toastr.error('{{ __('messages.store_name_taken') }}');
                document.getElementById("showStoreNameErr").style.display = 'block';
            } else {
                // toastr.success('Congrats!!! Store Name is Available.');
            }
        });

        //Send Api request to check store url
        $.ajax({
            url: '{{ config("app.api_store_url") }}/store-url-check/'+storeURL,
            type: 'GET',
            contentType:'application/json',
            headers: {
                'content-type':'application/x-www-form-urlencoded',
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                'Authorization':''
            },
        }).done(function(data) {
            KTApp.unblockPage();
            if(data.status && data.status === 200){
                toastr.error('{{ __('messages.store_url_taken') }}');
                document.getElementById("showStoreUrlErr").style.display = 'block';
            } else {
                // toastr.success('Congrats!!! Store URL is Available.');
            }
        });
    }

    // Class Initialization
    jQuery(document).ready(function() {
        document.getElementById("showStoreNameErr").style.display = 'none';
        document.getElementById("showStoreUrlErr").style.display = 'none';
    });
</script>

