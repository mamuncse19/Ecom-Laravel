@extends('admin.index')
@section('title')
District
@endsection
@section('MainContent')
<div class="sl-pagebody">
       

       <div class="sl-page-title">
          <h5>District Update</h5>
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
              
              <form method="post" action="{{route('district.update',$district->id)}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20" style="width:500px;">
                <label>District Name</label>
                <input class="form-control" value="{{$district->name}}" name="name" type="text" >
                 <label>Division</label>
                <select class="form-control" name="division_id">
                  @foreach(App\Model\Division::orderBy('name','asc')->get() as  $division)
                  <option value="{{$division->id}}" @if($district->division_id==$division->id) selected @endif>{{$division->name}}</option>
                  @endforeach
                </select>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
            </div>
          
@endsection