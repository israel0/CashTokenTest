<?php

namespace App\Http\Controllers;

use App\Models\ActivationCode;
use App\Models\Package;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index()
    {
        $data = [];
        $data["title"] = "Home";
        $data["activeMenu"] = 1;
        $testimonials = [];
        $data["testimonials"] = $testimonials;
        return view("home", $data);
    }

    public function populate_db()
    {
        echo "Started Populating DB <br /><br />";
        Stage::truncate();
        Package::truncate();
        User::truncate();
        User::create([
            'firstName' => 'Paulano',
            'lastName' => 'Admin',
            'middleName' => 'Graceland',
            'phoneNumber' => '08123445678',
            'email' => 'info@paulanogracelandafrica.com',
            'password' => sha1('testing123'),
            'upline' => ' ',
            'userName' => 'paulanoadmin',
            'sponsorName' => ' ',
            'transactionPassword' => sha1('1245')
        ]);
        Package::insert([
            [
                'name' => 'Bronze',
                'registrationFee' => 10000
            ],
            [
                'name' => 'Silver',
                'registrationFee' => 25000
            ],
            [
                'name' => 'Gold',
                'registrationFee' => 50000
            ],
            [
                'name' => 'Platinum',
                'registrationFee' => 100000
            ],
            [
                'name' => 'VIP 1',
                'registrationFee' => 200000
            ],
            [
                'name' => 'VIP 2',
                'registrationFee' => 500000
            ],
            [
                'name' => 'VIP 3',
                'registrationFee' => 1000000
            ],
            [
                'name' => 'VIP 4',
                'registrationFee' => 2000000
            ]
        ]);
        $packages = Package::all();
        $package_count = 0;
        foreach ($packages as $key => $package) {
            echo "Started Populating Package: $package->name <br />";
            $stage_count = 0;
            for ($i = 0; $i < 4; $i++) {
                $stage = new Stage();
                $stage->stage_id = $i;
                $stage->netEarning = 0;
                $stage->rank = $i === 0 ? "FEEDER STAGE" : "STAGE " . $i;
                $stage->package = $package->id;
                $stage->noOfLevels = 2;
                $stage->totalDownlines = 6;
                $stage->matrixBonus = 0;
                $stage->stepOutBonus = 0;
                $stage->stageBonus = 0;
                $stage->groupBonus = 0;
                $stage->save();
                $stage_count++;
            }
            echo "<br />Finished Populating Package: $package->name: $stage_count Stages Created<br />";
            $package_count++;
        }
        echo "<br /><br />Finished Creating Packages: $package_count packages created";
    }

    public function generate_activation_codes(Request $request, $size = 0, $package = 1)
    {
        echo "Started Generating codes <br />";
        ActivationCode::truncate();
        $count = 0;
        for ($i = 0; $i < $size; $i++) {
            $random = rand(99999999999, 10000000000);
            while (ActivationCode::where("activationCode", $random)->first()) {
                $random = rand(99999999999, 10000000000);
            }
            $activationCodeObj = new ActivationCode();
            $activationCodeObj->activationCode = $random;
            $activationCodeObj->purchasedUser = "paulanoadmin";
            $activationCodeObj->datePurchased = now();            
            $activationCodeObj->package = $package;
            $activationCodeObj->status = ActivationCode::$ACTIVATION_PURCHASED;
            $activationCodeObj->save();
            $count++;
        }
        echo "$count Activation Codes Generated";
    }
}
