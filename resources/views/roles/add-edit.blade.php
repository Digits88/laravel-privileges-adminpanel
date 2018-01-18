@extends('adminlte::page')

@include('bread.title')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

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
								<label for="" class="col-md-2 control-label">Guard Name</label>
								<div class="col-md-10">
									<input type="text" name="guard_name" class="form-control" maxlength="255" value="{{ !empty($object) ? $object->guard_name : '' }}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Permission</label>
								<div class="col-md-10">
									@php
										$permissions = \Spatie\Permission\Models\Permission::all();
										$sliceCount = ceil(count($permissions)/3);
									@endphp
									<div class="text-center">
										<button id="btn_check_all" type="button" class="btn btn-default btn-sm"><i class="fa fa-check-square-o"></i> Check All</button>&nbsp;&nbsp;
										<button id="btn_uncheck_all" type="button" class="btn btn-default btn-sm"><i class="fa fa-square-o"></i> Uncheck All</button>
									</div>
									<div class="row">
										@for ($i=0; $i < 3; $i++)
											<div class="col-md-4">
												@foreach ($permissions as $permission)
													@if ($loop->index >= ($sliceCount*$i) && $loop->index < ($sliceCount*($i+1)))
														<div class="checkbox">
															<label>
																<input type="checkbox" class="icheck" name="permissions[]" value="{{ $permission->name }}" {{ !empty($object) ? $object->hasPermissionTo($permission->name) ? 'checked' : '' : '' }}>
																&nbsp;&nbsp;&nbsp;{{ $permission->name }}
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
			$('input[name="permissions[]"]').iCheck('check');
		}

		function uncheckAll() {
			$('input[name="permissions[]"]').iCheck('uncheck');
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
