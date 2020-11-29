@section('style')
@endsection
@extends('layouts.backend.app')

@section('content')
<div class="row" id="category_body">
	<div class="col-lg-4">      
		<div class="card">
			<div class="card-body">
				<form id="basicform" method="post" action="{{ route('admin.permission.store') }}">
					@csrf
					<div class="custom-form">
						<div class="form-group">
							<label for="name">{{ __('Name') }}</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Admin Name" required="">
						</div>
						<div class="form-group">
							<label for="role_name">{{ __('Role Name') }}</label>
							<input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role Name" required="">
						</div>
						<div class="form-group">
							<label for="email">{{ __('Email') }}</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required="">
						</div>
						<div class="form-group">
							<label for="password">{{ __('Password') }}</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Enter Email" required="">
						</div>
						<div class="form-group">
							<label for="password1">{{ __('Enter Again Password') }}</label>
							<input type="password" name="password_confirmation" id="password1" class="form-control"  placeholder="Enter Again" required> 
						</div>

						<div class="form-group mt-20">
							<button class="btn col-12" type="submit">{{ __('Create Admin') }}</button>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-lg-8">      
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table category">
							<thead>
								<tr>
									
									<th class="am-title">{{ __('Permission') }}</th>
									<th class="am-title">{{ __('Create') }}</th>
									<th class="am-title">{{ __('Edit') }}</th>
									<th class="am-title">{{ __('Delete') }}</th>
									<th class="am-title">{{ __('View') }}</th>

								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>{{ __('Page') }}</td>
									<td><input type="checkbox" value="1" name="permission['page']['create']"></td>
									<td><input type="checkbox" value="1" name="permission['page']['edit']"></td>
									<td><input type="checkbox" value="1" name="permission['page']['delete']"></td>
									<td><input type="checkbox" value="1" name="permission['page']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Post') }}</td>
									<td><input type="checkbox" value="1" name="permission['post']['create']"></td>
									<td><input type="checkbox" value="1" name="permission['post']['edit']"></td>
									<td><input type="checkbox" value="1" name="permission['post']['delete']"></td>
									<td><input type="checkbox" value="1" name="permission['post']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Category') }}</td>
									<td><input type="checkbox" value="1" name="permission['category']['create']"></td>
									<td><input type="checkbox" value="1" name="permission['category']['edit']"></td>
									<td><input type="checkbox" value="1" name="permission['category']['delete']"></td>
									<td><input type="checkbox" value="1" name="permission['category']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Comments') }}</td>
									<td><input type="checkbox" value="1" name="permission['comment']['create']"></td>
									<td><input type="checkbox" value="1" name="permission['comment']['edit']"></td>
									<td><input type="checkbox" value="1" name="permission['comment']['delete']"></td>
									<td><input type="checkbox" value="1" name="permission['comment']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Menu') }}</td>
									<td><input type="checkbox" value="1" name="permission['menu']['create']"></td>
									<td><input type="checkbox" value="1" name="permission['menu']['edit']"></td>
									<td><input type="checkbox" value="1" name="permission['menu']['delete']"></td>
									<td><input type="checkbox" value="1" name="permission['menu']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Custom Scripts') }}</td>
									<td></td>
									<td><input type="checkbox" value="1" name="permission['script']['edit']"></td>
									<td></td>
									<td><input type="checkbox" value="1" name="permission['script']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Plugins') }}</td>
									<td></td>
									
									<td><input type="checkbox" value="1" name="permission['plugin']['edit']"></td>
									<td></td>
									<td><input type="checkbox" value="1" name="permission['plugin']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Media') }}</td>
									<td><input type="checkbox" value="1" name="permission['media']['create']"></td>
									
									<td></td>
									<td><input type="checkbox" value="1" name="permission['media']['delete']"></td>
									<td><input type="checkbox" value="1" name="permission['media']['view']"></td>
									
								</tr>
								<tr>
									<td>{{ __('Settings') }}</td>
									<td></td>
									
									<td><input type="checkbox" value="1" name="permission['setting']['edit']"></td>
									<td></td>
									<td><input type="checkbox" value="1" name="permission['setting']['view']"></td>
									
								</tr>
							</tr>
							<tr>
								<td>{{ __('Language') }}</td>
								<td><input type="checkbox" value="1" name="permission['language']['create']"></td>
								<td><input type="checkbox" value="1" name="permission['language']['edit']"></td>
								<td><input type="checkbox" value="1" name="permission['language']['delete']"></td>
								<td><input type="checkbox" value="1" name="permission['language']['view']"></td>
							</tr>
						</tr>
						<tr>
							<td>{{ __('User') }}</td>
							<td><input type="checkbox" value="1" name="permission['user']['create']"></td>
							<td><input type="checkbox" value="1" name="permission['user']['edit']"></td>
							<td><input type="checkbox" value="1" name="permission['user']['delete']"></td>
							<td><input type="checkbox" value="1" name="permission['user']['view']"></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th class="am-title">{{ __('Permission') }}</th>
							<th class="am-title">{{ __('Create') }}</th>
							<th class="am-title">{{ __('Edit') }}</th>
							<th class="am-title">{{ __('Delete') }}</th>
							<th class="am-title">{{ __('View') }}</th>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>

	</div>
</div>
</div>
</div>				
@endsection
@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";
	function success(res){
		location.reload();
	}
</script>
@endsection