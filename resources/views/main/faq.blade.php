@extends('main.layout')

@section('content')
    <!-- Banner Section start -->
    <section class="banner-section inner-banner faqs">
        <div class="overlay">
            <div class="shape-area">
                <img src="{{ asset('images/images-faqs-illus.png') }}" class="faqs-illu" alt="image">
            </div>
            <div class="banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-10">
                            <div class="main-content">
                                <h1>FAQs</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section end -->

    <!-- FAQs In start -->
    <section class="faqs-section faqs-page">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Frequently Asked Questions</h5>
                            <p>Answers for our most popular questions about sportsbetting, peer-to-peer betting on {{ env('APP_NAME') }}</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <ul class="nav" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="cmn-btn active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">general</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="cmn-btn" id="sports-tab" data-bs-toggle="tab" data-bs-target="#sports" type="button" role="tab" aria-controls="sports" aria-selected="false">sports</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-10">
                                <div class="faq-box">
                                    <div class="accordion" id="accordionFaqsGeneral">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralOne" aria-expanded="false" aria-controls="collapseGeneralOne">
                                                    How Do I Bet?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralOne" class="accordion-collapse collapse" aria-labelledby="headingGeneralOne" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>Open a bet / ticket by selecting an a possible event and choosing the outcome, then stake the amount of your choice and submit. </p>
                                                    <p>One or two more Players will bet against your ticket with an equal stake. The ticket is then closed pending the live outcome of the event...</p>
                                                    <p>The player with the winning outcome wins the total stake (Minus Betwewe {{ env('COMISSION') }}% Service Charge) Or You can select an already open ticket with the opposite of your selection and bet against.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralTwo" aria-expanded="false" aria-controls="collapseGeneralTwo">
                                                    What Is {{ env('APP_NAME') }} ?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralTwo" class="accordion-collapse collapse" aria-labelledby="headingGeneralTwo" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>Betwewe is a peer to peer online betting platform.
                                                         Our platform has been designed from the ground up to be tailored to the unique form of betting and settlement.</p>
                                                         <p>Bet against fellow Players on who wins, loses or draws a match with equal stakes Follow these simple steps and make profits!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralThree" aria-expanded="false" aria-controls="collapseGeneralThree">
                                                    How Do I Sign Up?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralThree" class="accordion-collapse collapse" aria-labelledby="headingGeneralThree" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>To register a {{ env('APP_NAME') }} account please visit {{ env('APP_URL') }} and click on the Sign Up button on the top-right of the Home page.</p>
                                                    <p>Fill in the form with your email, country of origin and password to create an account.</p>
                                                    <p>You will receive a Verification notification via email. Please follow the instructions to activate your account.</p>
                                                    <p>You are ready to start playing! Please enter your email and password to log into your account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralFour">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralFour" aria-expanded="false" aria-controls="collapseGeneralFour">
                                                    How to Deposit?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralFour" class="accordion-collapse collapse" aria-labelledby="headingGeneralFour" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>Navigate to the deposit section on your dashboard, choose your preferred method of payment and input the amount you want to deposit and click proceed.</p>
                                                    <p>You will be redirectly to the individual payment gateway, this various gateway will process your transaction and you will redirectly back to {{ env('APP_NAME') }} where value of your deposited amount will be givent to your wallet</p>
                                                    <p>Note! <br> Minimum per transaction is NGN 100.0</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralFive">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralFive" aria-expanded="false" aria-controls="collapseGeneralFive">
                                                    How to Withdraw?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralFive" class="accordion-collapse collapse" aria-labelledby="headingGeneralFive" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>To withdraw your winnings on {{ env('APP_NAME') }}, simply go to the Withdraw section on your dashboard</p>
                                                    <p>Select the bank you wish to withdraw from the list of banks details you previously added. Enter the amount you want to withdraw from your account balance. Finally, click on the "Withdraw" button.</p>
                                                    <p>Your withdrawal request has been queued and your accountwill be credited once one of our agents confirms your requst</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralsix">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralsix" aria-expanded="false" aria-controls="collapseGeneralsix">
                                                    Does it cost any money to register on {{ env('APP_NAME') }}?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralsix" class="accordion-collapse collapse" aria-labelledby="headingGeneralsix" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>No. It’s completely free of charge.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralsaven">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralsaven" aria-expanded="false" aria-controls="collapseGeneralsaven">
                                                    Can I change my email?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralsaven" class="accordion-collapse collapse" aria-labelledby="headingGeneralsaven" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>Unfortunately changing your email will require you to under go the verification process again
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneraleight">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneraleight" aria-expanded="false" aria-controls="collapseGeneraleight">
                                                    How can I retrieve my login details?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneraleight" class="accordion-collapse collapse" aria-labelledby="headingGeneraleight" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>To retrieve your password, please click on “Forgot Password?” below the login area.</p>
                                                    <p>If you have forgotten your email, please contact us.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingGeneralNine">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralNight" aria-expanded="false" aria-controls="collapseGeneralNight">
                                                    How do I change my password?
                                                </button>
                                            </h5>
                                            <div id="collapseGeneralNight" class="accordion-collapse collapse" aria-labelledby="headingGeneralNine" data-bs-parent="#accordionFaqsGeneral">
                                                <div class="accordion-body">
                                                    <p>Login into your dashboard, go to "Settings" on the navbar menue and select "Settings", then click on "Change Password"</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sports" role="tabpanel" aria-labelledby="sports-tab">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-10">
                                <div class="faq-box">
                                    <div class="accordion" id="accordionFaqsSports">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingSportsOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSportsOne" aria-expanded="false" aria-controls="collapseSportsOne">
                                                    What is the minimum age for betting with {{ env('APP_NAME') }}?
                                                </button>
                                            </h5>
                                            <div id="collapseSportsOne" class="accordion-collapse collapse" aria-labelledby="headingSportsOne" data-bs-parent="#accordionFaqsSports">
                                                <div class="accordion-body">
                                                    <p>It is strictly forbidden for persons under the age of 18 to open an account and use our services..</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingSportsTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSportsTwo" aria-expanded="false" aria-controls="collapseSportsTwo">
                                                    Where can I find {{ env('APP_NAME') }}'s Terms & Conditions?
                                                </button>
                                            </h5>
                                            <div id="collapseSportsTwo" class="accordion-collapse collapse" aria-labelledby="headingSportsTwo" data-bs-parent="#accordionFaqsSports">
                                                <div class="accordion-body">
                                                    <p>You can find our Terms and Conditions at the bottom of the website (footer)..</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingSportsThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSportsThree" aria-expanded="false" aria-controls="collapseSportsThree">
                                                    Are there any fees for withdrawals?
                                                </button>
                                            </h5>
                                            <div id="collapseSportsThree" class="accordion-collapse collapse" aria-labelledby="headingSportsThree" data-bs-parent="#accordionFaqsSports">
                                                <div class="accordion-body">
                                                    <p>All withdrawals are free of charges.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingSportsFour">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSportsFour" aria-expanded="false" aria-controls="collapseSportsFour">
                                                    What is the minimum and maximum stake for a bet and for a ticket?
                                                </button>
                                            </h5>
                                            <div id="collapseSportsFour" class="accordion-collapse collapse" aria-labelledby="headingSportsFour" data-bs-parent="#accordionFaqsSports">
                                                <div class="accordion-body">
                                                    <p>The minimum stake amount for a ticket is NGN 100, and the maximum stake amount is NGN 1,000,000..</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQs In end -->
@endsection