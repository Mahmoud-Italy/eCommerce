@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Offers</h4>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->          
           
           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Update Offer</h2>

              @if(Session::has('success'))
               <p class="alert alert-success">{{Session::get('success')}}</p>
               @elseif(Session::has('error'))
               <p class="alert alert-danger">{{Session::get('error')}}</p>
               @endif

                        {!! Form::Open() !!}   
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Product</label>
                              <select class="form-control" name="pro_id">
                                @foreach($products as $pro)
                                  <option value="{{$pro->id}}" @if($row->pro_id == $pro->id) selected @endif>{{$pro->name}}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Percent</label>
                              <input type="number" class="form-control" min="0" max="100" name="percent" required="" value="{{$row->percent}}">
                            </div>

                             <div class="form-group">
                              <label>Start Date</label>
                              <input type="date" class="form-control" name="start_date" required="" value="{{$row->startDate}}">
                            </div>

                             <div class="form-group">
                              <label>End Date</label>
                              <input type="date" class="form-control" name="end_date" required="" value="{{$row->endDate}}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                                <a href="{{ url('dashboard/offers') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                      {!! Form::Close() !!}

                       </div>
                   </div>
               </div>
               <!--End row-->
       
               
               
               
			    </div>
        <!-- End Wrapper-->


@stop