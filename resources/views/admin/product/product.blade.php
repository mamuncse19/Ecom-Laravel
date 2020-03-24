@extends('admin.index')
@section('title')
Product
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
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
                  <th class="wd-30p">Product Title</th>
                  <th class="wd-10p">Price</th>
                  <th class="wd-10p">Quantity</th>
                  <th class="wd-20p">Image</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($product as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->title}}</td>
                  <td>{{$row->price}}</td>
                  <td>{{$row->quantity}}</td>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($row->images as $image)
                  @if($i>0)
                  <td><img src="{{asset('images/product/'.$image->image)}}" style="height: 50px; width: 70px;"></td>
                  @endif
                   @php 
                  $i--;
                  @endphp
                  @endforeach
                  <td>
                  	<a href="{{url('admin/edit/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                  	<a href="{{url('admin/delete/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
              <form method="post" action="{{route('Product.store')}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:600px;">
              	<label>Title</label>
                <input class="form-control" placeholder="Title" name="title" type="text">
              	<label>Description</label>
                <textarea class="form-control" placeholder="Description" name="description" rows="3"></textarea>
                <label>Price</label>
                <input class="form-control" placeholder="Price" name="price" type="text">
                <label>Quantity</label>
                <input class="form-control" placeholder="Quantity" name="quantity" type="text">
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
                </div>
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