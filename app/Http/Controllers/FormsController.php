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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
