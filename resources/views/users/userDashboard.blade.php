@extends('users.master')

@section('sub-content')
<p>Welcome to {{$user->first_name.' '. $user->last_name}}</p>
<div class="container">
<div class="row">
	<div class="col-md-4">
		<div class="card card-body">
			<a href="{{route('user.profile')}}">Update Profile</a>
		</div>
	</div>
</div>
</div>
@endsection