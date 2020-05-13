@extends('admin.index')
@section('title')
Orders
@endsection
@section('head-nav')
<nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('admin/')}}">Dashboard</a>
        <span class="breadcrumb-item active">Order</span>
      </nav>
@endsection
@section('MainContent')
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Order Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Order List</h6>
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
                  <th class="wd-5p text-center">S.L</th>
                  <th class="wd-10p text-center">Order ID</th>
                  <th class="wd-20p text-center">Order Name</th>
                  <th class="wd-20p text-center">Order Phone</th>
                  <th class="wd-30p text-center">Order Status</th>
                  <th class="wd-15p text-center">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($orders as $order)
                <tr>
                  <td class="text-center">{{$loop->index+1}}</td>
                  <td class="text-center">ES{{$order->id}}</td>
                  <td class="text-center">{{$order->name}}</td>
                  <td class="text-center">{{$order->phone_no}}</td>
                  <td class="text-center">
                  	@if($order->is_seen_by_admin)
                  	<button class="btn btn-success">seen</button>
                  	@else
                  	<button class="btn btn-warning">Unseen</button>
                  	@endif
                  	@if($order->is_completed)
                  	<button class="btn btn-success">Completed</button>
                  	@else
                  	<button class="btn btn-info">Not Completed</button>
                  	@endif
                  	@if($order->is_paid)
                  	<button class="btn btn-success">Paid</button>
                  	@else
                  	<button class="btn btn-danger">Unpaid</button>
                  	@endif
                  </td>
                  <td class="text-center">
                  	<a href="{{route('admin.order.view',$order->id)}}" class="btn btn-sm btn-teal">View</a>
                  	<a href="{{route('admin.order.delete',$order->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
@endsection