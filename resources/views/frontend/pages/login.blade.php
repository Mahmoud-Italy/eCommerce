@extends('frontend.layouts.app')
@section('content')

<!-- Start Login Register Area -->
       <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{ url('frontend/images/bg/5.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                        </ul>

                    @if(Session::has('success'))
                        <p class="alert alert-success">{{Session::get('success')}}</p>
                    @elseif(Session::has('error'))
                       <p class="alert alert-danger">{{Session::get('error')}}</p>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">



                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                {!! Form::Open(['class'=>'login']) !!}
                                    <input type="text" name="email" placeholder="Email Address*">
                                    <input type="password" name="password" placeholder="Password*">
                               
                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Remember me</span>
                                    <span class="forget"><a href="#">Forget Pasword?</a></span>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <button>Login</button>
                                </div>
                                {!! Form::Close() !!}
                                <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->




                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                {!! Form::Open(['url'=>'register','class'=>'login']) !!}    
                                    <input type="text" name="name" placeholder="Name*">
                                    <input type="text" name="email" placeholder="Email*">
                                    <input type="password" name="password" placeholder="Password*">
                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Remember me</span>
                                </div>
                                <div class="htc__login__btn">
                                    <button>register</button>
                                </div>
                                {!! Form::Close() !!}    
                                <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->


                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->


@stop


