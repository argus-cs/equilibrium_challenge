<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomRequest;
use App\Phone;
use Illuminate\Http\Request;
use App\Staff;
use App\Sector;

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
        $sectors = Sector::all();
        return view('staffs.create')->with('sectors', $sectors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomRequest $request)
    {
      $validator = $request->validated();

      $staff = new Staff();
      $staff->name = $request->input('name');
      $staff->cpf = $request->input('cpf');
      $staff->carteira = $request->input('carteira');
      $staff->sectors_id = $request->input('sector');
      $staff->save();

      $phones = new Phone();
      $phones->number = $request->input('phone');
      $phones->staff_id = $staff->id;

      $phones2 = new Phone();
      $phones2->number = $request->input('phone2');
      $phones2->staff_id = $staff->id;

      $phones->save();
      $phones2->save();

      if(!$validator) {
        return redirect()->back()->withInput();
      } else {
        return redirect('/staffs')->with('success', 'Funcionário criado com sucesso!');
      }
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
      $sectors = Sector::all();
        $select = [];
        foreach($sectors as $sector) {
          $select[$sector->id] = $sector->name;
        }
      return view('staffs.edit')->with(['staff' => $staff, 'sectors' => $select]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request, [
        'name'      =>  'required',
        'carteira'  =>  'required|max:12|min:12',
        'sector'    =>  'required',
      ]);

      $staff = Staff::find($request->input('id'));

      $staff->name = $request->input('name');
      $staff->carteira = $request->input('carteira');
      $staff->sectors_id = $request->input('sector');

      // return $request->input($staff->phones[0]->id);
      /**
       *  São 5h da manhã, não estou nem pensando direito...
       */
      foreach ($staff->phones as $phone) {
        if($phone->number != $request->input($phone->id)){
          $phones = Phone::findOrFail($phone->id);
          $phones->number = $request->input($phone->id);
          $phones->save();
        }
      }

      $saved = $staff->save();

      if(!$saved) {
        return redirect()->back()->withInput();
      } else {
        return redirect('/staffs')->with('success', 'Funcionário editado com sucesso!');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $staff = Staff::where('id', $id);
      $staff->delete();

      return redirect('/staffs')->with('success', 'Funcionário deletado com sucesso!');
    }
}
