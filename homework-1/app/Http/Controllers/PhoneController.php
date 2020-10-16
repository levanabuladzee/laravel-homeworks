<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function getPhones() {
        $phones = Phone::all();

        return view('phones')->with("phones", $phones);
    }

    public function getPhone($id) {
        $phone = Phone::findOrFail($id);

        return view('phone')->with('phone', $phone);
    }

    public function getCreatePhone() {
        return view('create_phone');
    }

    public function savePhone(Request $request) {
        $phone = new Phone($request->all());

        $phone->save();

        return redirect('phones');
    }

    public function getEditPhone($id) {
        $phone = Phone::findOrFail($id);

        return view('edit_phone')->with('phone', $phone);
    }

    public function updatePhone(Request $request, $id) {
        $phone = Phone::findOrFail($id);

        $phone->update($request->all());

        return redirect('phones');
    }

    public function deletePhone(Phone $phone) {
        $phone->delete();

        return redirect()->back();
    }
}
