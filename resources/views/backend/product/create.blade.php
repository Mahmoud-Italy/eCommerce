@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Products</h4>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->          
           
           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Create New Product</h2>

                        {!! Form::Open(['files'=>true]) !!}
                        <div class="col-md-6">

                           <div class="form-group">
                            <label>Category Name</label>
                             <select class="form-control" name="cat_id">
                                @foreach(App\Category::where('parent_id','<>',0)->get() as $cat)
                                  <option value="{{$cat->id}}">[ {{$cat->name}} ]</option>
                                @endforeach
                             </select>
                           </div>   

                           <div class="form-group">
                             <label>Product name</label>
                             <input type="text" class="form-control" name="name" required="">
                           </div>

                           <div class="form-group">
                             <label>Qty</label>
                             <input type="text" class="form-control" name="qty" required>
                           </div>

                           <div class="form-group">
                             <label>Price</label>
                             <input type="text" class="form-control" name="price" required>
                           </div>

                           <div class="form-group">
                             <label>Old Price</label>
                             <input type="text" class="form-control" name="price_discount">
                           </div>


                           <div class="form-group">
                             <label>Content</label>
                             <textarea rows="4" class="form-control" name="content"></textarea>
                           </div>

                           <div class="form-group">
                             <label>Status</label>
                             <select class="form-control" name="active">
                               <option value="1">Activated</option>
                               <option value="0">DeActivated</option>
                             </select>
                           </div>
                            

                            <div class="form-group">
                                <button class="btn btn-primary">Save</button>
                                <a href="{{ url('dashboard/products') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Product Image</label>
                            <img id="preview" src="" style="width: 100%;height:250px;border:1px solid #ddd">
                            <input id="img" type="file" name="image" required="">
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

