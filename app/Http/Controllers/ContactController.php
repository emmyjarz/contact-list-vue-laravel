<?php

namespace App\Http\Controllers;

use App\Contact;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

            $contacts = Contact::orderBy('created_at', 'desc')->paginate(5);

            foreach ($contacts as $contact) {
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

        return [
            'status' => 'success'
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //Validation
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'digits:10|nullable',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('contacts')->ignore($contact->id),
                ],
                'address1' => 'required_with:zip',
                'zip' => 'required_with:address1|digits:5|nullable',
            ]
        );

        if ($validator->fails()) {
            return [
                'error' => $validator->errors(),
                'status' => 'error',
            ];
        }

        $post = $request->all();

        try {
            //Update Contact
            $contact->update($post);

            $address = $contact->address;

            //Create or Update address
            if (!empty($post['address1']) && !empty($post['zip'])) {
                empty($address) ?  $contact->address()->create($post) : $address->update($post);
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'status' => 'error'
            ];
        }

        return [
            'status' => 'success'
        ];
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
