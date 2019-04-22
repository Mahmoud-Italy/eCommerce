@extends('frontend.layouts.app')
@section('content')



<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ url('frontend/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
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
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) == 0)
                                      <tr><td colspan="6">No Data Found.</td></tr>
                                    @endif
                                @foreach($data as $row)
                                    @foreach(App\Product::where('id',$row->pro_id)->get() as $pro)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="{{ url($pro->image) }}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">{{$pro->name}}</a></td>
                                            <td class="product-price"><span class="amount">{{$pro->price}} EGP</span></td>
                                            <td class="product-quantity">
                                                <input type="number" data-id="{{$pro->id}}" 
                                                class="cartQty" value="{{$row->qty}}" /></td>
                                            <td class="product-subtotal"><span id="subTotal-{{$pro->id}}">{{$pro->price*$row->qty}}</span></td>
                                            <td class="product-remove">
                                                {!! Form::Open(['remove/item/cart/'.$row->id]) !!}
                                                <button>X</button>
                                                {!! Form::Close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if(count($data) > 0)
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <a href="{{ url('/') }}">Continue Shopping</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table>
                                            <tbody><br/><br/>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span id="cartTotal" class="amount">{{App\Cart::getTotal()}}</span></strong>
                                                    </td>
                                                </tr>                                           
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout"><br/><br/><br/>
                                            <a href="{{ url('checkout') }}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->

@stop

@section('jsCode')
<script>
    $(function(){
        $(".cartQty").change(function(){
            var pro_id = $(this).attr('data-id');
            var qty = $(this).val();
            var Url = "{{ url('ajax/UpdateQty') }}";
            $("span#subTotal-"+pro_id).text('Loading...');
            $("span#cartTotal").text('Loading...');
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: Url,
                type: 'POST',
                data: {pro_id:pro_id, qty:qty},
                datatype: 'json',
                success:function(data) {
                     if(data.success) {
                         $("span#cartTotal").text(data.Total);
                         $("span#subTotal-"+pro_id).text(data.subTotal);
                     } else {
                        alert('something went wrong');
                     }
                }
            });
        });
    });
</script>
@stop
