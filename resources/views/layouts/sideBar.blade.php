<div class="col-md-3">
 <div class="sidebar">
    <div class="main_nav">
<div class="list-group">
  @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
  
  <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
      <img src="{{asset('images/category/'.$parent->image)}}" style="width: 50px; height: 40px;">
      {{ $parent->name }}
    </a>
    <div class="collapse 
    @if(Route::is('category.show'))
    @if(App\Model\Category::parentOrNot($parent->id,$category->id))
    show
    @endif
    @endif
    " id="main-{{ $parent->id }}">
        <div class="child-rows">
            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
            <a href="{{ route('category.show',$child->id) }}" class="list-group-item list-group-item-action 
                @if(Route::is('category.show'))
                    @if($child->id==$category->id)
                    active
                    @endif
                    @endif
                ">
      <img src="{{asset('images/category/'.$child->image)}}" style="width: 35px; height: 40px;">
      {{ $child->name }}
    </a>
    @endforeach
        </div>
    </div>
     
    @endforeach
</div>
</div>
</div>
</div>
