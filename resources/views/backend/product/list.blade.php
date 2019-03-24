@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
           <div class="page-title-box">
                <h4 class="page-title">Products</h4>
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
                   	    <div class="form-group">
                           	<a href="{{ url('dashboard/products/create') }}" class="btn btn-danger">Add New Product</a>
                        </div>
                       <div class="white-box" style="text-align: left">
                           <h2 class="header-title">All Data ( {{count($data)}} )</h2>
                           <div class="col-md-6">
                            {!! Form::Open(['method'=>'GET']) !!}
                             <input type="text" class="form-control " placeholder="Search" name="q" value="@if(isset($_GET['q'])){{$_GET['q']}}@endif">
                            {!! Form::Close() !!}
                          </div>
                          <div class="col-md-6"></div>
                           
                            <div class="table-responsive col-md-12">
                             <table class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Active</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{ url($row->image) }}" style="width: 70px;height:70px"></td>
                                            <td>{{$row->name}}</td>
                                            <td>{!! App\Category::getCatName($row->cat_id) !!}</td>
                                            <td>{{$row->price}}</td>
                                            <td>{!! App\Category::getActive($row->active)  !!}</td>
                                            <td>{{ explode(' ',$row->created_at)[0] }}</td>
                                            <td>
                                            {!! Form::Open(['url'=>'dashboard/products/destroy/'.$row->id]) !!}
                                              <a href="{{ url('dashboard/products/edit/'.$row->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                              <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            {!! Form::Close() !!}
                                            </td>
                                        </tr>
                                        @endforeach

                                        
                                    </tbody>
                                   </table>  
                            </div>
                            <div class="col-md-12">
                              {!! $data->render() !!}
                            </div>
                       </div>
                   </div>
               </div>
               <!--End row-->
       
               
               
               
			    </div>
        <!-- End Wrapper-->


@stop