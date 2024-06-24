<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.index');
    }

    public function AgentProfile(){
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('agent.agent_profile_view',compact('profileData'));
    }

    
    public function AgentProfileStore(Request $request){
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
        $notification=['message'=>'Agent Profile Updated Successfully','alert-type'=>'success'];
        return redirect()->route('agent.profile')->with($notification);
    }

    public function AgentChangePassword(){
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('agent.agent_change_password',compact('profileData'));
    }

}
