<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
     public function index()
    {
        $contacts=Contact::paginate(10);
        return view('admin.contacts.index',compact('contacts'));
    }
     public function destroy(Contact $contact)
    {
        $contact = Contact::findOrFail($contact->id);
        // Supprime le contact
        $contact->delete();

        // Redirige vers la liste des contacts avec un message de succès
        return redirect()->route('admin.contacts.index')->with('success', 'contact deleted successfully.');
    }
}
