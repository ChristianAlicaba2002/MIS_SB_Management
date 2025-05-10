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

    @if(session('success'))
        <script>alert("{{session('success')}}")</script>
    @endif

    @if(session('error'))
        <script>alert("session('error')")</script>
    @endif

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
                        <th>DateTime</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @if(count($expenses) > 0)
                    @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->name }}</td>
                        <td>&#8369; {{ number_format( $expense->amount , 2)}}</td>
                        <td>{{ $expense->datetime }}</td>
                        <td>{{ $expense->category }}</td>
                        <td class="expense-actions">
                            <a href="#" class="edit-btn"
                                onclick="EditForm('{{ $expense->id }}', '{{ $expense->name }}', '{{ $expense->amount }}', '{{ $expense->datetime }}','{{ $expense->category }}', )">
                            <img src="/images/edit.png" alt="Edit">Edit
                            </a>
                            <form action="/expenses/{{$expense->id}}/archive" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="archive-btn" alt="Archive">
                                    <img src="/images/archive.png" alt="Archive"> Archive
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" style="text-align: center;" class="no-data">No expenses found.</td>
                    </tr>
                    @endif


                </tbody>
            </table>
        </div>

        <!-- Add Expense Modal -->
        <div id="addExpenseModal">
            <div id="addExpenseForm">
                <button type="button" class="close-modal-btn" id="closeAddExpenseModal">
                    &times;
                </button>
                <h2>Add New Expense</h2>
                <form action="{{route('add.expense')}}" method="POST">
                    @csrf
                    <div>
                        <label for="iname">Item Name</label>
                        <input type="text" id="iname" name="name" placeholder="Enter Item Name" required>
                    </div>
                    <div>
                        <label for="amount">Amount</label>
                        <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>
                    </div>
                    <div>
                        <label for="time">Date/Time</label>
                        <input type="datetime-local" id="time" name="datetime">
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" placeholder="Enter Category">
                    </div>
                    <button type="submit">Add Expense</button>
                </form>
            </div>
        </div>


        <!-- Edit Expense Modal -->
        <div id="edit_expenses" class="edit_expenses" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center;">
            <form id="editForm" action="" method="post" style="background: white; padding: 20px; border-radius: 8px; width: 400px;">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 15px;">
                <label for="iname" style="display: block; margin-bottom: 5px;">Item Name</label>
                <input type="text" id="editName" name="name" placeholder="Enter Item Name" required 
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="amount" style="display: block; margin-bottom: 5px;">Amount</label>
                <input type="number" id="editAmount" name="amount" placeholder="Enter Amount" required
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="time" style="display: block; margin-bottom: 5px;">Date/Time</label>
                <input type="datetime-local" id="EditDatetime" name="datetime"
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="category" style="display: block; margin-bottom: 5px;">Category</label>
                <input type="text" id="editCategory" name="category" placeholder="Enter Category"
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Update Expense
            </button>
            </form>
        </div>

        <div class="no-expenses" style="display:none;">
            <div>
                <h2>No Expenses Found</h2>
                <p>It seems you haven't added any expenses yet. Click the button above to add your first expense!</p>
            </div>
        </div>

        <script>
            // JavaScript to handle modal opening and closing
            function EditForm(id, name, amount, datetime, category) {
                document.getElementById('edit_expenses').style.display = 'flex';
                document.getElementById('editForm').action = `/expenses/update/${id}`;
                document.getElementById('editName').value = name;
                document.getElementById('editAmount').value = amount;
                document.getElementById('EditDatetime').value = datetime;
                document.getElementById('editCategory').value = category;
            }
            document.getElementById('edit_expenses').addEventListener('click', function(event) {
                if (event.target === this) {
                    this.style.display = 'none';
                }
            });

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