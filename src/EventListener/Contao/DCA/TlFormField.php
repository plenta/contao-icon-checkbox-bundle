<?php

declare(strict_types=1);

/**
 * Plenta Icon Checkbox Bundle for Contao Open Source CMS
 *
 * @copyright     Copyright (c) 2025, Plenta.io
 * @author        Plenta.io <https://plenta.io>
 * @link          https://github.com/plenta/
 */

namespace Plenta\IconCheckboxBundle\EventListener\Contao\DCA;

use Contao\BackendUser;
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\CoreBundle\Image\ImageSizes;
use Contao\DataContainer;
use Symfony\Bundle\SecurityBundle\Security;

class TlFormField
{
    public function __construct(
        protected Security $security,
        protected ImageSizes $imageSizes,
    ) {
    }

    #[AsCallback(table: 'tl_form_field', target: 'config.onpalette')]
    public function onPalette(string $palette, DataContainer $dc)
    {
        $currentRecord = $dc->getCurrentRecord();

        // This shouldn't happen, defensive programming
        if (null === $currentRecord) {
            return $palette;
        }

        if ('icon_checkbox' === $currentRecord['type']) {
            $palette = PaletteManipulator::create()
                ->removeField('mSize')
                ->applyToString($palette)
            ;
        }

        return $palette;
    }

    #[AsCallback(table: 'tl_form_field', target: 'fields.iconCheckbox_imgSize.options')]
    public function onImgSizeOptions(): array
    {
        $user = $this->security->getUser();

        if (!$user instanceof BackendUser) {
            return [];
        }

        return $this->imageSizes->getOptionsForUser($user);
    }
}
