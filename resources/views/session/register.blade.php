@extends('layouts.user_type.guest')

@section('content')
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg"
            style="background-image: url('../assets/img/curved-images/register.jpg');">
            <span class="mask bg-gradient-dark opacity-2"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Fellow Alumni Kindly Register Your Account Here.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col  col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Alumni Registration Form</h5>
                    </div>
                    <div class="container">
                        <div class="card-body">
                            <form role="form text-left" method="POST" action="/register" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Full name</label>
                                        <input type="text" class="form-control" placeholder="Fullname" name="name"
                                            id="name" aria-label="Name" aria-describedby="name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label>Title</label>
                                        <select class="form-control" id="title" name="title" required>
                                            <option value="Blank">----</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Miss">Miss</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nickname</label>
                                        <input type="text" class="form-control" placeholder="Nickname" name="nickname"
                                            id="nickname" value="{{ old('nickname') }}">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email"
                                            id="email" aria-label="Email" aria-describedby="email-addon"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password"
                                            id="password" aria-label="Password" aria-describedby="password-addon" required>
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" placeholder="Contact Number"
                                            name="contact_number" id="contact_number" value="{{ old('contact_number') }}"
                                            required>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <label>Birthday</label>
                                            <input type="date" class="form-control" name="birthday" id="birthday"
                                                required>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <label>Gender</label>
                                            <select id="gender" name="gender" class="form-control" required>
                                                <option value="">----</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <label>Civil Status</label>
                                            <select class="form-control" id="civil_status" name="civil_status" required>
                                                <option value="">----</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Home Address" name="address"
                                            id="address" value="{{ old('address') }}" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <label>Business Name/Job Role</label>
                                            <input type="text" class="form-control" placeholder="Job/Business"
                                                name="job_business" id="job_business" value="{{ old('job_business') }}">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>Business/Job Address</label>
                                            <input type="text" class="form-control" placeholder="Business Address"
                                                name="business_address" id="business_address"
                                                value="{{ old('business_address') }}">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row mt-3">
                                        <h6>Educational Background</h6>
                                        <div class="col-md-6 mt-3">
                                            <label>High School Graduated</label>
                                            <input type="text" class="form-control"
                                                placeholder="High School Graduated" name="high_school" id="high_school"
                                                value="{{ old('high_school  ') }}">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label>Year Completed</label>
                                            <input type="text" class="form-control" placeholder="Year completed"
                                                name="high_school_yg" id="high_school_yg"
                                                value="{{ old('high_school_yg') }}">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>Senior High School Graduated</label>
                                            <input type="text" class="form-control"
                                                placeholder="Senior High School Graduated" name="senior_highschool"
                                                id="senior_highschool" value="{{ old('senior_highschool') }}">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label>Year Completed</label>
                                            <input type="text" class="form-control" placeholder="Year completed"
                                                name="senior_highschool_yg" id="senior_highschool_yg"
                                                value="{{ old('senior_highschool_yg') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label>Batch Graduated</label>
                                        <input type="text" class="form-control" placeholder="Batch Graduated"
                                            name="college_batch" id="college_batch" value="{{ old('college_batch') }}"
                                            required>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                      <label>Proof of Identification</label>
                                    <input type="file" name="proof_of_identification" class="form-control" accept="image/*" required>
                                    </div>

                                    <div class="form-check form-check-info text-left mt-3">
                                        <input class="form-check-input" type="checkbox" name="agreement"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" required>
                                            I agree to the <a data-bs-toggle="modal" data-bs-target="#viewTermsandConditions"
                                                class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                        @error('agreement')
                                            <p class="text-danger text-xs mt-2">First, agree to the Terms and Conditions, then
                                                try register again.</p>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                            up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="login"
                                            class="text-dark font-weight-bolder">Sign in</a></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>


    <!-- Modal For Viewing Terms and Conditions-->
    <div class="modal fade" id="viewTermsandConditions" tabindex="-1" role="dialog"
        aria-labelledby="modalForViewingTermsandConditions" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div style="center-align">
                        <h5 class="modal-title" id="modalForViewingTermsandConditions">
                            Alumni Information System Terms and Conditions
                        </h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-sm text-bold mb-0">
                                1. AGREEMENT TO TERMS<br>
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These Terms of Use constitute a legally binding
                                agreement made between you, whether
                                personally or on behalf of an entity (“you”)
                                and Alumni Information System ("Company," “we," “us," or “our”), concerning your access to
                                and use of the
                                generic-ais.online website as well as any other media form, media channel, mobile website or
                                mobile application related, linked, or otherwise connected thereto (collectively, the
                                “Site”). We are students from Ateneo de Naga University in the Philippines. You agree that by accessing the Site, you have
                                read, understood, and agreed to be bound by all of these Terms of Use.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IF YOU DO
                                NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN YOU ARE
                                EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST
                                DISCONTINUE USE IMMEDIATELY.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supplemental terms and conditions or documents that may
                                be posted on the Site
                                from time to time are hereby expressly incorporated herein by reference. We reserve
                                the right, in our sole discretion, to make changes or modifications to these Terms of
                                Use at any time and for any reason. We will alert you about any changes by updating
                                the “Last updated” date of these Terms of Use, and you waive any right to receive
                                specific notice of each such change. Please ensure that you check the applicable
                                Terms every time you use our Site so that you understand which Terms apply. You will be
                                subject to, and will be deemed to have been made aware of and to have
                                accepted, the changes in any revised Terms of Use by your continued use of the Site
                                after the date such revised Terms of Use are posted.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The information provided on the Site is not intended for
                                distribution to or use by any
                                person or entity in any jurisdiction or country where such distribution or use would be
                                contrary to law or regulation or which would subject us to any registration
                                requirement within such jurisdiction or country. Accordingly, those persons who
                                choose to access the Site from other locations do so on their own initiative and are
                                solely responsible for compliance with local laws, if and to the extent local laws are
                                applicable.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Site is intended for users who are at least 18 years
                                old. Persons under the age
                                of 18 are not permitted to use or register for the Site.
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                2. INTELLECTUAL PROPERTY RIGHTS
                            </p>
                            <p class="text-xs text-secondary text-bold mb-0">
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unless otherwise indicated, the Site is our proprietary
                                property and all source code,
                                databases, functionality, software, website designs, audio, video, text, photographs,
                                and graphics on the Site (collectively, the “Content”) and the trademarks, service
                                marks, and logos contained therein (the “Marks”) are owned or controlled by us or
                                licensed to us, and are protected by copyright and trademark laws and various other
                                intellectual property rights and unfair competition laws of the United States,
                                international copyright laws, and international conventions. <br><br>The Content and the
                                Marks are provided on the Site “AS IS” for your information and personal use only.
                                Except as expressly provided in these Terms of Use, no part of the Site and no
                                Content or Marks may be copied, reproduced, aggregated, republished, uploaded,
                                posted, publicly displayed, encoded, translated, transmitted, distributed, sold,
                                licensed, or otherwise exploited for any commercial purpose whatsoever, without our
                                express prior written permission.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provided that you are eligible to use the Site, you are
                                granted a limited license to
                                access and use the Site and to download or print a copy of any portion of the Content
                                to which you have properly gained access solely for your personal, non-commercial
                                use. We reserve all rights not expressly granted to you in and to the Site, the Content
                                and the Marks.
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                3. USER REPRESENTATIONS
                            </p>
                            <p class="text-xs text-secondary text-bold mb-0">
                                <br>
                                By using the Site, you represent and warrant that:
                                <br>
                                <br>(1) all registration information you
                                submit will be true, accurate, current, and complete;
                                <br>(2) you will maintain the
                                accuracy of such information and promptly update such registration information as
                                necessary;
                                <br>(3) you have the legal capacity and you agree to comply with these Terms
                                of Use;
                                <br>(4) you are not a minor in the jurisdiction in which you reside; (5) you will not
                                access the Site through automated or non-human means, whether through a bot,
                                script, or otherwise;
                                <br>(6) you will not use the Site for any illegal or unauthorized
                                purpose; and
                                <br>(7) your use of the Site will not violate any applicable law or regulation.
                                If you provide any information that is untrue, inaccurate, not current, or incomplete,
                                we have the right to suspend or terminate your account and refuse any and all
                                current or future use of the Site (or any portion thereof).
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                4. USER REGISTRATION
                            </p>
                            <p class="text-xs text-secondary text-bold mb-0">
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You may be required to register with the Site. You agree
                                to keep your password
                                confidential and will be responsible for all use of your account and password. We
                                reserve the right to remove, reclaim, or change a username you select if we
                                determine, in our sole discretion, that such username is inappropriate, obscene, or
                                otherwise objectionable.
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                5. PROHIBITED ACTIVITIES
                            </p>
                            <p class="text-xs text-secondary text-bold mb-0">
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You may not access or use the Site for any purpose other
                                than that for which we
                                make the Site available. The Site may not be used in connection with any
                                commercial endeavors except those that are specifically endorsed or approved by
                                us.
                            </p>

                            <p class="text-xs text-secondary text-bold mb-0">
                                <br>
                                As a user of the Site, you agree not to:
                                <br><br>
                                - Systematically retrieve data or other content from the Site to create or compile,
                                directly or indirectly, a collection, compilation, database, or directory without
                                written permission from us.
                                <br><br>
                                - Trick, defraud, or mislead us and other users, especially in any attempt to learn
                                sensitive account information such as user passwords.
                                <br><br>
                                - Circumvent, disable, or otherwise interfere with security-related features of the
                                Site, including features that prevent or restrict the use or copying of any
                                Content or enforce limitations on the use of the Site and/or the Content
                                contained therein.
                                <br><br>
                                - Disparage, tarnish, or otherwise harm, in our opinion, us and/or the Site.
                                Use any information obtained from the Site in order to harass, abuse, or harm
                                another person.
                                <br><br>
                                - Make improper use of our support services or submit false reports of abuse or
                                misconduct.
                                <br><br>
                                - Use the Site in a manner inconsistent with any applicable laws or regulations.
                                Engage in unauthorized framing of or linking to the Site.
                                <br><br>
                                - Upload or transmit (or attempt to upload or to transmit) viruses, Trojan horses,
                                or other material, including excessive use of capital letters and spamming
                                (continuous posting of repetitive text), that interferes with any party’s
                                uninterrupted use and enjoyment of the Site or modifies, impairs, disrupts,
                                alters, or interferes with the use, features, functions, operation, or maintenance
                                of the Site.
                                <br><br>
                                - Engage in any automated use of the system, such as using scripts to send
                                comments or messages, or using any data mining, robots, or similar data
                                gathering and extraction tools.
                                <br><br>
                                - Delete the copyright or other proprietary rights notice from any Content.
                                Attempt to impersonate another user or person or use the username of
                                another user.
                                <br><br>
                                - Upload or transmit (or attempt to upload or to transmit) any material that acts
                                as a passive or active information collection or transmission mechanism,
                                including without limitation, clear graphics interchange formats (“gifs”), 1×1
                                pixels, web bugs, cookies, or other similar devices (sometimes referred to as
                                “spyware” or “passive collection mechanisms” or “pcms”).
                                <br><br>
                                - Interfere with, disrupt, or create an undue burden on the Site or the networks
                                or services connected to the Site.
                                <br><br>
                                - Harass, annoy, intimidate, or threaten any of our employees or agents
                                engaged in providing any portion of the Site to you.
                                <br><br>
                                - Attempt to bypass any measures of the Site designed to prevent or restrict
                                access to the Site, or any portion of the Site.
                                <br><br>
                                - Copy or adapt the Site’s software, including but not limited to Flash, PHP,
                                HTML, JavaScript, or other code.
                                <br><br>
                                - Except as permitted by applicable law, decipher, decompile, disassemble, or
                                reverse engineer any of the software comprising or in any way making up a
                                part of the Site.
                                <br><br>
                                - Except as may be the result of standard search engine or Internet browser
                                usage, use, launch, develop, or distribute any automated system, including
                                without limitation, any spider, robot, cheat utility, scraper, or offline reader that
                                accesses the Site, or using or launching any unauthorized script or other
                                software.
                                <br><br>
                                - Use a buying agent or purchasing agent to make purchases on the Site.
                                Make any unauthorized use of the Site, including collecting usernames and/or
                                email addresses of users by electronic or other means for the purpose of
                                sending unsolicited email, or creating user accounts by automated means or
                                under false pretenses.
                                <br><br>
                                - Use the Site as part of any effort to compete with us or otherwise use the Site
                                and/or the Content for any revenue-generating endeavor or commercial
                                enterprise.
                                <br><br>
                                - Use the Site to advertise or offer to sell goods and services.
                                Sell or otherwise transfer your profile.
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                6. USER GENERATED CONTRIBUTIONS
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Site may invite you to chat, contribute to, or
                                participate in blogs, message
                                boards, online forums, and other functionality, and may provide you with the
                                opportunity to create, submit, post, display, transmit, perform, publish, distribute, or
                                broadcast content and materials to us or on the Site, including but not limited to text,
                                writings, video, audio, photographs, graphics, comments, suggestions, or personal
                                information or other material (collectively, "Contributions").
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contributions may be
                                viewable by other users of the Site and through third-party websites. As such, any
                                Contributions you transmit may be treated as non-confidential and non-proprietary.
                                When you create or make available any Contributions, you thereby represent and
                                warrant that:
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The creation, distribution, transmission, public
                                display, or performance, and the
                                accessing, downloading, or copying of your Contributions do not and will not
                                infringe the proprietary rights, including but not limited to the copyright, patent,
                                trademark, trade secret, or moral rights of any third party.
                                <br><br>
                                - You are the creator and owner of or have the necessary licenses, rights,
                                consents, releases, and permissions to use and to authorize us, the Site, and
                                other users of the Site to use your Contributions in any manner contemplated
                                by the Site and these Terms of Use.
                                <br><br>
                                - You have the written consent, release, and/or permission of each and every
                                identifiable individual person in your Contributions to use the name or likeness
                                of each and every such identifiable individual person to enable inclusion and
                                use of your Contributions in any manner contemplated by the Site and these
                                Terms of Use.
                                <br><br>
                                - Your Contributions are not false, inaccurate, or misleading.
                                <br><br>
                                - Your Contributions are not unsolicited or unauthorized advertising, promotional
                                materials, pyramid schemes, chain letters, spam, mass mailings, or other
                                forms of solicitation.
                                <br><br>
                                - Your Contributions are not obscene, lewd, lascivious, filthy, violent, harassing,
                                libelous, slanderous, or otherwise objectionable (as determined by us).
                                <br><br>
                                - Your Contributions do not ridicule, mock, disparage, intimidate, or abuse
                                anyone.
                                <br><br>
                                - Your Contributions are not used to harass or threaten (in the legal sense of
                                those terms) any other person and to promote violence against a specific
                                person or class of people.
                                <br><br>
                                - Your Contributions do not violate any applicable law, regulation, or rule.
                                <br><br>
                                - Your Contributions do not violate the privacy or publicity rights of any third
                                party.
                                <br><br>
                                - Your Contributions do not violate any applicable law concerning child
                                pornography, or otherwise intended to protect the health or well-being of
                                minors.
                                <br><br>
                                - Your Contributions do not include any offensive comments that are connected
                                to race, national origin, gender, sexual preference, or physical handicap.
                                <br><br>
                                - Your Contributions do not otherwise violate, or link to material that violates, any
                                provision of these Terms of Use, or any applicable law or regulation.
                                <br><br>
                                Any use of the Site in violation of the foregoing violates these Terms of Use and may
                                result in, among other things, termination or suspension of your rights to use the Site.
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                7. CONTRIBUTION LICENSE
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By posting your Contributions to any part of the Site,
                                you automatically grant, and
                                you represent and warrant that you have the right to grant, to us an unrestricted,
                                unlimited, irrevocable, perpetual, non-exclusive, transferable, royalty-free, fully-paid,
                                worldwide right, and license to host, use, copy, reproduce, disclose, sell, resell,
                                publish, broadcast, retitle, archive, store, cache, publicly perform, publicly display,
                                reformat, translate, transmit, excerpt (in whole or in part), and distribute such.
                                <br>
                                Contributions (including, without limitation, your image and voice) for any purpose,
                                commercial, advertising, or otherwise, and to prepare derivative works of, or
                                incorporate into other works, such Contributions, and grant and authorize
                                sublicenses of the foregoing. The use and distribution may occur in any media
                                formats and through any media channels.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This license will apply to any form, media, or
                                technology now known or hereafter
                                developed, and includes our use of your name, company name, and franchise name,
                                as applicable, and any of the trademarks, service marks, trade names, logos, and
                                personal and commercial images you provide. You waive all moral rights in your
                                Contributions, and you warrant that moral rights have not otherwise been asserted in
                                your Contributions.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We do not assert any ownership over your Contributions.
                                You retain full ownership of
                                all of your Contributions and any intellectual property rights or other proprietary rights
                                associated with your Contributions. We are not liable for any statements or
                                representations in your Contributions provided by you in any area on the Site. You
                                are solely responsible for your Contributions to the Site and you expressly agree to
                                exonerate us from any and all responsibility and to refrain from any legal action
                                against us regarding your Contributions.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We have the right, in our sole and absolute discretion,
                                (1) to edit, redact, or otherwise
                                change any Contributions; (2) to re-categorize any Contributions to place them in
                                more appropriate locations on the Site; and (3) to pre-screen or delete any
                                Contributions at any time and for any reason, without notice. We have no obligation
                                to monitor your Contributions.
                                <br><br>
                            </p>
                            <p class="text-sm text-bold mb-0">
                                8. MOBILE APPLICATION LICENSE
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                Use License
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you access the Site via a mobile application, then we
                                grant you a revocable,
                                non-exclusive, non-transferable, limited right to install and use the mobile application on
                                wireless electronic devices owned or controlled by you, and to access and use the
                                mobile application on such devices strictly in accordance with the terms and
                                conditions of this mobile application license contained in these Terms of Use. You
                                shall not: (1) except as permitted by applicable law, decompile, reverse engineer,
                                disassemble, attempt to derive the source code of, or decrypt the application; (2)
                                make any modification, adaptation, improvement, enhancement, translation, or
                                derivative work from the application; (3) violate any applicable laws, rules, or
                                regulations in connection with your access or use of the application; (4) remove, alter,
                                or obscure any proprietary notice (including any notice of copyright or trademark)
                                posted by us or the licensors of the application; (5) use the application for any
                                revenue generating endeavor, commercial enterprise, or other purpose for which it is
                                not designed or intended; (6) make the application available over a network or other
                                environment permitting access or use by multiple devices or users at the same time;
                                (7) use the application for creating a product, service, or software that is, directly or
                                indirectly, competitive with or in any way a substitute for the application; (8) use the
                                application to send automated queries to any website or to send any unsolicited
                                commercial e-mail; or (9) use any proprietary information or any of our interfaces or
                                our other intellectual property in the design, development, manufacture, licensing, or
                                distribution of any applications, accessories, or devices for use with the application.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                Apple and Android Devices
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The following terms apply when you use a mobile
                                application obtained from either the
                                Apple Store or Google Play (each an “App Distributor”) to access the Site: (1) the
                                license granted to you for our mobile application is limited to a non-transferable
                                license to use the application on a device that utilizes the Apple iOS or Android
                                operating systems, as applicable, and in accordance with the usage rules set forth in
                                the applicable App Distributor’s terms of service; (2) we are responsible for providing
                                any maintenance and support services with respect to the mobile application as
                                specified in the terms and conditions of this mobile application license contained in
                                these Terms of Use or as otherwise required under applicable law, and you
                                acknowledge that each App Distributor has no obligation whatsoever to furnish any
                                maintenance and support services with respect to the mobile application; (3) in the
                                event of any failure of the mobile application to conform to any applicable warranty,
                                you may notify the applicable App Distributor, and the App Distributor, in accordance
                                with its terms and policies, may refund the purchase price, if any, paid for the mobile
                                application, and to the maximum extent permitted by applicable law, the App
                                Distributor will have no other warranty obligation whatsoever with respect to the
                                mobile application; (4) you represent and warrant that (i) you are not located in a
                                country that is subject to a U.S. government embargo, or that has been designated
                                by the U.S. government as a “terrorist supporting” country and (ii) you are not listed
                                on any U.S. government list of prohibited or restricted parties; (5) you must comply
                                with applicable third-party terms of agreement when using the mobile application,
                                e.g., if you have a VoIP application, then you must not be in violation of their wireless
                                data service agreement when using the mobile application; and (6) you acknowledge
                                and agree that the App Distributors are third-party beneficiaries of the terms and
                                conditions in this mobile application license contained in these Terms of Use, and
                                that each App Distributor will have the right (and will be deemed to have accepted
                                the right) to enforce the terms and conditions in this mobile application license
                                contained in these Terms of Use against you as a third-party beneficiary thereof.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                9. SUBMISSIONS
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You acknowledge and agree that any questions, comments,
                                suggestions, ideas,
                                feedback, or other information regarding the Site ("Submissions") provided by you to
                                us are non-confidential and shall become our sole property. We shall own exclusive
                                rights, including all intellectual property rights, and shall be entitled to the
                                unrestricted
                                use and dissemination of these Submissions for any lawful purpose, commercial or
                                otherwise, without acknowledgment or compensation to you. You hereby waive all
                                moral rights to any such Submissions, and you hereby warrant that any such
                                Submissions are original with you or that you have the right to submit such
                                Submissions. You agree there shall be no recourse against us for any alleged or
                                actual infringement or misappropriation of any proprietary right in your Submissions.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                10. SITE MANAGEMENT
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We reserve the right, but not the obligation, to: (1)
                                monitor the Site for violations of
                                these Terms of Use; (2) take appropriate legal action against anyone who, in our sole
                                discretion, violates the law or these Terms of Use, including without limitation,
                                reporting such user to law enforcement authorities; (3) in our sole discretion and
                                without limitation, refuse, restrict access to, limit the availability of, or disable (to
                                the
                                extent technologically feasible) any of your Contributions or any portion thereof; (4) in
                                our sole discretion and without limitation, notice, or liability, to remove from the Site or
                                otherwise disable all files and content that are excessive in size or are in any way
                                burdensome to our systems; and (5) otherwise manage the Site in a manner
                                designed to protect our rights and property and to facilitate the proper functioning of
                                the Site.
                            </p>

                            <br>
                            <p class="text-sm text-bold mb-0">
                                11. TERM AND TERMINATION
                            </p>

                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These Terms of Use shall remain in full force and effect
                                while you use the Site.
                                WITHOUT LIMITING ANY OTHER PROVISION OF THESE TERMS OF USE, WE
                                RESERVE THE RIGHT TO, IN OUR SOLE DISCRETION AND WITHOUT NOTICE
                                OR LIABILITY, DENY ACCESS TO AND USE OF THE SITE (INCLUDING
                                BLOCKING CERTAIN IP ADDRESSES), TO ANY PERSON FOR ANY REASON OR
                                FOR NO REASON, INCLUDING WITHOUT LIMITATION FOR BREACH OF ANY
                                REPRESENTATION, WARRANTY, OR COVENANT CONTAINED IN THESE TERMS
                                OF USE OR OF ANY APPLICABLE LAW OR REGULATION. WE MAY TERMINATE
                                YOUR USE OR PARTICIPATION IN THE SITE OR DELETE YOUR ACCOUNT
                                AND ANY CONTENT OR INFORMATION THAT YOU POSTED AT ANY TIME,
                                WITHOUT WARNING, IN OUR SOLE DISCRETION.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If we terminate or suspend your account for any reason,
                                you are prohibited from
                                registering and creating a new account under your name, a fake or borrowed name,
                                or the name of any third party, even if you may be acting on behalf of the third party.
                                In addition to terminating or suspending your account, we reserve the right to take
                                appropriate legal action, including without limitation pursuing civil, criminal, and
                                injunctive redress.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                12. MODIFICATIONS AND INTERRUPTIONS
                            </p>

                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We reserve the right to change, modify, or remove the
                                contents of the Site at any
                                time or for any reason at our sole discretion without notice. However, we have no
                                obligation to update any information on our Site. We also reserve the right to modify
                                or discontinue all or part of the Site without notice at any time. We will not be liable to
                                you or any third party for any modification, price change, suspension, or
                                discontinuance of the Site.
                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We cannot guarantee the Site will be available at all
                                times. We may experience
                                hardware, software, or other problems or need to perform maintenance related to the
                                Site, resulting in interruptions, delays, or errors. We reserve the right to change,
                                revise, update, suspend, discontinue, or otherwise modify the Site at any time or for
                                any reason without notice to you. You agree that we have no liability whatsoever for
                                any loss, damage, or inconvenience caused by your inability to access or use the
                                Site during any downtime or discontinuance of the Site. Nothing in these Terms of
                                Use will be construed to obligate us to maintain and support the Site or to supply any
                                corrections, updates, or releases in connection therewith.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                13. GOVERNING LAW
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These Terms shall be governed by and defined following
                                the laws of the Philippines.
                                Alumni Information System and yourself irrevocably consent that the courts of the
                                Philippines shall have exclusive jurisdiction to resolve any dispute which may arise in
                                connection with these terms.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                14. DISPUTE RESOLUTION
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You agree to irrevocably submit all disputes related to
                                Terms or the relationship
                                established by this Agreement to the jurisdiction of the __________ courts. Alumni
                                Information System shall also maintain the right to bring proceedings as to the
                                substance of the matter in the courts of the country where you reside or, if these
                                Terms are entered into in the course of your trade or profession, the state of your
                                principal place of business.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                15. CORRECTIONS
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There may be information on the Site that contains
                                typographical errors,
                                inaccuracies, or omissions, including descriptions, pricing, availability, and various
                                other information. We reserve the right to correct any errors, inaccuracies, or
                                omissions and to change or update the information on the Site at any time, without
                                prior notice.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                16. DISCLAIMER
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE SITE IS PROVIDED ON AN AS-IS AND AS-AVAILABLE BASIS.
                                YOU AGREE
                                THAT YOUR USE OF THE SITE AND OUR SERVICES WILL BE AT YOUR SOLE
                                RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, WE DISCLAIM ALL
                                WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SITE AND
                                YOUR USE THEREOF, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
                                WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
                                PURPOSE, AND NON-INFRINGEMENT. WE MAKE NO WARRANTIES OR
                                REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THE
                                SITE’S CONTENT OR THE CONTENT OF ANY WEBSITES LINKED TO THE SITE
                                AND WE WILL ASSUME NO LIABILITY OR RESPONSIBILITY FOR ANY (1)
                                ERRORS, MISTAKES, OR INACCURACIES OF CONTENT AND MATERIALS, (2)
                                PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER,
                                RESULTING FROM YOUR ACCESS TO AND USE OF THE SITE, (3) ANY
                                UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR
                                ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION
                                STORED THEREIN, (4) ANY INTERRUPTION OR CESSATION OF
                                TRANSMISSION TO OR FROM THE SITE, (5) ANY BUGS, VIRUSES, TROJAN
                                HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH THE
                                SITE BY ANY THIRD PARTY, AND/OR (6) ANY ERRORS OR OMISSIONS IN ANY
                                CONTENT AND MATERIALS OR FOR ANY LOSS OR DAMAGE OF ANY KIND
                                INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED,
                                TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SITE. WE DO NOT
                                WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY
                                PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY
                                THROUGH THE SITE, ANY HYPERLINKED WEBSITE, OR ANY WEBSITE OR
                                MOBILE APPLICATION FEATURED IN ANY BANNER OR OTHER ADVERTISING,
                                AND WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR
                                MONITORING ANY TRANSACTION BETWEEN YOU AND ANY THIRD-PARTY
                                PROVIDERS OF PRODUCTS OR SERVICES. AS WITH THE PURCHASE OF A
                                PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT,
                                YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE
                                APPROPRIATE.

                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                17. LIMITATIONS OF LIABILITY
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IN NO EVENT WILL WE OR OUR DIRECTORS, EMPLOYEES, OR
                                AGENTS BE
                                LIABLE TO YOU OR ANY THIRD PARTY FOR ANY DIRECT, INDIRECT,
                                CONSEQUENTIAL, EXEMPLARY, INCIDENTAL, SPECIAL, OR PUNITIVE
                                DAMAGES, INCLUDING LOST PROFIT, LOST REVENUE, LOSS OF DATA, OR
                                OTHER DAMAGES ARISING FROM YOUR USE OF THE SITE, EVEN IF WE HAVE
                                BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.

                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                18. INDEMNIFICATION
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You agree to defend, indemnify, and hold us harmless,
                                including our subsidiaries,
                                affiliates, and all of our respective officers, agents, partners, and employees, from
                                and against any loss, damage, liability, claim, or demand, including reasonable
                                attorneys’ fees and expenses, made by any third party due to or arising out of: (1)
                                your Contributions; (2) use of the Site; (3) breach of these Terms of Use; (4) any
                                breach of your representations and warranties set forth in these Terms of Use; (5)
                                your violation of the rights of a third party, including but not limited to intellectual
                                property rights; or (6) any overt harmful act toward any other user of the Site with
                                whom you connected via the Site. Notwithstanding the foregoing, we reserve the
                                right, at your expense, to assume the exclusive defense and control of any matter for
                                which you are required to indemnify us, and you agree to cooperate, at your
                                expense, with our defense of such claims. We will use reasonable efforts to notify
                                you of any such claim, action, or proceeding which is subject to this indemnification
                                upon becoming aware of it.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                19. USER DATA
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We will maintain certain data that you transmit to the
                                Site for the purpose of
                                managing the performance of the Site, as well as data relating to your use of the Site.
                                Although we perform regular routine backups of data, you are solely responsible for
                                all data that you transmit or that relates to any activity you have undertaken using the
                                Site. You agree that we shall have no liability to you for any loss or corruption of any
                                such data, and you hereby waive any right of action against us arising from any such
                                loss or corruption of such data.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                                20. ELECTRONIC COMMUNICATIONS, TRANSACTIONS,
                                AND SIGNATURES
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visiting the Site, sending us emails, and completing
                                online forms constitute electronic
                                communications. You consent to receive electronic communications, and you agree
                                that all agreements, notices, disclosures, and other communications we provide to
                                you electronically, via email and on the Site, satisfy any legal requirement that such
                                communication be in writing. YOU HEREBY AGREE TO THE USE OF
                                ELECTRONIC SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS,
                                AND TO ELECTRONIC DELIVERY OF NOTICES, POLICIES, AND RECORDS OF
                                TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SITE. You
                                hereby waive any rights or requirements under any statutes, regulations, rules,
                                ordinances, or other laws in any jurisdiction which require an original signature or
                                delivery or retention of non-electronic records, or to payments or the granting of
                                credits by any means other than electronic means.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                              21. MISCELLANEOUS
                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These Terms of Use and any policies or operating rules posted by us on the Site or in
                                respect to the Site constitute the entire agreement and understanding between you
                                and us. Our failure to exercise or enforce any right or provision of these Terms of Use
                                shall not operate as a waiver of such right or provision. These Terms of Use operate
                                to the fullest extent permissible by law. We may assign any or all of our rights and
                                obligations to others at any time. We shall not be responsible or liable for any loss,
                                damage, delay, or failure to act caused by any cause beyond our reasonable control.
                                If any provision or part of a provision of these Terms of Use is determined to be
                                unlawful, void, or unenforceable, that provision or part of the provision is deemed
                                severable from these Terms of Use and does not affect the validity and enforceability
                                of any remaining provisions. There is no joint venture, partnership, employment or
                                agency relationship created between you and us as a result of these Terms of Use or
                                use of the Site. You agree that these Terms of Use will not be construed against us
                                by virtue of having drafted them. You hereby waive any and all defenses you may
                                have based on the electronic form of these Terms of Use and the lack of signing by
                                the parties hereto to execute these Terms of Use.
                            </p>
                            <br>
                            <p class="text-sm text-bold mb-0">
                              22. CONTACT US

                            </p>
                            <br>
                            <p class="text-xs text-secondary text-bold mb-0">
                                In order to resolve a complaint regarding the Site or to receive further information
                                regarding use of the Site, please contact us at:
                                <br><br>
                                Alumni Information System
                                <br>
                                Ateneo de Naga University
                                <br>
                                Ateneo Ave, Naga, Camarines Sur 4400
                                <br>
                                Philippines
                                <br>
                                Phone: 09561745512
                                <br>
                                gdacudao@gbox.adnu.edu.ph
                                <br>
                                rdasigan@gbox.adnu.edu.ph
                                <br>
                                dsanandres@gbox.adnu.edu.ph
                                <br><br>
                                These terms of use were created using Termly's Terms and
                                Conditions Generator.

                            </p>


                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-2 pb-0 mb-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('flash-message')
