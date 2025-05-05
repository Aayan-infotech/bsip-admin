@extends('website.layouts.app')

@section('content')
    <section>
        <div class="container-fluid p-0">
            <!-- Breadcrumb -->
            <nav class="bio-breadcrumb" aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"
                            aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'संपर्क करें' : 'Contact us' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="contact-page-sec">
        <div class="container">
            <h2 class="text-center mb-4">Get in Touch</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info-1">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marked"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>Address</h2>
                                <span>53 University Road,</span>
                                <span>Lucknow - 226007, Uttar Pradesh, India</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-1">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>E-mail</h2>
                                <span>director[at]bsip[dot]res[dot]in</span>
                                <span>registrar[at]bsip[dot]res[dot]in</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-1">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>Phone</h2>
                                <span>+91-522-2742903</span>
                                <span>+91-522-2742902</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-page-form" method="post">
                        <h2 class="text-center">Send us Your Query!</h2>
                        <div class="alert" role="alert" id="feedbackMessage"></div>
                        <form id="contactForm" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Your Name" name="name" />
                                        <span class="text-danger error-name"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="email" placeholder="E-mail" name="email"  />
                                        <span class="text-danger error-email"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Phone Number" name="phone" />
                                        <span class="text-danger error-phone"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Subject" name="subject" />
                                        <span class="text-danger error-subject"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 message-input">
                                    <div class="single-input-field">
                                        <textarea placeholder="Write Your Message" name="message"></textarea>
                                        <span class="text-danger error-message"></span>
                                    </div>
                                </div>
                                <div class="single-input-fieldsbtn">
                                    <input type="submit" value="Submit"  id="submitButton"/>
                                </div>
                                {{-- <div class="text-center">
                                    <button type="submit" id="submitButton" class="btn btn-primary btn-submit">Submit</button>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-page-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.2238848374284!2d80.93663117545241!3d26.86717607667159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd9c5b0e099d%3A0xe91f8220e9b92505!2sBirbal%20Sahni%20Institute%20of%20Palaeosciences!5e0!3m2!1sen!2sin!4v1714553984817!5m2!1sen!2sin"
                            width="100%" height="450" frameborder="0" style="border: 0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .contact-info-1 {
            display: inline-block;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("contactForm");
            const submitBtn = document.getElementById("submitButton");
            const feedbackMessage = document.getElementById("feedbackMessage");

            form.reset();

            form.addEventListener("submit", function(e) {
                e.preventDefault();

                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i> Processing...';

                document.querySelectorAll(".text-danger").forEach(el => el.textContent = "");

                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'contactUsForm'
                    }).then(function(token) {
                        const formData = new FormData(form);
                        formData.append("g-recaptcha-response", token);

                        fetch("{{ route('contactUsForm', ['language' => $language]) }}", {
                                method: "POST",
                                body: formData,
                            })
                            .then(response => response.json().then(data => ({
                                status: response.status,
                                body: data
                            })))
                            .then(({
                                status,
                                body
                            }) => {
                                feedbackMessage.classList.remove("alert-danger",
                                    "alert-success");

                                if (status === 200) {
                                    feedbackMessage.classList.add("alert",
                                        "alert-success");
                                    feedbackMessage.innerHTML =
                                        `Form submitted successfully!`;

                                    form.reset();
                                    // remove the feedback message after 2 seconds
                                    setTimeout(() => {
                                        feedbackMessage.classList.remove(
                                            "alert",
                                            "alert-success");
                                        feedbackMessage.innerHTML = "";
                                    }, 2000);

                                } else if (status === 422) {
                                    feedbackMessage.classList.add("alert",
                                        "alert-danger");
                                    feedbackMessage.innerHTML =
                                        `All fields are required!`;

                                    for (const key in body.errors) {
                                        const errorElement = document.querySelector(
                                            ".error-" + key);
                                        if (errorElement) {
                                            errorElement.textContent = body.errors[key][
                                                0
                                            ];
                                        }
                                    }
                                } else {
                                    throw new Error("Unexpected error");
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                feedbackMessage.classList.add("alert", "alert-danger");
                                feedbackMessage.innerHTML =
                                    `Something went wrong! Please try again.`;
                            })
                            .finally(() => {
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Submit Feedback';
                            });

                    }).catch(function(error) {
                        feedbackMessage.classList.add("alert", "alert-danger");
                        feedbackMessage.innerHTML =
                            `Recaptcha verification failed. Please try again.`;
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Submit Feedback';
                    });
                });
            });
        });
    </script>
@endsection
