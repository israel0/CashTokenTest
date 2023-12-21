<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\ActivationCode;
use App\Models\Notification;
use App\Models\User;
use App\Helper\UserHelper;
use App\Models\Wallet;
use Closure;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(function (Request $request, Closure $next) {
            $user = $request->user();
            if ($user && $user->status == User::$USER_PENDING) {
                return to_route("activate_reg");
            }
            return $next($request);
        })->except("activate_reg", "activate_reg_action");
    }

    public function index()
    {
        $data["title"] = "Dashboard";
        $data["activeMenu"] = 1;
        $data['user'] = UserHelper::SpecificUserData();
        $data['wallet'] = UserHelper::WalletDataByUser();
        $data['stage'] = UserHelper::UserStage();
        return view("user.dashboard", $data);
    }

    public function activate_reg(Request $request)
    {
        $data["title"] = "Activate Your Account";
        return view("user.activate_reg", $data);
    }

    public function activate_reg_action(Request $request)
    {
        $data["title"] = "Register";
        $validate = $request->validate([
            "activationCode" => "required|integer|digits:11"
        ]);
        $activationCode = $validate["activationCode"];
        $activationCodeObj = ActivationCode::where("activationCode", $activationCode)->first();
        $user = $request->user();
        if (!$activationCodeObj || $activationCodeObj->status != ActivationCode::$ACTIVATION_PURCHASED || $activationCodeObj->package != $user->package) {
            session()->flash("error", "Invalid Activation Code. Please try again.");
            return back()->withInput();
        }
        $activationCodeObj->status = ActivationCode::$ACTIVATION_USED;
        $activationCodeObj->dateUsed = now();
        $activationCodeObj->activatedUser = $user->userName;
        $activationCodeObj->save();
        $activation = new Activation();
        $activation->userName = $user->userName;
        $activation->type = Activation::$CODE_ACTIVATED;
        $activation->package = $user->package;
        $activation->dateActivated = now();
        $activation->activationCode = $activationCode;
        $activation->save();
        $user->status = User::$USER_ACTIVATED;
        $user->userEntranceDate = now();
        $user->currentStageDate = now();
        $user->payment_method = "Activation Code";
        $user->save();
        $notification = new Notification();
        $notification->date = time();
        $notification->notification = "Welcome to Paulano Graceland Africa. Your account has been activated successfully and you can now have full access to your dashboard.";
        $notification->status = 0;
        $notification->title = "Welcome to Paulano Graceland Africa!";
        $notification->username = $user->userName;
        return to_route("dashboard");
    }
}
