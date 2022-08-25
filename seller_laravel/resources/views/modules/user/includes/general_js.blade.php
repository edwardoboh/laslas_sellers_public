<script>
    var validation;
    validation = FormValidation.formValidation(
        document.getElementById('kt_form_1'),
        {
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: '{{ __('validation.required',['attribute'=>__('words.title')]) }}'
                        },
                    }
                },

                first_name: {
                    validators: {
                        notEmpty: {
                            message: '{{ __('validation.required',['attribute'=>__('words.first_name')]) }}'
                        },
                    }
                },

                last_name: {
                    validators: {
                        notEmpty: {
                            message: '{{ __('validation.required',['attribute'=>__('words.last_name')]) }}'
                        },
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
                // Bootstrap Framework Integration
                bootstrap: new FormValidation.plugins.Bootstrap(),
                // Validate fields when clicking the Submit button
                submitButton: new FormValidation.plugins.SubmitButton(),
                // Submit the form when all fields are valid
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            }
        }
    );

    $('#kt_submit').on('click', function (e) {
        e.preventDefault();
        validation.validate().then(function(status) {
            if (status == 'Valid') {
                KTApp.blockPage({
                    state: 'primary',
                    size: 'lg',
                    message: '{{ __('words.processing') }}....',
                    overlayColor: 'black',
                    opacity: 0.5,
                });

                $("#kt_form_1").submit(); // Submit the form

                swal.fire({
                    text: "{{ __('messages.please_wait') }}....",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('words.processing') }}....",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function() {
                    KTUtil.scrollTop();
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


    var KTBootstrapDatepicker = function () {

        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }

        // Private functions
        var demos = function () {
            // minimum setup
            $('#kt_datepicker_1, #kt_datepicker_1_validate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                format: "yyyy-m-d"
            });
        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();
    });
</script>
