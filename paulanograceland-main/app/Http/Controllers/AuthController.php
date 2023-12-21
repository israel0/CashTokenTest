<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use App\Models\Wallet;
use App\Rules\SponsorValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("guest")->except("logout", "register", "registerAction");
    }

    public function login()
    {
        $data["title"] = "Login";
        $data["activeMenu"] = 5;
        return view("auth.login", $data);
    }

    public function loginAction(Request $request)
    {
        $data["title"] = "Login";
        $data["activeMenu"] = 5;

        $validate = $request->validate([
            'userName' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validate)) {
            $user = auth()->user();
            if ($user->status == User::$USER_ACTIVATED) {
                $request->session()->regenerate();
                return redirect()->intended('user');
            } else {
                return to_route("activate_reg");
            }
        }

        session()->flash("error", "Invalid Username or Password");

        return back()->withInput();
        // return back()->withErrors([
        //     'userName' => 'Invalid Username or Password',
        // ])->onlyInput('userName');
    }

    public function register()
    {
        $data["title"] = "Register";
        $packages = Package::all();
        $data["all_packages"] = compact("packages");
        return view("auth.register", $data);
    }

    public function registerAction(Request $request)
    {
        $data["title"] = "Register";
        $validate = $request->validate([
            'sponsorName' => [
                'required', "exists:users,userName", new SponsorValidationRule
            ],
            'package' => 'required|exists:packages,id',
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'middleName' => 'required|alpha',
            'dob' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
            'bankName' => 'required',
            'phoneNumber' => 'required',
            'gender' => 'required',
            'bankName' => 'required',
            'bankAccountName' => 'required',
            'bankAccountNumber' => 'required',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'userName' => 'required|alpha_num|min:3|max:20|unique:users,userName',
            'password' => 'required|min:6|max:20',
            'confirmPassword' => 'required|same:password',
            'transactionPassword' => 'required|integer|digits:4',
            'confirmTransactionPassword' => 'required|same:transactionPassword',
            'terms' => "accepted"
        ]);
        $user = new User();
        $user->sponsorName = strtolower($validate["sponsorName"]);
        $user->package = $validate["package"];
        $user->userName = strtolower($validate["userName"]);
        $user->password = Hash::make($validate["password"]);
        $user->transactionPassword = Hash::make($validate["transactionPassword"]);
        $user->firstName = $validate["firstName"];
        $user->email = $validate["email"];
        $user->middleName = $validate["middleName"];
        $user->lastName = $validate["lastName"];
        $user->dateOfBirth = $validate["dob"];
        $user->state = $validate["state"];
        $user->country = $validate["country"];
        $user->address = $validate["address"];
        $user->gender = $validate["gender"];
        $user->phoneNumber = $validate["phoneNumber"];
        $user->bankName = $validate["bankName"];
        $user->bankAccountNumber = $validate["bankAccountNumber"];
        $user->bankAccountName = $validate["bankAccountName"];
        $user->upline = strtolower($validate["sponsorName"]);
        // $user->activationCode = rand(1000000000, 9999999999);
        $user->save();
        $wallet = new Wallet();
        $wallet->userName = $user->userName;
        $wallet->save();
        Auth::login($user);
        return to_route("dashboard");
    }

    public function validate_sponsor(Request $request)
    {
        $sponsorName = strtolower(trim($request->input("sponsorName")));
        $user = User::where("userName", $sponsorName)->first();
        $data = [];
        if (!$user) {
            $data["responseCode"] = 0;
            return response()->json($data);
        }
        $data["firstName"] = $user->firstName;
        $data["lastName"] = $user->lastName;
        $data["responseCode"] = 1;
        return response()->json($data);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
}
