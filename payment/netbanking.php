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
                        <input class="form-control mx-auto" type="text" placeholder="Username" aria-label="default input example" id="input-fields-payment">
                        <br>
                        <input class="form-control mx-auto" type="password" placeholder="Password" aria-label="default input example" id="input-fields-payment">
                        <br>
                        <div class="row">
                            <div class="col-lg-12 d-flex mx-auto">
                                <select class="form-select form-select-lg mb-3 mx-auto" aria-label=".form-select-lg example" id="datefunc">
                                    <option>Select Your Bank</option>
                                    <option value="sbi">State Bank Of India</option>
                                    <option value="kvb">Karur Vysya Bank</option>
                                    <option value="HDFC">HDFC Bank</option>
                                    <option value="tmb">Tamilnadu Mercantile Bank</option>
                                    <option value="idbc">IDBC First Bank</option>
                                    <option value="kmb">Kotak Mahindra Bank</option>
                                    <option value="ib">Indian Bank</option>
                                    <option value="fb">Federal Bank</option>
                                    <option value="ii">IndusInd Bank</option>
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
                            <a href="payment_gateway_creditcard.html" id="remove"><li class="list-group-item">Credit Card</li></a>
                            <a href="payment_gateway_upi.html" id="remove"><li class="list-group-item" >UPI</li></a>
                            <a href="payment_gateway_netbanking.html" id="remove"><li class="list-group-item active" >Net Banking</li></a>
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