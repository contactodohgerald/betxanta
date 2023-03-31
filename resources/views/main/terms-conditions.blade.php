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
                                <h1>Terms Conditions</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
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
    <section class="privacy-content terms">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="top-wrapper">
                            <h5 class="sub-title">Version 5: Effective 4th October 2022</h5>
                            <h4>I. INTRODUCTION AND CONTRACTING PARTIES</h4>
                            <p>These Terms and Conditions shall apply to all aspects of use of the website {{ env('APP_NAME') }} and any of its subdomains (the “Website”), the online betting account via the Website (the “Account”) and the gaming and gambling products and betting services operated via the Website (the “Services”). The Website is operated by {{ env('APP_NAME') }} ({{ env('APP_NAME') }} or “we” or “us” and variations of the same), a company duly organized under the laws of Nigeria, with business registration RC 1035305</p>
                            <p>Please read these General Terms and Conditions carefully before you start to use any section of the Website. By using any section of the Website and/or by registering the Account, you agree to be bound by these Terms & Conditions together with:</p>
                            <ul>
                                <li>&mdash; the <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.</li>
                                <li>&mdash; the <a href="{{ route('faq') }}">FAQ</a>.</li>
                                <li>&mdash; the <a href="{{ route('affiliate') }}">Affiliate</a>.</li>
                            </ul>
                            <p>any other rule and terms and conditions available in the {{ env('APP_NAME') }} Help Pages; and
                                any terms and conditions and/or rules with regards to promotions, bonuses and special offers which may  be made available from time to time (together, the “Terms of Use“). In the event of the conflict or inconsistency between the terms and conditions of the Terms of Use, the order of precedence shall be as set out in this Clause I (2)</p>
                            <p>“User”, “you” and “your” refers to you, the private person accessing any part of the Website, registering an Account and/or using any of the Services. Your continued use of the Website and/or the Services, as the case may be, shall constitute the acceptance of the Terms of Use</p>
                            <div class="safe-data">
                                <h4>II. ACCESS AND USE OF THE WEBSITE AND THE SERVICES</h4>
                                <p>{{ env('APP_NAME') }} does not warrant the constant availability and functionality of the Website or any Services. We reserve the right to withdraw, suspend or amend any aspect or feature of the Website and/or any Service or part of the Service without notice. In addition, {{ env('APP_NAME') }} may, in its absolute discretion, change the content of the Website or the Services (including, without limitation, any of the betting products or elements of these products) at any time.</p>
                                <p>You shall use the Website and any of the Services for your own personal and non-commercial use only. You shall not reproduce the Website or any part of in any form or create links that suggest any form of association, approval, sponsorship or endorsement on our part without {{ env('APP_NAME') }}’s express written consent.</p>
                                <p>Where the Website contains links to other websites and resources provided by third parties, these links are provided for your information only. We have no control over the contents of these sites or resources, and accept no responsibility for them or for any loss or damage that may arise from your use of the same, any of their content or the use of any information they may acquire about you (including personal data). Any such link does not constitute an endorsement by {{ env('APP_NAME') }} of the use of that link, the company or organisation behind that link or the contents of the website reached using that link.</p>
                                <p>If the User uses the Services from any location outside Nigeria, such activity shall be subject to all appropriate exchange control regulations and the laws of the foreign jurisdiction from which such activity originates and it shall be the responsibility of the User to ensure full compliance with the same. {{ env('APP_NAME') }} makes no warranties and shall not be liable to the User if it is not able to remit any monies held by it to any account held by the User in a foreign jurisdiction.</p>
                                <p>The right to access and/or use the Website and/or the Services (including any or all of the products offered via the Website) may be illegal in certain countries (including, for example, the USA). You are responsible for determining whether accessing and/or use of the Website and/or the Services is compliant with the applicable laws in your jurisdiction. The Website and/or any of the Services does not constitute an offer, solicitation or invitation by {{ env('APP_NAME') }} for the use of betting or other services in any countries where such activities are deemed to be illegal. Each person should ensure that he/she would be acting legally in the country where he/she is located while using the Website and/or the Services. Under no circumstances will we be liable for any breach of any state or country law that may occur as a result of your access and/or usage of the Website.</p>
                                <p>The Services are available in Nigerian Naira (NGN) only</p>
                            </div>
                            <div class="safe-data">
                                <h4>III. AMENDMENTS TO THE TERMS OF USE</h4>
                                <p>{{ env('APP_NAME') }} may make changes to any part of the Terms of Use at any time for a number of reasons, including, without limitation, to comply with the applicable laws and regulations. The new version of the Terms of Use will be published on the Website including the effective date of publication. We advise you review the Terms of Use on regular basis.  It is your responsibility to ensure that you understand the Terms of Use. If any of the terms and/or any of the changes to the Terms of Use are unacceptable to you, you should stop using the Website and the Account. Your continued use of the Website, the Account and/or any of the Services will be deemed as your acceptance of any changes that we may make.</p>
                            </div>
                            <div class="safe-data">
                                <h4>IV. ACCOUNT REGISTRATION AND MANAGEMENT</h4>
                                <p>A User must register an Account to utilise any of the Services. {{ env('APP_NAME') }} reserves the right to refuse to register your Account with or without cause.</p>
                                <p>(a) In order to register an Account, you represent, warrant and agree that you are: (i) 18 years old; (ii) you will provide accurate registration information when registering the Account, including, without limitation, full name, the correct date of birth, country of residency, email address and telephone number and notify us of any changes of such details; (iii) you are opening the Account for your personal use and are acting as the principal and not on behalf of third party; (iv) you are legally capable of entering into binding contracts, including these Terms of Use and each subsequent bet or game play.
                                <br>(b)  {{ env('APP_NAME') }} reserves the right to verify the User’s age at any time. In the event that you are found to have breached the clause 2 (a) or any of the representations and warranties therein are deemed false, we may (i) cancel any bet you have placed; (ii) not pay any winnings that may otherwise be payable in respect of such bet; (iii) terminate the Account and (iv) refer the matter to the police, notify the family and/or appropriate regulatory authority</p>
                                <p>By registering an Account and/or using any Services or the Website, you hereby agree that we shall be entitled to conduct any and all such identification, credit and other verification checks from time to time that we may require or deem necessary and/or are required by applicable laws and regulations, and/or by the relevant regulatory authority. You agree to provide all such information as we require in connection with such verification checks. {{ env('APP_NAME') }} shall be entitled to suspend or restrict your Account and/or any of the Services or part thereof in any manner that we may deem to be appropriate, until such time as the relevant checks are completed to our satisfaction. Without limiting the foregoing, in the event we cannot successfully verify any of the elements of the Account registered details or if any information provided is deemed to be false or inaccurate, {{ env('APP_NAME') }} reserves the right to void any of the bets, suspend or terminate your Account and forfeit he balance of your Account. {{ env('APP_NAME') }} reserves the right to engage a third party to perform verification checks. Any information you provide to {{ env('APP_NAME') }} for Account registration or send to {{ env('APP_NAME') }} as part of the Account management or verification procedures shall be used in accordance with the Privacy Policy. <br> It is your responsibility to ensure that all details you provide us in satisfaction of our verification checks are kept up to date</p>
                                <p>You cannot buy, sell or transfer the Account to other User(s). You shall not transfer or sell your Account and/or acquire or accept a transfer of another registered Account with {{ env('APP_NAME') }} from another person.</p>
                                <p>{{ env('APP_NAME') }} does not allow any its employees, anyone else in any way connected to such employee or anyone otherwise connected to a third party service provider or an agent (to be determined at {{ env('APP_NAME') }}’s absolute discretion) to bet on any market or event. All such bets shall be void.</p>
                                <p>Every User may open only one Account. If we have reasonable grounds to believe that you have more than one Account (including any Accounts you opened with misspellings or different variations of your name or email) and we reasonably believe that multiple Accounts have been opened or used in breach of the Terms of Use, we may close your Accounts, or allow you to retain the first Account you opened with us. We will be entitled to declare all bets placed under any duplicate Account(s) as void and withhold any winning payments</p>
                            </div>
                            <div class="safe-data">
                                <h4>V. DEPOSITS AND WITHDRAWALS</h4>
                                <p>You can deposit the funds into your Account with one of the payment methods made available by {{ env('APP_NAME') }}. {{ env('APP_NAME') }} reserves the right to verify the ownership of the payment method(s) utilised to credit your Account and/or ownership or origin of the funds by requesting supporting evidence from you. If you deposit funds using a payment method (bank account, credit or debit card) that is not registered or issued in your name, and without limiting our rights, we may (i) suspend your Account and/or (ii) request from you additional information and documentation we may deem necessary to demonstrate that you are authorised to use the respective payment method. Your Account may remain suspended until you provide and we verify the information and/or documentation requested. Any bank account you register under the Account, at Account registration or otherwise, must be operated by a Nigerian licensed bank and be registered in your name only. In no way does this limit the other remedies that may be available to us in the event that you did not have permission and authorisation to use another person’s payment method or if any of the Services require the deposit(s) to be made from the payment method that is issued or registered in your name. If we determine that a deposit into your Account is made from a payment method held or issued in third party’s name, or from the monies provided to you by a third party to be used for wagering, then we may elect to refund the deposit directly back to its source. If this determination occurs after bets have been placed, your bets will be voided and we will not be obliged to pay any winnings which might otherwise have been payable to you or reimburse you for any loss incurred. {{ env('APP_NAME') }} does not charge the fees for deposits made by bank transfers, credit or debit cards however, your payment provider’s charges may apply. The minimum and maximum deposit amount may apply depending on the type of the payment method you choose and you can only bet up to the amount available on your Account and subject to the minimum and maximum limits then applicable to the bets. Please refer to our FAQs and help pages. Any deposits that are subject to the bonus promotion offer will be regulated by the bonus promotion rules and may not be available for withdrawal.</p>
                                <p>The Account is provided to you solely to enable you to use the Services and pursuant to the Terms of Use only. Your Account should not be used as a banking facility and will not generate any interest. Deposits should only be made with a view to using the funds to place bets. If you, for whatever reason, appear to be depositing or withdrawing money without genuine play, {{ env('APP_NAME') }} reserves the right to suspend or restrict your Account and to investigate the relevant activity. This may result in the Account being terminated.  In such circumstances, we reserve the right, in addition to any other rights we have, to set off from your Account, without prior notice, any bank charges we have incurred.</p>
                                <p>{{ env('APP_NAME') }} reserves the right to change the payment methods we accept from time to time. Furthermore, in our absolute discretion and without giving reason, we reserve the right to refuse to accept any type of payment method presented to us irrespective of whether we have previously accepted such payment method type from you or would usually accept that payment type from any User.</p>
                                <p>The User may withdraw the available cash balance of the Account (this will include any winnings received from any bet made from the cash balance of the Account) by making a withdrawal request. The withdrawals can be made into the bank account only, such bank account registered under your Account subject to Clause 1 of this Section V.</p>
                                <p>{{ env('APP_NAME') }} reserves the right to reject any withdrawal of funds if it appears to be linked with the transactions predominantly performed with the purpose of allowing the transfer of money from one payment method to another, including, without limitation un-played deposits withdrawals and in the event the User cannot provide satisfactory evidence of the payment method ownership.</p>
                            </div>
                            <div class="safe-data">
                                <h4>VI. ASSIGNMENT AND TRANSFER</h4>
                                <p>You may not assign, transfer, charge or otherwise deal in your rights and/or obligations under the Terms of Use without our prior written consent. {{ env('APP_NAME') }} is entitled to assign, transfer, charge or otherwise deal in our rights under these Terms of Use as we see fit.</p>
                            </div>
                            <div class="safe-data">
                                <h4>VII. RELATIONSHIP AND THIRD PARTY RIGHTS</h4>
                                <p>Nothing in the Terms of Use shall create or be deemed to create a partnership, joint venture or principal-agent relationship between the User and {{ env('APP_NAME') }}.</p>
                                <p>Unless expressly stated, nothing in the Terms of Use shall create or confer any rights or any other benefits whether pursuant to the statue or otherwise in favour of any person other than you and {{ env('APP_NAME') }} respectively.</p>
                            </div>
                            <div class="safe-data">
                                <h4>VIII. APPLICABLE LAW AND PLACE OF JURISDICTION</h4>
                                <p>These Terms of Use shall be governed by and interpreted in accordance with the laws of Nigeria and you irrevocably submit to the non- exclusive jurisdiction of the courts of Nigeria in relation to any dispute in relation to the Terms of Use.</p>
                                <p>Any bet placed by the User shall be governed by the applicable provisions of the Nigeria Criminal Code Act, CAP. 22 and any regulations and rules made in terms thereof, as amended from time to time. It shall be the responsibility of the User to ensure that he/she is aware of these provisions.</p>
                            </div>
                            <div class="safe-data">
                                <h4>IX. NO WARRANTY</h4>
                                <p>{{ env('APP_NAME') }}, will endeavour to provide the Website and/or any Services using our reasonable skill and care. We make no further warranty or representation, whether express or implied, in relation to the Website and/or the Services. All implied warranties or conditions of satisfactory quality, fitness for purpose, completeness or accuracy are hereby excluded to the fullest extent permitted by law.</p>
                                <p>No warranty is given as to the uninterrupted provision of any Information or Data via the Website or any part of it, its accuracy or as to the results obtained through its use. The Information or Data is not intended to amount to advice or recommendations and is provided for information purposes only. It should not be relied upon when placing bets, which are made at your own risk and discretion.</p>
                                <p>Further, {{ env('APP_NAME') }}, makes no warranties that the Website and/or any of the Services will meet your requirements or will be uninterrupted, timely, secure or error-free, that defects will be corrected, or that the Website or the server that makes it available or the Services are free of viruses or bugs or represents the full functionality, accuracy, reliability of the materials or as to results or the accuracy of any information obtained by you through the Website.</p>
                            </div>
                             <div class="safe-data">
                                <h4>X. ENTIRE AGREEMENT</h4>
                                <p>The Terms of Use and any document expressly referred to in them and any guidelines or rules posted on the Website represent the entire agreement between Bet9Jja and the User in relation to the subject matter of the Terms of Use and supersede any prior agreement, understanding or arrangement between the User and {{ env('APP_NAME') }}, whether oral or in writing.</p>
                                <p>The current version of the Terms of Use applies to the latest version of Website or any of its component.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Privacy Content In end -->
@endsection