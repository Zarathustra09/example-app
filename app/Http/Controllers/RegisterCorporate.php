<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\CorporateUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterCorporate extends Controller
{
   
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showRegistrationForm()
    {
        return view('auth.corporateRegistration'); // Adjust the view name based on your actual file structure
    }

 


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:corporate_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'registration_form' => ['required', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'proof_of_payment' => ['required', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'industry' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'fax_number' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'products_offered' => ['required', 'string', 'max:255'],
            'no_employees' => ['required', 'integer', 'max:255'],
        ]);
    }

    protected function create(Request $request)
    {


     
        
        $user = CorporateUser::create([
            'company_name' => $request['company_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'approved' => $request['approved'],
            'role' => $request['role'],
            'industry' => $request['industry'],
            'region' => $request['region'],
            'contact_number' => $request['contact_number'],
            'fax_number' => $request['fax_number'],
            'website' => $request['website'],
            'products_offered' => $request['products_offered'],
            'no_employees' => $request['no_employees'],
            'registration_form' => $request['registration_form']->store('registration_forms', 'public'),
            'proof_of_payment' => $request['proof_of_payment']->store('proof_of_payments', 'public'),
        ]);

        return redirect()->route('login')->with('message', trans('Your account needs admin approval'));
        
    }
}
