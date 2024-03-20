<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TeacherController extends Controller
{
      //list function
      public function list(Request $request)
      {
      
       $data['getRecord'] = User::getTeacher();
          $data['header_tittle'] = "Teacher List";
          return view('admin.teacher.list' , $data);
      }
         //add function
         public function add()
         {
         
            $data['header_tittle'] = "Add New Teacher";
            return view('admin.teacher.add' , $data);
         }


               // insert function 
     public function insert(Request $request)
     {
        
         $teacher = new User;
         $teacher->name = trim($request->name);
         $teacher->last_name = trim($request->last_name);
         $teacher->gender = trim($request->gender);

         if(!empty($request->date_of_birth))
         {
            $teacher->date_of_birth = trim($request->date_of_birth);
         }
         $teacher->admission_date = trim($request->admission_date);

         if(!empty($request->file('profile_pic')))
         {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).".".$ext;
            $file->move('upload/profile',$filename);
            $teacher->profile_pic = $filename ;
         }
        
         $teacher->marital_status = trim($request->marital_status);
         $teacher->address = trim($request->address);

         $teacher->mobile_number = trim($request->mobile_number); 
         $teacher->permanent_address = trim($request->permanent_address);
         $teacher->qulification = trim($request->qulification);
  
         $teacher->work_experience = trim($request->work_experience);
         $teacher->note = trim($request->note);
         $teacher->status = ($request->status == 'Male') ? 1 : 0;
         $teacher->email = trim($request->email); 
         $teacher->password = Hash::make($request->password); 
         $teacher->user_type = 2; 
         $teacher->save();

         return redirect('admin/teacher/list')->with('success' , "Teacher successfully Created");   

     }

            // edit form function 
            public function edit($id)
            {
               $data['getRecord'] = User::getSingle($id);
               if(!empty($data['getRecord']))
               {
                 
                   $data['header_tittle'] = "Edit Teacher";
                   return view('admin.teacher.edit' , $data);
               }
               else
               {
                   abort(404);
               }
              
       
            }

                //update function 
     public function update(Request $request , $id)
     {
          



        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);

        $teacher->gender = trim($request->gender);
       

        if(!empty($request->date_of_birth))
        {
         $teacher->date_of_birth = trim($request->date_of_birth);
        }
        $teacher->admission_date = trim($request->admission_date);

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($teacher->getProfile()))
            {
               unlink('upload/profile/'.$teacher->profile_pic);
            }
           $ext = $request->file('profile_pic')->getClientOriginalExtension();
           $file = $request->file('profile_pic');
           $randomStr = date('Ymdhis').Str::random(20);
           $filename = strtolower($randomStr).".".$ext;
           $file->move('upload/profile',$filename);
           $teacher->profile_pic = $filename ;
        }
           
   
         
           $teacher->marital_status = trim($request->marital_status);
           $teacher->address = trim($request->address);
  
           $teacher->mobile_number = trim($request->mobile_number); 
           $teacher->permanent_address = trim($request->permanent_address);
           $teacher->qulification = trim($request->qulification);
    
           $teacher->work_experience = trim($request->work_experience);
           $teacher->note = trim($request->note);

           $teacher->status = ($request->status == 'Male') ? 1 : 0;
           $teacher->email = trim($request->email); 
           if(!empty($request->password))
           {
            $teacher->password = Hash::make($request->password); 
           }
        
          
           $teacher->save();

        return redirect('admin/teacher/list')->with('success' , "Teacher successfully Updated");

       
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
