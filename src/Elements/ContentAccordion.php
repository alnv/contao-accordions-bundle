<?php

namespace Alnv\ContaoAccordionsBundle\Elements;


class ContentAccordion extends \ContentElement {


    protected $strTemplate = 'ce_accordionSingle';


    protected function compile() {

        $this->text = \StringUtil::toHtml5($this->text);
        $this->Template->text = \StringUtil::encodeEmail($this->text);
        $this->Template->addImage = false;

        if ($this->addImage && $this->singleSRC != '') {

            $objModel = \FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && is_file(\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path)) {

                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }

        $arrHeadline = \StringUtil::deserialize( $this->mooHeadline, true );

        if ( !isset( $arrHeadline['unit'] ) ) {

            $arrHeadline = [
                'unit' => 'h3',
                'value' => $arrHeadline[0]
            ];
        }

        $classes = \StringUtil::deserialize($this->mooClasses);
        $this->Template->toggler = $classes[0] ?: 'toggler';
        $this->Template->accordion = $classes[1] ?: 'accordion';
        $this->Template->headlineStyle = $this->mooStyle;
        $this->Template->headline = $arrHeadline;
    }
}