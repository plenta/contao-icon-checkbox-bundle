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

use Contao\StringUtil;
use Contao\FormCheckbox;

class IconCheckBoxWizard extends FormCheckbox
{
    protected $blnSubmitInput = true;

    protected $strTemplate = 'form_icon_checkbox';

    protected $strError = '';

    protected $strPrefix = 'widget widget-checkbox widget-icon-checkbox';

    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->preserveTags = true;
        $this->decodeEntities = true;
    }

    public function __set($strKey, $varValue): void
    {
        switch ($strKey) {
            case 'iconOptions':
                $this->arrOptions = $this->createOptions($varValue);
                break;

            case 'options':
                break;

            default:
                parent::__set($strKey, $varValue);
                break;
        }
    }

    public function parse($arrAttributes = null)
    {
        $GLOBALS['TL_CSS']['plenta-icon-checkbox'] = 'bundles/plentaiconcheckbox/style.css|1';

        return parent::parse($arrAttributes);
    }

    protected function createOptions($varValue)
    {
        $arrOptions = [];

        $options = StringUtil::deserialize($varValue, true);

        foreach ($options as $option) {
            $arrOptions[] = [
                'value' => $option['value'],
                'label' => $option['name'],
                'description' => $option['description'],
                'singleSRC' => $option['singleSRC'],
            ];
        }

        return $arrOptions;
    }
}
