<?php

declare(strict_types=1);

/**
 * Plenta Icon Checkbox Bundle for Contao Open Source CMS
 *
 * @copyright     Copyright (c) 2025, Plenta.io
 * @author        Plenta.io <https://plenta.io>
 * @link          https://github.com/plenta/
 */

namespace Plenta\IconCheckboxBundle\Widget;

use Contao\FormCheckbox;

class IconCheckBoxWizard extends FormCheckbox
{
    protected $blnSubmitInput = true;

    protected $strTemplate = 'form_icon_checkbox';

    protected $strError = '';

    protected $strPrefix = 'widget widget-icon-checkbox';

    public function __construct($arrAttributes=null)
    {
        parent::__construct($arrAttributes);

        $this->preserveTags = true;
        $this->decodeEntities = true;
    }

    public function generate()
    {
        return '-';
    }

    protected function getOptions()
    {
        return [];
    }

    public function validate()
    {
        $mandatory = $this->mandatory;
        $options = $this->getPost($this->strName);

        if ($mandatory) {
            $this->mandatory = true;
        }
    }

    public function __get($strKey)
    {
        return parent::__get($strKey);
    }

    public function __set($strKey, $varValue)
    {
        parent::__set($strKey, $varValue);
    }
}