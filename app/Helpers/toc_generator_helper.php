<?php
use Knp\Menu\Renderer\ListRenderer;
if (!function_exists('generate_toc')) {
    function generate_toc(string $html): array
    {

        $markupFixer = new TOC\MarkupFixer();
        $tocGenerator = new TOC\TocGenerator();
        $options = [
            'currentAsLink' => true,
            'currentClass' => 'current',
            'ancestorClass' => 'current_ancestor',
            'firstClass' => 'py-1',
            'lastClass' => 'py-1',
        ];
        
        $renderer = new Knp\Menu\Renderer\ListRenderer(new Knp\Menu\Matcher\Matcher(), $options);

        // This ensures that all header tags have `id` attributes so they can be used as anchor links
        $htmlOut = $markupFixer->fix($html, 2, 3, );

        // This generates the Table of Contents in HTML
        $toc =  $tocGenerator->getHtmlMenu($htmlOut, 2,3, $renderer);

        return ['toc' => $toc, 'html' => $htmlOut];

    }
}
