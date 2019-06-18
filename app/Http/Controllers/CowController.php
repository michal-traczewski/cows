<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class CowController extends Controller
{    
    private $viewData;
    
    public function __construct()
    {
        $this->viewData = ['nav_selection' => 'cow_profile'];
    }
    
    private function assignUser()
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 0 ;
        $user = \App\User::find($user_id);
        
        $this->viewData['user_id'] = $user_id;
        $this->viewData['user'] = $user;
        
        return $user_id;
    }
    
    public function addCowForm()
    {
        $this->assignUser();

        if (!$this->viewData['user']){
            return view('message', [
                'message' => 'You must be logged in']);
        } else {
            $this->viewData['cow_name'] = '';
            $this->viewData['action'] = '/addcow';
            return view('cow_profile', $this->viewData);
        }
    }

    public function editCowForm(Request $request, $id)
    {
        $this->assignUser();

        if (!$this->viewData['user']){
            return view('message', [
                'message' => 'You must be logged in']);
        }
        
        $cow = \App\Cow::find($id);
        if (!$cow) {
            return view('message', [
                'message' => 'Couldn\'t find specific cow']);
        }
        
        $this->viewData['cow_name'] = $cow->name;
        $this->viewData['action'] = '/editcow/' . $id;
        
        return view('cow_profile', $this->viewData);
    }
    
    public function editCow(Request $request, $id)
    {
        $cow = \App\Cow::find($id);
        if (!$cow) {
            return view('message', [
                'message' => 'Couldn\'t find specific cow']);
        }
        
        $cow->name = $request->cow_name;
        $cow->save();
        
        $request->validate([
            'cow_name' => 'required',
        ]);
        
        $this->viewData['message'] = 
                'You have succesfully updated cow profile';
        
        return view('message', $this->viewData);
    }
    
    public function addCow(Request $request)
    {
        $request->validate([
            'cow_name' => 'required',
        ]);
        
        $new_cow = new \App\Cow();
        $new_cow->name = $request->cow_name;
        $new_cow->save();
        
        $this->viewData['message'] = 
                'You have succesfully added new cow';
        
        return view('message', $this->viewData);
    }
}
