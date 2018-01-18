@extends('adminlte::page')

@include('bread.title')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ ucfirst($actionName) }} {{ ucfirst($objectName) }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<div class="">
							@include('bread.browse-actions')
						</div>
						<div class="table-responsive">
							<table id="datatables-table" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Last Login</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tfoot>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tfoot>
							</table>
						</div>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection

@push('css')
	<link rel="stylesheet" href="{{ asset('plugins/dataTables.bootstrap.css') }}">
@endpush

@include('bread.script')

@push('javascripts')
	<script src="{{ asset('plugins/jquery.dataTables.min.js') }}" charset="utf-8"></script>
	<script src="{{ asset('plugins/dataTables.bootstrap.min.js') }}" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatables-table').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ route("$objectName.datatable") }}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'name', name: 'name' },
					{ data: 'email', name: 'email' },
					{ data: 'status', name: 'status' },
					{ data: 'last_login_at', name: 'last_login_at' },
					{ data: 'action', name: 'action' }
				],
				initComplete: function () {
					this.api().columns([0,1,2,3]).every(function () {
						var column = this;
						var input = document.createElement("input");
						$(input).attr('placeholder', 'Search ' + $(column.header()).text()).appendTo($(column.footer()).empty())
						.on('change', function () {
							column.search($(this).val(), false, false, true).draw();
						});
					});
				}
			});
		});
	</script>
@endpush
