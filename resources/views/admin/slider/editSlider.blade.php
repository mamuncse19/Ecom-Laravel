@extends('admin.index')
@section('title')
Slider
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Slider Update</h5>
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
              <form method="post" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:600px;">
              	<label>Title</label>
                <input class="form-control" value="{{$slider->title}}" name="title" type="text">
                <label>Text</label>
                <input class="form-control" value="{{$slider->text}}" name="text" type="text">
                <label>Old Image</label>
               <img src="{{asset('images/slider/'.$slider->image)}}" style="height: 50px; width: 70px;"><br>
               <label>New Image</label>
               <input type="file" name="image" class="form-control">
                <label>Button Text</label>
                <input class="form-control" value="{{$slider->button_text}}" name="button_text" type="text">
                <label>Button Link</label>
                <input class="form-control" value="{{$slider->button_link}}" name="button_link" type="text">
                <label>Priority</label>
                <input class="form-control" value="{{$slider->priority}}" name="priority" type="number">
              	
                
                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
               
              </div>
              </form>
            </div>
          </div>
        
@endsection