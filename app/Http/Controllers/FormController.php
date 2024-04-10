<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formsModel;
use App\Models\formPositionsModel;
use Carbon\Carbon;

class FormController extends Controller{
    // ดึงข้อมูลทั้งหมดจากตาราง position_form
    public function indexCreate(){
        return view('creatform');

    }

    public function indexMyform()
    {
        $today = Carbon::now();
        $forms = FormsModel::all();
        return view('myform', compact('forms', 'today'));
    }

    public function show($form_id)
    {
        // Retrieve the form details from the database based on the $form_id
        // $form = \App\Models\formsModel::findOrFail($form_id);
        $forms_Pos = formPositionsModel::all();
        $formID = $form_id;
        return view('formdetail', compact('forms_Pos', 'formID'));
    }

    public function formStore(Request $request) {
        // Get the count of existing forms
        $countForms = \App\Models\formsModel::orderBy('form_round_count', 'desc')->value(
            'form_round_count'
        );
        $count = $countForms + 1;
    
        // Get form input data
        $dateStart = $request->input('form_date_start');
        $dateEnd = $request->input('form_date_end');
        $info = $request->input('pf_info');
    
        // Create a new instance of formsModel
        $formData = new formsModel();
        $formData->form_round_count = $count;
        $formData->form_round_year = Carbon::now()->year;
        $formData->form_date_start = $dateStart;
        $formData->form_date_end = $dateEnd;
        $formData->form_detail = $info;
        $formData->save(); // Save the form first to get its ID
    
        // Iterate through each position submitted
        foreach($request->pos_id as $key => $position) {
            // Create new instance of formPositionsModel
            $positionData = new formPositionsModel();
    
            // Fill in position data
            $positionData->form_id = $formData->form_id; // Assign form_id from the saved form
            $positionData->pos_id = $position;
            $positionData->fp_amount_of_postion = $request->pf_amount_of_position[$key];
            $positionData->fp_position_type = $request->pf_type_jobs[$key];
    
            // Save the position data
            $positionData->save();
        } 
    
        // Redirect back to index page
        return redirect()->route('createform.index');
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

    public function destroy($id) {
        // Find the form record
        $form = formsModel::findOrFail($id);

        // Find the associated position records
        $positions = formPositionsModel::where('form_id', $id)->get();

        // Delete the associated position records
        foreach ($positions as $position) {
            $position->delete();
        }

        // Delete the form record
        $form->delete();

        return redirect()->route('forms.index')->with('success', 'Form and associated positions deleted successfully.');
    }
    
    public function deleteFormPosition($positionId) {
        // Find the form position record
        $position = formPositionsModel::findOrFail($positionId);
    
        // Delete the form position record
        $position->delete();

        return redirect()->back()->with('success', 'Form position deleted successfully.');
        // return redirect()->route('formdetail.show')->with('success', 'Form position deleted successfully.');
    }
    
}
