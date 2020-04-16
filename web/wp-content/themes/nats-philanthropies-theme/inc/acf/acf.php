<?php
### Customizations for ACF go here.



/*
 * PURPOSE : Filter into ACF to allow URL fields to accept strings that start with "tel:" as valid URLs.
 *   NOTES : https://www.advancedcustomfields.com/resources/acf-validate_value/
 */
function taoti_acf_validate_url( $valid, $value, $field, $input ){
    // echo "<pre>"; var_dump($value); echo "</pre>"; die('ohai');

    // These are strings that a possible URL can start with and still be a valid URL. Otherwise it only accepts strings that start with 'http://' or 'https://'.
    $valid_url_prefixes = [
        'tel:', // Allow telephone links.
        'mailto:', // Allow email links.
        '#', // Allow jump/null links.
    ];

    foreach( $valid_url_prefixes as $prefix ){
        if( strpos( $value, $prefix) === 0 ){
            // If $value (the string value from the ACF field) starts with one of the prefixes defined above, then this is a valid URL.
            $valid = true;
        }
    }

	return $valid;

}
add_filter('acf/validate_value/type=url', 'taoti_acf_validate_url', 99, 4);
