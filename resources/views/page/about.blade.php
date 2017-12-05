<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang="{{ app()->getLocale() }}"> <!--<![endif]-->

<head>

    <title>Mr. Chantouch Sek</title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link href="{!! asset('about/css/bootstrap.min.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <link href="{!! asset('about/font_icon/css/pe-icon-7-stroke.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <link href="{!! asset('about/font_icon/css/helper.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <link href="{!! asset('about/css/owl.carousel.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <link href="{!! asset('about/css/owl.theme.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <link href="{!! asset('about/css/animate.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <link href="{!! asset('about/css/style.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">

    <!-- google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500|Lato:300,400,700,900,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,100|Titillium+Web:400,200,300italic,300,200italic' rel="preload"  as="style" onload="this.rel='stylesheet'" type='text/css'>

    <script src="{!! asset('about/js/modernizr.js') !!}"></script>

</head>
<body id="body">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header area -->
<header id="header">
    <div class="center text-center">
        <h1 class="bigheadline">Chantouch Sek</h1>
        <h4 class="subheadline">The Worst Back End Developer</h4>
    </div>
    <div class="bottom">
        <a data-scroll href="#navigation" class="scrollDown animated pulse" id="scrollToContent"><i class="pe-7s-angle-down-circle pe-va"></i></a>
    </div>
</header>

<!-- Navigation area -->
<section id="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="logo"><a data-scroll href="#body" class="logo-text">Chantouch Sek</a></div>
            </div>
            <div class="col-xs-6">
                <div class="nav">
                    <a href="#" data-placement="bottom" title="Menu" class="menu" data-toggle="dropdown"><i class="pe-7s-menu"></i></a>
                    <div class="dropdown-menu">
                        <div class="arrow-up"></div>
                        <ul>
                            <li><a data-scroll href="#body">Home <i class="pe-7s-home"></i></a><span class="menu-effect"></span></li>
                            <li><a data-scroll href="#services">Service <i class="pe-7s-config"></i></a><span class="menu-effect"></span></li>
                            <li><a data-scroll href="#portfolio">Portfolio <i class="pe-7s-glasses"></i></a><span class="menu-effect"></span></li>
                            <li><a data-scroll href="#testimonial">Testimonial <i class="pe-7s-comment"></i><span class="menu-effect"></span></a></li>
                            <li><a data-scroll href="#contact">Contact <i class="pe-7s-help1"></i></a><span class="menu-effect"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Content Area -->

<!-- services section -->

<section id="services" class="service-area">
    <div class="container">
        <h2 class="block_title">Services</h2>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="services">
                    <div class="service-wrap">
                        <i class="pe-7s-science pe-dj pe-va"></i>
                        <h3>Creative Idea</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, commodi.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-6">
                <div class="services">
                    <div class="service-wrap">
                        <i class="pe-7s-monitor pe-dj pe-va"></i>
                        <h3>Responsive Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, commodi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="services">
                    <div class="service-wrap">
                        <i class="pe-7s-edit pe-dj pe-va"></i>
                        <h3>Clean &amp; Nice</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, commodi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="services">
                    <div class="service-wrap">
                        <i class="pe-7s-config pe-dj pe-va"></i>
                        <h3>Support</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, commodi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- services -->

<!-- Portfolio Area -->

<section id="portfolio" class="portfolio-area">
    <div class="container">
        <h2 class="block_title">My Works</h2>
        <div class="row port cs-style-3">
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                    <img src="{!! asset('about/images/portfolio1.jpg') !!}" alt="img04">
                    <figcaption>
                        <h3>Settings</h3>
                        <span>Jacob Cummings</span>
                        <a href="#" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                    <img src="{!! asset('about/images/portfolio2.jpg') !!}" alt="img01">
                    <figcaption>
                        <h3>Camera</h3>
                        <span>Jacob Cummings</span>
                        <a href="#" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                    <img src="{!! asset('about/images/portfolio3.jpg') !!}" alt="img02">
                    <figcaption>
                        <h3>Music</h3>
                        <span>Jacob Cummings</span>
                        <a href="#" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                    <img src="{!! asset('about/images/portfolio4.jpg') !!}" alt="img04">
                    <figcaption>
                        <h3>Settings</h3>
                        <span>Jacob Cummings</span>
                        <a href="#" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                    <img src="{!! asset('about/images/portfolio5.jpg') !!}" alt="img01">
                    <figcaption>
                        <h3>Camera</h3>
                        <span>Jacob Cummings</span>
                        <a href="#" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                    <img src="{!! asset('about/images/portfolio6.jpg') !!}" alt="img02">
                    <figcaption>
                        <h3>Music</h3>
                        <span>Jacob Cummings</span>
                        <a href="#" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-12">
                <div class="btn-center"><a href="#" class="big button">View all</a></div>
            </div>
        </div>
    </div><!-- container -->
</section><!-- portfolio -->

<!-- Testimonial Area -->

<section id="testimonial" class="testimonial-area">
    <div class="container">
        <h2 class="block_title">Testimonials</h2>
        <div class="row">
            <div class="col-xs-12">
            </div>
            <div id="testimonial-container" class="col-xs-12">
                <div class="testimonila-block">
                    <img src="{!! asset('about/images/testimonial.jpg') !!}" alt="clients" class="selfshot">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem sed mollitia illum! Molestiae dignissimos, hic dolorem et eius ut nobis. Corrupti totam amet aperiam aut voluptate nobis dolor at soluta.</p>
                    <strong>Monir Hossain</strong>
                    <br>
                    <small>C.E.O</small>
                </div>
                <div class="testimonila-block">
                    <img src="{!! asset('about/images/testimonial2.jpg') !!}" alt="clients" class="selfshot">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem sed mollitia illum! Molestiae dignissimos, hic dolorem et eius ut nobis. Corrupti totam amet aperiam aut voluptate nobis dolor at soluta.</p>
                    <strong>Nur Ul Hossain</strong>
                    <br>
                    <small>Project Manager</small>
                </div>
                <div class="testimonila-block">
                    <img src="{!! asset('about/images/testimonial3.jpg') !!}" alt="clients" class="selfshot">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem sed mollitia illum! Molestiae dignissimos, hic dolorem et eius ut nobis. Corrupti totam amet aperiam aut voluptate nobis dolor at soluta.</p>
                    <strong>Hossain Abrar</strong>
                    <br>
                    <small>Developer</small>
                </div>
            </div>
        </div>
    </div><!-- container -->
</section><!-- testimonial -->

<!-- Contact Area -->

<section id="contact" class="mapWrap">
    <div id="googleMap" style="width:100%;"></div>
    <div id="contact-area">
        <div class="container">
            <h2 class="block_title">Hey !!!</h2>
            <div class="row">
                <div class="col-xs-12">
                </div>
                <div class="col-sm-6">
                    <div class="moreDetails">
                        <h2 class="con-title">More About me</h2>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum animi repudiandae nihil aspernatur repellat temporibus doloremque sint ea laboriosam, excepturi iure inventore rerum voluptatibus, suscipit totam, sit necessitatibus. Rerum, blanditiis. </p>
                        <ul class="address">
                            <li><i class="pe-7s-map-marker"></i><span>9B Chakangreler,<br>Meanchey, PP 12356,<br>Cambodia</span></li>
                            <li><i class="pe-7s-mail"></i><span>chantouchsek.cs83@gmail.com</span></li>
                            <li><i class="pe-7s-phone"></i><span>+855-70-375-783</span></li>
                            <li><i class="pe-7s-global"></i><span><a href="https://bookingkh.com">www.bookingkh.com</a></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h2 class="con-title">Drop us a line</h2>
                    {!! Form::open(array('route' => 'feedback.store', 'role' => 'form')) !!}
                    <div class="form-group">
                        {!! Form::text('name', null, array('class'=>'form-control','placeholder'=>'Enter your name', 'required' => 'required')) !!}
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="pe-7s-mail-open pe-va" aria-hidden="true"></i>
                                    </span>
                            {!! Form::email('email', null, array('class'=>'form-control','placeholder'=>'Enter your email', 'required' => 'required')) !!}
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select id="subject" name="subject" class="form-control"
                                required="required" {!! old('subject') !!}>
                            <option value="na" selected="">Choose One:</option>
                            <option value="service">General Customer Service</option>
                            <option value="suggestions">Suggestions</option>
                            <option value="product">Product Support</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('message', null, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'required' => 'required', 'rows' => '5', 'Placeholder' => 'Enter your message']) !!}
                        @if ($errors->has('message'))
                            <span class="invalid-feedback">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn medium">Let us know</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- container -->
    </div><!-- contact-area -->
    <div id="social">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="scoialinks">
                        <li class="normal-txt">Find me on</li>
                        <li class="social-icons"><a class="facebook" href="https://www.facebook.com/chantouch.sek" target="_blank"></a></li>
                        <li class="social-icons"><a class="twitter" href="https://twitter.com/DevidCs83" target="_blank"></a></li>
                        <li class="social-icons"><a class="linkedin" href="https://www.linkedin.com/in/chantouch-sek-4797b988/" target="_blank"></a></li>
                        <li class="social-icons"><a class="google-plus" href="https://plus.google.com/+chantouchsek" target="_blank"></a></li>
                        <li class="social-icons"><a class="wordpress" href="http://sitepointlearn.wordpress.com" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- social -->
</section><!-- contact -->

<!-- Footer Area -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright">© Copyright 2017 <a href="#" target="_blank">BCodinger .Inc</a></p>
            </div>
            <div class="col-sm-6">
                <p class="designed">Designed by <a href="https://bookingkh.com" target="_blank"> Chantouch Sek</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- Necessery scripts -->
<script src="{!! asset('about/js/jquery-2.1.3.min.js') !!}"></script>
<script src="{!! asset('about/js/bootstrap.min.js') !!}" async></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp" async></script>
<script src="{!! asset('about/js/jquery.actual.min.js') !!}" async></script>
<script src="{!! asset('about/js/smooth-scroll.js') !!}" async></script>
<script src="{!! asset('about/js/owl.carousel.js') !!}" async></script>
<script src="{!! asset('about/js/script.js') !!}" async></script>

</body>
</html>