@extends('layouts.app')
@section('title', 'User Register')
@section('frontcontent')

<div class="login_wrapper">
      <section class="about_se about_left_image py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="about_img about_sign_img">
              <img src="{{asset('frontend/img/signup.png')}}" alt="">
              </div>
            </div>
            <div class="col-md-6">
            <form method="POST" action="{{ route('user.register') }}" class="contact_form"> @csrf
                  <div class="tittle_heading">
                  <h2>SIGN UP TO YOUR <span>ACCOUNT</span></h2>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="custn_input">
                      <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name"  placeholder="Full Name"  class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="custn_input">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"  placeholder="test@gmail.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="custn_input">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"  placeholder="Enter your password" class="block mt-1 w-full" type="password" name="password"   autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="custn_input">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" placeholder="Enter your confirm password" class="block mt-1 w-full" type="password"  name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                      </div>
                    </div>
                    </div>
                  <div class="contact_form_btn">
                    <button class="theme_btn">Send</button>
                  </div>
                  <p>Already have an account? <a href="{{ route('user.login') }}">sign-In </a></p>
                </form>
              </div>
          </div>
        </div>
      </section>
    </div>

@endsection
