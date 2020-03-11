@extends('admin.index')
@section('title')
Category
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
                  <th class="wd-10p">ID</th>
                  <th class="wd-50p">Brand Name</th>
                  <th class="wd-25p">Logo</th>
                  <th class="wd-15p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($brand as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->brand_name}}</td>
                  <td><img src="{{url($row->brand_logo)}}" style="height: 70px;width: 80px;"></td>
                  <td>
                  	<a href="{{URL::to('brand/edit/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                  	<a href="{{url('brand/delete/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
              <form method="post" action="{{route('brand.insert')}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:500px;">
                <input class="form-control" placeholder="Brand Name" name="brand_name" type="text">
                <input class="form-control" name="brand_logo" type="file">
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