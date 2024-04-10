<?php

namespace App\Http\Controllers;

use App\Models\applicantsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class applicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form.form1') ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $job = $request -> input("job") ;
        $name = $request -> input("name") ;
        $surname = $request -> input("surname") ;

        $age = $request -> input("age") ;
        $tel = $request -> input("phone_number") ;
        $email = $request -> input("email") ;

        $university = $request -> input("university") ;
        $faculty = $request -> input("faculty") ;
        $Field = $request -> input("Field") ;

        $desired_salary = $request -> input("desired_salary") ;
        $question = $request -> input("question") ;
        $resume = $request -> input("resume") ;

        $applicantsModel = new applicantsModel ;

        //$applicantsModel -> pos_id = $job ;
        $applicantsModel -> app_firstname = $name ;
        $applicantsModel -> app_lastname = $surname ;

        $applicantsModel -> app_age = $age ;
        $applicantsModel -> app_telephone = $tel ;
        $applicantsModel -> app_email = $email ;

        $applicantsModel -> app_education = $university ;
        $applicantsModel -> app_faculty = $faculty ;
        $applicantsModel -> app_major = $Field ;
        
        $applicantsModel -> app_require_salary = $desired_salary ;
        $applicantsModel -> app_question = $question ;
        $applicantsModel -> app_resume = $resume ;

        //$applicantsModel -> updated_at = $timestamps ;

        $applicantsModel -> save();
        return view('main');
        
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
