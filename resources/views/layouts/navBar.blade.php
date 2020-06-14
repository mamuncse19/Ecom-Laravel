<div class="sticky-top main_menu_area"><!-- start of main_menu_area -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="responsive_menu_wrap"></div>
                    <div class="main_menu"><!-- start of main_menu -->
                        <ul id="navwrap">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            @foreach(App\Model\Category::where('parent_id',NULL)->orderBy('id','asc')->get() as $parent_cat)
                            <li><a href="{{route('categoryWisePorduct.Show',$parent_cat->id)}}">{{$parent_cat->name}}</a>
                                
                            </li>
                           @endforeach

                          {{--  <li><a href="{{ route('allProduct.show') }}">Shop</a></li> --}}
                        </ul>
                    </div><!-- End of main_menu -->
                </div>
            </div>
        </div>
    </div>