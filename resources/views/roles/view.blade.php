@extends('adminlte::page')

@include('bread.title')

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ ucfirst($actionName) }} {{ ucfirst($objectName) }} {{ !empty($object) ? "(ID $object->id)" : '' }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">ID</label>
                            <div class="col-md-10">
                                <p class="form-control-static">{{ $object->id }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">Name</label>
                            <div class="col-md-10">
                                <p class="form-control-static">{{ $object->name }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">Guard Name</label>
                            <div class="col-md-10">
                                <p class="form-control-static">{{ $object->guard_name }}</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="" class="col-md-2 control-label">Permissions</label>
                            <div class="col-md-10">
                                <ol class="form-control-static">
                                	@foreach ($object->permissions as $permission)
                                		<li>{{ $permission->name }}</li>
                                	@endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">Created at</label>
                            <div class="col-md-10">
                                <p class="form-control-static">{{ $object->created_at }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">Updated at</label>
                            <div class="col-md-10">
                                <p class="form-control-static">{{ $object->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        @include('bread.view-actions')
                    </div>
                </div>

			</div>
		</div>
	</div>
@endsection

@include('bread.script')
