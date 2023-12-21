@extends("layouts.user_overview")

@section("user_content")
<div class="user-content">
    <div class="user-data row">
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #f8c300; color: #000" class="user-box">
                <div class="inner">
                    <h3><?php echo $stage->stage_id ?></h3>
                    <p>Stage</p>
                </div>
                <a class="small-box-footer" href="<?php echo url("user/genealogy") ?>">
                    <?php echo strtoupper($stage->rank); ?>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #da251d" class="user-box">
                <div class="inner">
                    <h3>₦<?php echo number_format($wallet->matrixWallet, 2) ?></h3>
                    <p>Level Bonus Wallet</p>
                </div>
                <a class="small-box-footer" href="<?php echo url("user/transactions") ?>">
                    More Info
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #da251d" class="user-box">
                <div class="inner">
                    <h3>₦<?php echo number_format($wallet->stepOutWallet, 2) ?></h3>
                    <p>Stepout Bonus Wallet</p>
                </div>
                <a class="small-box-footer" href="<?php //echo url("user/transactions") ?>">
                    More Info
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #da251d" class="user-box">
                <div class="inner">
                    <h3>₦<?php echo number_format($wallet->stageBonusWallet, 2) ?></h3>
                    <p>Stage Bonus Wallet</p>
                </div>
                <a class="small-box-footer" href="<?php echo url("user/transactions") ?>">
                    More Info
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #da251d" class="user-box">
                <div class="inner">
                    <h3>₦<?php echo number_format($wallet->groupBonusWallet, 2) ?></h3>
                    <p>Group Bonus Wallet</p>
                </div>
                <a class="small-box-footer" href="<?php echo url("user/transactions") ?>">
                    More Info
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #004a7c" class="user-box">
                <div class="inner">
                    <h3><?php 0; //echo number_format($totalDownlines); ?></h3>
                    <p>Total Board Downlines</p>
                </div>
                <a class="small-box-footer" href="<?php echo url("user/levels") ?>">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div style="background-color: #f39c12" class="user-box">
                <div class="inner">
                    <h3><?php 0;// echo number_format($totalReferrals); ?></h3>
                    <p>My Direct Referrals</p>
                </div>
                <a class="small-box-footer" href="<?php echo url("user/referrals") ?>">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="user-side-container col-sm-4">
            <div class="user-side-content">
                <div class="user-image-div">
                    <?php
                    // $photoUrl = $user->photoUrl;
                    // $changeUrl = url("myaccount/change_picture");
                    // if (strlen($photoUrl) == 0) {
                    //     echo "<a class='center-block' style='background-color: #f8c300; color: #000; text-align: center;' href='$changeUrl' ><span style='font-size: 60px; line-height: 25px multiple'><span class='fa fa-user-plus'></span></span><br><span>Add Photo</span></a>";
                    // } else {
                    //     echo "<a href='$changeUrl'><img width='130px' height='130px' class='center-block' src='$photoUrl'></a>";
                    // }
                    ?>
                </div>
                <div class="user-name-div">
                    <h3><?php //echo strtoupper("$user->firstName $user->lastName") ?></h3>
                    <p>
                        <?php
                        // for ($index = 1; $index <= $user->stage; $index++) {
                        //     echo '<span class="star fa fa-star"></span> ';
                        // }
                        // for ($index = 1; $index <= 4 - $user->stage; $index++) {
                        //     echo '<span class="no_star fa fa-star"></span> ';
                        // }
                        ?>
                    </p>
                </div>
                <div class="user-info-div">
                    <div class="user-info">
                        <p class="pull-left"><span class="fa fa-user"></span> Member Since</p>
                        <p class="pull-right"><?php //echo date("F, Y", $user->userEntranceDate) ?></p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="user-info">
                        <p class="pull-left"><span class="fa fa-users"></span> My Referrals</p>
                        <p class="pull-right"><?php //echo $totalReferrals ?></p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="user-info">
                        <p class="pull-left"><span class="fa fa-star"></span> Stage</p>
                        <p class="pull-right"><?php //echo strtoupper($stage->rank) ?></p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="user-info">
                        <p class="pull-left"><span class="fa fa-users"></span> Total Balance</p>
                        <p class="pull-right">₦<?php //echo number_format($wallet->getBackOfficeBalance(), 2) ?></p>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="upgrade-div">
                <div class="upgrade-heading">
                    <h4>Referrer Info.</h4>
                </div>
                <div class="upgrade-content">
                    <div class="upgrade-para">
                        <div class="col-xs-5">
                            <p>Referrer:</p>
                        </div>
                        <div class="col-xs-7">
                            <p><?php //echo ucfirst($upline->firstName) . " " . ucfirst($upline->lastName) ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="upgrade-para">
                        <div class="col-xs-5">
                            <p>Phone:</p>
                        </div>
                        <div class="col-xs-7">
                            <p><?php //echo $upline->phoneNumber ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="upgrade-para">
                        <div class="col-xs-5">
                            <p>Email:</p>
                        </div>
                        <div class="col-xs-7">
                            <p><?php //echo $upline->email ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="upgrade-div">
                <div style="padding: 10px" class="upgrade-content">
                    <div class="upgrade-para">
                        <a href="<?php //echo url("user/compose_message/soclanadmin"); ?>" class="btn btn-primary btn-block"><span class="fa fa-envelope"></span> CHAT WITH ADMIN</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-container col-sm-8">
            <div class="list-group">
                <div class="list-group-item active">
                    <h4 style="text-transform: uppercase" class="list-group-item-heading">
                        REFER YOUR FRIENDS
                    </h4>
                </div>
                <div class="list-group-item">
                    <div class="referral-code">
                        <p style="margin-bottom: 10px; font-size: 1em;">Share this referral link and earn a referral bonus when anybody registers with your referral link</p>
                        <div class="referral-code-div">
                            <form class="spec">
                                <div class="input-group">
                                    <input id="referralField" readonly="" value="<?php //echo strtolower($user->pageUrl) ?>" type="text" class="form-control">
                                    <span class="input-group-btn"><button type="submit" id="copyBtn" class="btn btn-primary">
                                            Copy
                                        </button></span>
                                </div>
                            </form>
                        </div>
                        <div class="btn-group">
                            <a target="_blank" href="<?php //echo $facebookUrl ?>" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                            <a target="_blank" href="<?php //echo $twitterUrl ?>" class="btn btn-twitter"><span class="fa fa-twitter"></span></a>
                            <a target="_blank" href="<?php //echo $linkedInUrl ?>" class="btn btn-instagram"><span class="fa fa-instagram"></span></a>
                            <a target="_blank" href="<?php //echo $googleUrl ?>" class="btn btn-google"><span class="fa fa-google-plus"></span></a>
                            <a target="_blank" href="<?php //echo $pinterestUrl ?>" class="btn btn-whatsapp"><span class="fa fa-whatsapp"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item active">
                    <h4 style="text-transform: uppercase" class="list-group-item-heading">
                        MY REFERRALS (<?php //echo $totalReferrals ?>)
                    </h4>
                </div>
                <div class="list-heading list-group-item <?php //echo (count($referrals) == 0) ? "hidden" : "" ?>">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Username</th>
                                <th>Phone No.</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <?php

                ?>
                <div class="list-group-item <?php //echo (count($referrals) == 0) ? "hidden" : "" ?>" style='text-align: center;'>
                    <a href='<?php //echo url("user/referrals") ?>' class='btn btn-primary'><span class='fa fa-users'></span> All Referrals</a>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item active">
                    <h4 style="text-transform: uppercase" class="list-group-item-heading">
                        WRITE A REVIEW
                    </h4>
                </div>
                <div class="list-group-item">
                    <p style="font-size: 1em">Tell us what you think about Soclan Beta Living Initiative so we can know how to serve you better.</p>
                    <form action="" class="login-form" style="padding-top: 1em" role="form">
                    <div class="col-sm-2">
                        <label for="reviewField" class="control-label">Enter Your Review</label>
                    </div>
                    <div class="col-sm-7">
                        <div style="width: 100%" class="input-group">
                            <textarea name="review" id="reviewField" class="form-control" rows="4"></textarea>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="submit" value="SUBMIT REVIEW" class="btn btn-primary">
                    </div>
                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
