<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
        ->files()
        ->name('*.php')
        ->in(__DIR__ . '/../src')
;
return new Sami($iterator,
        array(
    'theme'                => 'enhanced',
    'title'                => 'Translator API',
    'build_dir'            => __DIR__ . '/../api',
    'default_opened_level' => 2,
        )
);
