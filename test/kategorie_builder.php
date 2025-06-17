<?php

require_once 'config.php';

use LuzernTourismus\MarketingProgramm\Business\Kategorie\KategorieBuilder;

$builder = new KategorieBuilder();
$builder->kategorie = 'test category';
$builder->themaId = (new \LuzernTourismus\MarketingProgramm\Type\Thema\TouristInformationThema())->id;
$builder->build();

