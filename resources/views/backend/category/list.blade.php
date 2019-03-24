@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Categories</h4>
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
                   	    <div class="form-group">
                           	<a href="{{ url('dashboard/categories/create') }}" class="btn btn-danger">Add New Category</a>
                        </div>
                       <div class="white-box" style="text-align: left">
                           <h2 class="header-title">All Data ( 0 )</h2>
                           
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Parent</th>
                                            <th>Active</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$row->name}}</td>
                                            <td> {!! App\Category::getCategoryName($row->parent_id)  !!} </td>
                                            <td>{!! App\Category::getActive($row->active)  !!}</td>
                                            <td>{{ explode(' ',$row->created_at)[0] }}</td>
                                            <td>
                                            {!! Form::Open(['url'=>'dashboard/categories/destroy/'.$row->id]) !!}
                                                <a href="{{ url('dashboard/categories/edit/'.$row->id) }}" class="btn btn-success">Edit</a>
                                                <button class="btn btn-danger">Destroy</button>
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