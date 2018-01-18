<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use View;

trait BreadTrait
{
    public function __construct()
    {
        View::share('objectName', $this->objectName);
        View::share('objectIcon', $this->objectIcon);
    }

    public function index()
    {
        View::share('actionName', 'browse');
        return view("{$this->objectName}.browse");
    }

    public function getDatatables($eloquent)
    {
        return Datatables::of($eloquent)
            ->addColumn('action', function ($eloquent) {
                $btn = [];
                if (Auth::user()->can("view $this->objectName"))
                    $btn[] = '<a href="'.route("{$this->objectName}.view", ['id' => $eloquent->id]).'" class="btn btn-sm btn-default"><i class="fa fa-file-text-o"></i> View</a>';
                if (Auth::user()->can("edit $this->objectName"))
                    $btn[] = '<a href="'.route("{$this->objectName}.edit", ['id' => $eloquent->id]).'" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>';
                if (Auth::user()->can("delete $this->objectName"))
                    $btn[] = '<a href="'.route("{$this->objectName}.delete", ['id' => $eloquent->id]).'" class="btn btn-sm btn-default confirm-first" data-confirm-text="Delete '.ucfirst($this->objectName).' ID '.$eloquent->id.'?"><i class="fa fa-trash"></i> Delete</a>';
                return '<div class="btn-group">'.implode('&nbsp;', $btn).'</div>';
            });
    }

    public function view($id)
    {
        try {
            $object = $this->objectModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route("{$this->objectName}");
        }

        View::share('actionName', 'view');
        return view("{$this->objectName}.view", compact('object'));
    }

    public function add()
    {
        View::share('actionName', 'add');
        return view("{$this->objectName}.add-edit");
    }

    public function edit($id)
    {
        try {
            $object = $this->objectModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route("{$this->objectName}");
        }

        View::share('actionName', 'edit');
        return view("{$this->objectName}.add-edit", compact('object'));
    }

    public function delete($id)
    {
        $object = $this->objectModel::findOrFail($id);
        $object->delete();
        return redirect()->back();
    }

    public function redirect($request, $object, $message = null)
    {
        if ($request->save == 'browse')
            return redirect()->route("{$this->objectName}")->with('notifyInfo', !empty($message) ? $message : 'Data berhasil disimpan');
        elseif ($request->save == 'edit')
            return redirect()->route("{$this->objectName}.edit", ['id' => $object])->with('notifyInfo', !empty($message) ? $message : 'Data berhasil disimpan');
        elseif ($request->save == 'add')
            return redirect()->route("{$this->objectName}.add")->with('notifyInfo', !empty($message) ? $message : 'Data berhasil disimpan');
        else
            return redirect($request->previous_url)->with('notifyInfo', !empty($message) ? $message : 'Data berhasil disimpan');
    }

}
