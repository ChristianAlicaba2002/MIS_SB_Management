<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Archives</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/archiveinventory.css')}}">
    <link rel="shortcut icon" href="{{asset('/images/oop_logo.png')}}" type="image/x-icon">
</head>
<body>

    <div class="back">
        <a href="/inventory">
            <img src="/images/back.png" alt="Back to Inventory">
        </a>
    </div>

    <h1>INVENTORY ARCHIVES</h1>

    <div class="inventorys-archives-table">
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Expiration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Flour</td>
                    <td>1 spoon</td>
                    <td>30</td>
                    <td><span class="status status-in-stock">In Stock</span></td>
                    <td>01-05-20</td>
                    <td><span class="expirationDate"> 05-12-22</span></td>
                    <td>
                        <div class="action-btn">
                            <button class="restore">
                                <img src="/images/restore.png" alt="Restore">
                                Restore
                            </button>
                            <button class="delete">
                                <img src="/images/delete.png" alt="Delete">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Flour</td>
                    <td>1 spoon</td>
                    <td>30</td>
                    <td><span class="status status-in-stock">In Stock</span></td>
                    <td>01-05-20</td>
                    <td><span class="expirationDate"> 05-12-22</span></td>
                    <td>
                        <div class="action-btn">
                            <button class="restore">
                                <img src="/images/restore.png" alt="Restore">
                                Restore
                            </button>
                            <button class="delete">
                                <img src="/images/delete.png" alt="Delete">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</body>
</html>
