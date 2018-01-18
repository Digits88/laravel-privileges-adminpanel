@section('htmlheader_title')
	{{ ucfirst($actionName) }} {{ ucfirst($objectName) }}
@endsection

@section('contentheader_title')
	<i class="{{ $objectIcon }}"></i> {{ ucfirst($objectName) }}
@endsection
