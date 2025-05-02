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

                    <form>
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="example@email.com"
                                required>
                        </div>

                        <!-- Comment -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="comment" rows="4" placeholder="Share your feedback..." required></textarea>
                        </div>

                        <!-- CAPTCHA -->
                        <div class="mb-3 captcha-box">
                            <label class="form-label">CAPTCHA <span class="text-danger">*</span></label>
                            <p class="mb-2">Solve: <strong>12 + 8 = ?</strong></p>
                            <input type="number" class="form-control" id="captcha" placeholder="Your answer" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-submit">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
