<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sidebar</title>
  <link rel="stylesheet" href="/css/style.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      transition: all 0.4s ease-in-out;
    }

    body {
      background-color: white;
    }

    .Logo {
      display: flex;
      justify-content: center;
      padding: 1rem 0;
      transition: transform 0.4s ease-in-out;
    }

    .sidebar-container {
      position: fixed;
      margin: 2rem;
      color: palevioletred;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100px;
      height: 90%;
      background-color: white;
      border-radius: 50px;
      overflow: hidden;
      box-shadow: 5px 10px 10px 2px rgba(254, 81, 150, 0.5);
      transition: width 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
      padding: 1rem 0;
    }

    .sidebar-container:hover {
      width: 240px;
      box-shadow: 8px 8px 15px 5px rgba(247, 112, 98, 0.5);
    }

    .sidebar-container ul {
      list-style: none;
      padding: 1rem 0;
      display: flex;
      flex-direction: column;
      gap: 0.7rem;
      width: 100%;
      justify-content: center;
      align-items: center;
    }

    .sidebar-container li {
      position: relative;
      padding: 0.6rem 1rem;
      border-radius: 40px;
      transition: all 0.4s ease-in-out;
      width: 100%;
    }

    .sidebar-container li:hover {
      transform: scale(1.05);
      padding-left: 1rem;
    }

    .sidebar-container li a,
    .sidebar-container li button {
      color: palevioletred;
      text-decoration: none;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
      width: 100%;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 0.85rem;
      font-weight: 500;
      transition: all 0.4s ease-in-out;
    }

    .sidebar-container li:hover a,
    .sidebar-container li:hover button {
      transform: scale(1.05);
      color: palevioletred;
    }

    .sidebar-container img {
      height: 30px;
      width: 30px;
      filter: brightness(1.1);
      transition: transform 0.4s ease-in-out;
    }

    .sidebar-container li:hover img {
      transform: scale(1.1);
    }

    .submenu {
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      transition: all 0.4s ease-in-out;
      padding-left: 1.2rem;
      margin-top: 0.2rem;
    }

    .has-submenu:hover .submenu {
      max-height: 200px;
      opacity: 1;
      border-top: 1px solid palevioletred;
      border-bottom: 1px solid palevioletred;
    }

    .submenu span {
      align-items: center;
      gap: 8px;
      color: palevioletred;
      margin-top: 1.5rem;
      padding:0;
      border-radius: 5px;
      font-size: 0.75rem;
      display: inline-flex;
      align-items: center;
    }

    .submenu a:hover {
      color: rgb(92, 25, 121);
      margin-left: 0.5rem;
    }

    .submenu img {
      height: 20px;
      width: 20px;
    }

    .sidebar-container li button[type="submit"] {
      font-weight: 600;
      background-color: none;
      border: none;
    }

    .nav-text {
      font-size: 0.8rem;
      display: none;
    }

    .sidebar-container:hover .nav-text {
      display: inline;
    }

    .sidebar-container form {
      width: 100%;
      display: flex;
      justify-content: center;
      padding: 1rem 0;
      border-top: 1px solid rgba(223, 76, 191, 0);
    }

    .sidebar-container form button {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      color: palevioletred;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 0.85rem;
      font-weight: 500;
      padding: 0.6rem 1rem;
      border-radius: 40px;
      transition: all 0.4s ease-in-out;
    }

    .sidebar-container form button:hover {
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .sidebar-container {
        width: 100%;
        flex-direction: row;
        align-items: center;
        margin: 1rem auto;
        border-radius: 15px;
      }

      .sidebar-container ul {
        flex-direction: row;
        justify-content: space-around;
        padding: 0.5rem;
        gap: 0.3rem;
      }

      .sidebar-container li {
        padding: 0.3rem 0.6rem;
      }

      .nav-text {
        display: none;
      }

      .sidebar-container:hover .nav-text {
        display: inline;
      }

      .submenu {
        padding-left: 1rem;
        font-size: 0.7rem;
        margin-top: 0.1rem;
      }

      .submenu a {
        padding: 0.2rem 0;
      }

      .submenu a:hover {
        transform: scale(1.05);
        margin-left: 0.3rem;
      }

      .sidebar-container form {
        border-top: none;
        padding: 0.5rem;
      }
    }
  </style>
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
          <a href="">
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
