--
-- MySQL 5.5.24
-- Wed, 12 Feb 2014 14:36:40 +0000
--

CREATE TABLE `city_mst` (
   `ID` int(10) not null auto_increment,
   `CITY_NAME` varchar(255) not null,
   `STATE_MST__ID` int(10),
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO `city_mst` (`ID`, `CITY_NAME`, `STATE_MST__ID`) VALUES ('1', 'BANGALORE', '1');

CREATE TABLE `institute_address_dtl` (
   `ID` int(10) not null auto_increment,
   `ADDRESS_LINE1` varchar(255) not null,
   `ADDRESS_LINE2` varchar(255),
   `CITY_MST__ID` int(10),
   `PIN_CODE` int(10),
   `INSTITUTE_DTL__ID` int(10),
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

INSERT INTO `institute_address_dtl` (`ID`, `ADDRESS_LINE1`, `ADDRESS_LINE2`, `CITY_MST__ID`, `PIN_CODE`, `INSTITUTE_DTL__ID`) VALUES ('1', '#112,BEL CIRCLE,', 'NEAR VIDYARANYAPURA', '1', '560097', '1');
INSERT INTO `institute_address_dtl` (`ID`, `ADDRESS_LINE1`, `ADDRESS_LINE2`, `CITY_MST__ID`, `PIN_CODE`, `INSTITUTE_DTL__ID`) VALUES ('2', '#114,2nd CROSS,4th MAIN', 'KORMANGALA 5th BLOCK', '1', '560087', '2');

CREATE TABLE `institute_dtl` (
   `ID` int(10) not null auto_increment,
   `INSTITUTE_NAME` varchar(255) not null,
   `RANKING` int(1),
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

INSERT INTO `institute_dtl` (`ID`, `INSTITUTE_NAME`, `RANKING`) VALUES ('1', 'ABC ACADEMY', '4');
INSERT INTO `institute_dtl` (`ID`, `INSTITUTE_NAME`, `RANKING`) VALUES ('2', 'PQR INSTITUTE', '5');

CREATE TABLE `test` (
   `ID` int(10) not null auto_increment,
   `FIRST_NAME` varchar(20) not null,
   PRIMARY KEY (`ID`),
   KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO `test` (`ID`, `FIRST_NAME`) VALUES ('1', 'SARANSH');