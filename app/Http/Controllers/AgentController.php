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

}
