<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Expense Tracker</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:linear-gradient(135deg,#4f46e5,#6366f1);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:400px;
    border:none;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.btn-login{
    background:#4f46e5;
    color:white;
}

.btn-login:hover{
    background:#4338ca;
    color:white;
}
</style>

</head>
<body>

<div class="card p-4">

    <div class="text-center mb-4">
        <h2>💰 Expense Tracker</h2>
        <p class="text-muted">Welcome Back</p>
    </div>

    <form action="/login" method="POST">

        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-login w-100">
            Login
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="/register">
            Create New Account
        </a>
    </div>

</div>

</body>
</html>