@extends('layout.navigation')

<div class="container mt-5 pt-5">
     <!-- Row 4: Organization Details -->
     <div class="row text-center mb-5">
        <div class="col-md-12">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="rounded-circle bg-primary p-3 me-3" style="width: 60px; height: 60px; overflow: hidden;">
                            <img src="{{ asset('images/sunburn.jpeg') }}" alt="Logo" class="img-fluid rounded-circle" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        
                        <div>
                            <h4 class="card-title fw-bold text-start mt-4"> Welcome Bishal Deb</h4>
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
    <!-- Row 1: Chart and Total Downloads -->
    <div class="row mb-5">
        <!-- Chart Section -->
        <div class="col-md-6">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body">
                    <h4 class="fw-bold">Pass Stats Chart</h4>
                    <canvas id="passStatsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Total Downloads Section -->
        <div class="col-md-6">
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

    <!-- Row 2: API Usage Section -->
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

    <!-- Row 3: New Projects or Features -->
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body">
                    <h4 class="fw-bold">New Features/Projects</h4>
                    <div class="d-flex flex-wrap">
                        <!-- Feature 1 -->
                        <div class="card shadow-sm border-0 m-2" style="width: 18rem;">
                            <img src="{{ asset('images/feature1.jpg') }}" class="card-img-top" alt="Feature 1">
                            <div class="card-body">
                                <h5 class="card-title">Feature 1</h5>
                                <p class="card-text">Description of feature 1.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                        <!-- Feature 2 -->
                        <div class="card shadow-sm border-0 m-2" style="width: 18rem;">
                            <img src="{{ asset('images/feature2.jpg') }}" class="card-img-top" alt="Feature 2">
                            <div class="card-body">
                                <h5 class="card-title">Feature 2</h5>
                                <p class="card-text">Description of feature 2.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div class="card shadow-sm border-0 m-2" style="width: 18rem;">
                            <img src="{{ asset('images/feature3.jpg') }}" class="card-img-top" alt="Feature 3">
                            <div class="card-body">
                                <h5 class="card-title">Feature 3</h5>
                                <p class="card-text">Description of feature 3.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('passStatsChart').getContext('2d');
    const passStatsChart = new Chart(ctx, {
        type: 'line',  // Line chart type
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],  // Example months
            datasets: [{
                label: 'Pass Stats',
                data: [100, 120, 110, 130, 150],  // Example data
                borderColor: 'rgba(75, 192, 192, 1)',  // Line color
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Fill under the line
                fill: true,  // Fill under the line
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
