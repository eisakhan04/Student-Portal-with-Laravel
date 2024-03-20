<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParentController extends Controller
{
     //list function
     public function list(Request $request)
     {
      $data['header_title']= 'Student List';
      $data['getRecord'] = User::getParent();
         $data['header_tittle'] = "Parent List";
         return view('admin.parent.list' , $data);
     }
   
       //add function
       public function add()
       {
       
          $data['header_tittle'] = "Add New Parent";
          return view('admin.parent.add' , $data);
       }
       // insert function 
        public function insert(Request $request)
        { 
            $parent = new User;
            $parent->name = trim($request->name);
            $parent->last_name = trim($request->last_name);
            $parent->gender = trim($request->gender);
            $parent->occupation = trim($request->occupation);
            $parent->address = trim($request->address);
          
            if(!empty($request->file('profile_pic')))
            {
               $ext = $request->file('profile_pic')->getClientOriginalExtension();
               $file = $request->file('profile_pic');
               $randomStr = date('Ymdhis').Str::random(20);
               $filename = strtolower($randomStr).".".$ext;
               $file->move('upload/profile',$filename);
               $parent->profile_pic = $filename ;
            }
    
           
            $parent->mobile_number = trim($request->mobile_number); 
             
            $parent->status = ($request->status == 'Male') ? 1 : 0;
            $parent->email = trim($request->email); 
            $parent->password = Hash::make($request->password); 
            $parent->user_type = 3; 
            $parent->save();
   
            return redirect('admin/parent/list')->with('success' , "Parent successfully Created");

        }

        public function edit($id)
        {
           $data['getRecord'] = User::getSingle($id);
           if(!empty($data['getRecord']))
           {
              
               $data['header_tittle'] = "Edit Parent";
               return view('admin.parent.edit' , $data);
           }
           else
           {
               abort(404);
           }
          
   
        }
        //update function 
        public function update(Request $request , $id)
        {

         $parent = User::getSingle($id);
         $parent->name = trim($request->name);
         $parent->last_name = trim($request->last_name);
         $parent->gender = trim($request->gender);
         $parent->occupation = trim($request->occupation);
         $parent->address = trim($request->address);

           if(!empty($request->file('profile_pic')))
           {
               if(!empty($parent->getProfile()))
               {
                  unlink('upload/profile/'.$parent->profile_pic);
               }
              $ext = $request->file('profile_pic')->getClientOriginalExtension();
              $file = $request->file('profile_pic');
              $randomStr = date('Ymdhis').Str::random(20);
              $filename = strtolower($randomStr).".".$ext;
              $file->move('upload/profile',$filename);
              $parent->profile_pic = $filename ;
           }
             
           $parent->mobile_number = trim($request->mobile_number); 
           $parent->status = ($request->status == 'Male') ? 1 : 0;
           $parent->email = trim($request->email); 
              if(!empty($request->password))
              {
               $parent->password = Hash::make($request->password); 
              }
           
             
              $parent->save();
   
           return redirect('admin/parent/list')->with('success' , "Parent successfully Updated");
   
          
        }
   
        //delete function 
        public function delete($id)
        {
           $getRecord = User::getSingle($id);
           if(!empty($getRecord))
           {
               $getRecord->is_delete = 1;
               $getRecord->save();
               return redirect()->back()->with('success' , "Parent successfully Deleted");
   
           }
           else
           {
               abort(404);
           }
        }


}
