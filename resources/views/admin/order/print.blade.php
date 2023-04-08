<html>

<head>
    <title>12023/00000001</title>
    <style type="text/css">
        a,
        .no-print,
        .modal-open.wrapper,
        .main-footer,
        .view-link,
        .dataTables_length,
        .dataTables_filter {
            display: none !important;
        }

        .box {
            border-top: none !important;
        }

        .box-header.with-border {
            border-bottom: none;
        }

        .close,
        .btn {
            display: none !important
        }

        .print-btn {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 30px;
            z-index: 1251;
            background: #81ECFF;
            line-height: 30px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>

<body style="background:#ffffff;">
    <div class="col-xs-12 col-md-12">
        <style id="styles" type="text/css">
            /*Common CSS*/
            .receipt-template {
                width: 302px;
                margin: 0 auto;
            }

            .receipt-template .text-small {
                font-size: 10px;
            }

            .receipt-template .block {
                display: block;
            }

            .receipt-template .inline-block {
                display: inline-block;
            }

            .receipt-template .bold {
                font-weight: 700;
            }

            .receipt-template .italic {
                font-style: italic;
            }

            .receipt-template .align-right {
                text-align: right;
            }

            .receipt-template .align-center {
                text-align: center;
            }

            .receipt-template .main-title {
                font-size: 14px;
                font-weight: 700;
                text-align: center;
                margin: 10px 0 5px 0;
                padding: 0;
            }

            .receipt-template .heading {
                position: relation;
            }

            .receipt-template .title {
                font-size: 16px;
                font-weight: 700;
                margin: 10px 0 5px 0;
            }

            .receipt-template .sub-title {
                font-size: 12px;
                font-weight: 700;
                margin: 10px 0 5px 0;
            }

            .receipt-template table {
                width: 100%;
            }

            .receipt-template td,
            .receipt-template th {
                font-size: 12px;
            }

            .receipt-template .info-area {
                font-size: 12px;
                line-height: 1.222;
            }

            .receipt-template .listing-area {
                line-height: 1.222;
            }

            .receipt-template .listing-area table {}

            .receipt-template .listing-area table thead tr {
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                font-weight: 700;
            }

            .receipt-template .listing-area table tbody tr {
                border-top: 1px dashed #000;
                border-bottom: 1px dashed #000;
            }

            .receipt-template .listing-area table tbody tr:last-child {
                border-bottom: none;
            }

            .receipt-template .listing-area table td {
                vertical-align: top;
            }

            .receipt-template .info-area table {}

            .receipt-template .info-area table thead tr {
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
            }

            /*Receipt Heading*/
            .receipt-template .receipt-header {
                text-align: center;
            }

            .receipt-template .receipt-header .logo-area {
                width: 80px;
                height: 80px;
                margin: 0 auto;
            }

            .receipt-template .receipt-header .logo-area img.logo {
                display: inline-block;
                max-width: 100%;
                max-height: 100%;
            }

            .receipt-template .receipt-header .address-area {
                margin-bottom: 5px;
                line-height: 1;
            }

            .receipt-template .receipt-header .info {
                font-size: 12px;
            }

            .receipt-template .receipt-header .store-name {
                font-size: 24px;
                font-weight: 700;
                margin: 0;
                padding: 0;
            }


            /*Invoice Info Area*/
            .receipt-template .invoice-info-area {}

            /*Customer Customer Area*/
            .receipt-template .customer-area {
                margin-top: 10px;
            }

            /*Calculation Area*/
            .receipt-template .calculation-area {
                border-top: 2px solid #000;
                font-weight: bold;
            }

            .receipt-template .calculation-area table td {
                text-align: right;
            }

            .receipt-template .calculation-area table td:nth-child(2) {
                border-bottom: 1px dashed #000;
            }

            /*Item Listing*/
            .receipt-template .item-list table tr {}

            /*Barcode Area*/
            .receipt-template .barcode-area {
                margin-top: 10px;
                text-align: center;
            }

            .receipt-template .barcode-area img {
                max-width: 100%;
                display: inline-block;
            }

            /*Footer Area*/
            .receipt-template .footer-area {
                line-height: 1.222;
                font-size: 10px;
            }

            /*Media Query*/
            @media print {
                .receipt-template {
                    width: 100%;
                }
            }

            @media all and (max-width: 215px) {}
        </style>
        <section class="receipt-template">

            <header class="receipt-header">
                <div class="logo-area">
                    <img class="logo"
                        src="http://itsolution24.com/posv33/assets/itsolution24/img/logo-favicons/1_logo.jpg">
                </div>
                <h2 class="store-name">Store 01</h2>
                <div class="address-area">
                    <span class="info address">BD</span>
                    <div class="block">
                        <span class="info phone">Mobile: 11111111111</span>, <span class="info email">Email:
                            info@store1.com</span>
                    </div>
                </div>
            </header>

            <section class="info-area">
                <table>
                    <tbody>
                        <tr>
                            <td class="w-30"><span>Invoice ID:</span></td>
                            <td>12023/00000001</td>
                        </tr>
                        <tr>
                            <td class="w-30">VAT-Reg:</td>
                            <td>654321</td>
                        </tr>
                        <tr>
                            <td class="w-30"><span>Date:</span></td>
                            <td>7 Apr 2023 3:48 AM</td>
                        </tr>
                        <tr>
                            <td class="w-30"><span>GST Reg:</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="w-30">Customer Name:</td>
                            <td>Walking Customer</td>
                        </tr>
                        <tr>
                            <td class="w-30">Phone:</td>
                            <td>0170000000000</td>
                        </tr>
                        <tr>
                            <td class="w-30">Address:</td>
                            <td>BD</td>
                        </tr>
                        <tr>
                            <td class="w-30">GTIN:</td>
                            <td>147258</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <h4 class="main-title">INVOICE</h4>

            <section class="listing-area item-list">
                <table>
                    <thead>
                        <tr>
                            <td class="w-10 text-center">Sl.</td>
                            <td class="w-40 text-center">Name</td>
                            <td class="w-15 text-center">Qty</td>
                            <td class="w-15 text-right">Price</td>
                            <td class="w-20 text-right">Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Banana

                                <small>[HSN-]</small>
                            </td>
                            <td class="text-center">1.00 Pieces</td>
                            <td class="text-right">50.00</td>
                            <td class="text-right">2.000.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Home Delivery

                                <small>[HSN-]</small>
                            </td>
                            <td class="text-center">1.00 </td>
                            <td class="text-right">100.00</td>
                            <td class="text-right">100.00</td>
                        </tr>

                    </tbody>
                </table>
            </section>

            <section class="info-area calculation-area">
                <table>
                    <tbody>
                        <tr>
                            <td class="w-70">Total Amt:</td>
                            <td>150.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Order Tax:</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Discount:</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Shipping Chrg:</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Others Chrg:</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Previous Due:</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Total Due:</td>
                            <td>150.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Amount Paid:</td>
                            <td>200.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Prev. Due Paid:</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Change:</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td class="w-70">Due:</td>
                            <td>0.00</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="info-area italic">
                <span class="text-small"><b>In Text:</b> One Hundred Fifty only</span><br>
            </section>


            <section class="listing-area payment-list">
                <div class="heading">
                    <h2 class="sub-title">Payments</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td class="w-10 text-center">Sl.</td>
                            <td class="w-50 text-center">Payment Method</td>
                            <td class="w-20 text-right">Amount</td>
                            <td class="w-20 text-right">Balance</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Cash on Delivery by Your Name on 7 Apr 2023 3:48 AM</td>
                            <td class="text-right">200.00</td>
                            <td class="text-right">50.00</td>
                        </tr>

                    </tbody>
                </table>
            </section>


            <section class="info-area barcode-area">
                <img class="bcimg"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAAeAQMAAAD5F1J6AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAACpJREFUKJFj6N71Yt2OdYt37Vj3Tqtj0eJdyPDFuu5dDKMKRhWMKhiaCgBLIYpHJp0c4QAAAABJRU5ErkJggg=="
                    height="20">
            </section>

            <section class="info-area align-center footer-area">
                <span class="block">Sold product No Claim. No Change, New product One Month Warranty.</span>
                <span class="block bold">Thank you for choosing us!</span>
            </section>

        </section>
        <div class="table-responsive footer-actions">
            <table class="table">
                <tbody>
                    <tr class="no-print">
                        <td colspan="2">
                            <button
                                onclick="window.printInvoice('invoice', {title:'12023/00000001',scrrenSize:'halfScreen'});"
                                class="btn btn-info btn-block">
                                <span class="fa fa-fw fa-print"></span>
                                Print </button>
                        </td>
                    </tr>
                    <tr class="no-print">
                        <td colspan="2">
                            <button id="email-btn" data-customername="Walking Customer" data-invoiceid="12023/00000001"
                                class="btn btn-success btn-block">
                                <span class="fa fa-fw fa-envelope-o"></span>
                                Send Email </button>
                        </td>
                    </tr>
                    <tr class="no-print">
                        <td colspan="2">
                            <a class="btn btn-default btn-block" href="pos.php">
                                ← Back to POS </a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">
                            <p class="powered-by">
                                <small>© ITsolution24.com</small>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
