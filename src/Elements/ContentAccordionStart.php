<?php

namespace Alnv\ContaoAccordionsBundle\Elements;


class ContentAccordionStart extends \ContentElement {


    protected $strTemplate = 'ce_accordionStart';


    protected function compile() {

        if (TL_MODE == 'BE') {

            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->mooHeadline;
        }

        $arrHeadline = \StringUtil::deserialize( $this->mooHeadline, true );

        if ( !isset( $arrHeadline['unit'] ) ) {

            $arrHeadline = [
                'unit' => 'h3',
                'value' => $arrHeadline[0]
            ];
        }

        $classes = \StringUtil::deserialize( $this->mooClasses );
        $this->Template->toggler = $classes[0] ?: 'toggler';
        $this->Template->accordion = $classes[1] ?: 'accordion';
        $this->Template->headlineStyle = $this->mooStyle;
        $this->Template->headline = $arrHeadline;
    }
}