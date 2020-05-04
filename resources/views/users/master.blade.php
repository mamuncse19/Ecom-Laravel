@extends('layouts.master')

@section('content')
<div class="container mt-2 mb-4">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
				<a href="" class="list-group-item">
					<img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" style="width: 100px; border-radius: 50%;">
				</a>
				<a href="{{route('user.dashboard')}}" class="list-group-item {{Route::is('user.dashboard') ? 'active' : ''}}">Dashboard</a>
				<a href="{{route('user.profile')}}" class="list-group-item {{Route::is('user.profile') ? 'active' : ''}}">Profile Update</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card card-body">
				@yield('sub-content')
			</div>
		</div>
	</div>
</div>
@endsection