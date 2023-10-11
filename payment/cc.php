<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="../assets/css/payment_gateway.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row grad">
            <div class="col-lg-12 pagecenter d-flex justify-content-center align-self-center">
                <div class="payment-div mx-auto my-auto">
                    <div class="row">
                        <div class="col-lg-11 h4 text-center mt-3">
                            PAYMENT GATEWAY
                        </div>
                        <div class="col-lg-1 mx-auto mt-4">
                            <i class="fa-solid fa-x" onclick="history.back()"></i>
                        </div>
                        </div>
                    <div class="row mt-5">
                    <div class="col-lg-8 payment-details mt-5">
                        <input class="form-control mx-auto" type="number" placeholder="Card-Number" aria-label="default input example" id="input-fields-payment">
                        <br>
                        <input class="form-control mx-auto" type="text" placeholder="NAME" aria-label="default input example" id="input-fields-payment">
                        <br>
                        <input class="form-control mx-auto" type="number" placeholder="CVV" aria-label="default input example" id="input-fields-payment">
                        <br>
                        <div class="row">
                            <div class="col-lg-6 d-flex mx-auto">
                                <select class="form-select form-select-lg mb-3 mx-auto" aria-label=".form-select-lg example" id="datefunc">
                                    <option>Month</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-lg-6 d-flex mx-auto justify-content-center">
                                <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" id="datefunc">
                                    <option>Year</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="btn btn-success mx-auto">Pay</div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <ul class="list-group d-flex mx-auto" id="payment-groups">
                            <a href="payment_gateway.html" id="remove"><li class="list-group-item">Debit Card</li></a>
                            <a href="payment_gateway_creditcard.html" id="remove"><li class="list-group-item active">Credit Card</li></a>
                            <a href="payment_gateway_upi.html" id="remove"><li class="list-group-item" >UPI</li></a>
                            <a href="payment_gateway_netbanking.html" id="remove"><li class="list-group-item" >Net Banking</li></a>
                          </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>