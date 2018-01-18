<a href="{{ url()->previous() }}" class="btn btn-app"><i class="fa fa-reply"></i>Back</a>
@can ("browse $objectName")
    <a href="{{ route("{$objectName}") }}" class="btn btn-app"><i class="fa fa-list-alt"></i>Browse</a>
@endcan
@can ("edit $objectName")
    <a href="{{ route("{$objectName}.edit", ['id' => $object->id]) }}" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a>
@endcan
@can ("add $objectName")
    <a href="{{ route("{$objectName}.add") }}" class="btn btn-app"><i class="fa fa-file-o"></i>Add New</a>
@endcan

<a href="{{ route("{$objectName}.delete", ['id' => $object->id]) }}" class="btn btn-app pull-right confirm-first" data-confirm-text="Delete {{ $objectName }} ID {{ $object->id }}?"><i class="fa fa-trash"></i>Delete</a>
