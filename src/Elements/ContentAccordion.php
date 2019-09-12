<?php

namespace Alnv\ContaoAccordionsBundle\Elements;


class ContentAccordion extends \ContentAccordion {


    protected $strTemplate = 'ce_accordionSingle';


    public function generate() {

        $arrHeadline = \StringUtil::deserialize( $this->mooHeadline, true );

        if ( TL_MODE == 'BE' ) {

            return isset( $arrHeadline['value'] ) ? $arrHeadline['value'] : $arrHeadline;
        }

        if ( !isset( $arrHeadline['unit'] ) ) {

            $arrHeadline = [
                'unit' => 'h3',
                'value' => $arrHeadline[0]
            ];
        }

        $this->mooHeadline = $arrHeadline;

        return parent::generate();
    }
}