{{-- @extends('frontend.layout.master')
@section('main')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input class="block mt-1 w-full" id="email" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input class="block mt-1 w-full" id="password" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input class="block mt-1 w-full" id="password_confirmation" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection --}}

@extends('frontend.layout.master')
@section('main')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                        href="#tab-item-register" role="tab" aria-controls="tab-item-register"
                        aria-selected="true">Register</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel"
                    aria-labelledby="register-tab">
                    <div class="register-form">
                        <form method="POST" action="{{ route('register') }}" class="needs-validation">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " name="name" value="{{ old('name') }}"
                                    required="" autocomplete="name" autofocus="">
                                <label for="name">Name</label>
                            </div>
                            <div class="pb-3"></div>
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray" id="email" type="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="username">
                                <label for=" email">Email address *</label>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="mobile" type="text" class="form-control form-control_gray " name="phone"
                                    value="{{old('phone')}}" required="" autocomplete="mobile">
                                <label for="mobile">Mobile *</label>
                                @error('phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " id="password" type="password" name="password"
                                    required autocomplete="new-password">
                                <label for="password">Password *</label>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray" id="password_confirmation" type="password"
                                    name="password_confirmation" required autocomplete="new-password">
                                <label for="password">Confirm Password *</label>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray" id="address" type="text" name="address"
                                    required autocomplete="address" value="{{old('address')}}">
                                <label for="address">Address *</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray" id="city" type="text" name="city" required
                                    autocomplete="city" value="{{old('city')}}">
                                <label for="City">City *</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray" id="postal_code" type="text"
                                    name="postal_code" required autocomplete="postal_code" value="{{old('postal_code')}}">
                                <label for="postal_code">Postal_code *</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray" id="country" type="text" name="country"
                                    required autocomplete="country" value="{{old('country')}}">
                                <label for="country">Country *</label>
                            </div>
                            <div class="d-flex align-items-center mb-3 pb-2">
                                <p class="m-0">Your personal data will be used to support your experience throughout this
                                    website, to
                                    manage access to your account, and for other purposes described in our privacy policy.
                                </p>
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>

                            <div class="customer-option mt-4 text-center">
                                <span class="text-secondary">Have an account?</span>
                                <a href="{{route('login')}}" class="btn-text js-show-register">Login to your Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection