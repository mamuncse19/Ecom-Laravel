@extends('admin.index')
@section('title')
Category
@endsection
@section('MainContent')
<div class="sl-pagebody">
       

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Update
          	
          </h6>
           @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
         
        </div><!-- card -->

        <!--Modal Area-->
         
            <div class="modal-content tx-size-sm">
              
              <form method="post" action="{{url('category/update/'.$category->id)}}">
              	@csrf
              <div class="modal-body pd-20" style="width:500px;">
                <input class="form-control" value="{{$category->category_name}}" name="category_name" type="text">
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
               
              </div>
              </form>
            </div>
          
@endsection