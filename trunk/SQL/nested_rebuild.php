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

        private $i_count;
        private $a_link;

        public function __construct($a_link) 
        {
            if(!is_array($a_link)) throw new Exception("First parameter should be an array. Instead, it was type '".gettype($a_link)."'");
            $this->i_count = -1;
            $this->a_link= $a_link;
        }

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
            return $this->a_link[$i_id];
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
                    '".mysql_real_escape_string($a_source['category'])."'
                )
            ";
            //原始代码：若可执行，则输出
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
    }

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

    $o_tree_transformer = new tree_transformer($a_link);
    $o_tree_transformer->traverse(0);

?>