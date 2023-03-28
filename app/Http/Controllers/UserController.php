<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserLinksRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Models\UserLinks;
use App\Services\Models\RegisterUserLinksService;
use App\Services\Models\RegisterUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request, User $user )
    {
        $rules = [
            'name' => 'required',
        ]; 
        if($request->validate($rules)){
            $data['name'] = $request->name;
            $service = new RegisterUserService($data);


            if( !$user = $service->run() ) return response( null, 503 );
            if($user) {
                $this->createUserLinks($request->linkedin_url, $request->github_url, $user->id);
            }
        }
        return response()->json(['success'=>'Form Submitted successfully.']);
    }

    public function createUserLinks($linkedin_url, $github_url, $user_id) {
        $data['linkedin_url'] = $linkedin_url;
        $data['github_url'] = $github_url;
        $data['user_id'] = $user_id;
        $service = new RegisterUserLinksService($data);

        if( !$user_links = $service->run() ) return response( null, 503 );
        return response()->json( $user_links , 201 );
    }

    public function getUserData($user_name) {
        $user = User::where('name', $user_name)->first();
        $user_links = UserLinks::where('user_id', $user->id)->first();
        
        if($user && $user_links) return response()->json( [$user,$user_links], 201);
    }

    public function userDetails($name) {
        return view('user-details', compact('name'));
    }
}
