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

use Contao\Widget;

class IconCheckBoxWizard extends Widget
{
    protected $blnSubmitInput = true;

    protected $strTemplate = 'be_widget_chk';

    public function __construct($arrAttributes=null)
    {
        parent::__construct($arrAttributes);

        $this->preserveTags = true;
        $this->decodeEntities = true;
    }

    public function generate()
    {
        return 'Text';
    }
}