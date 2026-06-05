<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Personal Expense Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#4f46e5,#6366f1);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-card{
            width:450px;
            border:none;
            border-radius:20px;
            padding:30px;
            background:white;
            box-shadow:0 15px 35px rgba(0,0,0,0.15);
        }

        .logo{
            font-size:50px;
        }

        .form-control{
            border-radius:10px;
            height:48px;
        }

        .btn-register{
            background:#4f46e5;
            color:white;
            height:48px;
            border-radius:10px;
            font-weight:600;
        }

        .btn-register:hover{
            background:#4338ca;
            color:white;
        }

        a{
            text-decoration:none;
        }
    </style>
</head>
<body>

<div class="register-card">

    <div class="text-center mb-4">
        <div class="logo">💰</div>
        <h2>Create Account</h2>
        <p class="text-muted">Track your income and expenses easily</p>
    </div>

    <form action="/register" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Enter your full name"
                value="{{ old('name') }}"
            >
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Enter your email"
                value="{{ old('email') }}"
            >
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile Number</label>
            <input
                type="text"
                name="number"
                class="form-control"
                placeholder="Enter mobile number"
                value="{{ old('number') }}"
            >
            @error('number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter password"
            >
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Confirm password"
            >
        </div>

        <button type="submit" class="btn btn-register w-100">
            Register
        </button>

    </form>

    <div class="text-center mt-3">
        Already have an account?
        <a href="/login">Login</a>
    </div>

</div>

</body>
</html>