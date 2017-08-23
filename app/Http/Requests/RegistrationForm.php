<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
        //Create and save the user.
        /*$user = User::create(request(['name', 'email', 'password']));*/       //Erro do autor ver vid 19 e 28(new) comments.
        $user = User::create([                                                  //Still using request(),
            'name' => request('name'),                                          //instead of tutorial code.
            'email' => request('email'),
            'password' => bcrypt(request('password'))                           //bcrypt solves it.
        ]);

        //Sign them in.
        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));
    }
}
