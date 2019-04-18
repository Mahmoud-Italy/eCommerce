@extends('frontend.layouts.app')
@section('content')

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ url('frontend/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Wishlist</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Wishlist</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        @if(Session::has('success'))
                            <p class="alert alert-success">{{Session::get('success')}}</p>
                        @elseif(Session::has('error'))
                            <p class="alert alert-danger">{{Session::get('error')}}</p>
                        @endif

                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">#</th>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) == 0)
                                      <tr><td colspan="6">No Data Found.</td></tr>
                                    @endif
                                    @foreach($data as $key => $row)    
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{url(App\Product::getProDetail('image',$row->pro_id))}}" alt="product img" />
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">{{App\Product::getProDetail('name',$row->pro_id)}}</a>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">{{App\Product::getProDetail('price',$row->pro_id)}} EGP</span>
                                            </td>
                                            <td class="product-remove">
                                            {!! Form::Open(['url'=>'remove/wishlist/'.$row->id]) !!}
                                                <button>X</button>
                                            {!! Form::Close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->

@stop