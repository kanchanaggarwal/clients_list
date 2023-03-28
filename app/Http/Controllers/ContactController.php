<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\client_contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$id)
    {
        $contact =  contacts::select(['contacts.id','contacts.name','contacts.email','contacts.type','contacts.phone'])
        ->join('client_contacts', 'client_contacts.contact_id', '=', 'contacts.id')
        ->where('client_contacts.client_id','=',$id)->get();
       
        // dd($contact);
        return response()->json($contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $data = $request->all();
        $contact = new contacts();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->type = $data['type'];

        $contact->save();

        $clientContact = new client_contacts();
        $clientContact->client_id = $id;
        $clientContact->contact_id = $contact->id;
        $clientContact->save();

        return response()->json([
            'message'=>'Contact Created Successfully!!',
            'Contact'=>$contact
        ]);


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $category = Category::create($request->post());
        return response()->json([
            'message'=>'Category Created Successfully!!',
            'category'=>$category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $contactDetails = contacts::select('*')->where('id','=',$id)->first();
        // dd($contactDetails);
        return response()->json($contactDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function updateContact(Request $request, $id,contacts $contacts)
    {
        $requestData = $request->post();

        unset($requestData['_method']);
      

        $contacts->where('id','=',$id)->update($requestData);
        return response()->json([
            'message'=>'Contacts Updated Successfully!!',
            'contacts'=>$contacts
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contacts::where('id',$id)->delete();
        client_contacts::where('contact_id',$id)->delete();
        return response()->json([
            'message'=>'Conatct Deleted Successfully!!'
        ]);
    }
}
