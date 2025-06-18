<?php

namespace LuzernTourismus\MarketingProgramm\Clean;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\Type\Text\Text;

class WordClean extends AbstractBase
{

    public function cleanHtml($html)
    {

        //$html =  preg_replace('/<.*? (.*?)>/i', '', $html);

  //      $html = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si",'<$1$2>', $html);

        //$html =  preg_replace('/(<o:p><\/o:p>)/i', '', $html);

        // 3. Entferne Word-spezifische Tags wie <o:p>
        $html = preg_replace('/(<\/?o:p[^>]*>)/i', '', $html);
        $html = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si",'<$1$2>', $html);

        //$html = 'cleaned'.$html;

        /*
        $html = preg_replace('/class=("|\')?Mso[a-zA-Z0-9]+("|\')?/i', '', $html);

        // 2. Entferne alle MSO-spezifischen Styles
        $html = preg_replace('/style=("|\')[^"\']*mso[^"\']*("|\')/i', '', $html);

        // 3. Entferne Word-spezifische Tags wie <o:p>
        $html = preg_replace('/<\/?o:p[^>]*>/i', '', $html);

        // 4. Entferne alle inline styles
        $html = preg_replace('/style=("|\')[^"\']*("|\')/i', '', $html);

        // 5. Entferne leere Spans und Fonts
        $html = preg_replace('/<(span|font)[^>]*>\s*<\/\1>/i', '', $html);

        // 6. Entferne Kommentare (Word versteckt hier oft Formatierung)
        $html = preg_replace('/<!--.*?-->/s', '', $html);

        // 7. Entferne XML- oder VML-Kram
        $html = preg_replace('/<w:[^>]*>.*?<\/w:[^>]*>/i', '', $html);
        $html = preg_replace('/<xml>.*?<\/xml>/is', '', $html);
        $html = preg_replace('/<v:[^>]*>.*?<\/v:[^>]*>/i', '', $html);

        // 8. Entferne unnötige Tags, z. B. <meta>, <link>, <style>
        $html = preg_replace('/<(meta|link|style)[^>]*>.*?<\/\1>/is', '', $html);

        // 9. Optional: HTML bereinigen (z. B. Whitespace)
        $html = trim($html);*/

        return $html;

    }

}