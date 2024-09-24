<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
class FeedbackController extends Controller
{
    public function create(){
        return view('feedback.create');
    }
    public function store(Request $request){
    Feedback::create($request->all());
    return redirect()->route('feedback.thankyou');
    }
    public function thankyou(){
        return view('feedback.thankyou');
    }
}
