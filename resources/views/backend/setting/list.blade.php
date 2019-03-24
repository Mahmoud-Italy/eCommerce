@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Update Setting</h4>
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
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Update Meta tags</h2>
                        {!! Form::Open(['url'=>'dashboard/settings/meta']) !!}   
                            <div class="form-group">
                                <label>Meta Keywords</label>
                                <textarea type="text" class="form-control" name="meta_keywords">{{App\Setting::getSetting('meta_keywords')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Meta Author</label>
                                <textarea type="text" class="form-control" name="meta_author">{{App\Setting::getSetting('meta_author')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea type="text" class="form-control" name="meta_desc">{{App\Setting::getSetting('meta_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Save</button>
                                <a href="{{ url('dashboard') }}" class="btn btn-danger">Back</a>
                            </div>
                      {!! Form::Close() !!}
                       </div>
                   </div>
               </div>
               <!--End row-->









               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Update Info</h2>
                        {!! Form::Open(['url'=>'dashboard/settings/info']) !!}   
                            <div class="form-group">
                                <label>Title</label>
                                <textarea type="text" class="form-control" name="title">{{App\Setting::getSetting('title')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Copywrite</label>
                                <textarea type="text" class="form-control" name="copywrite">{{App\Setting::getSetting('copywrite')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Save</button>
                                <a href="{{ url('dashboard') }}" class="btn btn-danger">Back</a>
                            </div>
                      {!! Form::Close() !!}
                       </div>
                   </div>
               </div>
               <!--End row-->




       
               
               
               
			    </div>
        <!-- End Wrapper-->


@stop