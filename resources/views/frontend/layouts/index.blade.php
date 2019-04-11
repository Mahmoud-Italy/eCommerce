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


	@for($i = 1; $i < 10; $i++)
        @include('frontend.layouts.banner')
        <!-- Start Our Product Area -->
        @include('frontend.layouts.productArea')
        <!-- End Our Product Area -->
	@endfor



@stop