<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormsModel;
use App\Models\Form_PositionsModel;

class FormsController extends Controller
{
    public function index()
    {
        $forms = FormsModel::all();
        $forms_Pos = Form_PositionsModel::all();
        return view('myform', compact('forms', 'forms_Pos'));
    }
    
    public function destroy(FormsModel $id)
    {
        $id->delete();
        return redirect(route('index.form'))->with('succes', ('Form deleted succesffully'));
    }
}
