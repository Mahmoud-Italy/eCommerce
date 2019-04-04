@extends('frontend.layouts.app')
@section('content')

<!-- Start Login Register Area -->
       <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{ url('frontend/images/bg/5.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Reset Password</a></li>
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
                                <input type="password" name="password" placeholder="New Password">
                                <input type="password" name="confirm_password" placeholder="Confirm New Password">                               
                                <div class="tabs__checkbox">
                                    <span class="forget">
                                        <a href="{{ url('login') }}">back to login?</a>
                                    </span>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <button>Reset</button>
                                </div>
                                {!! Form::Close() !!}
                                
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


