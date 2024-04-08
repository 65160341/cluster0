<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormsModel;

class FormsController extends Controller
{
    public function index()
    {
        $forms = FormsModel::all();
        return view('myform', compact('forms'));
    }

    public function update(){

    }
    
    public function destroy(FormsModel $id)
    {
        $id->delete();
        return redirect(route('index.form'))->with('succes', ('Form deleted succesffully'));
    }
}
