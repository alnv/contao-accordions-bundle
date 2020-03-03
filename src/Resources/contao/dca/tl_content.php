<?php

$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['search'] = true;
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['default'] = '';
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['inputType'] = 'inputUnit';
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['eval']['maxlength'] = 2048;
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['eval']['tl_class'] = 'w50 clr';
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['options'] = [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ];
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['sql'] = "text NOT NULL";