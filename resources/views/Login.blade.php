<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body> 
<nav class="navbar">
        <div class="logo">
            <a href="#">Hire<span class="highlight">Hub</span></a>
        </div>
        <ul class="nav-links">
            <li><a href="{{route('master')}}">Home</a></li>
            <li><a href="{{route('registerpage')}}">Register</a></li>
        </ul>
    </nav>
@if(session('message'))
        <div class="custom-alert" id="success-alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="page-wrapper">
        <div class="form-card">
            <div class="form-section">
                <h2 class="form-title">LOGIN TO YOUR ACCOUNT</h2>
                <form action="{{route('u.login')}}" method="POST">
                    @csrf
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                        <a href="#" class="forgot-link" onclick="openModal('modal-email'); return false;">Forgot Password?</a>
                    </div>
                    <button type="submit" class="login-button">LOGIN NOW</button>
                    <p class="alt-link">Don't have an account? <a href="{{route('registerpage')}}">Register here</a></p>
					<p class="alt-link"> <a href="{{route('Emp.register')}}">Register as employer</a></p>

                </form>
            </div>
            <div class="image-section">
                </div>
        </div>
    </div>

    <div id="modal-email" class="custom-modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">×</span>
            <h3 class="modal-title">Reset Your Password</h3>
            <p class="modal-text">Enter your account's email address to receive a verification code.</p>
            <form id="email-form" onsubmit="simulateEmailSubmit(event); return false;">
                @csrf
                <div class="input-field">
                    <label for="reset-email">Email Address</label>
                    <input type="email" id="reset-email"  name="email" required>
                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                     @enderror
                </div>
                <button type="submit" class="modal-button">SEND RESET CODE</button>
            </form>
        </div>
    </div>

    <div id="modal-otp" class="custom-modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">×</span>
            <h3 class="modal-title">Enter Verification Code</h3>
            <p class="modal-text">A 6-digit code has been sent to your email (e.g., user@example.com).</p>
            <form id="otp-form" onsubmit="simulateOtpSubmit(event); return false;">
                @csrf
                <input type="hidden" id="otp_email" name="otpemail" value="{{session()->get('email')}}">
                <div class="input-field">
                    <label for="reset-otp">Verification Code (OTP)</label>
                    <input type="text" id="reset-otp" name="otp" maxlength="6" required>
                </div>
                <button type="submit" class="modal-button">VERIFY CODE</button>
            </form>
        </div>
    </div>

    <div id="modal-reset" class="custom-modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">×</span>
            <h3 class="modal-title">Set New Password</h3>
            <p class="modal-text">Enter your new password below.</p>
            <form id="reset-password-form" onsubmit="simulatePasswordReset(event); return false;">
                @csrf
                <input type="hidden" id="reset_email" name="email" value="{{session()->get('email')}}">
                <div class="input-field">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new_password" required>
                </div>
                <div class="input-field">
                    <label for="confirm-new-password">Confirm Password</label>
                    <input type="password" id="confirm-new-password" name="confirmPassword" required>
                </div>
                <button type="submit" class="modal-button">RESET PASSWORD</button>
            </form>
        </div>
    </div>
	<script>
    // Pure JavaScript Method
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('success-alert');
        
        if (alert) {
            // Wait 3000 milliseconds (3 seconds) before starting the fade
            setTimeout(function() {
                // Add the 'faded' class to trigger the CSS fade-out effect
                alert.classList.add('faded');
                
                // After the fade transition is complete (0.5s), remove the element entirely
                // This ensures the element is gone from the page layout
                setTimeout(function() {
                    alert.remove();
                }, 500); // This delay must match the CSS transition duration (0.5s)
            }, 3000); // 3-second initial delay
        }
    });


    /**
 * Utility function to open a specific modal.
 * @param {string} id - The ID of the modal element to open (e.g., 'modal-email').
 */
function openModal(id) {
    // 1. Close any currently open modal first
    closeModal(); 
    
    // 2. Open the requested modal
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.add('is-open');
    }
}

/**
 * Utility function to close all modals.
 */
function closeModal() {
    const modals = document.querySelectorAll('.custom-modal');
    modals.forEach(modal => {
        modal.classList.remove('is-open');
    });
}


// --- STEP SIMULATION FUNCTIONS ---

