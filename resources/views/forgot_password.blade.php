@extends('layouts.app')

@section('title','Forget Password')
@section('meta_keywords','Forget Password')
@section('meta_description','Forget Password')

@section('content')

<div class="container-fluid main-padding mt-106 login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class='box'>
                    <div class='box-form'>
                        <div class='box-login'>
                            <div class='fieldset-body'>
                                <div class="email-login password-recover">
                                    <h3>Forgot your password?</h3>
                                    <h5>Please enter the email you use to sign in.</h5>
                                    <p class='field'>
                                        <label for='user'>Email</label>
                                        <input type='email' id='user' name='user' />
                                    </p>
                                </div>
                                <a href="{{ url('login') }}" class='forgot-pass new-user pl-0'>Back to Login </a>
                                <!-- new password setting div -->
                                <!-- <div class="email-login new-password">
                                    <h3 class="login-headings">Reset Password</h3>
                                    <p class='field'>
                                        <label for='user'>New Password</label>
                                        <input type='text' id='user' name='user' title='Username' />
                                    </p>
                                    <p class='field'>
                                        <label for='user'>Confirm New Password</label>
                                        <input type='text' id='user' name='user' title='Username' />
                                    </p>
                                </div> -->
                                <input type='submit' id='do_reset' value='Request Password Reset'
                                        class="submit-reg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

