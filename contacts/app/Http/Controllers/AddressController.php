<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::with('contact')->get();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addresses.create', ['contact_id' => intval($_GET['contact_id'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if(isset($_GET['contact_id'])){
            $request->validate([
                'type' => 'required',
                'street_address'=>'required',
                'suburb' => 'required',
                'pincode' => 'required'
    
            ]);
    
            Address::create($request->all());
       
            return redirect()->route('contacts.index')
                            ->with('success','Address added successfully.');

       // }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('addresses.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $request->validate([
            'type' => 'required',
            'street_address'=>'required',
            'suburb' => 'required',
            'pincode' => 'required'

        ]);
  
        $address->update($request->all());
  
        return redirect()->route('addresses.edit', $address->contact_id)
                        ->with('success','Address updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
