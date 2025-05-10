<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPENSES ARCHIVES</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/archiveexpenses.css">
    <link rel="shortcut icon" href="/images/oop_logo.png" type="image/x-icon">
</head>
<body>

    <div class="back">
        <a href="/expensesPage">
            <img src="/images/back.png" alt="Back to Expenses">
        </a>
    </div>

    <h1>EXPENSES ARCHIVES</h1>

    <div class="expenses-archives-table">
        <table>
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
                    <td>Expense 1</td>
                    <td>10.00</td>
                    <td>2024-07-28 12:00</td>
                    <td>Food</td>
                    <td class="action-btn">
                        <button class="restore">
                            <img src="/images/restore.png" alt="Restore">
                            Restore
                        </button>
                        <button class="delete">
                            <img src="/images/delete.png" alt="Delete">
                            Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Expense 2</td>
                    <td>25.00</td>
                    <td>2024-07-27 15:30</td>
                    <td>Transportation</td>
                    <td class="action-btn">
                        <button class="restore">
                            <img src="/images/restore.png" alt="Restore">
                            Restore
                        </button>
                        <button class="delete">
                            <img src="/images/delete.png" alt="Delete">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
