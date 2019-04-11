@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
           <div class="page-title-box">
                <h4 class="page-title">Slides</h4>
                <div class="clearfix"></div>
             </div>


              @if(Session::has('error'))
               <p class="alert alert-danger">{{Session::get('error')}}</p>
              @endif

               @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
              @endif
           
           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Update Slide</h2>

                        {!! Form::Open(['files'=>true]) !!}   
                        <div class="row col-md-12">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required="" value="{{$row->title}}">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea type="text" class="form-control" name="content" required="">{{$row->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Sort</label>
                                <input type="text" class="form-control" name="sort" value="{{$row->sort}}">
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" name="active">
                                <option value="1" @if($row->status == 1) selected @endif>Actived</option>
                                <option value="0" @if($row->status == 0) selected @endif>DeActived</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                                <a href="{{ url('dashboard/slides') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Image</label>
                            <img id="preview" src="{{url($row->image)}}" style="width: 100%;height:250px;">
                            <input id="img" type="file" name="image">
                          </div>
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
@section('jsCode')
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#img").change(function() {
  readURL(this);
});
</script>
@stop