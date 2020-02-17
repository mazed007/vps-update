@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h2 class="page-title">Dashboard</h2>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="dashboard-section">
                <div class="dashboard-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="details">
                    <h4>Users</h4>
                    <ul>
                        <li><a href="user.php">Users List</a>
                        </li>
                        <li><a href="add-user.php">Add Users</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="dashboard-section">
                <div class="dashboard-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="details">
                    <h4>Online Users</h4>
                    <p>0</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="dashboard-section">
                <div class="dashboard-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="details">
                    <h4>Resellers</h4>
                    <ul>
                        <li><a href="reseller-list.php">My Resellers</a>
                        </li>
                        <li><a href="add-resellers.php">Add Resellers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection