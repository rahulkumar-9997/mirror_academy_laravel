<?php

function clean_html_content($html)
{
	if (empty($html)) return '';    
    $dom = new DOMDocument();
    @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);
    $paragraphs = $xpath->query('//p');    
    foreach ($paragraphs as $paragraph) {
        $content = trim($paragraph->textContent);
        $innerHtml = trim($paragraph->nodeValue);
        if (empty($content) || preg_match('/^(\s|&nbsp;|<br\s*\/?>)*$/i', $innerHtml)) {
            $paragraph->parentNode->removeChild($paragraph);
        }
    }
    $brs = $xpath->query('//br');
    foreach ($brs as $br) {
        $next = $br->nextSibling;
        $prev = $br->previousSibling;
        if (($next && $next->nodeType === XML_ELEMENT_NODE && 
             in_array($next->nodeName, ['p', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'])) ||
            ($prev && $prev->nodeType === XML_ELEMENT_NODE && 
             in_array($prev->nodeName, ['p', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']))) {
            $br->parentNode->removeChild($br);
        }
    }    
    return $dom->saveHTML();
}