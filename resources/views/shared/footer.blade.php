<div class="m-t-3"></div>

<footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Address</h4>
                        <address>
                            <ul class="list-unstyled">
                                <li>
                                    9B<br>
                                    Road 2<br>
                                    Chakangreluer<br>
                                    Phnom Penh, 12346<br>
                                </li>
                                <li>
                                    Phone: (+855) 70 375 783
                                </li>
                            </ul>
                        </address>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Useful Link</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="{!! route('sitemap.html') !!}">@lang('posts.attributes.sitemap')</a></li>
                            <li><a href="{!! route('feedback.index') !!}">Contact Us</a></li>
                            <li><a href="{!! route('page.about') !!}">About Us</a></li>
                            <li><a href="#">News and Updates</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Website Information</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Website Tutorial</a></li>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Disclaimer</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Popular Departments</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Parks and Recreation</a></li>
                            <li><a href="#">Public Works</a></li>
                            <li><a href="#">Police Department</a></li>
                            <li><a href="#">Fire</a></li>
                            <li><a href="#">Mayor and City Council</a></li>
                            <li>
                                <a href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<nav class="navbar navbar-dark bg-dark footer-container">
    <div class="container-fluid justify-content-center">
        <ul class="navbar-nav text-center">
            <li class="nav-item text-white m-3">
                Made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://bookingkh.com" target="_blank" class="text-secondary">Booking KH</a>
            </li>

            <li class="nav-item text-white m-3">
                <a href="https://www.facebook.com/chantouch.sek" target="_blank" class="btn btn-outline-info mt-1"><i class="fa fa-facebook-f" aria-hidden="true"></i> Find me on FB</a>
                <a href="https://twitter.com/@DevidCs83" target="_blank" class="btn btn-outline-light mt-1"><i class="fa fa-twitter" aria-hidden="true"></i> Say Hi on Twitter !</a>
                <a href="{!! route('feedback.index') !!}" class="btn btn-outline-primary mt-1"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send Feedback !</a>
            </li>

            <li class="nav-item m-3">
                @include('shared/newsletter-form')
            </li>
        </ul>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-center text-white">&copy; Copyright 2017 - City of Cambodia.  All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</nav>
