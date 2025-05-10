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
                @if(count($archive_expenses) > 0)
                @foreach($archive_expenses as $expense)
                <tr>
                    <td>{{ $expense->name }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->datetime }}</td>
                    <td>{{ $expense->category }}</td>
                    <td class="action-btn">
                        <form action="/expenses/{{ $expense->id}}/restore" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="restore">
                                <img src="/images/restore.png" alt="Restore">
                                Restore
                            </button>
                        </form>

                        <form action="/expenses/{{ $expense->id}}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="delete">
                                <img src="/images/delete.png" alt="Delete">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" style="text-align: center;" class="no-data">No archived expenses found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>