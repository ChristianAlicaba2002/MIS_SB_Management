
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/orders.css')}}">
    <link rel="shortcut icon" href="{{asset('/images/oop_logo.png')}}" type="image/x-icon"></head>
<body>

    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>

    <div class="content-wrapper">
        <div class="title">
            <div class="brandName">
                <h1>ORDER MANAGEMENT</h1>
            </div>
        </div>

        <div class="action-bar">
        <a href="#" id="createNewOrderLink">
            <button class="btn"><span class="btn-icon">+</span> Create New Order</button>
        </a>
            <div class="search-bar">
            <img src="/images/search.png" alt="">
            <input type="text" placeholder="Search Order ID">
            </div>
        </div>

        <div id="newOrderForm">
            <button type="button" id="closeFormButton">
                <img src="/images/close.png" alt="">
            </button>
                <h2>Create New Order</h2>
                <form>
                    <div>
                        <label for="productID"></label>
                        <input type="text" id="productID" name="productID" placeholder="Enter Product ID">
                    </div>
                    <div>
                        <label for="productName"></label>
                        <input type="text" id="productName" name="productName" placeholder="Enter Product Name">
                    </div>
                    <div>
                        <label for="productCategory"></label>
                        <input type="text" id="productCategory" name="productCategory" placeholder="Enter Product Category">
                    </div>
                    <div>
                        <label for="productPrice"></label>
                        <input type="text" id="productPrice" name="productPrice" placeholder="Input Product Price">
                    </div>
                    <div>
                    <label for="productDate">Date Ordered: </label>
                        <input type="date" id="productDate" name="productDate">
                    </div>
                    <div>
                        <label for="quantity"></label>
                        <input type="number" id="quantity" name="quantity" placeholder="Input Quantity">
                    </div>

                    <button type="submit">Submit Order</button>
                </form>

            </div>

        <div class="orderCardsContainer">
            <!-- Order Card 1 -->
            <div class="orderCard">
                <div class="product-number">1</div>
                <div class="product-id">
                        <h5>#390128</h5>
                    </div>
                <div class="product-header">
                    <div class="product-image">
                        <img src="/images/1746415253.png" alt="">
                    </div>
                    <div class="product-title">
                        <h2>Ube Scramble</h2>
                        <div class="product-category">Ice Scramble</div>
                    </div>
                </div>

                <div class="product-details">
                    <div class="detail-row">
                        <div class="detail-label">Price</div>
                        <div class="detail-value">45.00</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Date Ordered: </div>
                        <div class="detail-value highlight">01-10-25</div>
                    </div>
                </div>

                <div class="orderInputs">
                    <div class="quantity-control">
                        <div class="quantity-label">Quantity</div>
                        <input type="number" id="quantity" value="2" min="1">
                    </div>
                    <div class="checkbox-control">
                    <div class="checkbox-label">Ready</div>
                        <div class="checkbox-wrapper">
                            <input type="checkbox" id="ready" checked>
                        </div>
                    </div>
                </div>

                <div class="product-actions">
                <a href="{{route('invoice')}}">
                    <button class="action-btn edit-btn">Receipt</button>
                </a>
                    <button class="action-btn delete-btn">Delete</button>
                </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
            const createNewOrderLink = document.getElementById('createNewOrderLink');
            const newOrderForm = document.getElementById('newOrderForm');
            const closeFormButton = document.getElementById('closeFormButton');

            createNewOrderLink.addEventListener('click', function(event) {
                event.preventDefault();
                newOrderForm.style.display = 'block';
            });

            closeFormButton.addEventListener('click', function() {
                newOrderForm.style.display = 'none';
            });
        });
    </script>
</body>
</html>
