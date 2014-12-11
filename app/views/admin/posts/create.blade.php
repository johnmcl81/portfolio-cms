@extends('layouts.admin')
@section('content')
	{{ Form::open( array ('route' => 'admin.posts.store')) }}
		@include('admin.partials._admin-postform')
	{{ Form::submit('Create', array('class' => 'button')) }}
	{{ Form::close() }}
	<p>{{ link_to_route('admin.posts.index', '< Go Back') }}</p>
@stop