@extends('adminlte::page')

@include('bread.title')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				@include('bread.error-form')
				<form class="form-horizontal" action="{{ $actionName == 'edit' ? route("{$objectName}.update", ['id' => $object->id]) : route("{$objectName}.create") }}" method="post">
					{!! csrf_field() !!}
					<input type="hidden" name="previous_url" value="{{ url()->previous() }}">
					<div class="box box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">{{ ucfirst($actionName) }} {{ ucfirst($objectName) }} {{ !empty($object) ? "(ID $object->id)" : '' }}</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Name</label>
								<div class="col-md-10">
									<input type="text" name="name" class="form-control" maxlength="255" value="{{ !empty($object) ? $object->name : '' }}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Email</label>
								<div class="col-md-10">
									<input type="email" name="email" class="form-control" maxlength="255" value="{{ !empty($object) ? $object->email : '' }}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Password</label>
								<div class="col-md-10">
									<div class="row">
										<div class="col-md-6">
											<input type="password" name="password" class="form-control" maxlength="255" value="" placeholder="Type password" {{ empty($object) ? 'required' : '' }}>
										</div>
										<div class="col-md-6">
											<input type="password" name="password_confirmation" class="form-control" maxlength="255" value="" placeholder="Type password again" {{ empty($object) ? 'required' : '' }}>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Status</label>
								<div class="col-md-10">
									<div class="checkbox">
										<label>
											<input type="radio" class="icheck" name="status" value="enable" {{ !empty($object) ? (($object->status == 'enable') ? 'checked' : '') : '' }}>
											&nbsp;&nbsp;Enable
										</label>
										<label>
											<input type="radio" class="icheck" name="status" value="disable" {{ !empty($object) ? (($object->status == 'disable') ? 'checked' : '') : 'checked' }}>
											&nbsp;&nbsp;Disable
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Role</label>
								<div class="col-md-10">
									@php
										$roles = \Spatie\Permission\Models\Role::all();
										$sliceCount = ceil(count($roles)/3);
									@endphp
									<div class="text-center">
										<button id="btn_check_all" type="button" class="btn btn-default btn-sm"><i class="fa fa-check-square-o"></i> Check All</button>&nbsp;&nbsp;
										<button id="btn_uncheck_all" type="button" class="btn btn-default btn-sm"><i class="fa fa-square-o"></i> Uncheck All</button>
									</div>
									<div class="row">
										@for ($i=0; $i < 3; $i++)
											<div class="col-md-4">
												@foreach ($roles as $role)
													@if ($loop->index >= ($sliceCount*$i) && $loop->index < ($sliceCount*($i+1)))
														<div class="checkbox">
															<label>
																<input type="checkbox" class="icheck" name="roles[]" value="{{ $role->name }}" {{ !empty($object) ? $object->hasRole($role->name) ? 'checked' : '' : '' }}>
																&nbsp;&nbsp;&nbsp;{{ $role->name }}
															</label>
														</div>
													@endif
												@endforeach
											</div>
										@endfor
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							@include('bread.add-edit-actions')
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
@endsection

@include('bread.script')

@push('javascripts')
	<script type="text/javascript">
		function checkAll() {
			$('input[name="roles[]"]').iCheck('check');
		}

		function uncheckAll() {
			$('input[name="roles[]"]').iCheck('uncheck');
		}

		$(document).ready(function() {
			$('#btn_check_all').on('click', function() {
				checkAll();
			});

			$('#btn_uncheck_all').on('click', function() {
				uncheckAll();
			});
		});
	</script>
@endpush
