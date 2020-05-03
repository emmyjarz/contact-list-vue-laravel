<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Address;
use Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Contact as ContactResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $contacts = Contact::paginate(5);

            foreach ($contacts as $contact) {
                $address = $contact->address;
                $contact->address = !empty($address) ? Address::prepAddress($contact->address) : null;
                if (!empty($contact->phone)) {
                    $contact->phone = Contact::phoneFormat($contact->phone);
                }
            }

            return ContactResource::collection($contacts);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'status' => 'error',
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //Validation
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'digits:10|nullable',
            'address1' => 'required_with:zip',
            'zip' => 'required_with:address1|digits:5|nullable',
        ]);
        if ($validator->fails()) {
            return [
                'error' => $validator->errors(),
                'status' => 'error',
            ];
        }

        $post = $request->all();

        try {
            //Create contact
            $contact = Contact::create($post);

            //Create address
            if (!empty($post['address1']) && !empty($post['zip'])) {
                $contact->address()->create($post);
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'status' => 'error'
            ];
        }

        //Make phone number pretty
        if (!empty($contact->phone)) {
            $contact->phone = Contact::phoneFormat($contact->phone);
        }

        return [
            'data' => [
                'contact' => $contact,
            ],
            'status' => 'success'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        try {
            //Make phone number pretty
            if (!empty($contact->phone)) {
                $contact->phone = Contact::phoneFormat($contact->phone);
            }
            return [
                'data' => [
                    'contact' => $contact,
                    'address' => $contact->address ?? null
                ],
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'status' => 'error'
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return [
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'status' => 'error'
            ];
        }
    }
}
