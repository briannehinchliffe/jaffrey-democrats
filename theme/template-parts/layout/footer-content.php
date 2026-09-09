<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaffrey-democrats
 */

?>

<footer id="colophon" class="bg-primary text-white">
    <h2 class="sr-only"><?php esc_html_e( 'Footer', 'jaffrey-democrats' ); ?></h2>
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            <!-- Column 1: Branding & Socials -->
            <div class="md:col-span-1">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <aside role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'jaffrey-democrats' ); ?>">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Column 2: Navigation Menu 1 -->
            <div>
                <h3 class="text-white font-sans font-bold text-sm tracking-wider uppercase mb-4">
                    <?php esc_html_e( 'Quick Links', 'jaffrey-democrats' ); ?>
                </h3>

                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <nav aria-label="<?php esc_attr_e( 'Quick Links', 'jaffrey-democrats' ); ?>">
                        <?php
                        wp_nav_menu(
                                array(
                                        'theme_location' => 'footer',
                                        'menu_class'     => 'flex flex-col gap-2 list-none p-0 m-0 text-sm',
                                        'depth'          => 1,
                                        'fallback_cb'    => false,
                                )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>

            <!-- Column 3: Dynamic Sidebar / Get Involved -->
            <div>
                <h3 class="text-white font-sans font-bold text-sm tracking-wider uppercase mb-4">
                    <?php esc_html_e( 'Get Involved', 'jaffrey-democrats' ); ?>
                </h3>

                <?php if ( has_nav_menu( 'action' ) ) : ?>
                    <nav aria-label="<?php esc_attr_e( 'Get Involved', 'jaffrey-democrats' ); ?>">
                        <?php
                        wp_nav_menu(
                                array(
                                        'theme_location' => 'action',
                                        'menu_class'     => 'flex flex-col gap-2 list-none p-0 m-0 text-sm',
                                        'depth'          => 1,
                                        'fallback_cb'    => false,
                                )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>

            <!-- Column 4: Contact Info & Affiliate Box -->
            <div>
                <h3 class="text-white font-sans font-bold text-sm tracking-wider uppercase mb-4">
                    <?php esc_html_e( 'Contact', 'jaffrey-democrats' ); ?>
                </h3>
                <div class="flex flex-col gap-3">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin" style="color: rgb(168, 25, 46); margin-top: 3px; flex-shrink: 0;" aria-hidden="true" focusable="false">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span class="text-sm">
							Jaffrey, NH 03452<br>Cheshire County
						</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail" style="color: rgb(168, 25, 46); flex-shrink: 0;">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        <a href="mailto:info@jaffreydemocrats.org" class="text-sm no-underline hover:text-white hover:underline">
                            info@jaffreydemocrats.org
                        </a>
                    </div>
                </div>

                <div style="margin-top: 1.5rem; padding: 0.75rem; background-color: rgba(255, 255, 255, 0.05); border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.08);">
                    <p style="color: rgb(138, 167, 212); font-size: 0.8rem; margin-bottom: 0.4rem;">Affiliated with:</p>
                    <a href="https://nhdp.org" target="_blank" rel="noopener noreferrer" class="text-[#93b4e8] text-sm font-bold text-decoration-none hover:text-decoration-underline hover:text-[#93b4e8]">
                        NH Democratic Party (NHDP) &rarr;
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/10 mt-10 pt-6 flex flex-wrap justify-between items-center gap-2">
            <p class="text-[#93b4e8] text-sm">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.
            </p>
            <?php if ( has_nav_menu( 'privacy' ) ) : ?>
                <nav aria-label="<?php esc_attr_e( 'Privacy Menu', 'jaffrey-democrats' ); ?>">
                    <?php
                    wp_nav_menu(
                            array(
                                    'theme_location' => 'privacy',
                                    'menu_class'     => 'flex gap-4 text-sm text-[#93b4e8]',
                                    'depth'          => 1,
                                    'fallback_cb'    => false,
                            )
                    );
                    ?>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</footer><!-- #colophon -->