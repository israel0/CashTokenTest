@extends("layouts.auth_overview")

@section("auth_content")
<div class="reg-content content background">
    <div class="clearfix"></div>
    <div class="container main-container">
        <div class="col-md-offset-2 col-md-8">
            <div class="login-container">
                <div class="login-heading">
                    <div class="main-login-heading">
                        <h2 class=" main-heading">Create Your Account</h2>
                    </div>
                    <div class="clearfix"></div>
                    <p>Simply fill the form below to create your account.</p>
                </div>
                <div class="register-form-div">
                    <form class="login-form" id="register-form" action="{{url('auth/register')}}" method="post">
                        @csrf
                        @if(session('error'))
                        <div style="margin-bottom: 1rem;" class="label label-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if(session('success'))
                        <div style="margin-bottom: 1rem;" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="form-group has-feedback">
                            <div class="row">
                                <div class="sponsor-label col-sm-3">
                                    <label for="packageField" class="control-label">Select Registration Package</label>
                                </div>
                                <div class="col-sm-6">
                                    <select value="{{old('package')}}" id="packageField" class="show-menu-arrow selectpicker form-control" data-style="btn btn-coloured-heavy" name="package">
                                        @foreach($all_packages["packages"] as $package)
                                        <option {{old("package") == $package->id ? 'selected' : ''}} data-name='{{$package->name}}' value='{{$package->id}}'>{{$package->name}} (₦{{number_format($package->registrationFee)}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="help-block with-errors">
                                        @error('package')
                                        <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="row">
                                <div class="sponsor-label col-sm-3">
                                    <label for="sponsorNameField" class="control-label">Sponsor Name</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                                <span class="fa fa-users"></span>
                                            </a></span>
                                        <input name="sponsorName" type="text" id="sponsorNameField" class="form-control" placeholder="" value="{{old('sponsorName')}}">
                                        <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                                <span class="sponsor-feedback glyphicon glyphicon-remove"></span>
                                            </a></span>
                                    </div>
                                    <p style="font-size: 12px;">You must have a sponsor before you can register</p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="help-block with-errors">
                                        @if(isset($firstSponsorName) && $firstSponsorName !== null)
                                        <p style='color: #31b0d5'>$firstSponsorName $lastSponsorName</p>
                                        @endif
                                        @error('sponsorName')
                                        <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="register-heading">
                            Personal Details
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="firstNameField" class="control-label">First Name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </a></span>
                                    <input name="firstName" type="text" id="firstNameField" class="form-control" placeholder="" value="{{old('firstName')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                @error('firstName')
                                <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="middleNameField" class="control-label">Middle Name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </a></span>
                                    <input name="middleName" type="text" id="middleNameField" class="form-control" placeholder="" value="{{old('middleName')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('middleName')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="lastNameField" class="control-label">Last Name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </a></span>
                                    <input name="lastName" type="text" id="lastNameField" class="form-control" placeholder="" value="{{old('lastName')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('lastName')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="dobField" class="control-label">Date of Birth</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input name="dob" type="text" id="dobField" placeholder="dd/mm/yy" class="form-control" value="{{old('dob')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('dob')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="genderField" class="control-label">Gender</label>
                            </div>
                            <div class="col-sm-6">
                                <select value="{{old('gender')}}" name="gender" class="form-control" data-style="btn btn-primary" title="Select Gender" id="genderField">
                                    <option {{old("gender") === "Male" ? 'selected' : ''}}>Male</option>
                                    <option {{old("gender") === "Female" ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('gender')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="addressField" class="control-label">Address</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-map-marker"></span>
                                        </a></span>
                                    <input name="address" type="text" id="addressField" class="form-control" placeholder="" value="{{old('address')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('address')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="stateField" class="control-label">State</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-map-marker"></span>
                                        </a></span>
                                    <input name="state" type="text" id="stateField" class="form-control" placeholder="" value="{{old('state')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('state')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="countryField" class="control-label">Country</label>
                            </div>
                            <div class="col-sm-6">
                                <select value="{{old('country')}}" name="country" class="form-control" id="countryField">
                                    @include("subviews.countries")
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('country')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="phoneNumberField" class="control-label">Phone Number</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="hidden" id="phoneCodeField" name="phoneCode" value="+234">
                                    <span class="input-group-btn"><a id="phoneCode" class="btn btn-primary">
                                            +234
                                        </a></span>
                                    <input value="{{old('phoneNumber')}}" name="phoneNumber" type="number" id="phoneNumberField" class="form-control" placeholder="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('phoneNumber')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="emailField" class="control-label">Email Address</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </a></span>
                                    <input name="email" type="text" id="emailField" class="form-control" placeholder="" value="{{old('email')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('email')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="register-heading">
                            Account Details
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="userNameField" class="control-label">Username</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </a></span>
                                    <input name="userName" type="text" id="userNameField" class="form-control" placeholder="" value="{{old('userName')}}">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('userName')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="passwordField" class="control-label">Password</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </a></span>
                                    <input name="password" type="password" id="passwordField" class="form-control" placeholder="" value="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('password')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="confirmPasswordField" class="control-label">Confirm Password</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </a></span>
                                    <input name="confirmPassword" type="password" id="confirmPasswordField" class="form-control" placeholder="" value="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('confirmPassword')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="transactionPasswordField" class="control-label">Transaction Pin (4 digits)</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </a></span>
                                    <input name="transactionPassword" type="password" id="transactionPasswordField" class="form-control" placeholder="" value="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('transactionPassword')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="confirmTransactionPasswordField" class="control-label">Confirm Transaction Pin</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </a></span>
                                    <input name="confirmTransactionPassword" type="password" id="confirmTransactionPasswordField" class="form-control" placeholder="" value="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('confirmTransactionPassword')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="register-heading">
                            Bank Details
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="bankName" class="control-label">Bank Name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="fa fa-bank"></span>
                                        </a></span>
                                    <input value="{{old('bankName')}}" name="bankName" type="text" id="bankNameField" class="form-control" placeholder="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('bankName')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="bankAccountName" class="control-label">Bank Account Name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="fa fa-bank"></span>
                                        </a></span>
                                    <input value="{{old('bankAccountName')}}" name="bankAccountName" type="text" id="bankAccountNameField" class="form-control" placeholder="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('bankAccountName')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-3">
                                <label for="bankAccountNumber" class="control-label">Bank Account Number</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-btn"><a type="button" class="btn btn-primary">
                                            <span class="fa fa-bank"></span>
                                        </a></span>
                                    <input value="{{old('bankAccountNumber')}}" name="bankAccountNumber" type="text" id="bankAccountNumberField" class="form-control" placeholder="">
                                    <span class="form-control-feedback glyphicon" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="help-block with-errors">
                                    @error('bankAccountNumber')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div style="margin-bottom: 5px;" class="form-group">
                            <div class="col-sm-offset-3">
                                <div class="checkbox">
                                    <label style="text-align: left; text-transform: none;">
                                        <input style="height: auto;" name="terms" id="termCheck" type="checkbox">I have accepted Paulano Graceland's <a href="/terms">Terms and Conditions</a>
                                    </label>
                                </div>
                                <div class="help-block with-errors">
                                    @error('terms')
                                    <div style="font-size: 10px" class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div style="margin-bottom: 0" class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="hidden" id="ajaxSubmit" name="ajaxSubmit" value="0">
                                <input type="submit" value="SUBMIT" class="btn btn-primary">
                                <input type="reset" value="RESET" class="btn btn-primary">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo url("js/main-validator.js") ?>"></script>
<script>
    var validateSponsorUrl = "<?php echo url("auth/validate_sponsor") ?>";
    var csrf_token = "{{csrf_token()}}"
</script>
<script src="<?php echo url("js/register-validate.js") ?>"></script>
<script>
    $("#countryField").on("change", function(e) {
        var option = $(this).find(':selected').attr("data-code");
        $("#phoneCode").html(option);
        $("#phoneCodeField").val(option);
    });

    function changePhoneCode() {

    }
</script>
@stop