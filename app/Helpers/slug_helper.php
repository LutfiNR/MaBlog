<?php

// Check if the functions are not already defined
if (!function_exists('slugify')) {

    /**
     * Convert a string into a URL-friendly slug.
     *
     * This function transforms a regular string into a "slug" which can be used
     * in URLs for readability and SEO.
     *
     * Steps:
     * 1. Converts all characters to lowercase.
     * 2. Removes all non-alphanumeric characters (excluding spaces and hyphens).
     * 3. Replaces multiple spaces or hyphens with a single hyphen.
     * 4. Trims hyphens from the beginning and end of the string.
     *
     * Example:
     * Input:  "Hello World! This is PHP."
     * Output: "hello-world-this-is-php"
     *
     * @param string $string Input string to be slugified.
     * @return string Slugified version of the string.
     */
    function slugify(string $string): string
    {
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
        $string = preg_replace('/[\s-]+/', '-', $string);
        return trim($string, '-');
    }

    /**
     * Convert a slug back into a readable string.
     *
     * This function transforms a slugified string into a more human-readable format
     * by replacing hyphens with spaces and capitalizing the first letter of each word.
     *
     * Example:
     * Input:  "hello-world-this-is-php"
     * Output: "Hello World This Is Php"
     *
     * @param string $string Slug to be converted back to normal text.
     * @return string Readable version of the slug.
     */
    function unslugify(string $string): string
    {
        $string = str_replace('-', ' ', $string);
        return ucwords($string);
    }
}
