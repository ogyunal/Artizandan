@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="section-header">
			<h1>{{ __('Cache Clear') }}</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item">{{ __('admin') }}</div>
				<div class="breadcrumb-item">{{ __('cache') }}</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h5>{{ __('Clear Cache facade value') }}</h5>
				<br>
				<form action="{{ route('admin.clear-cache') }}" method="POST" class="basicform">
					@csrf
					<Button type="submit" class="btn btn-primary btn-lg w-100"><i class="fas fa-rocket"></i> {{ __('Clear Cache') }}</Button>
				</form>
				
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h5>{{ __('Reoptimized class loader') }}</h5>
				<br>
				<form action="{{ route('admin.optimize') }}" method="POST" class="basicform">
					@csrf
					<Button type="submit" class="btn btn-warning btn-lg w-100"><i class="fas fa-rocket"></i> {{ __('optimize') }}</Button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h5>{{ __('Clear Route cache') }}</h5>
				<br>
				<form action="{{ route('admin.route-clear') }}" method="POST" class="basicform">
					@csrf
					<Button type="submit" class="btn btn-success btn-lg w-100"><i class="fas fa-rocket"></i> {{ __('Route cache clear') }}</Button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h5>{{ __('Clear View cache') }}</h5>
				<br>
				<form action="{{ route('admin.view-clear') }}" method="POST" class="basicform">
					@csrf
					<Button type="submit" class="btn btn-dark btn-lg w-100"><i class="fas fa-rocket"></i> {{ __('Clear View cache') }}</Button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h5>{{ __('Clear Config cache') }}</h5>
				<br>
				<form action="{{ route('admin.config-cache') }}" method="POST" class="basicform">
					@csrf
					<Button type="submit" class="btn btn-light btn-lg w-100"><i class="fas fa-rocket"></i> {{ __('Clear Config cache') }}</Button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>

<script>
	"use strict";	
	//success response will assign here
	function success(res){

	}	
</script>
@endsection