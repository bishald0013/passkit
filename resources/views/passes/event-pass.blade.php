@extends('layout.app')
@section('title', 'Event Pass')

@section('additional_styles')
<style>
    .event-pass-container {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        padding: 24px;
        margin-top: 20px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .form-control {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #7749F8;
        box-shadow: 0 0 0 3px rgba(119, 73, 248, 0.1);
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        color: #344054;
    }

    .preview-card {
        background: linear-gradient(135deg, #7749F8, #6f42c1);
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        min-height: 200px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .preview-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.05)' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.1;
    }

    .preview-card h3 {
        font-size: 24px;
        margin-bottom: 16px;
        font-weight: 600;
    }

    .preview-details {
        font-size: 15px;
        opacity: 0.9;
    }

    .qr-placeholder {
        position: absolute;
        bottom: 24px;
        right: 24px;
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .event-badge {
        display: inline-block;
        padding: 4px 12px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        font-size: 12px;
        margin-bottom: 16px;
    }

    .form-section {
        background: #f8f9fc;
        border-radius: 12px;
        padding: 24px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="m-0">Event Pass</h1>
                <button class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Generate Pass
                </button>
            </div>
        </div>
    </div>

    <div class="event-pass-container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-center">Pass Details</h5>
    
                        <!-- Upload Image & Organization Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="imageUpload" class="form-label">Upload Logo</label>
                                <input type="file" class="form-control" id="imageUpload">
                            </div>
                            <div class="col-md-6">
                                <label for="organizationName" class="form-label">Organization Name</label>
                                <input type="text" class="form-control" id="organizationName" placeholder="Enter organization name">
                            </div>
                        </div>
    
                        <!-- Event Name & Venue -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="eventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="eventName" placeholder="Enter event name">
                            </div>
                            <div class="col-md-6">
                                <label for="eventVenue" class="form-label">Venue</label>
                                <input type="text" class="form-control" id="eventVenue" placeholder="Enter venue">
                            </div>
                        </div>
    
                        <!-- Event Date & Time -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="eventDate" class="form-label">Event Date</label>
                                <input type="date" class="form-control" id="eventDate">
                            </div>
                            <div class="col-md-6">
                                <label for="eventTime" class="form-label">Event Time</label>
                                <input type="time" class="form-control" id="eventTime">
                            </div>
                        </div>
    
                        <!-- Gate, Section, Seat/Row -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="gate" class="form-label">Gate</label>
                                <input type="text" class="form-control" id="gate" placeholder="Gate number">
                            </div>
                            <div class="col-md-4">
                                <label for="section" class="form-label">Section</label>
                                <input type="text" class="form-control" id="section" placeholder="Section">
                            </div>
                            <div class="col-md-4">
                                <label for="seatRow" class="form-label">Seat/Row</label>
                                <input type="text" class="form-control" id="seatRow" placeholder="Seat or Row">
                            </div>
                        </div>
    
                        <!-- Barcode Picker, Color Picker, Hex Code -->
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="barcode" class="form-label">Barcode</label>
                                <input type="file" class="form-control" id="barcode">
                            </div>
                            <div class="col-md-4">
                                <label for="colorPicker" class="form-label">Color Picker</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="colorPickerInput" placeholder="Choose Color" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="colorPickerButton">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                </div>
                                <!-- Color Picker Modal -->
                                <div class="modal fade" id="colorPickerModal" tabindex="-1" aria-labelledby="colorPickerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="colorPickerModalLabel">Select a Color</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="color" class="form-control" id="colorPicker">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="saveColorButton">Save Color</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hexCode" class="form-label">Hex Code</label>
                                <input type="text" class="form-control" id="hexCode" placeholder="#000000">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="barcode" class="form-label">Upload Hero image</label>
                                <input type="file" class="form-control" id="barcode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Preview Card -->
            <div class="col-md-5">
                <div class="preview-card">
                    <span class="event-badge" id="previewPassType">VIP PASS</span>
                    <h3 id="previewEventName">Tech Conference 2024</h3>
                    <div class="preview-details">
                        <p class="mb-2"><i class="far fa-calendar me-2"></i><span id="previewDateTime">January 15, 2024 - 10:00 AM</span></p>
                        <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i><span id="previewLocation">Convention Center</span></p>
                        <p class="mb-0"><i class="far fa-user me-2"></i><span id="previewAttendeeName">John Doe</span></p>
                    </div>
                    <div class="qr-placeholder">
                        <i class="fas fa-qrcode fa-2x" style="color: rgba(255, 255, 255, 0.5)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_scripts')
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.8.0/dist/pickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    document.getElementById('colorPickerButton').addEventListener('click', function() {
        const modal = new bootstrap.Modal(document.getElementById('colorPickerModal'));
        modal.show();
    });

    // Optional: Bind the selected color to the hex code input field
    document.getElementById('saveColorButton').addEventListener('click', function() {
        const color = document.getElementById('colorPicker').value;
        document.getElementById('colorPickerInput').value = color;
        document.getElementById('hexCode').value = color;
        const modal = bootstrap.Modal.getInstance(document.getElementById('colorPickerModal'));
        modal.hide();
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Get all input elements
        const eventName = document.getElementById('eventName');
        const eventDateTime = document.getElementById('eventDateTime');
        const eventLocation = document.getElementById('eventLocation');
        const attendeeName = document.getElementById('attendeeName');
        const passType = document.getElementById('passType');

        // Function to update preview
        function updatePreview() {
            // Update event name
            document.getElementById('previewEventName').textContent = 
                eventName.value || 'Tech Conference 2024';

            // Update date and time
            if (eventDateTime.value) {
                const date = new Date(eventDateTime.value);
                document.getElementById('previewDateTime').textContent = 
                    date.toLocaleString('en-US', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric',
                        hour: '2-digit', 
                        minute: '2-digit'
                    });
            }

            // Update location
            document.getElementById('previewLocation').textContent = 
                eventLocation.value || 'Convention Center';

            // Update attendee name
            document.getElementById('previewAttendeeName').textContent = 
                attendeeName.value || 'John Doe';

            // Update pass type
            document.getElementById('previewPassType').textContent = 
                `${passType.value} PASS`;
        }

        // Add event listeners to all inputs
        [eventName, eventDateTime, eventLocation, attendeeName, passType].forEach(input => {
            input.addEventListener('input', updatePreview);
        });
    });
</script>
@endsection