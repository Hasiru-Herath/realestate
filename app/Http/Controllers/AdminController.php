<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->username=$request->username;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->address=$request->address;
        if($request->file('photo')){
            $file=$request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        $notification=['message'=>'Admin Profile Updated Successfully','alert-type'=>'success'];
        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword(){
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request){
        $request->validate([
            'oldpassword'=>'required',
            'new_password'=>'required|confirmed',
        ]);

        if(!Hash::check($request->oldpassword,Auth::user()->password)){
            $notification=['message'=>'Old Password Doesn\'t Match','alert-type'=>'error'];
            return redirect()->back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        $notification=['message'=>'Password Changed Successfully','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}
