@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
           <div class="page-title-box">
                <h4 class="page-title">All Offers</h4>
                <div class="clearfix"></div>
             </div>
           
               @if(Session::has('success'))
               <p class="alert alert-success">{{Session::get('success')}}</p>
               @elseif(Session::has('error'))
               <p class="alert alert-danger">{{Session::get('error')}}</p>
               @endif

               <!--Start row-->
               <div class="row">
                   <div class="col-md-12" style="text-align: right;">
                       <div class="white-box" style="text-align: left">
                           <h2 class="header-title">All Data ( {{count($data)}} )</h2>
                           
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Percentage</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{url(App\Product::getProDetail('image',$row->pro_id))}}" style="width:90px;height: 90px"></td>
                                            <td>{{ $row->percent }}</td>
                                            <td>{{ $row->startDate }}</td>
                                            <td>{{ $row->endDate }}</td>
                                            <td>
                                              {!! Form::Open(['url'=>'dashboard/offers/destroy/'.$row->id]) !!}
                                              <a href="{{ url('dashboard/offers/edit/'.$row->id) }}" class="btn btn-success"> Edit <i class="fa fa-edit"></i></a>
                                              <button class="btn btn-danger"> Delete  <i class="fa fa-trash"></i></button>
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
               <!--End row-->
       
               
               
               
			    </div>
        <!-- End Wrapper-->


@stop