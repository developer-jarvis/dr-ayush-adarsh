/**
 * Form Handler Script
 * Handles all form submissions and redirects to WhatsApp
 */

document.addEventListener('DOMContentLoaded', function() {
    // Get all forms on the page
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        // Check if form has appointment/contact fields
        if (form.querySelector('[name="name"]') || form.querySelector('[name="phone"]')) {
            form.addEventListener('submit', handleFormSubmit);
        }
    });
});

async function handleFormSubmit(e) {
    e.preventDefault();

    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;

    try {
        // Change button to loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner"></i> Processing...';

        // Get form data
        const formData = new FormData(form);

        // Send to WhatsApp handler
        const response = await fetch('common/form-handler.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            // Show success message
            showNotification('Redirecting to WhatsApp...', 'success');

            // Redirect to WhatsApp after 1 second
            setTimeout(() => {
                window.open(data.whatsapp_url, '_blank');
                
                // Reset form
                form.reset();
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }, 1000);
        } else {
            throw new Error(data.error || 'An error occurred');
        }
    } catch (error) {
        console.error('Form submission error:', error);
        showNotification(error.message || 'Failed to process form. Please try again.', 'error');

        // Reset button
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    }
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `form-notification form-notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fa-solid fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        </div>
    `;

    // Add to body
    document.body.appendChild(notification);

    // Trigger animation
    setTimeout(() => notification.classList.add('show'), 10);

    // Remove after 4 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 4000);
}

/**
 * Call button handler - calls clinic
 */
function initCallButton() {
    const callButtons = document.querySelectorAll('.call-me-btn');
    callButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Check if it's a tel: link (mobile)
            if (this.href.startsWith('tel:')) {
                // Let browser handle it
                return true;
            }
        });
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', initCallButton);
