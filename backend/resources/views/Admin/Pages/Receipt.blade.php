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
                12345
            </div>
            <div>
                <div class="receipt-details-label">Date and Time:</div>
                1 Jan 2025 12:00 PM
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
                    <td>Choco</td>
                    <td>Scramble</td>
                    <td>1</td>
                    <td>₱123</td>
                    <td>₱123</td>
                </tr>
                <tr>
                    <td>Ube</td>
                    <td>Scramble</td>
                    <td>2</td>
                    <td>₱127</td>
                    <td>₱254</td>
                </tr>
                <tr>
                    <td>Straw</td>
                    <td>Scramble</td>
                    <td>1</td>
                    <td>₱123</td>
                    <td>₱123</td>
                </tr>
            </tbody>
        </table>
        <div class="receipt-summary">
            <div class="detail-row">
                <div class="detail-label">Subtotal:</div>
                <div class="detail-value">₱500</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Tax (0%):</div>
                <div class="detail-value">₱0</div>
            </div>
            <div class="detail-row">
                <div class="detail-label-total">Total:</div>
                <div class="detail-value-total">₱500</div>
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
