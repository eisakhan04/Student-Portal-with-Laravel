<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassModel;

class ClassController extends Controller
{
    // list function
    public function list(Request $request)
    {
        $data['getRecord'] = ClassModel::getRecord($request);
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }

    public function add(Request $request)
    {
        $data['header_tittle'] = "Add New Class";
        return view('admin.class.add', $data);
    }

    //insert function
    public function insert(Request $request)
    {
        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('admin/class/list')->with('success', "Class successfully created");
    }
   //edit function
    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['header_tittle'] = "Edit Admin";
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }
 //update function 
    public function update(Request $request, $id)
    {
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();

        return redirect('admin/class/list')->with('success', "Class successfully Update");
    }
    //delete  function
    public function delete($id)
    {
        $user = ClassModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/class/list')->with('success', "Class successfully Deleted");
    }
}
