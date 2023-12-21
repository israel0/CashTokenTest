<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory, HasUuids;

    public function getBackOfficeBalance()
    {
        return $this->matrixBonus + $this->stageBonus + $this->groupBonus + $this->stepoutBonus;
    }

    public static function getLatestWalletBalance($wallet, $userName)
    {
        $totalWalletCredit = Transaction::getTotalCreditTransaction($userName, $wallet);
        $totalWalletDebit = Transaction::getTotalDebitTransaction($userName, $wallet);
        return $totalWalletCredit - $totalWalletDebit;
    }

    public function updateWallet()
    {
        $this->matrixBonus = $this->getLatestWalletBalance(Transaction::$MATRIX_WALLET, $this->userName);
        $this->stageBonus = $this->getLatestWalletBalance(Transaction::$STAGE_BONUS_WALLET, $this->userName);
        $this->stepoutBonus = $this->getLatestWalletBalance(Transaction::$STEP_OUT_WALLET, $this->userName);
        $this->groupBonus = $this->getLatestWalletBalance(Transaction::$GROUP_BONUS_WALLET, $this->userName);
        $this->save();
    }

    public static function getWallet($username)
    {
        $wallet = Wallet::where("userName", $username)->first();
        if ($wallet != null) {
            $wallet->updateWallet();
        } else if (User::checkUsername($username)) {
            $wallet = new Wallet();
            $wallet->userName = $username;
            $wallet->matrixBonus = 0;
            $wallet->investment = 0;
            $wallet->stepoutBonus = 0;
            $wallet->registrationReferral = 0;
            $wallet->save();
        }
        return $wallet;
    }
}
