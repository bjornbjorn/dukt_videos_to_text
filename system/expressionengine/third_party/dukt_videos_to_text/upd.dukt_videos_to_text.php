<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package     ExpressionEngine
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2003 - 2017, EllisLab, Inc.
 * @license     http://expressionengine.com/user_guide/license.html
 * @link        http://expressionengine.com
 * @since       Version 2.0
 * @filesource
 */

/**
 * Dukt Videos 2 Text Module Install/Update File
 *
 * @package    ExpressionEngine
 * @subpackage Addons
 * @category   Module
 * @author     Bjørn Børresen
 * @link       http://wedoaddons.com
 */
class Dukt_videos_to_text_upd
{
    public $version = '1.0.0';

    /**
     * Installation Method
     *
     * @return  boolean
     */
    public function install()
    {
        ee()->db->insert('modules', array(
            'module_name'        => 'Dukt_videos_to_text',
            'module_version'     => $this->version,
            'has_cp_backend'     => 'n',
            'has_publish_fields' => 'n',
        ));

        // convert existing Dukt Videos to text fields
        ee()->db->where('field_type','dukt_videos')->update('channel_fields', array('field_type' => 'dukt_videos_to_text'));
        ee()->db->where('col_type','dukt_videos')->update('matrix_cols', array('col_type' => 'dukt_videos_to_text'));

        return TRUE;
    }

    /**
     * Uninstall
     *
     * @return  boolean
     */
    public function uninstall()
    {
        ee()->db->where('class', 'Dukt_videos_to_text')->delete('actions');

        $mod_id = ee()->db->select('module_id')->get_where('modules', array('module_name' => 'Dukt_videos_to_text'))->row('module_id');
        ee()->db->where('module_id', $mod_id)->delete('module_member_groups');
        ee()->db->where('module_name', 'Dukt_videos_to_text')->delete('modules');

        // revert existing fieldtypes text
        ee()->db->where('field_type','dukt_videos_to_text')->update('channel_fields', array('field_type' => 'dukt_videos'));
        ee()->db->where('col_type','dukt_videos_to_text')->update('matrix_cols', array('col_type' => 'dukt_videos'));

        return TRUE;
    }

    /**
     * Module Updater
     *
     * @return  boolean
     */
    public function update($current = '')
    {
        return TRUE;
    }
}

/* End of file upd.dukt_videos_to_text.php */
/* Location: /system/expressionengine/third_party/dukt_videos_to_text/upd.dukt_videos_to_text.php */