@extends('frontend.layouts.app')
@section('content')

    <!-- Start Feature Product -->
        <section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                     @include('frontend.layouts.slides')

                    @include('frontend.layouts.menu')
                    <!-- End Left Feature -->
                </div>
            </div>
        </section>


	@foreach(App\Category::where('active',1)->where('parent_id',0)->get() as $cat)
    <?php
      $arr = array();
      foreach($cat->childs as $child) {
        $arr[] =  $child->id;
      }
    ?>
        @if(App\Product::whereIn('cat_id',$arr)->count())
            @include('frontend.layouts.banner')
            @include('frontend.layouts.productArea')
        @endif
	@endforeach



@stop