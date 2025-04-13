function toggleMenu() {
    const mobileNav = document.getElementById('mobile-nav');
    const hamburger = document.getElementById('hamburger');
    
    // Toggle menu visibility
    mobileNav.classList.toggle('top-4');
    // mobileNav.classList.toggle('-top-20');
    
    // Animate hamburger icon
    hamburger.classList.toggle('menu-open');
}