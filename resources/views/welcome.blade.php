<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Let's Wallet - Digital Wallet Pass Management</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
           #google-pass-cards .card {
                background: #f1f1f1; /* Soft light background */
                border-radius: 12px; /* Smooth rounded corners */
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            #google-pass-cards .card:hover {
                transform: translateY(-5px); /* Lift effect */
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1); /* Enhanced shadow */
            }

            #google-pass-cards .card-img-top {
                border-radius: 12px 12px 0 0; /* Rounded top corners */
            }

            #google-pass-cards .card-body {
                padding: 20px;
            }

            #google-pass-cards .card-title {
                font-size: 1.2rem;
                color: #333; /* Dark text for titles */
            }

            #google-pass-cards .card-text {
                font-size: 0.9rem;
                color: #555; /* Slightly muted text for descriptions */
            }

            #google-pass-cards .badge {
                font-size: 0.8rem;
                padding: 6px 12px;
                font-weight: 600;
            }

            #google-pass-cards .btn-sm {
                font-size: 0.8rem;
                padding: 8px 15px;
                border-radius: 20px;
            }

            #google-pass-cards .card-footer {
                background: #f9f9f9;
                border-top: 1px solid #ddd;
            }


        </style>
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="#"><i class="fas fa-wallet me-2"></i>Let's Wallet</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="pt-5 mt-5 text-center bg-light" id="hero-container">
            <div class="container py-5">
                <h1 class="display-4 fw-bold">Your Digital Wallet,<br>Reimagined</h1>
                <p class="lead text-muted mt-3 mb-4">Effortlessly store, manage, and access all your digital passes in one convenient location. <br>From event tickets to loyalty cards, Let's Wallet simplifies digital pass management.</p>
                <a href="#" class="btn btn-primary btn-lg">Start Free Trial</a>
            </div>
        </section>

        <section id="google-pass-cards" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Your Digital Passes</h2>
                <div class="row g-4">
                    <!-- Card 1: Event Ticket -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3 bg-light h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-primary text-light me-3">Event</div>
                                    <h5 class="card-title fw-bold">Concert in NYC</h5>
                                </div>
                                <p class="card-text text-muted">Venue: Madison Square Garden</p>
                                <p class="card-text text-muted">Date: March 5, 2025</p>
                                <p class="card-text text-muted">Seat: A15, Row 2</p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-outline-primary btn-sm">View Ticket</button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Loyalty Card -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3 bg-light h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-success text-light me-3">Loyalty</div>
                                    <h5 class="card-title fw-bold">Store XYZ - Gold Member</h5>
                                </div>
                                <p class="card-text text-muted">Points: 1520</p>
                                <p class="card-text text-muted">Expires: December 31, 2025</p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-outline-success btn-sm">View Card</button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3: Flight Pass -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3 bg-light h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-warning text-dark me-3">Flight</div>
                                    <h5 class="card-title fw-bold">Flight to Paris</h5>
                                </div>
                                <p class="card-text text-muted">Flight No: AF 1234</p>
                                <p class="card-text text-muted">Departure: March 12, 2025</p>
                                <p class="card-text text-muted">Gate: 45</p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-outline-warning btn-sm">View Pass</button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4: Membership Card -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3 bg-light h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-info text-dark me-3">Membership</div>
                                    <h5 class="card-title fw-bold">Premium Member</h5>
                                </div>
                                <p class="card-text text-muted">Member Since: January 2024</p>
                                <p class="card-text text-muted">Expiration: January 2025</p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-outline-info btn-sm">View Membership</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="features" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Why Choose Let's Wallet</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-shield-alt text-primary fs-1 mb-3"></i>
                                <h5 class="card-title fw-bold">Secure Storage</h5>
                                <p class="card-text text-muted">Your passes are encrypted and securely stored with enterprise-grade security protocols.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-sync text-primary fs-1 mb-3"></i>
                                <h5 class="card-title fw-bold">Auto Sync</h5>
                                <p class="card-text text-muted">Automatically sync your passes across all your devices in real-time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-magic text-primary fs-1 mb-3"></i>
                                <h5 class="card-title fw-bold">Ease of Use</h5>
                                <p class="card-text text-muted">AI-powered categorization keeps your passes organized automatically.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-dark text-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h4 class="fw-bold">Let's Wallet</h4>
                        <address>1234 Innovation Drive,<br>Tech City, TC 56789</address>
                        <small>© 2024 Let's Wallet. All rights reserved.</small>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5 class="fw-bold">Our Other Products</h5>
                        <ul class="list-unstyled">
                            <li>Let's Calendar</li>
                            <li>Let's TimeIt</li>
                        </ul>
                        <h5 class="fw-bold mt-3">Connect with Us</h5>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="#" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
