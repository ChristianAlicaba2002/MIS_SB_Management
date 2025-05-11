<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/admin-login.css')}}">
    <title>MIS&SB Management</title>
</head>

<body>
    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>


    <form class="form-controller" action="{{route('login.admin')}}" method="post">
        @csrf
        <h1>MIS&SB</h1>
        @if(session('error'))
        <span>{{ session('error') }}</span>
        @endif
        <label for="">Admin</label>
        <input type="text" placeholder="Admin" name="name" id="username" required>
        <label for="">Password</label>
        <input type="password" placeholder="Password" name="password" id="password" required>
        <label for="showpassword">
            <input onclick="ShowPassword()" type="checkbox" name="" id="showpassword">
            Show Password
        </label>
        <button type="submit">Login</button>
    </form>

    <script src="{{asset('js/admin-login.js') }}"></script>
</body>

</html>