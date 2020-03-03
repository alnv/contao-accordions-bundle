<?php

namespace Alnv\ContaoAccordionsBundle\Elements;

class ContentAccordion extends \ContentAccordion {

    protected $strTemplate = 'ce_accordionSingle';

    public function generate() {

        $arrHeadline = \StringUtil::deserialize( $this->mooHeadline, true );

        if ( TL_MODE == 'BE' ) {
            if ( is_array( $arrHeadline ) && isset( $arrHeadline[0] ) ) {
                return $arrHeadline[0];
            }
            if ( is_array( $arrHeadline ) && isset( $arrHeadline['value'] ) ) {
                return $arrHeadline['value'];
            }
            return '';
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