@extends('main.layout')

@section('content')
     <!-- banner-section start -->
     <section class="banner-section inner-banner terms">
        <div class="overlay">
            <div class="banner-content d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 col-md-10">
                            <div class="main-content">
                                <h1>Privacy Policy</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
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
    <!-- banner-section end -->

    <!-- Privacy Content In start -->
    <section class="privacy-content">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="top-wrapper">
                            <h4>INTRODUCTION</h4>
                            <p>{{ env('APP_NAME') }} Limited ({{ env('APP_NAME') }}, “we”, “us” or “our”) will treat the data you provide us with as private, and shall only use it in accordance with this Privacy Policy. This Privacy Policy describes how we collect and process your personal information through your use of our website (the “site”) and your online account you open with us (the “Account”), to create your Account profile, to ensure security of the website and to enable you to use the products and the Account (collectively the “Services”). The purpose of this policy is to provide a better understanding of:</p>
                            <ul>
                                <li>&mdash; <b>Information we collect </b> </li>
                                <li>&mdash; <b>How do we use this information </b> </li>
                                <li>&mdash; <b>How is the information shared </b> </li>
                                <li>&mdash; <b>Your data rights  </b> </li>
                                <li>&mdash; <b>Other useful privacy and data security related matters </b> </li>
                            </ul>
                            <p>Please take your time to read this policy. It is very important to check our privacy page regularly, for any new updates to the policy. If we make any change that we consider to be important, we will inform you by placing a notice on the relevant service/product and shall contact you using other communication tools at our disposal.</p>
                            <div class="safe-data">
                                <h4>1. WHO IS THE DATA CONTROLLER?</h4>
                                <p>For the purposes of the Services, {{ env('APP_NAME') }} LTD ({{ env('APP_NAME') }}) a company registered under the laws of the Federal Republic of Nigeria is the data controller of your Personal Data and we are located at Tomi’s House, No. 9 Funsho Williams Avenue, Ojuelegba, Surulere, Lagos State. You can contact us on 08099990939..</p>
                            </div>
                            <div class="cookies">
                                <h4>2. WHO IS THE DATA PROTECTION OFFICER</h4>
                                <p>{{ env('APP_NAME') }} has appointed a Data Protection Officer (‘DPO’), who is duly supported by the Compliance Team in the office of the Legal and Compliance Department of KC Gaming Networks Ltd. The role of the DPO involves acting as the contact person for data subjects in relation to the processing of their data. You can contact our DPO using this email address ‘dataprotection@{{ env('APP_NAME') }}.com’or via phone on 01-5158885. If you wish to exercise any of your rights. Kindly see the ‘Your Rights’ section below.</p>
                            </div>
                            <div class="safe-data">
                                <h4>3. INFORMATION WE COLLECT </h4>
                                <p>All references to ‘Personal Data’ in this Privacy Policy refer to any personal information about a natural person which enables that individual to be identified directly or indirectly by reference to the data provided.</p>
                                <p>The Personal Data we receive helps us provide, personalise, and continually improve the Services. We use the information to enable you to use the Services, process payments, communicate with you about your Account activity, products, services and promotional offers, update our records and maintain your Account with us, display content, and recommend our products and services that might be of interest to you. We also use this information to improve our Services, prevent, detect or report fraud or abuses of our Services and enable third parties to carry out technical, logistical, or other functions on our behalf.</p>
                                <p><b>Information you give us: </b> We collect the following information when you open an Account with us: first name, surname, gender, date of birth, place of birth, postal address, email address, phone number, language, currency, a valid original copy of an official document bearing his names and photographs (passport or ID card). You may give us additional information that qualifies as Personal Data as part of your use of the Account and/or any of the Services.</p>
                                <p><b>Cookie Collection:</b> We automatically receive and store certain types of information whenever you interact with our website. We utilise cookies to provide a better customer experience and to enable use of access on our portals. For example, like many websites, we use “cookies,” and other unique identifiers and we obtain certain types of information when your Web browser or device accesses our Services. Refer to your Web browser cookies setting options for more information how to manage your cookies settings. Please note that we may not be able to provide you with all the site features and Services functionalities should you choose not to accept the use of certain types of cookies preferences. Please refer to our cookie policy.</p>
                                <p><b>Information from other sources:</b> We may receive information about you from other sources (such as from the payment providers or third party identity verification service provider) and add it to your Account information and only according to this Privacy Policy.</p>
                                <p>You will also be required to provide login details of your choice, namely a username, password which will be kept by us. We additionally require you to provide us with a payment method and payment details (such as bank transfer, credit card or another acceptable means of payment) in order that you can credit your Account and make the withdrawals.</p>
                                <p>You can access a broad range of information about your Account and your interactions with us, including your Personal Data. You may access that information about you by logging into your Account. You also have the right to access your personal data at any time in order to make alterations to any personal information that may have changed or become obsolete. Should you believe that any personal information we hold for you is incorrect, please contact our customer services here – <a href="mailto:{{ env('APP_MAIL') }}">{{ env('APP_MAIL') }}</a></p>
                            </div>
                            <div class="safe-data">
                                <h4>4. HOW DO WE USE THIS INFORMATION </h4>
                                <p>We process your Personal information  to operate, provide and improve the Services we render for optimal business operations. These purposes include:</p>
                                <ul>
                                    <li>&mdash; <b>Use of {{ env('APP_NAME') }} products and your Account:</b>  We use your Personal Data or information such as your name, email address, phone number  to set up your account, verify your identity, process your bets, process payments to and from your Account and communicate with you about gaming activity, products, services, and promotional offers. The above processing is required and necessary to enable us provide our Services to you in accordance with our terms and conditions. </li>
                                    <li>&mdash; <b>Provide, troubleshoot, and improve the Service:</b> We use your Personal information to provide functionality, analyse performance, fix errors, and improve the ability and effectiveness of the Services. This processing is required for the purpose of our legitimate interests.</li>
                                    <li>&mdash; <b>Communicate with you:</b> We use your personal information to communicate with you in relation to the Services via different channels (e.g., by phone, email, chat).</li>
                                    <li>&mdash; <b>Advertising:</b> Subject to any preferences you have chosen (where applicable), we may use your personal information to display interest-based ads for features, products, and services that might be of interest to you. During the period of our contractual and legal obligations in relation to your information and unless specifically instructed otherwise by you, for a reasonable period of time after the relationship has ended in order to inform you about our products, services, promotions and special offers which we think may be of interest to you. Except where we use your information for marketing purposes on the basis of your prior written consent and subject to any opt out preferences you inform us in relation to electronic direct marketing communications, we process personal information for marketing purposes as required for the purpose of our legitimate interests in promoting our services and products.</li>
                                </ul>
                                </ul>
                            </div>
                            <div class="cookies">
                                <h4>5. HOW IS THE INFORMATION SHARED</h4>
                                <p>Your personal information may be disclosed or transferred to other organisation, subject to appropriate agreement or consent or legitimate purpose. We shall only share your information with other companies and organisations where there is a legal obligation to provide your information or there is a legitimate requirement to share the information, and we take into consideration and ensure that appropriate checks and suitable measures are in place for any data that is shared is protected in line with Data Protection Regulations in force.</p>
                                <ul>
                                    <li>&mdash; <b>Making payments:</b> Depending on which payment service you use, you may need to disclose your Personal Data or part of it to your payment provider. Note that the payment provider already has your Personal Data to provide you with the payment services and their use of any Personal Data disclosed by us will be regulated by the payment provider’s privacy policy.</li>
                                    <li>&mdash; <b>Third-parties service providers:</b> We engage with the technology providers, financial institutions, other companies, and individuals to perform functions on our behalf and transactions that you request or authorise. Examples include sending e-mail, analysing data, providing marketing information on our products subject to your consent, processing payment transactions, verifying identity, fraud screening, and providing customer service. They have access to personal information needed to perform their functions, and shall not use it for other purposes and must process the personal information in accordance with this Privacy Policy and as permitted by the applicable data protection legislation. Such third party service providers may be based outside of Nigeria in the jurisdictions, including the European Economic Area jurisdictions, that provide adequate levels of protection of personal data.</li>
                                    <li>&mdash; <b>Advertising and Third-party Analytics providers:</b> We may also use third party analytics providers, including Google, to collect information about the usage of our Services and to enable us to improve how our Services work. Google Analytics and comparable providers use cookies and other similar technologies to collect information about the usage of our Services and to report website trends to us.</li>
                                    <li>&mdash; <b>Business Transfers:</b> As we continue to develop our business, we might sell or buy other businesses or services. In such transactions, user or other customer information generally is one of the transferred business assets but remains subject to the promises made in any pre-existing Privacy Policy. Also, in the unlikely event that {{ env('APP_NAME') }} or substantially all of its assets are acquired, user information will of course be one of the transferred assets.</li>
                                </ul>
                                <p>{{ env('APP_NAME') }} shall only be responsible for its obligations to you in relation to your Personal Data as the data controller under the applicable laws.</p>
                                <p>Our Services may include third-party advertising and links to other websites and apps.  We do not provide any personally identifiable user information to these advertisers or third-party web sites. If you access a page via a link on our site which takes you to an external website, you take time to read through the privacy policy of the new website which you enter.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create Account In end -->
@endsection