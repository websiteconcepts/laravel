<?php
namespace App\Http\Controllers;
use App\Contact;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contacts = DB::table('contacts')->paginate(5);


        return view('contacts.index', ['contacts' => $contacts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'company' => 'required',
            'position' => 'required',
            'phone_mobile' => 'required_without:phone_work',
            'phone_work' => 'required_without:phone_mobile',
            'street_address' => 'required',
            'suburb' => 'required',
            'pincode' => 'required'
        ]);

        $contact = Contact::create($request->all());

        $contact->addresses()->create([
            'type' => $request->get('type'),
            'street_address' => $request->get('street_address'),
            'suburb' => $request->get('suburb'),
            'pincode' => $request->get('pincode'),
        ]);
        \Session::flash('msg', 'Contact added successfully.' );
   
        return redirect()->route('contacts.index')
                        ->with('success','Contact created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //$address = Address::find($contact);
     
        return view('contacts.show',compact('contact'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'company' => 'required',
            'position' => 'required'
        ]);
  
        $contact->update($request->all());
        \Session::flash('msg', 'Contact updated successfully.' );
        return redirect()->route('contacts.index')
                        ->with('success','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        \Session::flash('msg', 'Contact deleted successfully.' );
        return redirect()->route('contacts.index')
                        ->with('success','Contact deleted successfully');
    }
}
