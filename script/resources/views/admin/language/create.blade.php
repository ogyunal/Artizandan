@extends('layouts.backend.app')

@section('content')
<div class="card"  >
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-12">
				<h4>{{ __('Language Customization') }}</h4>
			</div>
		</div>
		<div class="card-action-filter">
			<form method="get"  >
				
				<div class="row">
					<div class="col-lg-6">
						<div class="d-flex">
							<div class="single-filter">
								<div class="form-group">
									<select class="form-control" name="country">
										@php
										 $src = $src ?? '';
										@endphp	
										@foreach($countries as $row)
										<option @if($src == $row['code']) selected="" @endif value="{{ $row['code'] }}">{{ $row['name'] }}  -- {{ $row['nativeName'] }} -- ( {{ $row['code'] }} )</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="single-filter">
								<button type="submit" class="btn btn-primary mt-1 ml-1">{{ __('Filter') }}</button>
							</div>
						</div>
					</div>
				</form>	
					<div class="col-lg-6">
						<div class="single-filter f-right">
							<div class="form-group">
								<input type="text" id="data_search" class="form-control" placeholder="Enter Value">
							</div>
						</div>
					</div>
				</div>
			</div>
			<form method="post" action="{{ route('admin.language.store') }}">
				@csrf
			<div class="table-responsive custom-table">
				<table class="table">
					<thead>
						<tr>
							<th class="am-title">{{ __('Key') }}</th>
							<th class="am-title">{{ __('Value') }}</th>
						</tr>
					</thead>
					<tbody>
					@foreach($languages ?? [] as $key => $row)	
					<tr>
						<td>{{ $key }}  <input type="hidden" name="key[]" value="{{ $key }}"></td>
						<td><input type="text" name="value[]" class="form-control" value="{{ $row }}" required=""></td>
					</tr>
					@endforeach
					</tbody>
				<tfoot>
					<tr>
						<th class="am-title">{{ __('Key') }}</th>
						<th class="am-title">{{ __('Value') }}</th>
					
					</tr>
				</tfoot>
			</table>
			@if($src != '')
			<input type="hidden" name="lang" value="{{ $src }}">
			<button class="btn btn-success">Submit</button>
			@endif

		</div>
	</form>
	</div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
@endsection