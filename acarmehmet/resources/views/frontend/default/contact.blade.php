@extends('frontend.layout')
@section('title',"Anasayfa Başlığı")
@section('content')


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">İletişim </h1>

        <hr>
        <div class="row">
            <div class="col-lg-8 mb-4">

                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
                </form>
            </div>
            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <p>
                    3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </p>
                <p>
                    <abbr title="Phone">P</abbr>: (123) 456-7890
                </p>
                <p>
                    <abbr title="Email">E</abbr>:
                    <a href="mailto:name@example.com">name@example.com
                    </a>
                </p>
                <p>
                    <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
                </p>
            </div>

        </div>
        <!-- /.row -->

    </div>


@endsection
@section('css')@endsection
@section('js')@endsection
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 