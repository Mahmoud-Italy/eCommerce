@extends('frontend.layouts.app')
@section('content')


	<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ url('frontend/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->


        @if(Session::has('success'))
        	<p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
        	<p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif


        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">

                    		{!! Form::Open() !!}

                    		<div class="form-group">
                    			<label>Address</label>
                    			<textarea class="form-control" rows="9" name="address" required=""></textarea>
                    		</div>
                    		<div class="form-group">
                    			<label>Postal Code</label>
                    			<input type="text" class="form-control" name="postal_code">
                    		</div>
                    		<div class="form-group">
                    			<label>City</label>
                    			<input type="text" class="form-control" name="city">
                    		</div>
                    		<div class="form-group">
                    			<label>Country</label>
                    			<select class="form-control" name="country">
                    				<option value="US">US</option>
                    				<option value="egypt">Egypt</option>
                    			</select>
                    		</div>

                    		<div class="form-group">
                    			<div class="wc-proceed-to-checkout">
                                   <button> Confirm </button>
                                </div>
                            </div>

                    		{!! Form::Close() !!}

                    </div>
                </div>
            </div>
        </div>








@stop