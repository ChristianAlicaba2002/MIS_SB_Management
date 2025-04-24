<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MIS&SB Sidebar</title>
  <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
</head>
<body>
  <div class="sidebar-container">
    <div class="Logo">
      <img src="assets/components/oop_logo.png" alt="Logo" style="height: 50px; width: 50px;">
    </div>

    <div class="nav-wrapper" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
      <ul>

        <li>
            <a href="{{route('dashboard')}}">
                <img src="assets/components/dashboard.png" alt="">
            <span class="nav-text">Dashboard</span>
          </a>
        </li>

        <li>
            <a href="">
                <img src="assets/components/sales.png" alt="">
            <span class="nav-text">Sales</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="{{route('products')}}">
            <img src="assets/components/addedproduct.png" alt="">
            <span class="nav-text">Products</span>
          </a>
        </li>

        <li class="has-submenu">
        <a href="">
        <img src="assets/components/expenses.png" alt="">
            <span class="nav-text">Add Expenses</span>
          </a>
          <div class="submenu">
          <a href="">
          <img src="assets/components/expenseshistory.png" alt="">
              <span>Expenses History</span>
            </a>
          </div>
        </li>
      </ul>
    </div>

    <form action="{{route('logout.admin')}}" method="post">
      @csrf
      <button type="submit">
        <img src="assets/components/exit.png" alt="">
        <span class="nav-text">Logout</span>
      </button>
    </form>
  </div>
</body>
</html>
