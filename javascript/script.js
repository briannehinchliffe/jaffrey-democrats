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

        // Collapse any open mobile submenus
        mobileMenu
            .querySelectorAll('.sub-menu.is-open')
            .forEach((sub) => sub.classList.remove('is-open'));
        mobileMenu
            .querySelectorAll('.submenu-toggle[aria-expanded="true"]')
            .forEach((btn) => btn.setAttribute('aria-expanded', 'false'));
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

    // Inject expand/collapse toggle buttons for mobile submenus
    document
        .querySelectorAll('#primary-menu-mobile > li.menu-item-has-children')
        .forEach((item) => {
            const link = item.querySelector(':scope > a');
            const subMenu = item.querySelector(':scope > .sub-menu');

            if (!link || !subMenu) return;

            const toggleBtn = document.createElement('button');
            toggleBtn.setAttribute('aria-expanded', 'false');
            toggleBtn.setAttribute('aria-label', 'Toggle submenu');
            toggleBtn.className = 'submenu-toggle';
            toggleBtn.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>';

            link.insertAdjacentElement('afterend', toggleBtn);

            toggleBtn.addEventListener('click', () => {
                const isOpen = subMenu.classList.contains('is-open');
                subMenu.classList.toggle('is-open', !isOpen);
                toggleBtn.setAttribute('aria-expanded', String(!isOpen));
            });
        });

    // Desktop dropdown: Escape collapses open submenu and returns focus to parent link
    document
        .querySelectorAll('#primary-menu .menu-item-has-children')
        .forEach((item) => {
            item.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    item.querySelector(':scope > a')?.focus();
                }
            });
        });
});
