<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaffrey-democrats
 */

?>

<header id="masthead" class="fixed top-0 right-0 left-0 z-50 bg-white/97 backdrop-blur-sm transition-all duration-300">
    <div class="mx-auto max-w-content px-5 lg:px-10">
        <div class="flex h-20 items-center justify-between md:h-30">
            <?php
            the_custom_logo();

            // If there is a custom logo, use the screen-reader-text class to hide the site title.
            $title_class = has_custom_logo() ? 'site-title screen-reader-text' : 'site-title';

            if ( is_front_page() ) :
                ?>
                <h1 class="<?php echo esc_attr( $title_class ); ?>">
                    <a class="flex-shrink-0" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            <?php else : ?>
                <p class="<?php echo esc_attr( $title_class ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
                    </a>
                </p>
            <?php endif; ?>
            <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
                <nav class="hidden items-center gap-8 md:flex" aria-label="<?php esc_attr_e( 'Primary Menu', 'jaffrey-democrats' ); ?>">
                    <?php
                    wp_nav_menu(
                            array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'container'      => false,
                                    'menu_class'     => 'flex items-center gap-8',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'          => 2,
                            )
                    );
                    ?>
                </nav>
                <a href="/get-involved" class="btn-menu">Donate</a>

                <!-- Mobile Menu Toggle Button -->
                <button id="menu-toggle" class="p-2 text-background focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary focus-visible:ring-offset-2 focus-visible:ring-offset-white md:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="<?php echo esc_attr__( 'Toggle menu', 'jaffrey-democrats' ); ?>">
                    <!-- Hamburger Icon (Visible by default) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu menu-icon block"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
                    <!-- Close X Icon (Hidden by default) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x close-icon hidden"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
        <!-- Mobile Menu Panel (Hidden by default) -->
        <nav id="mobile-menu" class="border-border hidden border-t bg-white md:hidden" aria-label="<?php esc_attr_e( 'Mobile Menu', 'jaffrey-democrats' ); ?>">
            <?php
            wp_nav_menu(
                    array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu-mobile',
                            'container'      => false,
                            'menu_class'     => 'px-5 py-4 flex flex-col gap-4',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'          => 2,
                    )
            );
            ?>
        </nav>
    <?php endif; ?>
</header><!-- #masthead -->