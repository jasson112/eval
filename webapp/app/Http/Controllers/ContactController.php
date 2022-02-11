<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        //
    }

    public function store(ContactRequest $request)
    {
        $parameters = $request->validated();

        $contacts = [];

        foreach ($parameters['contacts'] as $keyContact => $contact) {
            foreach ($parameters['columns'] as $keyColumn => $column) {
                $contacts[$keyContact][$column] = $contact[$keyColumn];
            }
        }
        Contact::insert($contacts);

        return response()->json([
            'success' => true
        ]);
    }

}
