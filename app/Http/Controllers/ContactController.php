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

         // お問い合わせの種類
        if ($request->category_id) {
        $query->where('category_id', $request->category_id);
        }

        // 日付
        if ($request->date) {
        $query->whereDate('created_at', $request->date);
        }


        $contacts = $query->paginate(10);

        return view('admin', compact('contacts'));

    }
    public function confirm(Request $request){
        $contact = $request->all();

        return view('confirm', compact('contact'));
    }
}
