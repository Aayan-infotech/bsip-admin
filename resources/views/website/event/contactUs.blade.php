@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
@section('content')
    <section>
        <div class="container-fluid p-0" id="skipToContent">
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
            <h2 class="text-center mb-4">{{ $language === 'hi' ? 'संपर्क करें' : 'Get in Touch' }}</h2>
            <di class="row justify-content-center">
                <div class="col-md-4">
                    <div class="contact-info-1">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>{{ $language === 'hi' ? 'वेब सूचना प्रबंधक' : 'Web Information Manager' }}</h2>
                                <span>{{ $language === 'hi' ? 'संदीप कुमार शिवहरे (रजिस्ट्रार, बीएसआईपी)' : 'Sandeep Kumar Shivhare (Registrar, BSIP)' }}</span>
                                {{-- <span>{{ $language === 'hi' ? 'निदेशक, बीएसआईपी' : 'Director, BSIP' }}</span> --}}
                                <span>Email: registrar[at]bsip[dot]res[dot]in</span>
                                <span>Phone: +91-522-2742901</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-1">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marked"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>{{ $language === 'hi' ? 'पता' : 'Address' }}</h2>
                                <span>{{ $language === 'hi' ? 'बीरबल साहनी पुराविज्ञान संस्थान,' : 'Birbal Sahni Institute of Palaeosciences,' }}</span>
                                <span>{{ $language === 'hi' ? '53 यूनिवर्सिटी रोड, लखनऊ - 226007,' : '53 University Road, Lucknow - 226007,' }}</span>
                                <span>{{ $language === 'hi' ? 'उत्तर प्रदेश, भारत' : 'Uttar Pradesh, India' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </di>
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <div class="contact-info-1">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>{{ $language === 'hi' ? 'ई-मेल' : 'E-mail' }}</h2>
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
                                <h2>{{ $language === 'hi' ? 'फोन' : 'Phone' }}</h2>
                                <span>+91-522-2742901</span>
                                <span>+91-522-2742902</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-page-form" method="post">
                        <h2 class="text-center">
                            {{ $language === 'hi' ? 'हमें अपना प्रश्न भेजें!' : 'Send us Your Query!' }}
                        </h2>
                        <div class="alert" role="alert" id="feedbackMessage"></div>
                        <form id="contactForm" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <label for="name">{{ $language === 'hi' ? 'नाम' : 'Name' }}</label>
                                        <input type="text" id="name" pattern="[A-Za-z\s]+" required
                                            placeholder="{{ $language === 'hi' ? 'आपका नाम' : 'Your Name' }}"
                                            name="name" />
                                        <span class="text-danger error-name"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <label for="email">{{ $language === 'hi' ? 'ई-मेल' : 'Email' }}</label>
                                        <input type="email" id="email"
                                            placeholder="{{ $language === 'hi' ? 'ई-मेल' : 'E-mail' }}" name="email" />
                                        <span class="text-danger error-email"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <label
                                            for="phone">{{ $language === 'hi' ? 'फोन नंबर' : 'Phone Number' }}</label>
                                        <input type="tel" id="phone" pattern="[0-9]{10}" required
                                            title="{{ $language === 'hi' ? '10 अंकों का फोन नंबर दर्ज करें' : 'Enter a 10-digit phone number' }}"
                                            class="form-control" maxlength="10"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            placeholder="{{ $language === 'hi' ? 'फोन नंबर' : 'Phone Number' }}"
                                            name="phone" />
                                        <span class="text-danger error-phone"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <label for="subject">{{ $language === 'hi' ? 'विषय' : 'Subject' }}</label>
                                        <input type="text" id="subject"
                                            placeholder="{{ $language === 'hi' ? 'विषय' : 'Subject' }}" name="subject" />
                                        <span class="text-danger error-subject"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 message-input">
                                    <div class="single-input-field">
                                        <label for="message">{{ $language === 'hi' ? 'संदेश' : 'Message' }}</label>
                                        <textarea id="message" placeholder="{{ $language === 'hi' ? 'अपना संदेश लिखें' : 'Write Your Message' }}"
                                            name="message"></textarea>
                                        <span class="text-danger error-message"></span>
                                    </div>
                                </div>
                                <div class="single-input-fieldsbtn">
                                    <input type="submit" value="{{ $language === 'hi' ? 'भेजें' : 'Submit' }}"
                                        id="submitButton" />
                                </div>
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
            height: 100%;
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

            const nameInput = form.name;
            const emailInput = form.email;
            const phoneInput = form.phone;
            const subjectInput = form.subject;
            const messageInput = form.message;

            const nameError = document.querySelector(".error-name");
            const emailError = document.querySelector(".error-email");
            const phoneError = document.querySelector(".error-phone");
            const subjectError = document.querySelector(".error-subject");
            const messageError = document.querySelector(".error-message");

            // Real-time validation for each field
            nameInput.addEventListener("input", function() {
                const value = this.value.trim();
                if (!value) {
                    nameError.textContent = "Name is required";
                } else if (!/^[A-Za-z\s]+$/.test(value)) {
                    nameError.textContent = "Only alphabets allowed";
                } else {
                    nameError.textContent = "";
                }
            });

            phoneInput.addEventListener("input", function() {
                const value = this.value.trim();
                if (!value) {
                    phoneError.textContent = "Phone is required";
                } else if (!/^\d+$/.test(value)) {
                    phoneError.textContent = "Only numbers allowed";
                } else {
                    phoneError.textContent = "";
                }
            });

            emailInput.addEventListener("input", function() {
                const value = this.value.trim();
                if (!value) {
                    emailError.textContent = "Email is required";
                } else {
                    emailError.textContent = "";
                }
            });

            subjectInput.addEventListener("input", function() {
                const value = this.value.trim();
                if (!value) {
                    subjectError.textContent = "Subject is required";
                } else {
                    subjectError.textContent = "";
                }
            });

            messageInput.addEventListener("input", function() {
                const value = this.value.trim();
                if (!value) {
                    messageError.textContent = "Message is required";
                } else {
                    messageError.textContent = "";
                }
            });

            form.addEventListener("submit", function(e) {
                e.preventDefault();
                feedbackMessage.classList.remove("alert", "alert-success", "alert-danger");
                feedbackMessage.innerHTML = "";

                let isValid = true;

                // Manual recheck
                if (!nameInput.value.trim()) {
                    nameError.textContent = "Name is required";
                    isValid = false;
                } else if (!/^[A-Za-z\s]+$/.test(nameInput.value.trim())) {
                    nameError.textContent = "Only alphabets allowed";
                    isValid = false;
                }

                if (!emailInput.value.trim()) {
                    emailError.textContent = "Email is required";
                    isValid = false;
                }

                if (!phoneInput.value.trim()) {
                    phoneError.textContent = "Phone is required";
                    isValid = false;
                } else if (!/^\d+$/.test(phoneInput.value.trim())) {
                    phoneError.textContent = "Only numbers allowed";
                    isValid = false;
                }

                if (!subjectInput.value.trim()) {
                    subjectError.textContent = "Subject is required";
                    isValid = false;
                }

                if (!messageInput.value.trim()) {
                    messageError.textContent = "Message is required";
                    isValid = false;
                }

                if (!isValid) return;

                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i> Processing...';

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
                                    setTimeout(() => {
                                        feedbackMessage.classList.remove(
                                            "alert", "alert-success");
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
                                submitBtn.innerHTML =
                                    '{{ $language === 'hi' ? 'भेजें' : 'Submit' }}';
                            });

                    }).catch(function(error) {
                        feedbackMessage.classList.add("alert", "alert-danger");
                        feedbackMessage.innerHTML =
                            `Recaptcha verification failed. Please try again.`;
                        submitBtn.disabled = false;
                        submitBtn.innerHTML =
                            '{{ $language === 'hi' ? 'भेजें' : 'Submit' }}';
                    });
                });
            });
        });
    </script>
@endsection
