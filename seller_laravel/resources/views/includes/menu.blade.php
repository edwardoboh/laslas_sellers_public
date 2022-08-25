<!--begin::Menu Container-->
<div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
    <!--begin::Menu Nav-->
    <ul class="menu-nav ">
        <li class="menu-item  @if(!empty($nav_name) && $nav_name == 'dashboard') menu-item-open menu-item-active @endif" aria-haspopup="true">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                    {{ Metronic::getSVG("assets/media/svg/icons/Design/Layers.svg", "svg-icon-xl") }}
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-text">{{ __('words.dashboard') }}</span>
            </a>
        </li>
        <li class="menu-section ">
            <h4 class="menu-text">{{ __('messages.my_account') }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item  menu-item-submenu @if(!empty($nav_name) && (
    $nav_name == 'my_profile' ||
    $nav_name == 'change_password' ||
    $nav_name == 'notification_settings'
)) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    {{ Metronic::getSVG("assets/media/svg/icons/General/User.svg", "svg-icon-xl") }}
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-text">{{ __('messages.my_account') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu "><i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item @if(!empty($nav_name) && $nav_name == 'my_profile') menu-item-active @endif" aria-haspopup="true">
                        <a href="{{ route('myProfile') }}" class="menu-link ">
                            <i class="menu-bullet menu-bullet-line"><span></span></i>
                            <span class="menu-text">{{ __('messages.my_profile') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="/profile/password" class="menu-link ">
                            <i class="menu-bullet menu-bullet-line"><span></span></i>
                            <span class="menu-text">{{ __('messages.change_password') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="/profile/email" class="menu-link ">
                            <i class="menu-bullet menu-bullet-line"><span></span></i>
                            <span class="menu-text">{{ __('messages.notification_settings') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-section ">
            <h4 class="menu-text">{{ __('messages.store_warehouse') }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-store-alt icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.store', 1) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.shop_dashboard') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.view_shop', 2) }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.create_shop', 1) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-warehouse icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.warehouse', 1) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.view_warehouse', 2) }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.create_warehouse', 1) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-section ">
            <h4 class="menu-text">{{ strtoupper(trans_choice('words.product', 1)) }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-shopping-cart icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.product', 2) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.product_dashboard') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.view_products') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.create_product', 1) }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.product_rating', 2) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-tags icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('messages.product_discount', 2) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.product_discount', 2) }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.create_product_discount') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-gift icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('messages.product_coupon', 2) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.product_coupon', 2) }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.create_product_coupon', 1) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-section ">
            <h4 class="menu-text">{{ __('messages.orders_sales') }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-shopping-bag icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.order', 2) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.order_dashboard') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.view_order', 2) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-comments-dollar icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.sale', 2) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.sales_dashboard') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.view_sale', 2) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-section ">
            <h4 class="menu-text">{{ strtoupper(trans_choice('words.other', 2)) }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
            <a href="" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-rocket icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.subscription', 2) }}</span>
            </a>
        </li>


        <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
            <a href="" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="  fas fa-bullhorn icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.promotion', 2) }}</span>
            </a>
        </li>


        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-wallet icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.wallet', 1) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.wallet_dashboard') }}</span>
                        </a>
                    </li>
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('messages.wallet_transaction', 2)  }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
            <a href="" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="far fa-life-ring icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.support', 1) }}</span>
            </a>
        </li>


        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="far fa-chart-bar icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.report', 1)  }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ __('messages.sales_report') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-icon">
                    <i class="fas fa-cogs icon-md"></i>
                </span>
                <span class="menu-text">{{ trans_choice('words.setting', 2) }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item " aria-haspopup="true">
                        <a href="" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i>
                            <span class="menu-text">{{ trans_choice('words.commission', 2) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <hr>
        <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
            <a href="{{ url('logout') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-sign-out-alt icon-md"></i>
                </span>
                <span class="menu-text">{{ __('words.logout') }}</span>
            </a>
        </li>
    </ul>
    <!--end::Menu Nav-->
</div>
<!--end::Menu Container-->
