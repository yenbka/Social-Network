@extends('layouts.master')

@section('content')
    <body class="landing-page">

    <div class="content-bg-wrap"></div>

    <div class="header-spacer--standard"></div>

    <div class="container">
        <div class="row display-flex">
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="landing-content">
                    <h1>Welcome to the Biggest Social Network in the World</h1>
                    <p>We are the best and biggest social network with 5 billion active users all around the world. Share you
                        thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
                    </p>
                    <a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
                </div>
            </div>

            <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                @include('partials.forms.registration-login-form')
            </div>
        </div>
    </div>
@endsection