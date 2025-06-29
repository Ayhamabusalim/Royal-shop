@extends('backend.layout.master')
@section('main')
    <div class="section-content-right">

        <div class="header-dashboard">
            <div class="wrap">
                <div class="header-left">
                    <a href="index-2.html">
                        <img class="" id="logo_header_mobile" alt="" src="images/logo/logo.png"
                            data-light="images/logo/logo.png" data-dark="images/logo/logo.png" data-width="154px"
                            data-height="52px" data-retina="images/logo/logo.png">
                    </a>
                    <div class="button-show-hide">
                        <i class="icon-menu-left"></i>
                    </div>


                    <form class="form-search flex-grow">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2"
                                value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                        <div class="box-content-search" id="box-content-search">
                            <ul class="mb-24">
                                <li class="mb-14">
                                    <div class="body-title">Top selling product</div>
                                </li>
                                <li class="mb-14">
                                    <div class="divider"></div>
                                </li>
                                <li>
                                    <ul>
                                        <li class="product-item gap14 mb-10">
                                            <div class="image no-bg">
                                                <img src="images/products/17.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Dog Food
                                                        Rachael Ray Nutrish®</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-10">
                                            <div class="divider"></div>
                                        </li>
                                        <li class="product-item gap14 mb-10">
                                            <div class="image no-bg">
                                                <img src="images/products/18.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Natural
                                                        Dog Food Healthy Dog Food</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-10">
                                            <div class="divider"></div>
                                        </li>
                                        <li class="product-item gap14">
                                            <div class="image no-bg">
                                                <img src="images/products/19.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Freshpet
                                                        Healthy Dog Food and Cat</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="">
                                <li class="mb-14">
                                    <div class="body-title">Order product</div>
                                </li>
                                <li class="mb-14">
                                    <div class="divider"></div>
                                </li>
                                <li>
                                    <ul>
                                        <li class="product-item gap14 mb-10">
                                            <div class="image no-bg">
                                                <img src="images/products/20.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Sojos
                                                        Crunchy Natural Grain Free...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-10">
                                            <div class="divider"></div>
                                        </li>
                                        <li class="product-item gap14 mb-10">
                                            <div class="image no-bg">
                                                <img src="images/products/21.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Kristin
                                                        Watson</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-10">
                                            <div class="divider"></div>
                                        </li>
                                        <li class="product-item gap14 mb-10">
                                            <div class="image no-bg">
                                                <img src="images/products/22.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Mega
                                                        Pumpkin Bone</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-10">
                                            <div class="divider"></div>
                                        </li>
                                        <li class="product-item gap14">
                                            <div class="image no-bg">
                                                <img src="images/products/23.png" alt="">
                                            </div>
                                            <div class="flex items-center justify-between gap20 flex-grow">
                                                <div class="name">
                                                    <a href="product-list.html" class="body-text">Mega
                                                        Pumpkin Bone</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </form>

                </div>
                <div class="header-grid">

                    <div class="popup-wrap message type-header">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="header-item">
                                    <span class="text-tiny">1</span>
                                    <i class="icon-bell"></i>
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                                <li>
                                    <h6>Notifications</h6>
                                </li>
                                <li>
                                    <div class="message-item item-1">
                                        <div class="image">
                                            <i class="icon-noti-1"></i>
                                        </div>
                                        <div>
                                            <div class="body-title-2">Discount available</div>
                                            <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                                                at, ullamcorper nec diam</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-item item-2">
                                        <div class="image">
                                            <i class="icon-noti-2"></i>
                                        </div>
                                        <div>
                                            <div class="body-title-2">Account has been verified</div>
                                            <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                                                et</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-item item-3">
                                        <div class="image">
                                            <i class="icon-noti-3"></i>
                                        </div>
                                        <div>
                                            <div class="body-title-2">Order shipped successfully</div>
                                            <div class="text-tiny">Integer aliquam eros nec sollicitudin
                                                sollicitudin</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-item item-4">
                                        <div class="image">
                                            <i class="icon-noti-4"></i>
                                        </div>
                                        <div>
                                            <div class="body-title-2">Order pending: <span>ID 305830</span>
                                            </div>
                                            <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#" class="tf-button w-full">View all</a></li>
                            </ul>
                        </div>
                    </div>




                    <div class="popup-wrap user type-header">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="header-user wg-user">
                                    <span class="image">
                                        <img src="images/avatar/user-1.png" alt="">
                                    </span>
                                    <span class="flex flex-column">
                                        <span class="body-title mb-2">ayham</span>
                                        <span class="text-tiny">Admin</span>
                                    </span>
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                                <li>
                                    <a href="#" class="user-item">
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <div class="body-title-2">Account</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="user-item">
                                        <div class="icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="body-title-2">Inbox</div>
                                        <div class="number">27</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="user-item">
                                        <div class="icon">
                                            <i class="icon-file-text"></i>
                                        </div>
                                        <div class="body-title-2">Taskboard</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="user-item">
                                        <div class="icon">
                                            <i class="icon-headphones"></i>
                                        </div>
                                        <div class="body-title-2">Support</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html" class="user-item">
                                        <div class="icon">
                                            <i class="icon-log-out"></i>
                                        </div>
                                        <div class="body-title-2">Log out</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="main-content">

            <style>
                .text-danger {
                    font-size: initial;
                    line-height: 36px;
                }

                .alert {
                    font-size: initial;
                }
            </style>

            <div class="main-content-inner">
                <div class="main-content-wrap">
                    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                        <h3>Settings</h3>
                        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                            <li>
                                <a href="#">
                                    <div class="text-tiny">Dashboard</div>
                                </a>
                            </li>
                            <li>
                                <i class="icon-chevron-right"></i>
                            </li>
                            <li>
                                <div class="text-tiny">Settings</div>
                            </li>
                        </ul>
                    </div>

                    <div class="wg-box">
                        <div class="col-lg-12">
                            <div class="page-content my-account__edit">
                                <div class="my-account__edit-form">
                                    <form name="account_edit_form" action="#" method="POST"
                                        class="form-new-product form-style-1 needs-validation" novalidate="">

                                        <fieldset class="name">
                                            <div class="body-title">Name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="text" placeholder="Full Name" name="name"
                                                tabindex="0" value="{{old('name')}}" aria-required="true" required="" >
                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title">Mobile Number <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Mobile Number" name="mobile"
                                                tabindex="0" value="{{old('mobile')}}" aria-required="true" required="" >
                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title">Email Address <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Email Address" name="email"
                                                tabindex="0" value="{{old('email')}}" aria-required="true" required="">
                                        </fieldset>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-3">
                                                    <h5 class="text-uppercase mb-0">Password Change</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="name">
                                                    <div class="body-title pb-3">Old password <span
                                                            class="tf-color-1">*</span>
                                                    </div>
                                                    <input class="flex-grow" type="password" placeholder="Old password"
                                                        id="old_password" name="old_password" aria-required="true"
                                                        required="" value="">
                                                </fieldset>

                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="name">
                                                    <div class="body-title pb-3">New password <span
                                                            class="tf-color-1">*</span>
                                                    </div>
                                                    <input class="flex-grow" type="password" placeholder="New password"
                                                        id="new_password" name="new_password" aria-required="true"
                                                        required="">
                                                </fieldset>

                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="name">
                                                    <div class="body-title pb-3">Confirm new password <span
                                                            class="tf-color-1">*</span></div>
                                                    <input class="flex-grow" type="password"
                                                        placeholder="Confirm new password" cfpwd=""
                                                        data-cf-pwd="#new_password" id="new_password_confirmation"
                                                        name="new_password_confirmation" aria-required="true" required="">
                                                    <div class="invalid-feedback">Passwords did not match!
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-3">
                                                    <button type="submit" class="btn btn-primary tf-button w208">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bottom-page">
                <div class="body-text">Copyright © 2024 SurfsideMedia</div>
            </div>
        </div>

    </div>
@endsection