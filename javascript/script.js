/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (!toggleButton || !mobileMenu) return;

    const menuIcon = toggleButton.querySelector('.menu-icon');
    const closeIcon = toggleButton.querySelector('.close-icon');

    const closeMenu = () => {
        toggleButton.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.add('hidden');
        menuIcon.classList.replace('hidden', 'block');
        closeIcon.classList.replace('block', 'hidden');
        toggleButton.focus();
    };

    toggleButton.addEventListener('click', () => {
        // Check current status
        const isExpanded =
            toggleButton.getAttribute('aria-expanded') === 'true';

        // Update accessibility attributes
        toggleButton.setAttribute('aria-expanded', !isExpanded);

        // Toggle the visibility of the menu container itself
        mobileMenu.classList.toggle('hidden');

        // Swap out the icons
        if (isExpanded) {
            // Menu closed: show burger, hide X
            menuIcon.classList.replace('hidden', 'block');
            closeIcon.classList.replace('block', 'hidden');
        } else {
            // Menu opened: hide burger, show X
            menuIcon.classList.replace('block', 'hidden');
            closeIcon.classList.replace('hidden', 'block');
        }
    });

    document.addEventListener('keydown', (e) => {
        if (
            e.key === 'Escape' &&
            toggleButton.getAttribute('aria-expanded') === 'true'
        ) {
            closeMenu();
        }
    });
});
