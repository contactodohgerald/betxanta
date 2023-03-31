@extends('main.layout')

<style>
    .alternative-contact{
        padding: 8px;
    }
    .contact-type .contact-body {
        display: table;
        width: 100%;
        height: 108px;
        table-layout: fixed;
        border-bottom: 1px solid #e1e8ed;
    }
    .contact-type .contact-body:last-child {
        border-bottom: transparent;
    }
    .contact-body .icon{
        display: table-cell;
        width: 34%;
        height: 100%;
        vertical-align: middle;
        background-repeat: no-repeat;
        background-position: center;
    }
    .contact-body .type-body{
        display: table-cell;
        width: 100%;
        vertical-align: middle;
    }
</style>

@section('content')
     <!-- Banner Section start -->
     <section class="banner-section inner-banner contact">
        <div class="overlay">
            <div class="shape-area">
                <img src="{{ asset('images/images-index-bg.png') }}" class="contact-illu" alt="image">
            </div>
            <div class="banner-content">
                <div class="container">
                    <div class="content-shape">
                        <img src="{{ asset('images/images-coin-1.png')}}" class="obj-1" alt="image">
                        <img src="{{ asset('images/images-coin-3.png')}}" class="obj-2" alt="image">
                        <img src="{{ asset('images/images-coin-3.png')}}" class="obj-3" alt="image">
                        <img src="{{ asset('images/images-coin-4.png')}}" class="obj-4" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section end -->

    <!-- Contact In start -->
    <section class="contact-section">
        <div class="overlay">
            <div class="container bg-area">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="mt-5" style="background-color: #40444f; padding: 8px 0 8px 10px; height: 29px; cursor: default">
                            <h6 class="title">Contact Us</h6>
                        </div>
                        <p>Got a question for us? We endeavor to answer all enquiries within 24 hours on business days. We will be happy to answer your questions. </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-10">
                        <div class="btn-border w-100">
                            <button class="cmn-btn w-100" data-bs-toggle="modal" data-bs-target="#contact-us">Send Message</button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mt-5" style="background-color: #40444f; padding: 8px 0 8px 10px; height: 29px; cursor: default">
                            <h6 class="title">Alternative contact methods</h6>
                        </div>
                        <div class="alternative-contact">
                            <div class="contact-type">
                                <div class="contact-body phone">
                                    <div class="icon">
                                        <img src="{{ asset('images/mobile-phone.png') }}" height="80" width="80" alt="icon">
                                    </div>
                                    <div class="type-body">
                                        <p>To Send {{ config('app.name', 'Betxanta') }}  message on WhatsApp, <a href="https://wa.me/2348187238690?text=welcome to betxanta, how can we be of help / services to you?" target="_blank">+2348187238690</a> </p>
                                        <p>(Operating hours are 07:00am to 22:00pm).</p>
                                    </div>
                                </div>
                                <div class="contact-body twitter">
                                    <div class="icon">
                                        <img src="{{ asset('images/twitter-logo.png') }}" height="80" width="80" alt="icon">
                                    </div>
                                    <div class="type-body">
                                        <p>Have a quick question for us?</p>
                                        <p>Get in touch through our Twitter customer service here:</p>
                                        <p><a href="https://twitter.com/xanta_codes">https://twitter.com/betxanta-help</a></p>
                                    </div>
                                </div>
                                <div class="contact-body address">
                                    <div class="icon">
                                        <img src="{{asset('images/address-icon.png')}}" height="80" width="80" alt="icon">
                                    </div>
                                    <div class="type-body">
                                        <p>{{ env('APP_NAME') }}</p>
                                        <p>Tomi's House,</p>
                                        <p>9 Funsho Williams Avenue,</p>
                                        <p>By Fire Service Station,</p>
                                        <p>Ojuelegba Bus stop, Lagos</p>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact In end -->

    {{-- contact modal section --}}
    <div class="betpopmodal">
        <div class="modal fade" id="contact-us" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-8 col-xl-9 col-lg-11">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="setting-personal-details">
                                        <h5>Get In Touch With Us</h5>
                                        <form action="{{ route('contact-us') }}" method="POST">@csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" name="name" placeholder="What's your name?" required>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label for="email">Email Address</label>
                                                        <input type="email" id="email" name="email" placeholder="What's your Email?">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-input">
                                                        <label for="subject">Subject</label>
                                                        <input type="text" id="subject" name="subject" placeholder="Enter Your Subject?" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-input">
                                                        <label for="message">Message</label>
                                                        <textarea id="message" name="message" placeholder="I would like to get in touch with you..." cols="30" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-10">
                                                    <div class="btn-border w-100 mt-40">
                                                        <button class="cmn-btn w-100" type="submit">Send Message</button>
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
            </div>
        </div>
    </div>
@endsection