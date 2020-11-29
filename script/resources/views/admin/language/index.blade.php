@section('style')

@endsection
@extends('layouts.backend.app')

@section('content')

<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{ __('Language Customization') }}</h4>
			</div>
		</div>
		<div class="card-action-filter">
			<div class="row mb-10">
				<div class="col-lg-6">
					<form id="basicform" method="post" action="{{ route('admin.language.update',1) }}">
						@csrf
						@method('PUT')
						<div class="d-flex">
							<div class="single-filter">
								<div class="form-group">
									<select class="form-control" name="status">
										<option >{{ __('Select Action') }}</option>
										<option value="active">{{ __('Set Active Langauge') }}</option>
										
									</select>
								</div>
							</div>
							<div class="single-filter">
								<button type="submit" class="btn btn-primary mt-1 ml-1">{{ __('Apply') }}</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="single-filter f-right">
							<div class="form-group">
								
								<input type="text" id="data_search" class="form-control" placeholder="Search">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive custom-table">
				<table class="table ">
					<thead>
						<tr>
							<th class="am-select">
								 {{ __('Language') }} 
							</th>
							<th class="am-title">{{ __('Country Name') }}</th>
							<th class="am-author">{{ __('Native Name') }}</th>
							<th class="am-author">{{ __('Country Code') }}</th>
						</tr>
					</thead>
					<tbody>

						<?php 
							$old_lang = [];
							foreach (json_decode($langs->value) as $key => $value) {
								array_push($old_lang, $value);
							}
						 ?>
						@foreach($countries as $key=>$row)
						<tr>
							<td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="lang[]" class="custom-control-input" id="customCheck{{ $row['code'] }}" value="{{ $row['code'] }}" @if(in_array($row['code'], $old_lang)) checked=""  @endif>
									<label class="custom-control-label" for="customCheck{{ $row['code'] }}"></label>
								</div>
							</td>
							<td>{{ $row['name'] }}</td>
							<td>{{ $row['nativeName'] }}</td>
							<td>{{ $row['code'] }}</td>
						</tr>
						@endforeach
					</tbody>

					<tfoot>
						<tr>
							<th class="am-select">
									 {{ __('Language') }} 
							</th>
							
							<th class="am-title">{{ __('Country Name') }}</th>
							<th class="am-author">{{ __('Native Name') }}</th>
							<th class="am-author">{{ __('Country Code') }}</th>
						</tr>
					</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";	
//success response will assign this function
function success(res){
	//location.reload();
}
function errosresponse(xhr){

	$("#errors").html("<li class='text-danger'>"+xhr.responseJSON[0]+"</li>")
}
</script>
@endsection