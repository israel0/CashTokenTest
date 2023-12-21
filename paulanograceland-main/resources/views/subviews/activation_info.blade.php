<?php

use App\Models\Package;

$firstName = "";
$lastName = "";
$userName = "";
$user = auth()->user();
$registrationFee = 0;
if ($user) {
    $userName = $user->userName;
    $firstName = $user->firstName;
    $lastName = $user->lastName;
    $packageObj = Package::find($user->package);
    if ($packageObj) $registrationFee = $packageObj->registrationFee;
}
?>
<div id="activationInfo" class="notification-dialog modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button style="background: none; opacity: 0.8" type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="badge" style="background-color: #fff; color: #12326b;">&times;</span>
                </button>
                <h4>ACTIVATE YOUR ACCOUNT</h4>
            </div>
            <div class="modal-body">
                <p>To complete your registration, you are required to pay the total sum of ₦{{number_format($registrationFee)}} to the bank details below.</p>
                <br>
                <p>Bank: Union Bank</p>
                <p>Account Name: Xtralarge Farms</p>
                <p>Account Number: 0090797061</p>
                <br>
                <p>Please send a text message containing your Xtralarge Food Network Username and the account name you made payment with or teller number if you made bank payment to 09090938486.</p>
                <br>
                <p>For example:</p>
                <h4 style="font-weight: 600">Bank/ATM Transfer</h4>
                <p>XLFN Name: {{$userName}}, Account Name: {{$firstName}} {{$lastName}}.</p>
                <h4 style="font-weight: 600">Bank Payments</h4>
                <p>XLFN Name: {{$userName}}, Teller No: 227718972</p>
            </div>
            <div class="modal-footer">
                <p><a data-dismiss="modal" class="btn btn-primary">OK</a> <button data-dismiss="modal" class="btn btn-danger">CANCEL</button></p>
            </div>
        </div>
    </div>
</div>