<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = SubjectModel::getRecord($request);
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }
    public function add(Request $request)
    {
        $data['header_tittle'] = "Add New Subject";
        return view('admin.subject.add', $data);
    }
        //insert function
        public function insert(Request $request)
        {
            
            $save = new SubjectModel;
            $save->name = trim($request->name);
            $save->type = trim($request->type);
            $save->status = trim($request->status);
            $save->created_by = Auth::user()->id;
            $save->save();
    
            return redirect('admin/subject/list')->with('success', "Class successfully created");
        }
          
          //edit function
    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['header_tittle'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }
     //update function 
     public function update(Request $request, $id)
     {
        $save = SubjectModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
         $save->save();
 
         return redirect('admin/subject/list')->with('success', "Class successfully Update");
     }
     //delete  function
     public function delete($id)
     {
         $user = SubjectModel::getSingle($id);
         $user->is_delete = 1;
         $user->save();
 
         return redirect('admin/subject/list')->with('success', "Class successfully Deleted");
     }
 

}
