@extends('layouts.app')

@section('content')
    <section class="header">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <h3 class="align-center pb-3">
                        MEET OUR TEAM</h3>
                    <p class="align-center pb-3">
                        Etiam in libero gravida, viverra ex eu, vehicula leo. Vestibulum eget elementum velit. Fusce
                        viverra erat quis felis auctor, id consequat augue sollicitudin. Vivamus accumsan mi metus,
                        vitae lacinia metus aliquet ornare. Curabitur interdum scelerisque varius. Nullam consequat
                        imperdiet massa eget eleifend.
                    </p>
                    <div class="align-center">
                        <a class="btn btn-outline-success" href="{!! route('feedback.index') !!}">
                            CONTACT US</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
