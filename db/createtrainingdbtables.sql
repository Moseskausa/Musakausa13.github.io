
--
-- Table structure for table `participants`
--



CREATE TABLE `participants` (
  `participantid` INT AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `organisation` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100),
  PRIMARY KEY (participantid),
  UNIQUE KEY (email)
  
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Table structure for table `trainings`
--


CREATE TABLE `trainings` (
  `id` INT AUTO_INCREMENT,
  `trainingtype` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `province` varchar(150) NOT NULL,
  `venue` varchar(150) NOT NULL,
  `duration` varchar(50) NOT NULL,
   `attendee` varchar(100) NOT NULL,
   `score1` float NOT NULL,
   `score2` float NOT NULL,
   `participantid` INT,
   PRIMARY KEY (id),
   FOREIGN KEY (participantid) REFERENCES participants(participantid)

 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




