<?php
/**
 * @package    NestedRebuild
 * @subpackage Base
 * @author     步步街工作室 {@link www.bubujie.net}
 * @author     Created on 15-Feb-2014
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');


jimport('joomla.application.component.controller');

/**
 * NestedRebuild Controller.
 *
 * @package    NestedRebuild
 * @subpackage Controllers
 */
class NestedRebuildController extends JController
{
        private $i_count;
        private $a_link;

        public function __construct($a_link) 
        {
            if(!is_array($a_link)) throw new Exception("First parameter should be an array. Instead, it was type '".gettype($a_link)."'");
            $this->i_count = -1;
            $this->a_link= $a_link;
        }

        //包含自调用
        public function traverse($i_id) 
        {
            $i_lft = $this->i_count;
            $this->i_count++;

            $a_kid = $this->get_children($i_id);
            if ($a_kid) 
            {
                foreach($a_kid as $a_child) 
                {
                    $this->traverse($a_child);
                }
            }
            $i_rgt=$this->i_count;
            $this->i_count++;
            $this->write($i_lft,$i_rgt,$i_id);
        }   

        private function get_children($i_id) 
        {
            return @$this->a_link[$i_id];
        }

        private function write($i_lft,$i_rgt,$i_id) 
        {

            // fetch the source column
            $s_query = "SELECT * FROM `adjacent_table` WHERE `id`  = '".$i_id."'";
            if (!$i_result = mysql_query($s_query))
            {
                echo "<pre>$s_query</pre>\n";
                throw new Exception(mysql_error());  
            }
            $a_source = array();
            if (mysql_num_rows($i_result))
            {
                $a_source = mysql_fetch_assoc($i_result);
            }

            // root node?  label it unless already labeled in source table
            if (1 == $i_lft && empty($a_source['category']))
            {
                $a_source['category'] = 'ROOT';
            }

            // insert into the new nested tree table
            // use mysql_real_escape_string because one value "CD's"  has a single '
            $s_query = "
                INSERT INTO `nested_table`
                (`id`,`lft`,`rgt`,`category`)
                VALUES (
                    '".$i_id."',
                    '".$i_lft."',
                    '".$i_rgt."',
                    '".mysql_real_escape_string(@$a_source['category'])."'
                )
            ";
            //原始代码：若已执行，则输出
            //if (！$i_result = mysql_query($s_query))
            if ($i_result = mysql_query($s_query))
            {
                echo "<pre>$s_query</pre>\n";
                //throw new Exception(mysql_error());  
            }
            else
            {
                // success:  provide feedback
                echo "<p>$s_query</p>\n";
            }
        }
}//class
