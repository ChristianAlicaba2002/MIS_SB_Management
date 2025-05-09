<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/inventory.css')}}">
    <link rel="shortcut icon" href="{{asset('/images/oop_logo.png')}}" type="image/x-icon">
</head>
<body>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>

    <div class="content-wrapper">
        <div class="title">
            <div class="brandName">
                <h1>Inventory</h1>
            </div>
        </div>

        <div class="action-bar">
            <a href="#" id="createNewOrderLink">
                <button class="btn"><span class="btn-icon">+</span> Add New inventory</button>
            </a>
        </div>

        <div class="inventorys-table">
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
                                <button class="edit">
                                    <img src="/images/edit.png" alt="Edit">
                                    Edit
                                </button>
                                <a href="{{route('archiveinventory')}}">
                                <button class="archive">
                                    <img src="/images/archives.png" alt="Archive">
                                    Archive
                                </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>

    <div id="new-inventory-form">
        <button type="button" id="closeNewFormButton">
            <img src="/images/close.png" alt="Close">
        </button>
        <h2>Add Item to Inventory</h2>
        <form>
            <div>
                <label for="newItemName">Item Name</label>
                <input type="text" id="newItemName" name="itemName" placeholder="Enter Item Name">
            </div>
            <div>
                <label for="newItemUnit">Unit</label>
                <input type="text" id="newItemUnit" name="itemUnit" placeholder="Input Unit">
            </div>
            <div>
                <label for="newInventoryStock">Stock</label>
                <input type="number" id="newInventoryStock" name="inventoryStock" placeholder="Input Stock">
            </div>
            <div>
                <label for="newInventoryDateAdded">Date Added</label>
                <input type="date" id="newInventoryDateAdded" name="inventoryDateAdded">
            </div>
            <div>
                <label for="newInventoryExpirationDate">Expiration Date</label>
                <input type="date" id="newInventoryExpirationDate" name="inventoryExpirationDate">
            </div>
            <button type="submit">Add</button>
        </form>
    </div>

    <div id="edit-inventory-form">
        <button type="button" id="closeEditFormButton">
            <img src="/images/close.png" alt="Close">
        </button>
        <h2>Edit Item</h2>
        <form>
            <div>
                <label for="editItemName">Item Name</label>
                <input type="text" id="editItemName" name="itemName" placeholder="Enter Item Name">
            </div>
            <div>
                <label for="editItemUnit">Unit</label>
                <input type="text" id="editItemUnit" name="itemUnit" placeholder="Input Unit">
            </div>
            <div>
                <label for="editInventoryStock">Current Stock</label>
                <input type="number" id="editInventoryStock" name="inventoryStock" placeholder="Input Stock">
            </div>
            <div>
                <label for="editInventoryDateAdded">Date Added</label>
                <input type="date" id="editInventoryDateAdded" name="inventoryDateAdded">
            </div>
            <div>
                <label for="editInventoryExpirationDate">Expiration Date</label>
                <input type="date" id="editInventoryExpirationDate" name="inventoryExpirationDate">
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        document.getElementById('createNewOrderLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('new-inventory-form').style.display = 'block';
        });

        document.getElementById('closeNewFormButton').addEventListener('click', function() {
            document.getElementById('new-inventory-form').style.display = 'none';
        });

        const editButtons = document.querySelectorAll('.edit');
        const editForm = document.getElementById('edit-inventory-form');
        const closeEditFormButton = document.getElementById('closeEditFormButton');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {

                editForm.style.display = 'block';
            });
        });

        closeEditFormButton.addEventListener('click', function() {
            editForm.style.display = 'none';
        });
    </script>
</body>
</html>
