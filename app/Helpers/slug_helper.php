<?php

if (!function_exists('slugify')) {
    function slugify(string $string): string
    {
        // Convert to lowercase
        $string = strtolower($string);

        // Remove anything that's not a letter, number, or space
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

        // Replace multiple spaces or hyphens with a single hyphen
        $string = preg_replace('/[\s-]+/', '-', $string);

        // Trim hyphens from the beginning and end
        $string = trim($string, '-');

        return $string;
    }
    //unslugified string
    function unslugify(string $string): string
    {
        // Replace hyphens with spaces
        $string = str_replace('-', ' ', $string);

        // Capitalize the first letter of each word
        $string = ucwords($string);

        return $string;
    }
}
