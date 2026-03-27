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
    public function confirm(Request $request)
{
    $tel = $request->tel_1 . $request->tel_2 . $request->tel_3;
    $request->merge(['tel' => $tel]);

    // 2. すべての項目を「1つのvalidate」の中でチェックする！
    $request->validate([
        'last_name'   => 'required|string|max:8',
        'first_name'  => 'required|string|max:8',
        'gender'      => 'required',
        'email'       => 'required|string|email',
        'tel'         => 'required|numeric|digits_between:10,11', // まとめたtelをチェック
        'address'     => 'required|string',
        'category_id' => 'required',
        'detail'      => 'required|string|max:120',
    ],[
    
    'last_name.required'   => 'お名前を入力してください',
    'first_name.required'  => 'お名前を入力してください',
    'gender.required'      => '性別を選択してください',
    'email.required'       => 'メールアドレスを入力してください',
    'email.email'          => 'メールアドレスは「ユーザー名@ドメイン」の形式で入力してください',
    'tel.required'         => '電話番号を入力してください',
    'tel.digits_between'   => '電話番号は5桁までの数字で入力してください',
    'address.required'     => '住所を入力してください',
    'category_id.required' => 'お問い合わせの種類を選択してください',
    'detail.required'      => 'お問い合わせ内容を入力してください',

]);

    // 3. すべてOKなら確認画面へ
    $contact = $request->all();
    return view('confirm', compact('contact'));
}
}
