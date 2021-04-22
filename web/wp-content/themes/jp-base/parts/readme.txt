# What are parts?

Template parts are reusable sections of code that you need to include in different parts of your theme.

Parts are loaded with the WordPress function `get_template_part()`, like the proper way to `include` files for WP sites.

More info - https://developer.wordpress.org/reference/functions/get_template_part/

# How we use parts

Keep part files in the `parts` folder, and name them carefully. Use camelcase and name them after the part's purpose (hopefully after the main class name used in the markup/CSS).

Part files should do one thing that needs to be repeated or used on multiple template files. Use parts instead of copying/pasting the same code snippet in multiple places.

Parts are used to maintain code using DRY principles. If you are unfamiliar with DRY, google search for "DRY coding principles".

# How to include parts

Using `get_template_part( 'parts/pagination' );` makes it easy to output the pagination wherever it is needed.

See the provided part `parts/pagination.php`. You can include this part within query loops to output the pagination markup. Parts don't need to accept any arguments or process anything - they just output one thing.

# Naming part files

Naming your part files properly is important so they are compatible with the `get_template_part()` function.

You can utilize the second parameter of `get_template_part()` by adding a hyphenated suffix to the filename. For example, if you have a custom post type `events` that needs a different sort of pagination, you can add a file called `pagination-events.php`. Now you can use `get_template_part( 'parts/pagination', 'events' );` to include that file on your events template.

Going further, you can set up multiple post types with something like `get_template_part( 'parts/pagination', get_post_type() );`. In this case, `pagination.php` is used by default, unless there is a matching file like `pagination-events.php`.
