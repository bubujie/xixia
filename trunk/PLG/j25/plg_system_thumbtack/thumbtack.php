<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	plg_system_thumbtack
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport( 'joomla.plugin.plugin' );

// Load modified JDocumentRendererModule before the Joomla Framework doest it, to ignore that
// Works with Joomla 2.5.7 too.
require_once JPATH_SITE.DS.'plugins'.DS.'system'.DS.'thumbtack'.DS.'class'.DS.'helper.php';
require_once JPATH_ADMINISTRATOR.DS.'components'.DS.'com_modules'.DS.'helpers'.DS.'modules.php';


/**
 * Moduls Params plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.modulesparams
 */

class plgSystemThumbtack extends JPlugin {
    /**
     * Constructor
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     * @since       1.0
     */
    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
    }

    /**
    * @since    1.0
    */
    function onContentPrepareForm($form, $data)
    {
        // Check that we are in the admin application.
        if (JFactory::getApplication()->isAdmin()) {
            if (!($form instanceof JForm)) {
                $this->_subject->setError('JERROR_NOT_A_FORM');
                return false;
            }

            $name = $form->getName();

            if ($name === 'com_modules.module') {
                JForm::addFormPath(dirname(__FILE__).'/forms');
                JForm::addFieldPath(dirname(__FILE__).'/forms/fields');

                // Check if we have the advanced settings panel into form
                if (!array_key_exists('advanced', $form->getFieldsets())) {
                    // Add default Advanced Settings fieldset
                    $form->loadFile('default', false);
                }

                $form->loadFile('extended', false);
            }
        }

        return true;
    }
}
