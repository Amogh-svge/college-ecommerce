@extends('product-layout')
@section('main')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                Contact Us
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="card mb-0 contact-us">
                    <div class="contact-us__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.2234067582053!2d85.32949957001507!3d27.679489194333062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19ca771e9e55%3A0xc94f84d1f057520f!2sNagarjuna%20College%20of%20IT!5e0!3m2!1sen!2snp!4v1653836693125!5m2!1sen!2snp"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title">
                                        Our Address
                                    </h4>
                                    <div class="contact-us__address">
                                        <p>
                                            Sankhamul, Lalitpur
                                            Nepal<br />Email:
                                            KinBechhere@gmail.com<br />Phone
                                            Number: (+977) 9818451624
                                        </p>
                                        <p>
                                            <strong>Opening Hours</strong><br /><i
                                                class="footer-contacts__icon far fa-clock"></i>
                                            24 hrs online
                                        </p>
                                        <p>
                                            <strong>Comment</strong><br />KinBech is a new ecommerce platform where you can
                                            buy any tech items you need.
                                            People's First choice
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title">
                                        Leave us a Message
                                    </h4>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">Your Name</label>
                                                <input type="text" id="form-name" class="form-control"
                                                    placeholder="Your Name" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">Email</label>
                                                <input type="email" id="form-email" class="form-control"
                                                    placeholder="Email Address" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">Subject</label>
                                            <input type="text" id="form-subject" class="form-control"
                                                placeholder="Subject" />
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">Message</label>
                                            <textarea id="form-message" class="form-control" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Send Message
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
