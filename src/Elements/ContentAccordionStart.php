<?php

namespace Alnv\ContaoAccordionsBundle\Elements;

class ContentAccordionStart extends \ContentAccordionStart {

    protected $strTemplate = 'ce_accordionStart';

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

    protected function compile() {

        if (TL_MODE == 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->mooHeadline;
        }

        $classes = \StringUtil::deserialize($this->mooClasses);
        $this->Template->toggler = $classes[0] ?: 'toggler';
        $this->Template->accordion = $classes[1] ?: 'accordion';
        $this->Template->headlineStyle = $this->mooStyle;
        $this->Template->headline = $this->mooHeadline;

        $objContent = \Database::getInstance()->prepare('SELECT * FROM tl_content WHERE pid=? ORDER BY sorting' )->execute($this->pid);
        $strContent = '';
        $blnHasContent = false;
        if ( $objContent->numRows ) {
            while ($objContent->next()) {
                if ( $objContent->type == 'accordionStop' ) {
                    $blnHasContent = false;
                }
                if ($blnHasContent) {
                    $strContent .= \Controller::getContentElement($objContent->id);
                }
                if ( $objContent->id == $this->id ) {
                    $blnHasContent = true;
                }
            }
        }
        global $objPage;
        $this->Template->name = $objPage->pageTitle;
        $this->Template->question = htmlspecialchars_decode(trim(strip_tags($this->Template->headline['value'])));
        $this->Template->answer = htmlspecialchars_decode(trim(strip_tags($strContent)));
        $this->Template->isQuestion = strpos( $this->Template->question,'?') !== false;
    }
}