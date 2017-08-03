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
 * Dukt Videos 2 Text Fieldtype
 *
 * @package    ExpressionEngine
 * @subpackage Addons
 * @category   Fieldtype
 * @author     Bjørn Børresen
 * @link       http://wedoaddons.com
 */
class Dukt_videos_to_text_ft extends EE_Fieldtype
{
    public $info = array(
        'name' => 'Dukt Videos 2 Text',
        'version' => '1.0.0',
    );

    public $has_array_data = TRUE;

    /**
     * Display field
     *
     * @param   $data the entry data
     * @return  string
     *
     */
    public function _display_field($data, $field_name)
    {
        return form_input($field_name, $data);
    }

    public function display_field($data)
    {
        return $this->_display_field($data, $this->field_name);
    }

    /**
     * Display Matrix cell field
     **/
    public function display_cell($data)
    {
        return $this->_display_field($data, $this->cell_name);
    }

    /**
     * Save Matrix cell
     **/
    public function save_cell($data)
    {
        return $this->save($data);
    }

    public function accepts_content_type($name)
    {
        return $name === 'channel' || $name === 'grid';
    }

    /**
     * Save
     *
     * @param $data
     * @return string
     */
    public function save($data)
    {
        return $data;
    }

    /**
     * Pre Process
     *
     * @param $data
     * @return mixed
     */
    public function pre_process($data)
    {
        return $data;
    }


    /**
     * Replace tag
     *
     * @param $data
     * @param $params tag params array
     * @param $tagdata the tagdata string
     * @return string
     */
    public function replace_tag($videoUrl, $params = array(), $tagdata = FALSE)
    {
        if (empty($videoUrl)) {
            return "";
        }

        $vimeo_video_id = (int) substr(parse_url($videoUrl, PHP_URL_PATH), 1);

        return '<iframe src="http://player.vimeo.com/video/'.$vimeo_video_id.'?autoplay=0&controls=1&showinfo=1&iv_load_policy=3&rel=0&vimeo_api=1&vimeo_portrait=no&vimeo_title=no&vimeo_byline=no&youtube_modestbranding=yes&youtube_rel=no&youtube_showinfo=no&youtube_theme=light&api=1&portrait=0&title=0&byline=0" width="100%" height="100%"  frameborder="0" allowfullscreen="true" allowscriptaccess="true"></iframe>';
    }

}

/* End of file ft.dukt_videos_to_text.php */
/* Location: /system/expressionengine/third_party/dukt_videos_to_text/ft.dukt_videos_to_text.php */