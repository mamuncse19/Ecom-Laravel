@extends('admin.index')
@section('title')
Division
@endsection
@section('MainContent')
<div class="sl-pagebody">
       

       <div class="sl-page-title">
          <h5>Division Update</h5>
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
              
              <form method="post" action="{{route('division.update',$division->id)}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20" style="width:500px;">
                <label>Division Name</label>
                <input class="form-control" value="{{$division->name}}" name="name" type="text" >
                <label>Priority</label>
                <input class="form-control" value="{{$division->priority}}" name="priority" type="number" >
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
            </div>
          
@endsection