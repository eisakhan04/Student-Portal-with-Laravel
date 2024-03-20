<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Http\Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
   
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // getEmailSingle static function in folder Models in User file
    static public function getEmailSingle($email)
    {
        return User::where('email', '=' ,$email)->first();
    }
  

    //Display Admin list 
    static public function getAdmin()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete', '=', 0);
    

            if (!empty(request()->get('name'))) {
                $return = $return->where('name', 'like', '%' . request()->get('name') . '%');
            }

        if (!empty(request()->get('email'))) {
            $return = $return->where('email', 'like', '%' . request()->get('email') . '%');
        }
    
        $return = $return->orderBy('id', 'desc')
            ->paginate(5);
    
        return $return;
    }
      //getTeacher
      static public function getTeacher()
      {
          $return = self::select('users.*')
              ->where('user_type', '=', 2)
              ->where('is_delete', '=', 0);

      
          $return = $return->orderBy('id', 'desc')
              ->paginate(5);
      
          return $return;
      }

      //getParent
      static public function getParent()
      {
          $return = self::select('users.*')
              ->where('user_type', '=', 3)
              ->where('is_delete', '=', 0);

      
          $return = $return->orderBy('id', 'desc')
              ->paginate(5);
      
          return $return;
      }


    // getStudent
    static public function getStudent()
    {
        $return = self::select('users.*' , 'class.name as class_name')
            ->join('class' , 'class.id' , '=' ,'users.class_id' , 'left')
            ->where('users.user_type', '=', 4)
            ->where('users.is_delete', '=', 0);
        $return = $return->orderBy('users.id', 'desc')
            ->paginate(5);
    
        return $return;
    }




   
    //
    static public function getSingle($id)
    {
          return self::find($id);
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        { 
            return url('upload/profile/'.$this->profile_pic);

        }
        else{
            return "";
        }
    }

    
}
