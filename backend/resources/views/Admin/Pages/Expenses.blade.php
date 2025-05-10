<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/expenses.css">
    <link rel="shortcut icon" href="/images/oop_logo.png" type="image/x-icon">
</head>

<body>

<aside>
        @include('Admin.Pages.Sidebar')
    </aside>

    <div class="content-wrapper">
        <div class="title">
            <div class="brandName">
                <h1>EXPENSE MANAGEMENT</h1>
            </div>
        </div>

        <div class="action-bar">
            <button class="btn" id="openAddExpenseModal">
                <span class="btn-icon">+</span> Add New Expense
            </button>
            <a href="/expensesArchive" class="btn">
                <img src="/images/archives.png" alt="Archives" style="vertical-align: middle; margin-right: 8px;"> Archives
            </a>
        </div>

        <div class="expensesTableContainer">
            <table class="expensesTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Time</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Lunch</td>
                        <td>15.50</td>
                        <td>2025-05-10 12:00</td>
                        <td>Food</td>
                        <td class="expense-actions">
                            <a href="#" class="edit-btn"><img src="/images/edit.png" alt="Edit"> Edit</a>
                            <a href="#" class="archive-btn" alt="Archive"><img src="/images/archive.png" alt="Archive"> Archive</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="addExpenseModal">
            <div id="addExpenseForm">
                <button type="button" class="close-modal-btn" id="closeAddExpenseModal">
                    &times;
                </button>
                <h2>Add New Expense</h2>
                <form action="/create-expense" method="POST">
                    <div>
                        <label for="iname">Item Name</label>
                        <input type="text" id="iname" name="iname" placeholder="Enter Item Name" required>
                    </div>
                    <div>
                        <label for="amount">Amount</label>
                        <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>
                    </div>
                    <div>
                        <label for="time">Date/Time</label>
                        <input type="datetime-local" id="time" name="time">
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" placeholder="Enter Category">
                    </div>
                    <button type="submit">Add Expense</button>
                </form>
            </div>
        </div>

        <div class="no-expenses" style="display:none;">
            <div>
                <h2>No Expenses Found</h2>
                <p>It seems you haven't added any expenses yet. Click the button above to add your first expense!</p>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const openAddExpenseModalBtn = document.getElementById('openAddExpenseModal');
                const addExpenseModal = document.getElementById('addExpenseModal');
                const closeAddExpenseModalBtn = document.getElementById('closeAddExpenseModal');
                const expenseRows = document.querySelectorAll('.expensesTable tbody tr');
                const noExpensesMessage = document.querySelector('.no-expenses');

                openAddExpenseModalBtn.addEventListener('click', function() {
                    addExpenseModal.style.display = 'flex';
                });

                closeAddExpenseModalBtn.addEventListener('click', function() {
                    addExpenseModal.style.display = 'none';
                });

                window.addEventListener('click', function(event) {
                    if (event.target === addExpenseModal) {
                        addExpenseModal.style.display = 'none';
                    }
                });

                if (expenseRows.length === 0) {
                    noExpensesMessage.style.display = 'block';
                } else {
                    noExpensesMessage.style.display = 'none';
                }
            });
        </script>
    </div>
</body>

</html>