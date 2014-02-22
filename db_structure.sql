

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `open_a11y_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultID` mediumint(7) NOT NULL AUTO_INCREMENT,
  `userKey` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `testFileID` varchar(255) NOT NULL,
  `result` enum('Pass','Fail') NOT NULL,
  `comments` mediumtext NOT NULL,
  PRIMARY KEY (`resultID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table holds the specific results of testing ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testFiles`
--

CREATE TABLE `testFiles` (
  `testFileID` varchar(255) NOT NULL,
  `testFilePath` varchar(255) NOT NULL,
  PRIMARY KEY (`testFileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table holds the details of the files to be tested. ';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userKey` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateLastAccess` datetime NOT NULL,
  `browserBrand` varchar(255) NOT NULL,
  `browserVersion` varchar(255) NOT NULL,
  `operatingSystem` varchar(255) NOT NULL,
  `osVersion` varchar(255) NOT NULL,
  `uaString` varchar(255) NOT NULL,
  `atType` varchar(255) NOT NULL,
  `atBrand` varchar(255) NOT NULL,
  `atVersion` varchar(255) NOT NULL,
  PRIMARY KEY (`userKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table holds the users of the system and their platform information. ';
