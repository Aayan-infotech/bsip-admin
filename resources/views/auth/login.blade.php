@extends('layouts.loginApp')

@section('content')

<div class="login-container">
    <div class="row justify-content-center">
        <h1 class="text-center">
            Birbal Sahni Institute of Palaeosciences
        </h1>
        <span class="text-center mb-3">An Autonomuous Institute Under The Department of Science & Technology, Government of India </span>
        <hr style="-webkit-box-shadow: 0px 0px 5px 0px rgba(55,59,168,1);
-moz-box-shadow: 0px 0px 5px 0px rgba(55,59,168,1);
box-shadow: 0px 0px 5px 0px rgba(55,59,168,1);">
        <div style="margin-bottom: 40px;"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Admin Login') }}</div>
                <div class="card-body">
                    <form id="loginForm">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" id="submitButton" class="btn btn-primary">Login  <span class="spinner-border spinner-border-sm"></span></button>
                        </div>
                        <p class="text-danger mt-3 text-center" id="errorMsg" style="display: none;"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- AJAX for Login -->
<script>
    $(document).ready(function () {
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            let button = $("#submitButton");
            let spinner = $(".spinner-border");

            // Disable button and show loader
            button.prop("disabled", true);
            spinner.show();

            
            grecaptcha.ready(function () {
                grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'login' }).then(function (token) {
                    
                    // Add token to form data
                    let formData = $("#loginForm").serialize() + "&g-recaptcha-response=" + token;

                    $.ajax({
                        url: "{{ route('login') }}",
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            toastr.success("Login successful! Redirecting...");
                            setTimeout(() => { window.location.href = response.redirect; }, 1000);
                        },
                        error: function (xhr) {
                            let errorMessage = "Invalid Credentials!";
                            if (xhr.responseJSON && xhr.responseJSON.error) {
                                errorMessage = xhr.responseJSON.error;
                            }
                            toastr.error(errorMessage);

                            // Enable button and hide loader
                            button.prop("disabled", false);
                            spinner.hide();
                        }
                    });
                });
            });


            // $.ajax({
            //     url: "{{ route('login') }}",
            //     type: "POST",
            //     data: formData,
            //     success: function (response) {
            //         toastr.success("Login successful! Redirecting...");
            //         setTimeout(() => { window.location.href = "{{ route('home') }}"; }, 1000);
            //     },
            //     error: function (xhr) {
            //         let errorMessage = "Invalid Credentials!";
            //         if (xhr.responseJSON && xhr.responseJSON.error) {
            //             errorMessage = xhr.responseJSON.error;
            //         }
            //         toastr.error(errorMessage);
                    
            //         // Enable button and hide loader
            //         button.prop("disabled", false);
            //         spinner.hide();
            //     }
            // });
        });
    });
</script>
@endsection