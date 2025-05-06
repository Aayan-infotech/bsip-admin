@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
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
                        {{ $language === 'hi' ? 'ऑनलाइन फीडबैक फॉर्म' : 'Online Feedback Form' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container my-5">
            <div class="row feedback-wrapper">
                <div class="col-md-6 d-none d-md-block feedback-img"></div>

                <!-- Right Side Form -->
                <div class="col-md-6 form-side">
                    <div class="feedback-header">
                        <h2 class="">Online Feedback Form</h2>
                        <p class="text-muted">We'd love to hear your thoughts!</p>
                    </div>

                    <div class="alert" role="alert" id="feedbackMessage"></div>

                    <form id="feedbackForm" class="feedback-form">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your name">
                            <span class="text-danger error-name"></span>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="example@email.com">
                            <span class="text-danger error-email"></span>
                        </div>

                        <!-- Comment -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Share your feedback..."></textarea>
                            <span class="text-danger error-comment"></span>
                        </div>


                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" id="submitButton" class="btn btn-primary btn-submit">Submit
                                Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("feedbackForm");
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
                        action: 'feedbackForm'
                    }).then(function(token) {
                        const formData = new FormData(form);
                        formData.append("g-recaptcha-response", token);

                        fetch("{{ route('feedbackForm', ['language' => $language]) }}", {
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
                                        `Feedback submitted successfully!`;

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
