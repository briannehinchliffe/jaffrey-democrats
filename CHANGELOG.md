# Changelog

All notable changes to the **Jaffrey Democrats** WordPress theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.4.0] - 2026-11-22

### Added

- Custom `searchform.php` supporting `hero` and `card` layout variants across search and 404 templates.
- `template-parts/content/content-search.php` partial displaying post-type badges, publish dates, excerpts, and links for search results.
- "Recent updates from Jaffrey" post grid on `404.php` to surface recent news above the bottom CTA banner.
- Clickable suggested search topic chips and empty/no-results fallback states in `search.php`.

### Changed

- Redesigned `404.php` with a two-column hero layout, embedded search card with popular page shortcuts, and community CTA banner.
- Updated `search.php` with a navy hero header, result count bar, clear-search action, and styled pagination.

## [1.3.0] - 2026-10-07

### Changed

- Font setup for optimization and site speed.

## [1.2.0] - 2026-10-04

### Changed

- Header button structure to be a Button Menu so it can be edited in Menus and keep flex spacing.

## [1.1.1] - 2026-09-20

### Added

- Utility class `.column-break-wide` to change breakpoint for column block wrapping.

## [1.1.0] - 2026-09-30

### Added

- Secondary option for the countdown block to display day count only.

## [1.0.1] - 2026-09-29

### Added

- Leaflet Landing Page mobile navigation styling.
- Theme Screenshot.

## [1.0.0] - 2026-09-27

### Added

- Brand colors and font families to `theme.json`.
- New nav menu locations registered: `primary`, `footer`, `action`, and `privacy`.
- Button variations for `fill-red` and `fill-opaque`.
- Countdown custom block.
- Multiple gradient color options.
- `jaffrey_democrats_page_title` function to display H1s within block content.
- Donate button to header.
- Custom gradient border to candidate cards.
- Lead paragraph styles.
- External link icon with class.
- List styles for `ul` and `li`.
- Leaflet Landing Page Template and styles

### Changed

- Header structure and styles updated to match the design.
- Footer structure and styles updated to match the design.
- Heading font weights.
- Button font color.

### Removed

- Functionality to limit block editor heading levels to Tailwind Typography.
