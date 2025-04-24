<?php

use Knp\Menu\Renderer\ListRenderer;

if (!function_exists('generate_toc')) {

    /**
     * Generates a Table of Contents (TOC) from HTML content.
     *
     * This function uses TOC\MarkupFixer to add `id` attributes to header tags,
     * and then uses TOC\TocGenerator to generate an HTML TOC structure.
     *
     * It uses Knp\Menu\Renderer\ListRenderer for rendering the TOC with custom styles.
     *
     * @param string $html Raw HTML content that contains headings.
     * @return array Associative array containing:
     *               - 'toc': The generated HTML table of contents.
     *               - 'html': The fixed HTML with IDs added to heading tags.
     */
    function generate_toc(string $html): array
    {
        // Fixes the HTML by ensuring header tags have proper ID attributes
        $markupFixer = new TOC\MarkupFixer();

        // Responsible for generating the table of contents from the fixed HTML
        $tocGenerator = new TOC\TocGenerator();

        // Renderer options to customize TOC appearance
        $options = [
            'currentAsLink'   => true,              // Make the current item a link
            'currentClass'    => 'current',         // CSS class for the active TOC item
            'ancestorClass'   => 'current_ancestor',// CSS class for TOC ancestors
            'firstClass'      => 'py-1',            // Class for the first item
            'lastClass'       => 'py-1',            // Class for the last item
        ];

        // Renderer to create the TOC list with matching logic and styles
        $renderer = new ListRenderer(new Knp\Menu\Matcher\Matcher(), $options);

        // Fix the HTML to ensure <h2> and <h3> headers have `id` attributes
        $htmlOut = $markupFixer->fix($html, 2, 3);

        // Generate the HTML for the TOC based on <h2> and <h3> levels
        $toc = $tocGenerator->getHtmlMenu($htmlOut, 2, 3, $renderer);

        // Return both the generated TOC and the fixed HTML content
        return ['toc' => $toc, 'html' => $htmlOut];
    }
}
