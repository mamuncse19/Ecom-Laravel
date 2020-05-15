@extends('admin.index')
@section('title')
Slider
@endsection
@section('head-nav')
<nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('admin/')}}">Dashboard</a>
        <span class="breadcrumb-item active">Slider</span>
      </nav>
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Slider Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Slider List
          	<a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modal">Add New</a>
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
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">ID</th>
                  <th class="wd-30p">Title</th>
                  <th class="wd-10p">Text</th>
                  <th class="wd-10p">Button Text</th>
                  <th class="wd-20p">Image</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($sliders as $slider)
                <tr>
                  <td>{{$slider->id}}</td>
                  <td>{{$slider->title}}</td>
                  <td>{{$slider->text}}</td>
                  <td>{{$slider->button_text}}</td>
                  
                  <td><img src="{{asset('images/slider/'.$slider->image)}}" style="height: 50px; width: 70px;"></td>
                 
                  <td>
                  	<a href="{{route('slider.edit',$slider->id)}}" class="btn btn-sm btn-info">Edit</a>
                  	<a href="{{route('slider.delete',$slider->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
        <!--Modal Area-->
         <div id="modal" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Product Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:600px;">
              	<label>Title</label>
                <input class="form-control" placeholder="Title" name="title" type="text">
                <label>Test</label>
                <input class="form-control" placeholder="Text here" name="text" type="text">
                <label>Image</label>
                <input class="form-control" name="image" type="file">
                <label>Button Text</label>
                <input class="form-control" placeholder="Button Text" name="button_text" type="text">
                <label>Button Link</label>
                <input class="form-control" placeholder="Button Link" name="button_link" type="text">
              	<label>Priority</label>
                <input class="form-control" name="priority" type="number">
              	
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Save</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div>
@endsection