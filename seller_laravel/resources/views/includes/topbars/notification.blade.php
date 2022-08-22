<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
    <form>
        <!--begin::Header-->
        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">
            <!--begin::Title-->
            <h4 class="d-flex flex-center rounded-top">
                <span class="text-white">{{__('messages.user_notification')}}</span>
                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
            </h4>
            <!--end::Title-->

            <!--begin::Tabs-->
            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_events">{{ucfirst(trans_choice('words.event', 1))}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">{{ucfirst(trans_choice('words.log', 2))}}</a>
                </li>
            </ul>
            <!--end::Tabs-->
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="tab-content">
            <!--begin::Tabpane-->
            <div class="tab-pane active show p-8" id="topbar_notifications_events" role="tabpanel">
                <!--begin::Nav-->
                <div class="navi navi-hover scroll my-4" data-scroll="true"
                     data-height="300" data-mobile-height="200">
                    <!--begin::Item-->
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-line-chart text-success"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    {{trans_choice('messages.new_order', 1)}}
                                </div>
                                <div class="text-muted">
{{--                                    {{ \Carbon\Carbon::parse('16-08-2022 02:00 PM')->diffForHumans() }}--}}
                                    {{trans_choice('time.minutes_ago', '', ['value' => \Carbon\Carbon::parse('16-08-2022 02:00 PM')])}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-paper-plane text-danger"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Finance report has been generated
                                </div>
                                <div class="text-muted">
                                    {{trans_choice('time.seconds_ago', 23, ['value' => 23])}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end::Item-->
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Tabpane-->

            <!--begin::Tabpane-->
            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                <!--begin::Nav-->
                <div class="d-flex flex-center text-center text-muted min-h-200px">
                    {{__('messages.caught_up')}}
                    <br/>
                    {{__('messages.no_new_notifications')}}
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Tabpane-->
        </div>
        <!--end::Content-->
    </form>
</div>
