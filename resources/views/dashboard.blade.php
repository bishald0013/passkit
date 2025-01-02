@extends('layout.navigation')

<div class="container mt-5 pt-5">
    <!-- Organization Details Section -->
    <div class="row text-center mb-5">
        <div class="col-md-12">
            <div class="card shadow rounded-3 mb-4 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="rounded-circle bg-primary p-3 me-3" style="width: 60px; height: 60px;">
                            <img src="{{ asset('images/sunburn.jpeg') }}" alt="Logo" class="img-fluid rounded-circle" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div>
                            <h4 class="card-title fw-bold">Let's Wallet</h4>
                            <p class="text-muted">Your trusted platform for managing digital passes and assets.</p>
                        </div>
                        <div class="ms-auto">
                            <a href="#" class="btn btn-link text-dark">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Overview Section -->
    <div class="row mb-5">
        <!-- Total Event Passes -->
        <div class="col-md-3">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body text-center">
                    <h5 class="fw-bold">Total Event Passes</h5>
                    <p class="text-muted">120</p>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" style="width: 60%; background-color: #4caf50;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Generic Passes -->
        <div class="col-md-3">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body text-center">
                    <h5 class="fw-bold">Total Generic Passes</h5>
                    <p class="text-muted">150</p>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" style="width: 75%; background-color: #ff9800;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Active Passes -->
        <div class="col-md-3">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body text-center">
                    <h5 class="fw-bold">Active Passes</h5>
                    <p class="text-muted">100</p>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" style="width: 50%; background-color: #2196f3;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Downloads -->
        <div class="col-md-3">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body text-center">
                    <h5 class="fw-bold">Total Downloads</h5>
                    <p class="text-muted">800</p>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" style="width: 85%; background-color: #f44336;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- API Usage Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body">
                    <h4 class="fw-bold">API Usage</h4>
                    <p class="text-muted">You have access to our API. Track your usage below.</p>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="fw-bold">API Calls Made</h5>
                                    <p class="text-muted">320</p>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" style="width: 64%; background-color: #9c27b0;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="fw-bold">Requests in Last 24hrs</h5>
                                    <p class="text-muted">120</p>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" style="width: 50%; background-color: #03a9f4;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="fw-bold">Rate Limit Remaining</h5>
                                    <p class="text-muted">480</p>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" style="width: 80%; background-color: #4caf50;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section (Line Chart) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body">
                    <canvas id="passStatsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('passStatsChart').getContext('2d');
    const passStatsChart = new Chart(ctx, {
        type: 'line',  // Changed to line chart
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],  // Example months for the x-axis
            datasets: [{
                label: 'Pass Stats',
                data: [100, 120, 110, 130, 150],  // Example data for the y-axis
                borderColor: 'rgba(75, 192, 192, 1)',  // Line color
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Fill color under the line
                fill: true,  // Fill the area under the line
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>
