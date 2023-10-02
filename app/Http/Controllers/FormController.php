<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\submission;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;

class FormController extends Controller{
    public function goToForm(){
        return view('form');
    }

    public function submit(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email:rfc',
            'number' => 'required|numeric|between:2.50,99.99',
            'image' => 'required|image|max:2048'
        ]);

        $request->image->storeAs('public/images', $request->image->getClientOriginalName());

        DB::table('submission')->insert([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'number' => $request->input('number'),
            'image' => $request->image->getClientOriginalName(),
        ]);

        return redirect('submission');
    }

    public function showSubmission(Request $request){
        $data = DB::table('submission')
            ->latest('created_at')
            ->first();

        return view('submission', compact('data'));
    }
}