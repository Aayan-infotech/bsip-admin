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
                        <form action="contact-mail.php" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Your Name" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="email" placeholder="E-mail" name="email" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Phone Number" name="phone" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Subject" name="subject" />
                                    </div>
                                </div>
                                <div class="col-md-12 message-input">
                                    <div class="single-input-field">
                                        <textarea placeholder="Write Your Message" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="single-input-fieldsbtn">
                                    <input type="submit" value="Send Now" />
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
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
@endsection
