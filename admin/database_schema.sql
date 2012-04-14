SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE IF NOT EXISTS `epc_categories` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_parent_id` int(11) DEFAULT NULL,
  `c_name` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_name` (`c_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `epc_products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `p_description` longtext NOT NULL,
  `p_controls` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_price` double NOT NULL,
  `p_image_href` varchar(1000) DEFAULT NULL,
  `front_page` tinyint(1) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `epc_uploads` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_path` varchar(1000) NOT NULL,
  `u_file_mask_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2