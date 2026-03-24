<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->fullname) {
            $query->where(function($q) use ($request) {
                $q->where('last_name', 'LIKE', "%{$request->fullname}%")
                  ->orWhere('first_name', 'LIKE', "%{$request->fullname}%");
            });
        }

        if ($request->gender) {
        $query->where('gender', $request->gender);
        }

        $contacts = $query->paginate(10);

        return view('admin', compact('contacts'));

    }
}
