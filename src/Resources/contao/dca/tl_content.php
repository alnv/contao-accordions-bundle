<?php

$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['search'] = true;
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['default'] = 'h3';
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['inputType'] = 'inputUnit';
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['eval']['maxlength'] = 255;
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['eval']['tl_class'] = 'w50 clr';
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['options'] = [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ];
$GLOBALS['TL_DCA']['tl_content']['fields']['mooHeadline']['sql'] = "text NOT NULL default 'a:2:{s:5:\"value\";s:0:\"\";s:4:\"unit\";s:2:\"h3\";}'";