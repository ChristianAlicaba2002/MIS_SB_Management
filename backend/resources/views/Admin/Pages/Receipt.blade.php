<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/receipt.css')}}">
    <link rel="shortcut icon" href="{{asset('/images/oop_logo.png')}}" type="image/x-icon"></head>
</head>
<body>

        <div class="back-button">
            <a href="/orders">
                <img src="/images/back.png" alt="Back">
            </a>
        </div>

        <div class="save-button-container">
            <button onclick="saveAsPDF()"><img src="/images/save.png" alt="Save"> Save as PDF</button>
        </div>
    <div class="receipt-container" id="receiptContent">
        <div class="receipt-header">
            <div class="receipt-logo">
                <img src="/images/oop_logo.png" alt="Logo">
            </div>
            <h1 class="receipt-title">Mary`s Ice Scramble & Snack Bites</h1>
        </div>
        <div class="receipt-details">
            <div>
                <div class="receipt-details-label">Order No:</div>
                {{ $ordercode }}
            </div>
            <div>
                <div class="receipt-details-label">Date:</div>
                {{$productDate}}
            </div>
        </div>
        <table class="receipt-items">
            <thead>
                <tr>
                    <th>Product Item</th>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$productName}}</td>
                    <td>{{$productCategory}}</td>
                    <td>{{$quantity}}</td>
                    <td>&#8369;{{$productPrice}}</td>
                    <td>&#8369;{{ number_format( $total_price , 2)}}</td>
                </tr>
            </tbody>
        </table>
        <div class="receipt-summary">
            <div class="detail-row">
                <div class="detail-label">Subtotal:</div>
                <div class="detail-value">&#8369;{{ number_format( $total_price, 2)}}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Tax (12%):</div>
                @php
                    $total_price = $productPrice * $quantity;   
                    $tax = $total_price * 0.12;
                    $total_price = $total_price + $tax;
                @endphp
                <div class="detail-value">&#8369;{{  $tax }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label-total">Total:</div>
                <div class="detail-value-total">&#8369;  {{ number_format($total_price)  }}</div>
            </div>
        </div>
        <div class="thank-you">
            Thank you!
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
       function saveAsPDF() {
            const element = document.getElementById('receiptContent');
            const opt = {
            margin: [0.5, 0.5, 0.5, 0.5],
            filename: 'receipt.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
            html2pdf().from(element).set(opt).save();
        }
    </script>
</body>
</html>
