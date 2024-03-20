<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    //list function
    public function list(Request $request)
    {
     $data['header_title']= 'Student List';
     $data['getRecord'] = User::getStudent();
        $data['header_tittle'] = "Student List";
        return view('admin.student.list' , $data);
    }
     //add function
     public function add()
     {
        $data['getClass'] = ClassModel::getClass();
        $data['header_tittle'] = "Add New Student List";
        return view('admin.student.add' , $data);
     }
      // insert function 
     public function insert(Request $request)
     {
        
         $student = new User;
         $student->name = trim($request->name);
         $student->last_name = trim($request->last_name);
         $student->admission_number = trim($request->admission_number);
         $student->roll_number = trim($request->roll_number);
         $student->class_id = trim($request->class_id);
         $student->gender = trim($request->gender);
         if(!empty($request->date_of_birth))
         {
            $student->date_of_birth = trim($request->date_of_birth);
         }
         if(!empty($request->file('profile_pic')))
         {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).".".$ext;
            $file->move('upload/profile',$filename);
            $student->profile_pic = $filename ;
         }
            $student->caste = trim($request->caste); 
            $student->religion = trim($request->religion); 
            $student->mobile_number = trim($request->mobile_number); 
            $student->admission_date = trim($request->admission_date);
            $student->blood_group = trim($request->blood_group); 
            $student->height = trim($request->height); 
            $student->weight = trim($request->weight); 
            $student->status = ($request->status == 'Male') ? 1 : 0;
            $student->email = trim($request->email); 
            $student->password = Hash::make($request->password); 
            $student->user_type = 4; 
            $student->save();

         return redirect('admin/student/list')->with('success' , "Student successfully Created");
 
        
       

     }
       // edit form function 
     public function edit($id)
     {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_tittle'] = "Edit Student";
            return view('admin.student.edit' , $data);
        }
        else
        {
            abort(404);
        }
       

     }
     //update function 
     public function update(Request $request , $id)
     {
          



        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
           $student->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
               unlink('upload/profile/'.$student->profile_pic);
            }
           $ext = $request->file('profile_pic')->getClientOriginalExtension();
           $file = $request->file('profile_pic');
           $randomStr = date('Ymdhis').Str::random(20);
           $filename = strtolower($randomStr).".".$ext;
           $file->move('upload/profile',$filename);
           $student->profile_pic = $filename ;
        }
           $student->caste = trim($request->caste); 
           $student->religion = trim($request->religion); 
           $student->mobile_number = trim($request->mobile_number); 
           $student->admission_date = trim($request->admission_date);
           $student->blood_group = trim($request->blood_group); 
           $student->height = trim($request->height); 
           $student->weight = trim($request->weight); 
           $student->status = ($request->status == 'Male') ? 1 : 0;
           $student->email = trim($request->email); 
           if(!empty($request->password))
           {
            $student->password = Hash::make($request->password); 
           }
        
          
           $student->save();

        return redirect('admin/student/list')->with('success' , "Student successfully Updated");

       
     }

     //delete function 
     public function delete($id)
     {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success' , "Student successfully Deleted");

        }
        else
        {
            abort(404);
        }
     }




} 
