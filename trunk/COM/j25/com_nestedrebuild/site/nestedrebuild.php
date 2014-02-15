<?php
//input->get('task'));

//-- Redirect if set by the controller
//$controller->redirect();
jimport( 'joomla.database.tablenested' );
//$jtn = new JTableNested('#__categories','id',$db);
//$jtn->rebuild(0);
//echo 'finished';

?>
<?php

/**


--
-- Table structure for table `adjacent_table`
--

DROP TABLE IF EXISTS `adjacent_table`;
CREATE TABLE IF NOT EXISTS `adjacent_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `father_id` int(11) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `adjacent_table`
--

INSERT INTO `adjacent_table` (`id`, `father_id`, `category`) VALUES
(1, 0, 'Books'),
(2, 0, 'CD''s'),
(3, 0, 'Magazines'),
(4, 1, 'Hard Cover'),
(5, 1, 'Large Format'),
(6, 3, 'Vintage');

--
-- Table structure for table `nested_table`
--

DROP TABLE IF EXISTS `nested_table`;
CREATE TABLE IF NOT EXISTS `nested_table` (
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`lft`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `rgt` (`rgt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

*/

    /**
     * @class   tree_transformer
     * @author  Paul Houle, Matthew Toledo
     * @created 2008-11-04
     * @url     http://gen5.info/q/2008/11/04/nested-sets-php-verb-objects-and-noun-objects/
     */
    class tree_transformer 
    {

    }
// Require the base controller
require_once JPATH_COMPONENT.'/controller.php';
    mysql_connect('localhost','root','xampp') or die(mysql_error());
    mysql_select_db('bubujienet') or die(mysql_error());

    // build a complete copy of the adjacency table in ram
    $s_query = "SELECT `id`,`parent_id` FROM `jos_categories`";
    $i_result = mysql_query($s_query);
    $a_rows = array();
    while ($a_rows[] = mysql_fetch_assoc($i_result));
    $a_link = array();
    foreach($a_rows as $a_row) 
    {
        $i_father_id = $a_row['parent_id'];
        $i_child_id = $a_row['id'];
        if (!array_key_exists($i_father_id,$a_link)) 
        {
            $a_link[$i_father_id]=array();
        }
        $a_link[$i_father_id][]=$i_child_id;
    }

    $o_tree_transformer = new NestedRebuildController($a_link);
    $o_tree_transformer->traverse(0);

?>