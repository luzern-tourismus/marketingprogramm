<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Partner;

use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungReader;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Pdf\Config\PdfConfig;
use Nemundo\Pdf\Document\PdfDocument;
use Nemundo\Pdf\Image\PdfImage;
use Nemundo\Pdf\Site\AbstractPdfSite;
use Nemundo\Pdf\Text\PdfCell;
use Nemundo\Pdf\Text\PdfFont;
use Nemundo\Pdf\Text\PdfMultiCell;
use Nemundo\Pdf\Text\PdfNewLine;
use Nemundo\Pdf\Text\PdfText;
use Nemundo\Pdf\Unit\PdfUnit;
use Nemundo\Project\Path\SourcePath;

class PartnerBestaetigungPdfSite extends AbstractPdfSite
{

    /**
     * @var PartnerBestaetigungPdfSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'bestaetigung-pdf';

        PartnerBestaetigungPdfSite::$site = $this;

    }


    public function loadContent()
    {

        $partnerId = (new PartnerParameter())->getValue();

        $pdf = new PdfDocument();
        $pdf->filename = 'bestaetigung.pdf';

        $pdf->margin =18;
        $pdf->unit = PdfUnit::MILLIMETER;

        PdfConfig::$defaultFont = PdfFont::ARIAL;
        PdfConfig::$defaultFontSize =10;



        $partnerRow = (new PartnerReader())->getRowById($partnerId);


        $img = new PdfImage($pdf);
        $img->imageFilename = (new SourcePath())
            ->addPath('img')
            ->addPath('logo.png')
            ->getFullFilename();


        $text = new PdfText($pdf);
        $text->text = 'Vereinbarung Marketingprogramm 2026';
        $text->bold = true;
        $text->height = 20;

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);
        new PdfNewLine($pdf);
        new PdfNewLine($pdf);


        $text = new PdfText($pdf);
        $text->text = $partnerRow->firma;

        new PdfNewLine($pdf);

        $text = new PdfText($pdf);
        $text->text =$partnerRow->strasse;  // . "\n" . $partnerRow->plz . " " . $partnerRow->ort;

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);

        $text = new PdfText($pdf);
        $text->text = (new Date())->setNow()->getLongFormat() . "\tdirekt +41 41 227 17 13\tmanuela.casanova@luzern.com";

        new PdfNewLine($pdf);


        $text = new PdfText($pdf);
        $text->text = 'Sehr geehrte Damen und Herren';

        new PdfNewLine($pdf);

        $text = new PdfText($pdf);
        $text->text = 'Herzlichen Dank für Ihre Anmeldung zum Marketingprogramm 2026 von der Luzern Tourismus AG.';

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);


        $text = new PdfText($pdf);
        $text->text = 'Gerne bestätigen wir Ihre definitive und verbindliche Anmeldung wie folgt:';

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);


        $width = 40;

        $cell = new PdfCell($pdf);  // new PdfMultiCell($pdf);
        $cell->text = 'Markt';
        $cell->bold = true;
        $cell->width = $width;
        //$cell->border=1;

        $cell = new PdfCell($pdf);  //new PdfMultiCell($pdf);
        $cell->text = 'Aktivität';
        $cell->bold = true;
        $cell->width = $width;

        $cell = new PdfCell($pdf);  //new PdfMultiCell($pdf);
        $cell->text = 'Option';
        $cell->bold = true;
        $cell->width = $width;

        //$cell = new PdfCell($pdf);  // new PdfMultiCell($pdf);
        $cell = new PdfMultiCell($pdf);
        $cell->text = "Kosten pro Partner Kosten pro Partner in CHF, exkl. MwSt.";
        $cell->bold = true;
        $cell->width = $width;

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);


        $anmeldungReader = new AnmeldungReader();
        $anmeldungReader->model->loadOption();
        $anmeldungReader->model->option->loadAktivitaet();
        $anmeldungReader->filter->andEqual($anmeldungReader->model->partnerId, $partnerRow->id);
        $anmeldungReader->filter->andEqual($anmeldungReader->model->isDeleted, false);

        $total = 0;

        foreach ($anmeldungReader->getData() as $anmeldungRow) {

            //$row = new AdminTableRow($table);
            //$row->strikeThrough = $anmeldungRow->isDeleted;

            $cell = new PdfCell($pdf);
            $cell->text = '';
            $cell->width = $width;

            $cell = new PdfCell($pdf);  // new PdfMultiCell($pdf);
            $cell->text = $anmeldungRow->option->aktivitaet->aktivitaet;
            $cell->width = $width;

            $cell = new PdfCell($pdf);  //new PdfMultiCell($pdf);
            $cell->text = $anmeldungRow->option->option;
            $cell->width = $width;

            $cell = new PdfCell($pdf);  //new PdfMultiCell($pdf);
            $cell->text = $anmeldungRow->option->preis;
            $cell->width = $width;

            new PdfNewLine($pdf);
            new PdfNewLine($pdf);

            $total += $anmeldungRow->option->preis;


        }

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);


        $cell = new PdfCell($pdf);
        $cell->text = 'Total';
        $cell->bold = true;
        $cell->width = $width;

        $cell = new PdfCell($pdf);
        $cell->text = '';
        $cell->width = $width;


        $cell = new PdfCell($pdf);
        $cell->text = $total;
        $cell->bold = true;
        $cell->width = $width;

        new PdfNewLine($pdf);
        new PdfNewLine($pdf);

        $text = new PdfText($pdf);
        $text->text = "VERTRAGSBESTIMMUNGEN:\n\n

Änderungen und Ergänzungen dieser Vereinbarung sind nur in gegenseitigem Einverständnis und in schriftlicher Form gültig. Sollte ein Projekt dieser Vereinbarung aus irgendwelchen Gründen nichtig oder unwirksam sein, werden die übrigen Bestimmungen der Vereinbarung hiervon nicht berührt. 
\n\n
Der Entscheid zur Durchführung sämtlicher Aktivitäten obliegt der LTAG. Bei Aktivitäten, welche durch Drittpartner (insbesondere Schweiz Tourismus) organisiert werden, hat die LTAG keinen Ein-fluss auf die definitive Durchführung.
\n\n
Inkraftsetzung:
Die Bestätigung des Marketingprogrammes wie oben aufgeführt gilt verbindlich und definitiv und tritt in Kraft mit der beidseitigen rechtsgültigen Unterzeichnung. 
\n\n
Anwendbares Recht:
Für die Vereinbarung ist materielles schweizerisches Recht anwendbar. Für allfällige Streitigkeiten aus oder im Zusammenhang mit dieser Vereinbarung sind die ordentlichen Gerichte der Stadt Luzern zuständig. 
";


        $text = new PdfText($pdf);
        $text->text = 'Verbindliche Anmeldebestätigung – Marketingprogramm 2025

Datum: 	

Vor- und Nachname 		Unterschrift


________________     ___________________________________________


    (Optional 2. Person)
Vor- und Nachname	Unterschrift';


        $text = new PdfText($pdf);
        $text->text = "Wir freuen uns auf eine erfolgreiche Zusammenarbeit!

    Freundliche Grüsse
Luzern Tourismus AG";

        new PdfNewLine($pdf);

        $img = new PdfImage($pdf);
        $img->width = 90;
        $img->imageFilename = (new SourcePath())
            ->addPath('img')
            ->addPath('unterschrift_perren.jpg')
            ->getFullFilename();

        $img = new PdfImage($pdf);
        $img->width = 90;
        $img->imageFilename = (new SourcePath())
            ->addPath('img')
            ->addPath('unterschrift_zemp.jpg')
            ->getFullFilename();

        new PdfNewLine($pdf);


        $text = new PdfText($pdf);
        $text->text = 'Marcel Perren		Marco Zemp
Tourismusdirektor		Leiter Marketing & Sales';


        $pdf->sendToBrowser();


    }

}