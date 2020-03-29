@extends('admin.index')
@section('title')
Product
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Update</h5>
        </div>
           @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
              </div>
              <form method="post" action="{{url('admin/update/'.$product->id)}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:600px;">
              	<label>Title</label>
                <input class="form-control" value="{{$product->title}}" name="title" type="text">
              	<label>Description</label>
                <textarea class="form-control" name="description" rows="3">{{$product->description}}</textarea>
                <label>Price</label>
                <input class="form-control" value="{{$product->price}}" name="price" type="text">
                <label>Quantity</label>
                <input class="form-control" value="{{$product->quantity}}" name="quantity" type="text">
                <label>Category</label>
                <select class="form-control" name="category_id">
                  
                  @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent_cat)
                  <option value="{{$parent_cat->id}}" @if($parent_cat->id==$product->category_id) {{'selected'}} @endif>{{$parent_cat->name}}</option>
                  @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id',$parent_cat->id)->get() as $sub_cat)
                  <option value="{{$sub_cat->id}}" @if($sub_cat->id==$product->category_id) {{'selected'}} @endif>--->{{$sub_cat->name}}</option>
                  @endforeach
                  @endforeach
                </select>
                <label>Brand</label>
                <select class="form-control" name="brand_id">
                @foreach(App\Model\Brand::orderBy('name','asc')->get() as $brand)
                <option value="{{$brand->id}}" @if($brand->id==$product->brand_id) {{'selected'}} @endif>{{$brand->name}}</option>
                @endforeach
              </select>
                {{-- <div class="d-md-flex pd-y-20 pd-md-y-0">
                  <label class="custom-file">
                <input type="file" class="custom-file-input" name="image[]">
                <span class="custom-file-control"></span>
                </label>
                <label class="custom-file">
                <input type="file" class="custom-file-input" name="image[]">
                <span class="custom-file-control"></span>
                </label>
              </div>
              <div class="d-md-flex pd-y-20 pd-md-y-0">
                <label class="custom-file">
                <input type="file" class="custom-file-input" name="image[]">
                <span class="custom-file-control"></span>
                </label>
                <label class="custom-file">
                <input type="file" class="custom-file-input" name="image[]">
                <span class="custom-file-control"></span>
                </label>
              </div>
              <div class="d-md-flex pd-y-20 pd-md-y-0">
                <label class="custom-file">
                <input type="file" class="custom-file-input" name="image[]">
                <span class="custom-file-control"></span>
                </label>
                </div> --}}
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
               
              </div>
              </form>
            </div>
          </div>
        
@endsection