# Hyvoxa WordPress Theme

## Installation

1. Upload the `hyvoxa` folder to `/wp-content/themes/` via FTP, or
2. Zip the `hyvoxa` folder and upload it via Appearance > Themes > Add New > Upload Theme.
3. Activate the theme through the Appearance > Themes menu in WordPress.

## What Happens on Activation

When you activate Hyvoxa, the theme automatically creates:
- All 6 service pages (Intelligent Lighting, Climate Automation, Security & Surveillance, Home Entertainment, Voice & App Control, Outdoor & Garden)
- 6 blog posts with full SEO-optimized content
- 5 legal documents (Privacy Policy, Terms of Service, Cookie Policy, Disclaimer, Refund Policy)
- About, Contact, Blog, and Home pages
- A primary navigation menu with all main links
- Sets the site title to "Hyvoxa" and tagline accordingly

All content is created as WordPress custom post types (Services and Legal) and standard posts (Blog), so you can edit everything from the WordPress admin.

## Custom Post Types

- **Services** (`hyvoxa_service`): Custom post type for service pages with structured metadata (benefits, features, process, FAQs)
- **Legal** (`hyvoxa_legal`): Custom post type for legal documents

## Editing Content

### Services
Navigate to Services in the WordPress admin sidebar. Each service stores its structured data (benefits, features, process steps, FAQs) as post meta, which the template renders automatically. The main content editor holds the intro text and formatted content.

### Blog Posts
Blog posts use the standard WordPress post editor. The theme stores category, read time, and author as custom meta fields. Featured images are automatically set from the bundled images on activation.

### Legal Documents
Legal documents store their sectioned content (heading + body paragraphs) as structured post meta, rendered through the legal template with a sidebar navigation.

## Theme Features

- Fully responsive design (mobile, tablet, desktop)
- Scroll-reveal animations via IntersectionObserver
- Animated SVG hero illustration
- Animated stat counters
- FAQ accordion (single-open behavior per group)
- Blog category filtering and live search
- Sticky glass-morphism navbar
- SEO meta descriptions on every page
- Custom color system matching the Hyvoxa brand
- Google Fonts (Plus Jakarta Sans + Space Grotesk)
- Custom WordPress menu support
- Post thumbnails / featured images
- HTML5 support
- Translation-ready (text domain: hyvoxa)

## Color Palette

| Name            | Hex       |
|-----------------|-----------|
| Gunmetal        | #2e3532   |
| Dark Amaranth   | #8b2635   |
| Soft Linen      | #e0e2db   |
| Dust Grey       | #d2d4c8   |
| Tea Green       | #d3efbd   |

## Contact

Email: hyvoxa@gmail.com

## Requirements

- WordPress 6.0+
- PHP 7.4+
