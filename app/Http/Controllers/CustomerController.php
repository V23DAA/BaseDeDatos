<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer=Customer::all();
        return view("customers\index",compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customers\create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->secondname = $request->secondname;
        $customer->lastname = $request->lastname;
        $customer->secondlastname = $request->secondlastname;
        $customer->cell_number = $request->cell_number;
        $customer->street_address = $request->street_address;
 
        $customer->save();

        return redirect()->route('customer.index')->with('successMsg','El registro se guardó exitosamente');
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
        $customer= Customer::find($id);
        return view("customers.edit",compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->firstname = $request->firstname;
        $customer->secondname = $request->secondname;
        $customer->lastname = $request->lastname;
        $customer->secondlastname = $request->secondlastname;
        $customer->cell_number = $request->cell_number;
        $customer->street_address = $request->street_address;
        
        $customer->save();
        return redirect()->route('customer.index')->with('successMsg','El registro se actualizó exitosamente');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer ->delete();
        return redirect()->route('customer.index')->with('eliminar','ok');
    }
}
