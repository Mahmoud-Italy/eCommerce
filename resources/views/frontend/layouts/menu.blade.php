<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
    <div class="categories-menu mrg-xs">
        <div class="category-heading">
            <h3> Browse Categories</h3>
        </div>
        <div class="category-menu-list">
            <ul>
                 

            @foreach(App\Category::where('active',1)->where('parent_id',0)->get() as $cat)
                <li><a href="#">
                    <img alt="" src="images/icons/thum2.png"> {{$cat->name}} 
                    @if(count($cat->childs))<i class="zmdi zmdi-chevron-right"></i> @endif</a>
                    @if(count($cat->childs))
                    <div class="category-menu-dropdown">
                        <div class="category-part-1 category-common mb--30">
                            <ul>
                                @include('frontend.layouts.child',['subCat' => $cat->childs])
                            </ul>
                        </div>                  
                    </div>
                    @endif
                </li>
            @endforeach


            </ul>
        </div>
    </div>
</div>