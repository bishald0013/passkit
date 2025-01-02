@extends('layout.navigation')

<div class="container mt-5 pt-5">
    <div class="row">
        <!-- Left Side: Input Form -->
        <div class="col-md-6 mb-4">
            <form id="eventForm">
                <div class="mb-3">
                    <label for="cardTitle" class="form-label">Event Title</label>
                    <input 
                        type="text" 
                        id="cardTitle" 
                        name="cardTitle" 
                        class="form-control"
                        placeholder="Enter event title"
                        oninput="updateCard()"
                    >
                </div>
                <div class="mb-3">
                    <label for="eventLogo" class="form-label">Logo URL</label>
                    <input 
                        type="text" 
                        id="eventLogo" 
                        name="eventLogo" 
                        class="form-control"
                        placeholder="Enter logo URL"
                        oninput="updateCard()"
                    >
                </div>
                <div class="mb-3">
                    <label for="heroImage" class="form-label">Hero Image URL</label>
                    <input 
                        type="text" 
                        id="heroImage" 
                        name="heroImage" 
                        class="form-control"
                        placeholder="Enter hero image URL"
                        oninput="updateCard()"
                    >
                </div>
                <div class="mb-3">
                    <label for="eventDateTime" class="form-label">Date & Time</label>
                    <input 
                        type="datetime-local" 
                        id="eventDateTime" 
                        name="eventDateTime" 
                        class="form-control"
                        oninput="updateCard()"
                    >
                </div>
            </form>
        </div>

        <!-- Right Side: Event Card -->
        <div class="col-md-6">
            <div id="eventCard" class="card">
                <img id="cardHeroImage" src="https://via.placeholder.com/300x150" class="card-img-top" alt="Hero Image">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3" style="width: 50px; height: 50px; overflow: hidden;">
                            <img id="cardLogo" src="https://via.placeholder.com/50" class="img-fluid rounded-circle" alt="Event Logo">
                        </div>
                        <h5 id="cardTitleDisplay" class="card-title">Event Title</h5>
                    </div>
                    <p id="cardDateTime" class="card-text text-muted">Date & Time</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateCard() {
        // Get values from inputs
        const title = document.getElementById('cardTitle').value;
        const logo = document.getElementById('eventLogo').value;
        const heroImage = document.getElementById('heroImage').value;
        const dateTime = document.getElementById('eventDateTime').value;

        // Update card elements
        document.getElementById('cardTitleDisplay').textContent = title || 'Event Title';
        document.getElementById('cardLogo').src = logo || 'https://via.placeholder.com/50';
        document.getElementById('cardHeroImage').src = heroImage || 'https://via.placeholder.com/300x150';
        document.getElementById('cardDateTime').textContent = dateTime || 'Date & Time';
    }
</script>
