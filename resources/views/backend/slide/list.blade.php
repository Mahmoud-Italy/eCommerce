@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
           <div class="page-title-box">
                <h4 class="page-title">Slides</h4>
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
                           	<a href="{{ url('dashboard/slides/create') }}" class="btn btn-danger">Add New Slide</a>
                        </div>
                       <div class="white-box" style="text-align: left">
                           <h2 class="header-title">All Data ( {{count($data)}} )</h2>
                           
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sort</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $row)
  <tr>
  <td>{{$key+1}}</td>
  <td><img src="{{ url($row->image) }}" style="width:200px;height:100px"></td>
   <td> {{$row->title}} </td>
   <td> {{$row->sort}}</td>
   <td> {{$row->active}} </td>
   <td>
      {!! Form::Open(['url'=>'dashboard/slides/destroy/'.$row->id]) !!}
        <a href="{{ url('dashboard/slides/edit/'.$row->id) }}" class="btn btn-success">Edit</a>
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