function simulateEmailSubmit(event) {
    // The event object is passed here from the HTML's 'onsubmit'
    event.preventDefault(); // Stop default form submission
    
    const form = $('#email-form');
    const submitButton = form.find('.modal-button'); // Get the button within the form

    // Safety check to prevent rapid double-clicking
    if (submitButton.prop('disabled')) {
        return; 
    }

    // 1. Disable the button immediately
    submitButton.prop('disabled', true).text('SENDING...'); 
    form.find('.text-danger').remove(); // Clear previous errors
    
    jQuery.ajax({
        url: "{{ route('password.send_otp') }}",
        data: form.serialize(),
        type: 'POST',
        
        success: function(result) {
            closeModal(); 

            openModal('modal-otp');
            // Use the success message from the backend for the alert
            alert(result.success || "Verification code sent successfully!"); 
        },
        
        error: function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                jQuery.each(errors, function(key, value) {
                    // Display the errors (value[0] or just value if backend uses simple string)
                    jQuery(`[name="${key}"]`).after(`<span class="text-danger small mt-1">${value[0] || value}</span>`);
                });
            } else {
                alert('An unexpected error occurred. Please try again.');
            }
        },
        
        complete: function() {
            // 2. Re-enable the button regardless of success or failure
            submitButton.prop('disabled', false).text('SEND RESET CODE');
        }
    });
}     

function simulateOtpSubmit(event) {
    // Ensure the default form submission is prevented
    event.preventDefault(); 
    
    // Use the correct ID: #otp-form
    const form = $('#otp-form');
    const submitButton = form.find('.modal-button');
    
    // Safety check to prevent rapid double-clicking
    if (submitButton.prop('disabled')) {
        return; 
    }

    // 1. Disable the button and show loading state
    submitButton.prop('disabled', true).text('VERIFYING...'); 
    form.find('.text-danger').remove(); // Clear previous errors

    jQuery.ajax({
        // Ensure this route is correct in your Laravel web.php
        url: "{{ route('password.otp_varify') }}", 
        data: form.serialize(),
        type: 'POST', 
        
        success: function(result) {
            // OTP is verified (HTTP 200).
            closeModal(); 
            openModal('modal-reset'); // Move to the password reset modal
            // alert(result.success || "Code verified. Please set your new password.");
            // You might want a better UX than a simple alert here, 
            // but this confirms the success path is working.
        },
        
        error: function(xhr) {
            // Re-enable button on error
            submitButton.prop('disabled', false).text('VERIFY CODE');

            if (xhr.status === 422) {
                // Laravel Validation Errors (e.g., OTP is incorrect, 422 Unprocessable Entity)
                let errors = xhr.responseJSON.errors;
                
                jQuery.each(errors, function(key, value) {
                    // Display the errors next to their fields
                    jQuery(`[name="${key}"]`).after(`<span class="text-danger small mt-1">${value[0]}</span>`);
                });
            } else {
                alert('An unexpected error occurred during verification. Please check your code and try again.');
            }
        }
        // NOTE: complete function is not needed here as 'error' branch re-enables the button,
        // and 'success' branch moves to the next step immediately.
    });
}

function simulatePasswordReset(event) {
    event.preventDefault(); // Stop default form submission
    
    // Clear previous errors before a new submission
    jQuery('#reset-password-form').find('.text-danger').remove();
    
    jQuery.ajax({
        url: "{{ route('password.reset') }}",
        data: jQuery('#reset-password-form').serialize(),
        type: 'POST', // Use POST method explicitly
        
        success: function(result) {
            closeModal(); 
           alert("Password reset successfully!");
        },
        
        error: function(xhr) {
            if (xhr.status === 422) {
                // Laravel Validation Errors (422 Unprocessable Entity)
                let errors = xhr.responseJSON.errors;
                
                // Display the errors next to their fields
                jQuery.each(errors, function(key, value) {
                    // Find the input by its name attribute and append the error
                    jQuery(`[name="${key}"]`).after(`<span class="text-danger small mt-1">${value[0]}</span>`);
                });
            } else if (xhr.status === 404) {
                // Not Found (e.g., The email route is incorrect)
                 alert('Error: The verification route was not found.');
            } else {
                // General Server Error
                alert('An unexpected server error occurred. Please try again.');
            }
        }
    });
    
    closeModal();
    alert("Password successfully reset! You can now log in.");
    
    document.getElementById('email-form').reset();
    document.getElementById('otp-form').reset();
    document.getElementById('reset-password-form').reset();
}
</script>
</body>
</html>