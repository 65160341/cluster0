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
        return redirect(route('forms.index'))->with('succes', ('Form deleted succesffully'));
    }

    public function edit(Form_PositionsModel $id)
    {
        return view('#', compact('id'));
    }

    public function update(Request $request, Form_PositionsModel $id)
    {
        $data = $request->validata([
            'fp_position_type' => 'reduest',
            'pos_id' => 'reduest',
            'fp_amount_of_postion' => 'reduest|numeric'
        ]);

        $id->update($data);

        return redirect(route('forms.index'))->with('succes', ('Form update succesffully'));
    }
}
