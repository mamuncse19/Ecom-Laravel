@extends('admin.index')
@section('title')
Category
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category List
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
                  <th class="wd-25p">Category Name</th>
                  <th class="wd-20p">Parent</th>
                  <th class="wd-25p">Image</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($category as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td>
                    @if($row->parent_id==NULL)
                    {{$row->name}}
                    @else
                    {{$row->parent->name}}
                    @endif
                  </td>
                  <td><img src="{{asset('images/category/'.$row->image)}}" style="width: 70px;height: 50px;"/></td>
                  <td>
                  	<a href="{{route('category.edit',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                  	<a href="{{route('category.delete',$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20" style="width:500px;">
                <label>Name</label>
                <input class="form-control" placeholder="Category Name" name="name" type="text" >
                <label>Description</label>
                <textarea class="form-control" placeholder="Description here" name="description" type="text" ></textarea>
                <label>Parent</label>
                
                <select class="form-control select2" name="parent_id">
                  <option value="">Choose</option>
                 @foreach($parent_cat as $mainCat)
                 <option value="{{$mainCat->id}}">{{$mainCat->name}}</option>
                 @endforeach
                </select>
              
                <label>Image</label>
                <input class="form-control" name="image" type="file" tabindex="4">
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