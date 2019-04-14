<div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
    <div class="slider__container slider--one">
        <div class="slider__activation__wrap owl-carousel owl-theme">

        @foreach(App\Slide::where('active',1)->orderBy('sort','ASC')->get() as $slide)
             <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url({{ url($slide->image)}}) no-repeat scroll center center / cover ;height:450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                            <div class="slider__inner">
                               <h1>{{$slide->title}} 
                                <span class="text--theme">{{$slide->content}}</span></h1>
                                <div class="slider__btn">
                                    <a class="htc__btn" href="{{ url('/') }}">shop now</a>
                                </div>
                                 </div>
                             </div>
                         </div>
                        </div>
                    </div>
                    @endforeach


                               
        </div>
    </div>
</div>