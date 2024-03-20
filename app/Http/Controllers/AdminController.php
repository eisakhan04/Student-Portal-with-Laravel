<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// im  use Hash path here



class AdminController extends Controller
{
   public function list(Request $request)
   {
    $data['header_title']= 'Admin List';
    $data['getRecord'] = User::getAdmin();
       $data['header_tittle'] = "Admin List";
       return view('admin.admin.list' , $data);
   }
   // add function 
   public function add(Request $request)
   {
       
       
       $data['header_tittle'] = "Add New Admin";
       return view('admin.admin.add' , $data);
   }
    // insert function 
   public function insert(Request $request)
   {
         request()->validate([                                                  
            'email'=> 'required|email|unique:users'
         ]);
 
         $user = new User;
         $user->name = trim($request->name);
         $user->email = trim($request->email);
         $user->password = Hash::make($request->password);
         $user->user_type = 1;
         $user->save();
         //return redirect()->route('admin.list');
         //return redirect()->route('admin/admin/list');

         return redirect('admin/admin/list')->with('success', "Admin successfully created");

   }
   // edit function in controller 
   public function edit($id)
   {
      
       
       $data['getRecord'] = User::getSingle($id);
       if(!empty( $data['getRecord'] ))
       {
        $data['header_tittle'] = "Edit Admin";
        return view('admin.admin.edit' , $data);
       }
       else{
              abort(404);
       }
   
   }
   //update function 
   public function update(Request $request , $id)
   { 
    request()->validate([                                                  
        'email'=> 'required|email|unique:users,email,'.$id
         ]);
        
     $user = User::getSingle($id);
     $user->name = trim($request->name); 
     $user->email = trim($request->email);
    if(!empty($request->password))  
    {
        $user->password = Hash::make($request->password);
    }

    $user->save();
    return redirect('admin/admin/list')->with('success', "Admin successfully update");

   }

// delete function 
        public function delete($id)
        {
            $user = User::getSingle($id);
            $user->is_delete = 1;
            $user->save();
            return redirect('admin/admin/list')->with('success', "Admin successfully Deleted");
        }


}











 