@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        Contact us
                        <small>Feel free to contact us</small>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    {!! Form::open(array('route' => 'feedback.store', 'role' => 'form')) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                {!! Form::text('name', null, array('class'=>'form-control','placeholder'=>'Enter your name', 'required' => 'required')) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                                    </span>
                                    {!! Form::email('email', null, array('class'=>'form-control','placeholder'=>'Enter your email', 'required' => 'required')) !!}
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                {!! Form::textarea('message', null, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'required' => 'required', 'rows' => '9', 'cols' => '25']) !!}
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                Send Message
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><span class="fa fa-globe"></span> Our office</legend>
                    <address>
                        <strong>BCodiger, Inc.</strong><br>
                        9B Road 2, ChakangreLuer<br>
                        Meanchey, PP 12346<br>
                        <abbr title="Phone">
                            P:</abbr>
                        (+855) 70 375-783
                    </address>
                    <address>
                        <strong>Chantouch Sek</strong><br>
                        <a href="mailto:#">feedback@blog.bookingkh.com</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
@endsection