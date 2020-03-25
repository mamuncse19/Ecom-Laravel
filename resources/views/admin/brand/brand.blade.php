@extends('admin.index')
@section('title')
Brand
@endsection

@section('head-nav')
<nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('admin/')}}">Dashboard</a>
        <span class="breadcrumb-item active">Brand</span>
      </nav>
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand List
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
                  <th class="wd-15p">ID</th>
                  <th class="wd-30p">Brand Name</th>
                  <th class="wd-35p">Image</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $brand)
                <tr>
                  <td>{{$brand->id}}</td>
                  <td>{{$brand->name}}</td>
                  <td><img src="{{asset('images/brand/'.$brand->image)}}" style="width: 100px;height: 70px;"/></td>
                  <td>
                    <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{route('brand.delete',$brand->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20" style="width:500px;">
                <label>Name</label>
                <input class="form-control" placeholder="Brand Name" name="name" type="text" >
                <label>Description</label>
                <textarea class="form-control" placeholder="Description here" name="description" type="text" ></textarea>
                <label>Image</label>
                <input class="form-control" name="image" type="file">
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Save</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div>
@endsection