<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-value {
            font-size: 2rem;
            font-weight: bold;
            color: #495057;
        }
        .icon {
            font-size: 2.5rem;
            color: #6c757d;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header-container mb-4">
            <h1 class="text-center">Admin Analytics Dashboard</h1>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        
        <div class="row g-4">
            <!-- Total Users Card -->
            <div class="col-md-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <i class="icon bi bi-people-fill"></i>
                        <h5 class="card-title">BRTs Created This Week</h5>
                        <p class="card-value" id="total-users">{{ $thisWeekBRTs }}</p>
                    </div>
                </div>
            </div>
            <!-- Total Admins Card -->
            <div class="col-md-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <i class="icon bi bi-person-badge-fill"></i>
                        <h5 class="card-title">Total Amount</h5>
                        <p class="card-value" id="total-admins">{{ number_format($totalReservedAmount, 2) }}</p>
                    </div>
                </div>
            </div>
            <!-- Revenue Card -->
            <div class="col-md-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <i class="icon bi bi-currency-dollar"></i>
                        <h5 class="card-title">Total BRTs Created</h5>
                        <p class="card-value" id="revenue">{{ $totalBRTs }}</p>
                    </div>
                </div>
            </div>
            <!-- Pending Tasks Card -->
            <div class="col-md-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <i class="icon bi bi-list-task"></i>
                        <h5 class="card-title">Active BRTs</h5>
                        <p class="card-value" id="pending-tasks">{{ $activeBRTs }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <i class="icon bi bi-currency-dollar"></i>
                        <h5 class="card-title">Expired BRT</h5>
                        <p class="card-value" id="revenue">{{ $expiredBRTs }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
