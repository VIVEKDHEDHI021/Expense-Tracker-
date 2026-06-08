<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f7fc;
}

.profile-card{
    border:none;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.profile-header{
    background:linear-gradient(135deg,#4f46e5,#6366f1);
    color:white;
    border-radius:20px 20px 0 0;
    padding:30px;
}

.profile-logo{
    width:120px;
    height:120px;
    border-radius:50%;
    background:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:55px;
    margin:auto;
    color:#4f46e5;
    border:5px solid rgba(255,255,255,.3);
}

.stat-card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
    transition:0.3s;
}

.stat-card:hover{
    transform:translateY(-3px);
}

.income{
    color:#16a34a;
}

.expense{
    color:#dc2626;
}

.balance{
    color:#4f46e5;
}

</style>

</head>
<body>

<div class="container mt-5">

    <div class="card profile-card">

        <div class="profile-header text-center">

            <div class="profile-logo">
                💰
            </div>

            <h2 class="mt-3">
                {{ Auth::user()->name ?? 'Demo User' }}
            </h2>

            <p class="mb-0">
                Personal Expense Tracker User
            </p>

        </div>

        <div class="card-body p-4">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="card stat-card p-3 text-center">
                        <h6>Total Expense</h6>
                        <h3 class="expense">
                            ₹{{ number_format($totalExpense,2) }}
                        </h3>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card stat-card p-3 text-center">
                        <h6>Total Income</h6>
                        <h3 class="income">
                             ₹{{ number_format($totalIncome,2) }}
                        </h3>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card stat-card p-3 text-center">
                        <h6>Net Balance</h6>
                        <h3 class="balance">
                            ₹{{ number_format($balance,2) }}
                        </h3>
                    </div>
                </div>

            </div>

            <hr>

            <div class="mt-4">

                <h5>User Information</h5>

                <table class="table">

                    <tr>
                        <th>User Name</th>
                        <td>{{ Auth::user()->name ?? 'Demo User' }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ Auth::user()->email ?? 'demo@example.com' }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>