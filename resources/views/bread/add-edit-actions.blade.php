<button type="submit" name="save" class="btn btn-app"><i class="fa fa-save"></i>Save</button>
@can ("browse $objectName")
    <button type="submit" name="save" class="btn btn-app" value="browse"><i class="fa fa-list-alt"></i>Save & Browse</button>
@endcan
@can ("edit $objectName")
    <button type="submit" name="save" class="btn btn-app" value="edit"><i class="fa fa-edit"></i>Save & Edit</button>
@endcan
@can ("add $objectName")
    <button type="submit" name="save" class="btn btn-app" value="add"><i class="fa fa-file-o"></i>Save & New</button>
@endcan

<a href="{{ url()->previous() }}" class="btn btn-app pull-right"><i class="fa fa-reply"></i>Cancel</a>
<button type="reset" class="btn btn-app pull-right"><i class="fa fa-undo"></i>Reset</button>
