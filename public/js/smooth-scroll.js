document.addEventListener('DOMContentLoaded', function() {
    // Get all navigation links with hash (#) in href
    const navLinks = document.querySelectorAll('.header__nav a[href^="#"]');
    
    // Add click event listener to each navigation link
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Prevent default anchor behavior
            e.preventDefault();
            
            // Get the target element from the href attribute
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            // If target element exists, scroll to it smoothly
            if (targetElement) {
                // Get header height to offset the scroll position
                const headerHeight = document.querySelector('.header').offsetHeight;
                
                // Calculate the target position with offset
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                // Scroll smoothly to the target
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update URL without reloading the page (optional)
                history.pushState(null, null, targetId);
            }
        });
    });
    
    // Handle initial page load with hash in URL
    if (window.location.hash) {
        setTimeout(function() {
            const targetElement = document.querySelector(window.location.hash);
            if (targetElement) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }, 100);
    }
});
