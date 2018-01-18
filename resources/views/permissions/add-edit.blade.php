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
