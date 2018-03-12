CREATE TABLE IF NOT EXISTS `prescripteurs` (
`pres_id` int(11) NOT NULL AUTO_INCREMENT,
`pres_nom` varchar(100) NOT NULL,
`pres_tel` varchar(30) NOT NULL,
`pres_description` varchar(500) NOT NULL,
UNIQUE KEY `pres_id` (`pres_id`)
) ENGINE=innoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


