<?php
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);


/// Remove anything that looks like an archive title prefix
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});