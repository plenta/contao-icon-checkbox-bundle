<?php

declare(strict_types=1);

/**
 * Plenta Icon Checkbox Bundle for Contao Open Source CMS
 *
 * @copyright     Copyright (c) 2025, Plenta.io
 * @author        Plenta.io <https://plenta.io>
 * @link          https://github.com/plenta/
 */

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['icon_checkbox'] = '
    {type_legend},type,name,label;
    {fconfig_legend},mandatory,multiple;
    {options_legend},iconOptions;
    {expert_legend:hide},class,iconCheckbox_imgSize,iconCheckbox_css;
    {template_legend:hide},customTpl;
    {invisible_legend:hide},invisible
';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['iconOptions'] = [
    'exclude' => true,
    'inputType' => 'group',
    'palette' => ['singleSRC', 'name', 'value', 'description'],
    'fields' => [
        'singleSRC' => [
            'inputType' => 'fileTree',
            'label' => &$GLOBALS['TL_LANG']['tl_form_field']['iconCheckbox_singleSRC'],
            'eval' => [
                'fieldType' => 'radio',
                'filesOnly' => true,
                'mandatory' => true,
                'tl_class' => 'clr',
            ],
        ],
        'name' => [
            'inputType' => 'text',
            'label' => &$GLOBALS['TL_LANG']['tl_form_field']['iconCheckbox_name'],
            'eval' => ['mandatory' => true, 'tl_class' => 'w50'],
        ],
        'value' => [
            'inputType' => 'text',
            'label' => &$GLOBALS['TL_LANG']['tl_form_field']['iconCheckbox_value'],
            'eval' => ['mandatory' => true, 'tl_class' => 'w50'],
        ],
        'description' => [
            'inputType' => 'text',
            'label' => &$GLOBALS['TL_LANG']['tl_form_field']['iconCheckbox_description'],
            'eval' => ['tl_class' => 'long clr'],
        ],
    ],
    'order' => true,
    'sql' => [
        'type' => 'blob',
        'length' => AbstractMySQLPlatform::LENGTH_LIMIT_BLOB,
        'notnull' => false,
    ],
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['iconCheckbox_imgSize'] =
[
    'label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'],
    'inputType' => 'imageSize',
    'reference' => &$GLOBALS['TL_LANG']['MSC'],
    'eval' => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['iconCheckbox_css'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
    'sql' => ['type' => 'boolean', 'default' => true]
];
