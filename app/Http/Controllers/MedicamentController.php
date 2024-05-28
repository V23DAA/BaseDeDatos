<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicament=Medicament::all();
        return view("medicaments\index",compact('medicament'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("medicaments\create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/medicaments'))
            {
                mkdir('uploads/medicaments',0777,true);
            }
            $image->move('uploads/medicaments',$imagename);
        }else{
            $imagename = "";
        }

        $medicament = new Medicament();
        $medicament->name = $request->name;
        $medicament->batch = $request->batch;
        $medicament->amount = $request->amount;
        $medicament->purchase = $request->purchase;
        $medicament->sale = $request->sale;
        $medicament->expiration_date = $request->expiration_date;
        $medicament->image = $imagename;
        $medicament->status = 1;
        $medicament->registerby = $request->user()->id;
        $medicament->save();

        return redirect()->route('medicament.index')->with('successMsg','El registro se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicament= Medicament::find($id);
        return view("medicaments.edit",compact('medicament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medicament = Medicament::find($id);
        $image = $request->file('image');
        $slug = str::slug($request->name);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/medicaments'))
            {
                mkdir('uploads/medicaments',0777,true);
            }
            $image->move('uploads/medicaments',$imagename);
        }else{
            $imagename = $medicament->image;
        }
        
        
       
        $medicament->name = $request->name;
        $medicament->batch = $request->batch;
        $medicament->amount = $request->amount;
        $medicament->purchase = $request->purchase;
        $medicament->sale = $request->sale;
        $medicament->expiration_date = $request->expiration_date;
        $medicament->image = $imagename;
        $medicament->status = 1;
        $medicament->registerby = $request->user()->id;
        $medicament->save();
        return redirect()->route('medicament.index')->with('successMsg','El registro se actualizó exitosamente');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicament $medicament)
    {
        $medicament ->delete();
        return redirect()->route('medicament.index')->with('eliminar','ok');
    }

    public Function cambioestadomedicament(Request $request)
    {
        $medicament = Medicament::find ($request->medicament_id);
        $medicament-> status=$request->status;
        $medicament->save();

    }
}
