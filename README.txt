=== Advanced Error Logger ===
Contributors: Constantinescu Valentin
Tags: error logging, PHP, auto-fix
Requires at least: 5.0
Tested up to: 6.2
Requires PHP: 7.2
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

The Advanced Error Logger plugin is designed to capture and attempt to automatically resolve errors directly on your WordPress site. It supports errors in PHP, JavaScript, JSON, CSS, HTML, and Angular. The plugin displays errors in a user-friendly manner and provides options for automatic resolution or removal of problematic code lines.

=== Features ===
* **Error Capture:** Captures and displays PHP errors directly on the page.
* **Automatic Resolution:** Attempts to automatically fix common errors.
* **Error Removal:** Removes problematic lines of code if automatic resolution fails.
* **User-Friendly Interface:** Displays error details with a "Fix Error" button for easy resolution.
* **Support for Multiple Languages:** Handles PHP errors and provides a basic framework for other languages.

== Installation ==

1. Download the plugin files.
2. Upload the `advanced-error-logger` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin from the 'Plugins' menu in WordPress.

== Usage ==

1. **Activate the Plugin:** Ensure the plugin is activated from the WordPress admin panel.
2. **Introduce Errors for Testing:** Introduce errors into your theme or plugin files for testing. Examples:
   ```php
   // Example of a PHP error
   echo $undefined_variable; // Undefined variable

   // Example of a syntax error
   echo "Hello;

   The Advanced Error Logger plugin provides a way to quickly identify and resolve simple PHP errors directly on your WordPress site. By capturing PHP errors, displaying them on the page, and offering a mechanism to automatically fix or remove problematic code lines, it helps streamline the debugging process. However, it is primarily intended for simpler errors and may not resolve more complex issues or errors in other programming languages.