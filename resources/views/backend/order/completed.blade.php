@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Completed Orders</h4>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->          
           
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
                                            <th>UserName</th>
                                            <th>Invoice Id</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            
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