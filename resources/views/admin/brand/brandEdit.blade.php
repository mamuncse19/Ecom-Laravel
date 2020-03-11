@extends('admin.index')
@section('title')
Category
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Update</h5>
        </div><!-- sl-page-title -->

       

        <!--Modal Area-->
         
          
            <div class="modal-content tx-size-sm">
              
              <form method="post" action="{{url('brand/update/'.$brand->id)}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:500px;">
                <label>Name</label>
                <input class="form-control" value="{{$brand->brand_name}}" name="brand_name" type="text">
                <label>Previous Logo</label>
                <img class="form-control" src="{{url($brand->brand_logo)}}" style="height: 70px;width: 80px;">
                <label>New Logo</label>
                <input class="form-control" name="brand_logo" type="file">
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                
              </div>
              </form>
            </div>
          
        
@endsection