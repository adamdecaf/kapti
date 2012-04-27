--
-- Table structure for table `image_filtering`
--

CREATE TABLE IF NOT EXISTS `image_filtering` (
  `fid` int(10) NOT NULL,
  `species` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
