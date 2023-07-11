<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <link rel="stylesheet" href="{{ url('fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/nouislider/nouislider.min.css') }}">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <meta name="robots" content="noindex, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="img/bg.jpeg" alt="">
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        @csrf
                        <center>
                            <div class="alert alert-success alert-block" style="display: none;">
                                <strong class="success-msg"></strong>
                            </div>
                        </center>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="first_name" id="first_name" />
                                    <span id="firstName_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="last_name" id="last_name" />
                                    <span id="lastName_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">Company</label>
                                    <input type="text" name="company" id="company" />
                                    <span id="companyName_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" />
                                    <span id="email_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phone_number" id="phone_number" />
                                    <span id="phoneNumber_err" class="donation-error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <label for="meal_preference" class="required">Gender</label>
                                    </div>
                                    <div class="select-list">
                                        <select name="meal_preference" id="meal_preference">
                                            <option value="please-select">Please select...</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                    <span id="sex_err" class="donation-error"></span>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="payment" class="required">Payment Mode</label>
                                    </div>
                                    <div class="form-radio-group">
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="cash" value="Visa" checked>
                                            <label for="cash">Visa</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="cheque" value="Mastercard">
                                            <label for="cheque">Mastercard</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="demand" value="Amex">
                                            <label for="demand">Amex</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                    <span id="paymentMethod_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="chequeno" class="required">Card Number</label>
                                    <input type="text" name="chequeno" id="chequeno" />
                                    <span id="cardNumber_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="blank_name" class="required">Expiration</label>
                                    <input type="text" name="blank_name" id="blank_name" />
                                    <span id="expiredDay_err" class="donation-error"></span>
                                </div>
                                <div class="form-input">
                                    <label for="payable" class="required">CVN</label>
                                    <input type="text" name="payable" id="payable" />
                                    <span id="cvn_err" class="donation-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="donate-us">
                            <label class="required">Donate us</label>
                            <div class="price_slider ui-slider ui-slider-horizontal">
                                <div id="slider-margin"></div>
                                <span class="donate-value" id="value-lower"></span>
                            </div>
                            <span id="amount_err" class="donation-error"></span>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ url('vendor/wnumb/wNumb.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>


</body>

</html>