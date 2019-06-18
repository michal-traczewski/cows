<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class IndexController extends Controller
{
    private $viewData;
    private $cowService;
    
    public function __construct()
    {
        $this->viewData = ['nav_selection' => 'home'];
        $this->cowService = app()->make('App\Services\CowService');
    }
    
    public function addDailyOutput(Request $request)
    {
        if (!$this->assignUser()) {
            $this->viewData['message'] = 'You must be logged in';
            return view('message', $this->viewData);
        }
        
        $new_output = $request->input('daily_output');
        if ($new_output and is_numeric($new_output)) {
            $date = $request->input('date');
            $cow_id = $request->input('cow_id');

            $row = \App\MilkOutput::where('cow_id', $cow_id)
                    ->where('date', $date)->first();

            if ($row) {
                $row->output = $new_output;
                $row->save();
            } else {
                $new_row = new \App\MilkOutput();
                $new_row->date = $date;
                $new_row->cow_id = $cow_id;
                $new_row->output = $new_output;
                $new_row->save();
            }
            
            $this->viewData['message'] = 'Succesfully added milk output';
            
        } else {
            $this->viewData['message'] = 'Milk output must be a number';
        }
        
        
        return view('message', $this->viewData);
    }
    
    public function index(Request $request)
    {
        $date = $request->input('date') ?: date('Y-m-d');
        $cow_id = $request->input('cow_id') ?: 0;
        $chosen_cow = 0;
        
        if ($cow_id) {
            $chosen_cow = \App\Cow::find($cow_id);
        }
        
        $daily_output = \App\MilkOutput::where('cow_id', $cow_id)
                ->where('date', $date)->first();
        
        $daily_output = $daily_output ? $daily_output->output : 0;
        
        $cows_order_by_year = $this->cowService->getSummary('year');
        $cows_order_by_month = $this->cowService->getSummary('month');
        $cows_order_by_today = $this->cowService->getSummary('today');
        $daily_outputs = $this->cowService->getDailyOutputs($date, $cow_id);
        
        $this->viewData['cows_order_by_year'] = $cows_order_by_year;
        $this->viewData['cows_order_by_month'] = $cows_order_by_month;
        $this->viewData['cows_order_by_today'] = $cows_order_by_today;
        $this->viewData['date'] = $date;
        $this->viewData['daily_outputs'] = $daily_outputs;
        $this->viewData['daily_output'] = $daily_output;
        $this->viewData['chosen_cow'] = $chosen_cow ?: 0;
        
        return view('index', $this->viewData);
    }
    
    private function assignUser()
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 0 ;
        $user = \App\User::find($user_id);
        
        $this->viewData['user_id'] = $user_id;
        $this->viewData['user'] = $user;
        
        return $user_id;
    }
}
