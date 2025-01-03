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
        background: #7749F8; /* Default color */
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

    .accordion-button {
        background-color: #f8f9fc;
        color: #344054;
        font-weight: 600;
        padding: 14px 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .accordion-button:hover {
        background-color: #f0f3f8;
    }

    .accordion-button:focus {
        box-shadow: none;
        outline: none;
    }

    .accordion-button:not(.collapsed) {
        background-color: #7749F8;
        color: white;
    }

    .accordion-item {
        border: none;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .accordion-body {
        background-color: #f8f9fc;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    }

    .form-section {
        background: #f8f9fc;
        border-radius: 12px;
        padding: 24px;
    }

    .accordion-header {
        padding: 0;
    }
    .search-input-group {
        width: 500px;
        margin-top: 2px
    }

    .search-input-group .form-control {
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        outline: 1px solid #7749F8
    }

    .search-input-group .input-group-text {
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        outline: 1px solid #7749F8; /
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- Event Pass Title -->
                <h2 class="m-0 fw-bold" style="letter-spacing: 1.5px; text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); color: #7749F8; font-size: 28px;">
                    Event Pass
                </h2>
    
                <!-- Search Input -->
                <div class="d-flex align-items-center" style="max-width: 500px; width: 100%;">
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control rounded-pill shadow-sm border-light" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" style="height: 45px;">
                        <span class="input-group-text bg-light border-light shadow-sm rounded-pill" id="search-addon" style="cursor: pointer; padding: 0 20px; height: 45px;">
                            <i class="fas fa-search" style="color: #7749F8;"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="accordion-iteam">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button rounded-3 shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Create Event Pass
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-sm border-light">
                                <div class="card-body">
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
                                            <input type="file" class="form-control" id="heroImageUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right Column - Preview Card -->
                        <div class="col-md-4">
                            <div class="preview-card" id="previewCard">
                                <!-- First Line: Logo and Organizer Name -->
                                <div class="d-flex align-items-center mb-3">
                                    <img id="previewLogo" src="" alt="Logo" class="rounded-circle" width="50" height="50">
                                    <h5 id="previewOrganizerName" class="ms-3 mb-0">Organizer Name</h5>
                                </div>
                                
                                <!-- Horizontal Line -->
                                <hr>
                        
                                <!-- Second Line: Venue -->
                                <div class="mb-2">
                                    <h6><strong></strong> <span id="previewVenue">Convention Center</span></h6>
                                </div>
                        
                                <!-- Third Line: Event Name -->
                                <div class="mb-4">
                                    <h6><strong></strong> <span id="previewEventName">Tech Conference 2024</span></h6>
                                </div>
                        
                                <!-- Fourth Line: Date and Time -->
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h6><strong>Date</strong></h6>
                                        <span id="previewDate">January 15, 2024</span>
                                    </div>
                                    <div class="col-4 offset-md-4">
                                        <h6><strong>Time</strong></h6>
                                        <span id="previewTime">10:00 AM</span>
                                    </div>
                                </div>
                        
                                <!-- Fifth Line: Gate, Section, Row -->
                                <div class="row mb-3" id="seatDetailsRow" style="display: none;">
                                    <div class="col-md-4">
                                        <h6><strong>Gate</strong></h6>
                                        <span id="previewGate">1</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6><strong>Section</strong></h6>
                                        <span id="previewSection">A</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6><strong>Seat/Row</strong></h6>
                                        <span id="previewSeatRow">5</span>
                                    </div>
                                </div>
                        
                                <!-- Barcode (if provided) -->
                                <div class="mb-3" id="barcodePreview" style="display: none;">
                                    <h6><strong>Barcode:</strong></h6>
                                    <img id="barcodeImage" src="" alt="Barcode" class="w-50 img-fluid">
                                </div>
                        
                                <!-- Hero Image -->
                                <div class="mb-3">
                                    <h6><strong>Hero Image:</strong></h6>
                                    <img id="heroImagePreview" src="" alt="Hero Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button class="btn btn-outline-primary rounded-pill px-4 py-2" style="font-weight: 600;">
                                    <i class="fas fa-plus me-2"></i> Save Pass
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item mt-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed rounded-3 shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="d-flex w-100 justify-content-between align-items-center">
                    
                    <!-- Left side content (Event Name, Event Location) -->
                    <div class="d-flex">
                      <span class="me-4" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event Name">Event Name:Schedule Reminder Test</span>
                      <span class="me-4" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event Location">Event Location: Royal Global University</span>
                    </div>
                    
                    <!-- Right side content (Start Date, End Date, Status, and Button) -->
                    <div class="d-flex align-items-center">
                      <span class="me-3" style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event Start Date">Start Date: 12Feb 2024</span>
                      <span class="me-3" style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event End Date">End Date: 16Feb 2024</span>
                      
                      <!-- Button to redirect user -->
                    </div>
                    
                  </div>
                </button>
            </h2>
              
              
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-sm border-light">
                                <div class="card-body">
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
                                            <input type="file" class="form-control" id="heroImageUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <!-- Right Column - Preview Card -->
                        <div class="col-md-4">
                            <div class="preview-card" id="previewCard">
                                <!-- First Line: Logo and Organizer Name -->
                                <div class="d-flex align-items-center mb-3">
                                    <img id="previewLogo" src="" alt="Logo" class="rounded-circle" width="50" height="50">
                                    <h5 id="previewOrganizerName" class="ms-3 mb-0">Organizer Name</h5>
                                </div>
                                
                                <!-- Horizontal Line -->
                                <hr>
                        
                                <!-- Second Line: Venue -->
                                <div class="mb-3">
                                    <h6><strong></strong> <span id="previewVenue">Convention Center</span></h6>
                                </div>
                        
                                <!-- Third Line: Event Name -->
                                <div class="mb-3">
                                    <h6><strong></strong> <span id="previewEventName">Tech Conference 2024</span></h6>
                                </div>
                        
                                <!-- Fourth Line: Date and Time -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6><strong>Date:</strong> <span id="previewDate">January 15, 2024</span></h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Time:</strong> <span id="previewTime">10:00 AM</span></h6>
                                    </div>
                                </div>
                        
                                <!-- Fifth Line: Gate, Section, Row -->
                                <div class="row mb-3" id="seatDetailsRow" style="display: none;">
                                    <div class="col-md-4">
                                        <h6><strong>Gate:</strong> <span id="previewGate">1</span></h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6><strong>Section:</strong> <span id="previewSection">A</span></h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6><strong>Seat/Row:</strong> <span id="previewSeatRow">5</span></h6>
                                    </div>
                                </div>
                        
                                <!-- Barcode (if provided) -->
                                <div class="mb-3" id="barcodePreview" style="display: none;">
                                    <h6><strong>Barcode:</strong></h6>
                                    <img id="barcodeImage" src="" alt="Barcode" class="img-fluid">
                                </div>
                        
                                <!-- Hero Image -->
                                <div class="mb-3">
                                    <h6><strong>Hero Image:</strong></h6>
                                    <img id="heroImagePreview" src="" alt="Hero Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button class="btn btn-outline-primary rounded-pill px-4 py-2" style="font-weight: 600;">
                                    <i class="fas fa-plus me-2"></i> Update Pass
                                </button>
                                <a href="https://pay.google.com/gp/v/save/eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJsYy13YWxsZXRAbGV0cy1jYWxlbmRhci1tYW5vbWF5LmlhbS5nc2VydmljZWFjY291bnQuY29tIiwiYXVkIjoiZ29vZ2xlIiwib3JpZ2lucyI6WyJ3d3cuZXhhbXBsZS5jb20iXSwidHlwIjoic2F2ZXRvYW5kcm9pZHBheSIsInBheWxvYWQiOnsiZXZlbnRUaWNrZXRDbGFzc2VzIjpbeyJhbGxvd011bHRpcGxlVXNlcnNQZXJPYmplY3QiOm51bGwsImNvbmZpcm1hdGlvbkNvZGVMYWJlbCI6bnVsbCwiY291bnRyeUNvZGUiOm51bGwsImVuYWJsZVNtYXJ0VGFwIjpudWxsLCJldmVudElkIjpudWxsLCJnYXRlTGFiZWwiOm51bGwsImhleEJhY2tncm91bmRDb2xvciI6IiM1QkJDRkYiLCJpZCI6IjMzODgwMDAwMDAwMjIzMzIzODguVVkyVzlBTzFuZU1CTXNRZ1BiYUsiLCJpc3N1ZXJOYW1lIjoiTGV0J3MgQ2FsZW5kYXIiLCJraW5kIjpudWxsLCJtdWx0aXBsZURldmljZXNBbmRIb2xkZXJzQWxsb3dlZFN0YXR1cyI6bnVsbCwibm90aWZ5UHJlZmVyZW5jZSI6bnVsbCwicmVkZW1wdGlvbklzc3VlcnMiOm51bGwsInJldmlld1N0YXR1cyI6IlVOREVSX1JFVklFVyIsInJvd0xhYmVsIjpudWxsLCJzZWF0TGFiZWwiOm51bGwsInNlY3Rpb25MYWJlbCI6bnVsbCwidmVyc2lvbiI6bnVsbCwidmlld1VubG9ja1JlcXVpcmVtZW50IjpudWxsLCJldmVudE5hbWUiOnsia2luZCI6bnVsbCwiZGVmYXVsdFZhbHVlIjp7ImtpbmQiOm51bGwsImxhbmd1YWdlIjoiZW4tVVMiLCJ2YWx1ZSI6IlNjaGVkdWxlIFJlbWluZGVyIFRlc3QifX0sImRhdGVUaW1lIjp7ImRvb3JzT3BlbiI6bnVsbCwiZG9vcnNPcGVuTGFiZWwiOm51bGwsImVuZCI6bnVsbCwia2luZCI6bnVsbCwic3RhcnQiOiIyMDI0LTEyLTMxVDEyOjAwOjAwKzAwOjAwIn0sImxvZ28iOnsia2luZCI6bnVsbCwic291cmNlVXJpIjp7ImRlc2NyaXB0aW9uIjpudWxsLCJ1cmkiOiJodHRwczovL3BhbmVsLmxldHNjYWxlbmRhci5jb20vc3RvcmFnZS9pbWFnZXMvaHp1VDFJb0c3RGRiS3pGNTB4U0NUcjE0OGV2Q0Q1YTBPY1hYZm5IUi5wbmcifX0sImhlcm9JbWFnZSI6eyJraW5kIjpudWxsLCJzb3VyY2VVcmkiOnsiZGVzY3JpcHRpb24iOm51bGwsInVyaSI6Imh0dHBzOi8vcGFuZWwubGV0c2NhbGVuZGFyLmNvbS9zdG9yYWdlL2ltYWdlcy8yZ3ZMbnEyS0tNd01jaG1seHVnS3VuSEM0b29ZSjl5bVE3b2pMM3AyLmpwZyJ9fX1dLCJldmVudFRpY2tldE9iamVjdHMiOlt7ImNsYXNzSWQiOiIzMzg4MDAwMDAwMDIyMzMyMzg4LlVZMlc5QU8xbmVNQk1zUWdQYmFLIiwiZGlzYWJsZUV4cGlyYXRpb25Ob3RpZmljYXRpb24iOm51bGwsImhhc0xpbmtlZERldmljZSI6bnVsbCwiaGFzVXNlcnMiOm51bGwsImhleEJhY2tncm91bmRDb2xvciI6bnVsbCwiaWQiOiIzMzg4MDAwMDAwMDIyMzMyMzg4LmFxZXdoYndZRnF1NE9pTVduV2NDIiwia2luZCI6bnVsbCwibGlua2VkT2JqZWN0SWRzIjpudWxsLCJsaW5rZWRPZmZlcklkcyI6bnVsbCwibm90aWZ5UHJlZmVyZW5jZSI6bnVsbCwic21hcnRUYXBSZWRlbXB0aW9uVmFsdWUiOm51bGwsInN0YXRlIjoiQUNUSVZFIiwidGlja2V0SG9sZGVyTmFtZSI6bnVsbCwidGlja2V0TnVtYmVyIjpudWxsLCJ2ZXJzaW9uIjpudWxsfV19fQ.w8Wai3ZP-0UAphHEWkVPrCSkMniZixcuZsQegXE8pDlFxxAkg_eiSJ9wt1mVrvrojVUYqcpVnDA-U4JptpvZaB1SXRbSI_a4-MXLaRKJQRpfLjk-eulFSMNl-QIfPHB6yq3THMEEy9WrAcYG-e3tmHK5rdcRdw9kxaSO3gfGioKR0N_v8u837IRpp87uCF6iaay9XKceptII0R8pKrSSts4davXusCq5f03JVFlo_BNKm25GNiwLdyP0DVKI2q7lkKmiU_nsrBOgech_KZx7vDSlWF6wcekvw4QXAvm5nIpCq45wDJ5TA3SNP8Tv3fwe15-qKWO0QL_H1eqwLCxz8A" target="_blank">
                                    <button class="btn btn-outline-primary rounded-pill px-4 py-2 ml-3" style="font-weight: 600;">
                                        <i class="fas fa-eye me-2"></i> Preview Pass
                                    </button>
                                </a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item mt-3">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <div class="d-flex">
                    <span class="me-4" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event Name">Event Name: Toyota Material Handling</span>
                    <span class="me-4" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event Location">Event Location: Lokhra Gueahati</span>
                </div>
                
                <!-- Right side content (Start Date, End Date, Status) -->
                <div class="d-flex">
                    <span class="me-3" style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event Start Date">Start Date: 12Fab 2024</span>
                    <span class="me-3" style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="Event End Date">End Date: 16 Fab 2024</span>
                    <span class="badge bg-success text-light">Active</span>
                </div>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-sm border-light">
                                <div class="card-body">
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
                                            <input type="file" class="form-control" id="heroImageUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right Column - Preview Card -->
                        <div class="col-md-4">
                            <div class="preview-card" id="previewCard">
                                <!-- First Line: Logo and Organizer Name -->
                                <div class="d-flex align-items-center mb-3">
                                    <img id="previewLogo" src="" alt="Logo" class="rounded-circle" width="50" height="50">
                                    <h5 id="previewOrganizerName" class="ms-3 mb-0">Organizer Name</h5>
                                </div>
                                
                                <!-- Horizontal Line -->
                                <hr>
                        
                                <!-- Second Line: Venue -->
                                <div class="mb-3">
                                    <h6><strong></strong> <span id="previewVenue">Convention Center</span></h6>
                                </div>
                        
                                <!-- Third Line: Event Name -->
                                <div class="mb-3">
                                    <h6><strong></strong> <span id="previewEventName">Tech Conference 2024</span></h6>
                                </div>
                        
                                <!-- Fourth Line: Date and Time -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6><strong>Date:</strong> <span id="previewDate">January 15, 2024</span></h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Time:</strong> <span id="previewTime">10:00 AM</span></h6>
                                    </div>
                                </div>
                        
                                <!-- Fifth Line: Gate, Section, Row -->
                                <div class="row mb-3" id="seatDetailsRow" style="display: none;">
                                    <div class="col-md-4">
                                        <h6><strong>Gate:</strong> <span id="previewGate">1</span></h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6><strong>Section:</strong> <span id="previewSection">A</span></h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6><strong>Seat/Row:</strong> <span id="previewSeatRow">5</span></h6>
                                    </div>
                                </div>
                        
                                <!-- Barcode (if provided) -->
                                <div class="mb-3" id="barcodePreview" style="display: none;">
                                    <h6><strong>Barcode:</strong></h6>
                                    <img id="barcodeImage" src="" alt="Barcode" class="img-fluid">
                                </div>
                        
                                <!-- Hero Image -->
                                <div class="mb-3">
                                    <h6><strong>Hero Image:</strong></h6>
                                    <img id="heroImagePreview" src="" alt="Hero Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button class="btn btn-outline-primary rounded-pill px-4 py-2" style="font-weight: 600;">
                                    <i class="fas fa-plus me-2"></i> Update Pass
                                </button>
                                <button class="btn btn-outline-primary rounded-pill px-4 py-2 ml-3" style="font-weight: 600;">
                                    <i class="fas fa-eye me-2"></i> Preview Pass
                                </button>
                            </div>
                        </div>
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
    // Set up the color picker modal button event listener
    document.getElementById('colorPickerButton').addEventListener('click', function() {
        const modal = new bootstrap.Modal(document.getElementById('colorPickerModal'));
        modal.show();
    });
    // Function to update preview card
    function updatePreviewCard() {
        // Logo and Organizer
        const logoInput = document.getElementById('imageUpload');
        const logoPreview = document.getElementById('previewLogo');
        if (logoInput.files.length > 0) {
            const logoURL = URL.createObjectURL(logoInput.files[0]);
            logoPreview.src = logoURL;
        }

        const organizerName = document.getElementById('organizationName').value;
        document.getElementById('previewOrganizerName').innerText = organizerName;

        // Venue
        const venue = document.getElementById('eventVenue').value;
        document.getElementById('previewVenue').innerText = venue;

        // Event Name
        const eventName = document.getElementById('eventName').value;
        document.getElementById('previewEventName').innerText = eventName;

        // Date & Time
        const eventDate = document.getElementById('eventDate').value;
        document.getElementById('previewDate').innerText = eventDate;

        const eventTime = document.getElementById('eventTime').value;
        document.getElementById('previewTime').innerText = eventTime;

        // Gate, Section, Seat/Row
        const gate = document.getElementById('gate').value;
        const section = document.getElementById('section').value;
        const seatRow = document.getElementById('seatRow').value;

        if (gate || section || seatRow) {
            document.getElementById('seatDetailsRow').style.display = 'flex';
            document.getElementById('previewGate').innerText = gate;
            document.getElementById('previewSection').innerText = section;
            document.getElementById('previewSeatRow').innerText = seatRow;
        }

        // Barcode
        const barcodeInput = document.getElementById('barcode');
        const barcodePreview = document.getElementById('barcodePreview');
        if (barcodeInput.files.length > 0) {
            const barcodeURL = URL.createObjectURL(barcodeInput.files[0]);
            barcodePreview.style.display = 'block';
            document.getElementById('barcodeImage').src = barcodeURL;
        } else {
            barcodePreview.style.display = 'none';
        }

        // Hero Image
        const heroImageInput = document.getElementById('heroImageUpload');
        const heroImagePreview = document.getElementById('heroImagePreview');
        if (heroImageInput.files.length > 0) {
            const heroImageURL = URL.createObjectURL(heroImageInput.files[0]);
            heroImagePreview.src = heroImageURL;
        }
    }
    // Color Change for Card
    document.getElementById('saveColorButton').addEventListener('click', function() {
        const colorPicker = document.getElementById('colorPicker');
        const selectedColor = colorPicker.value;

        // Change the preview card's background color to the selected color
        document.getElementById('previewCard').style.background = selectedColor;

        // Close the modal after saving the color
        const modal = bootstrap.Modal.getInstance(document.getElementById('colorPickerModal'));
        modal.hide();

        // Set the hex value to the input field
        document.getElementById('hexCode').value = selectedColor;
    });
    // Call this function on input change
    document.querySelectorAll('#imageUpload, #organizationName, #eventVenue, #eventName, #eventDate, #eventTime, #gate, #section, #seatRow, #barcode, #heroImageUpload').forEach((element) => {
        element.addEventListener('input', updatePreviewCard);
    });

</script>
@endsection