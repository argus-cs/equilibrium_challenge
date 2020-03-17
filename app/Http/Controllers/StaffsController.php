<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $staffs = Staff::all();
      return view('staffs.index')->with('staffs', $staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'cpf' => 'required'
      ]);

      $cpf = $request->input('cpf');
      $cpf = trim($cpf);
      $cpf = str_replace('.', "", $cpf);
      $cpf = str_replace(',', "", $cpf);
      $cpf = str_replace('-', "", $cpf);
      $cpf = str_replace('/', "", $cpf);

      $staff = new Staff();
      $staff->name = $request->input('name');
      $staff->cpf = $cpf;
      $staff->save();

      return redirect('/staffs')->with('success', 'Staff Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $staff = Staff::find($id);
      return view('staffs.show')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $staff = Staff::find($id);
      return view('staffs.edit')->with('staff', $staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required',
        'cpf' => 'required'
      ]);

      $cpf = $request->input('cpf');
      $cpf = trim($cpf);
      $cpf = str_replace('.', "", $cpf);
      $cpf = str_replace(',', "", $cpf);
      $cpf = str_replace('-', "", $cpf);
      $cpf = str_replace('/', "", $cpf);

      $staff = Staff::find($id);
      $staff->name = $request->input('name');
      $staff->cpf = $cpf;
      $staff->save();

      return redirect('/staffs')->with('success', 'Staff Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      dd($request->delete_id);
    }
}
