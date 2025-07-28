<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function create()
    {
        return view('footer.contact');
    }

    public function store(ContactRequest $request)
    {
        $validateData = $request->validated();
        // Enregistrer le message de contact dans la base de données
        Contact::create($validateData);
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
