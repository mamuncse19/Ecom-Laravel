@extends('admin.index')
@section('title')
Brand
@endsection
@section('MainContent')
<div class="sl-pagebody">
       

       <div class="sl-page-title">
          <h5>Brand Update</h5>
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
         
        

        <!--Modal Area-->
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
              </div>
              
              <form method="post" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20" style="width:500px;">
                <label>Name</label>
                <input class="form-control" value="{{$brand->name}}" name="name" type="text" >
                <label>Description</label>
                <textarea class="form-control" name="description" type="text" >{{$brand->description}}</textarea>
                <label>Old Image</label><br>
                <img src="{{asset('images/brand/'.$brand->image)}}" style="width: 70px;height: 50px;"/><br>
                <label>New Image</label>
                <input class="form-control" name="image" type="file">
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
            </div>
          
@endsection