-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2018 at 12:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apttest`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('admin@gmail.com', '123', 1),
('aish.sri05@gmail.com', '311515104001', 0),
('akshaya.e26@gmail.com', '311515104002', 0),
('anjana.arunkumar@gmail.com', '311515104003', 0),
('archanalatha666@gmail.com', '311515104004', 0),
('arjun7ashok@gmail.com', '311515104005', 0),
('harshitha8330@gmail.com', '311515104006', 0),
('mskrishhhh@gmail.com', '311515104031', 0),
('bhargavan.balaji@gmail.com', '311515104007', 0),
('gayathrielankkathir@gmail.com', '311515104008', 0),
('srirangamsakshi35@gmail.com', '311515104032', 0),
('gomathijeni98@gmail.com', '311515104009', 0),
('hari.krishnan1601@gmail.com', '311515104010', 0),
('hemaroopa247@gmail.com', '311515104011', 0),
('sanjaaykishore@gmail.com', '311515104033', 0),
('indhu167@gmail.com', '311515104012', 0),
('aspriya.nela77@gmail.com', '311515104035', 0),
('jananipugazh.10@gmail.com', '311515104013', 0),
('satheeshnehru7@gmail.com', '311515104036', 0),
('kaminijon777@gmail.com', '311515104014', 0),
('satyashrikar@gmail.com', '311515104037', 0),
('krishnakumar1171998@gmail.com', '311515104015', 0),
('shakthidhar63@gmail.com', '311515104038', 0),
('sharmilanagarajan98@gmail.com', '311515104039', 0),
('sharookahmed7@gmail.com', '311515104040', 0),
('madkumar871997@gmail.com', '311515104016', 0),
('snehachandran99@gmail.com', '311515104041', 0),
('manjulathambidurai@gmail.com', '311515104017', 0),
('anithavenkysreyas@gmail.com', '311515104042', 0),
('mail2psrikrishna@gmail.com', '311515104043', 0),
('neerajap45@gmail.com', '311515104018', 0),
('nikitha100@gmail.com', '311515104019', 0),
('srinidhikarthikeyan@gmail.com', '311515104044', 0),
('sriupanya@gmail.com', '311515104045', 0),
('nikithamanjunath43@gmail.com', '311515104020', 0),
('srividhyasankari@gmail.com', '311515104046', 0),
('skssrividhya@gmail.com', '311515104047', 0),
('subhashinisuresh98@gmail.com', '311515104048', 0),
('prathibakumar27@gmail.com', '311515104021', 0),
('subu17may@gmail.com', '311515104049', 0),
('preeti3557@gmail.com', '311515104022', 0),
('suriyavenkt@gmail.com', '311515104050', 0),
('mr.vickyfantasy@gmail.com', '311515104023', 0),
('ksushmitha54@gmail.com', '311515104051', 0),
('priyadharshinikj@gmail.com', '311515104025', 0),
('swethapattudurai@gmail.com', '311515104052', 0),
('raaji0919@gmail.com', '311515104026', 0),
('thenmozhi.b97@gmail.com', '311515104053', 0),
('rajedhakal@gmail.com', '311515104027', 0),
('ushahindhu2298@gmail.com', '311515104054', 0),
('anudhya1598@gmail.com', '311515104029', 0),
('clvrashmika@gmail.com', '311515104030', 0),
('uthra2197@gmail.com', '311515104055', 0),
('vaishu150197@gmail.com', '311515104056', 0),
('vickydesires97@gmail.com', '311515104057', 0),
('harivenkatesh777@gmail.com', '311515104302', 0),
('vijitha.niranjana@gmail.com', '311515104058', 0),
('manikandank2213@gmail.com', '311515104303', 0),
('svishnupriya19@yahoo.com', '311515104059', 0),
('pavithranageswarn@gmail.com', '311515104304', 0),
('yashinisuresh.97@gmail.com', '311515104060', 0),
('saipreethikar@gmail.com', '311515104305', 0),
('gauthirio97@gmail.com', '311515104701', 0),
('santh5858@gmail.com', '311515104034', 0),
('test@gmail.com', '123', 0),
('gaayuammu97@gmail.com', '311515104008', 0),
('saranya291097@gmail.com', '311515104035', 0),
('balsu89@gmail.com', '30906106301', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `no` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `coption` text NOT NULL,
  `testno` text NOT NULL,
  `testname` text NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`no`, `question`, `option1`, `option2`, `option3`, `option4`, `coption`, `testno`, `testname`, `visible`) VALUES
(1, 'In a class of twenty students, the average age of the students is 20 years. When the age of the teacher is included the average increases by 1 year. Find the age of the teacher.\r\n', '41', '21', '43', '45', 'c', '01', 'Aptitude 1', 1),
(2, 'In the first 99 innings of his career Sachin scored at an average of 93 runs per innings. What should be his score in the 100th innings so that his average increases by two runs.\r\n', '93', '272', '293', '345', 'c', '01', 'Aptitude 1', 1),
(3, 'The average age of A, B, C and D is 47 years. When C and D leave the group and E and F join the group then the average age of the group increases by two years. Which of the following statements is true?', 'E is elder than D by 8 years', 'D is elder than E by 8 years', 'Both are of equal age', 'Cannot be determined', 'a', '01', 'Aptitude 1', 1),
(4, 'Consider a sequence of nine consecutive integers. The average of the first seven integers is n. The average of all the nine integers is:', 'n', 'n + 1', 'k x n, where k is a function of n', ' n + (2/7)', 'c', '01', 'Aptitude 1', 1),
(6, 'The  cost  of  maintenance  of  a  plant  increases by 10% every year. It was `10,000 in 2011. In 2013    the    maintenance    of    the    plant    was outsourced  to  Q  at  a  price  10%  lower  than what  it  would  have  cost  to  maintain  the  plant then. Find the profit made by Q if his cost is `9,000?\r\n', '1210', '1100', '10890', 'none of these', 'c', '01', 'Aptitude 1', 1),
(7, 'Three women P, Q and R wanted to buy designer bags for  themselves.  The  vendor  sells  each  bag  for  `  4,900. He accepts money in dollars ($) and euros (â‚¬) as well. 1 $  = ` 49 and 1 â‚¬ = ` 70 . After  one  bag  is  purchased,  the  rest  are  available  at  a discount  of  20%.  The  three  women  agree  to  share  the cost  equally.  P  pays  â‚¬  60,  Q  pays  â‚¬  70  and  R  pays  the rest. How much money does R pay?', '3540', '3640', '3740', '3800', 'b', '01', 'Aptitude 1', 1),
(8, 'How many necklaces of 12 beads of different colours can be made from 18 beads of different colours?', '(18P1!)/2 	', '11!/2', '18C12 * 11!/2', '24!', 'c', '01', 'Aptitude 1', 1),
(9, 'How many 5 digit numbers can be formed without repetition from the digits 0, 2, 3, 4 & 6?\r\n', '120', '80', '102', '96', 'd', '01', 'Aptitude 1', 1),
(10, 'In a chess competition involving some boys and girls of a school, every student had to play exactly one game with every other student. It was found that in 45 games both the players were girls, and in 190 games both were boys. The number of games in which one player was a boy and the other\r\nwas a girl is\r\n', '200', '216', '235', '256', 'a', '01', 'Aptitude 1', 1),
(11, '40%  of  a  number  exceeds  75%  of  half  that number by 25. Find the number?		\r\n', '1000', '3500', '7000', '2000', 'd', '01', 'Aptitude 1', 1),
(12, 'Sangeetha has joined a weight reduction program that decreases her weight by 10% every week. Sangeetha`s current weight is 80 kgs. For a maximum of how many weeks can Sangeetha try out this program if her doctor has advised her to maintain a minimum weight\r\nof  50 kgs? \r\n\r\n', '3', '4', '5', 'none of these', 'b', '01', 'Aptitude 1', 1),
(13, 'a % of b is 10, b% of c is 12 and c % of a is 15. If a + b + c =100, find the value of a2 +b2+c2 is ?\r\n', '2500', '2600', '2700', '3800', 'd', '01', 'Aptitude 1', 1),
(14, 'The length, breadth and height of a cuboid are in the ratio 1:3:4. What will be the change in its volume if the length increases by 50%, the breadth is doubled and the height is halved ?	\r\n', '30% increase', '50% increase', '70% increase', '100% increase', 'b', '01', 'Aptitude 1', 1),
(15, 'A number â€˜xâ€™ can be denoted as a % of b. if x is increased by 10, it can be denoted as c% of d then which of the following statements is true? \r\n', 'ab > cd', 'ab + 1000 > cd', ' ab + 1000 < cd', 'None of these', 'd', '01', 'Aptitude 1', 1),
(16, 'Ten persons went to a restaurant for lunch. Nine of them spent 14 each on their lunch and the tenth spent 9 more than the average expenditure of all of them. The total money spent by them was :', '130', '150', '140', '160', 'd', '01', 'Aptitude 1', 1),
(17, 'The average age of a group of 15 people is 16 years. The youngest among them is 10 years old and the eldest is 26 years old. Two people with an average age of 12 left the group. If one of the two return back to the group on the condition that he will be the group-leader then which of the following can be the average age of the new group?', '18', '17', '19', 'ALL OF THESE', 'c', '01', 'Aptitude 1', 1),
(18, 'In  the  hotel  â€œLook  Like  Tajâ€,  the  rooms  are numbered from 101 to 120 on the first floor, 201 to 240 on the second floor and 301 to 330 on the third floor.  During  the  month  of  September  2012,  the room occupancy was 50% on the first floor, 45% on the second floor and 80% on the third floor. If it is also known that the rooms tariff are ` 100, ` 150 and ` 200  per day on first, second and third floors respectively, then what is the average tariff per room per day for September 2012 ?', '94.44', '88.18', '78.3', '65.7', 'b', '01', 'Aptitude 1', 1),
(19, 'A  shopkeeper  cheats  a  customer  by  returning five 20 notes and ten 10 notes instead of ten `20 and five `10 notes. If the customer hands over  a  `500  note  prior  to  this,  find  the  profit percent made by the shopkeeper?      ', '20%', '25%', '33.33%', '40%', 'a', '01', 'Aptitude 1', 1),
(20, 'If all the letters of the word INVOLUTE are arranged in all possible ways, then how many words will have all the vowels together?		\r\n\r\n', '288', '2880', '4880', 'none of these', 'b', '01', 'Aptitude 1', 1),
(1, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(2, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(3, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(4, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(5, 'abcd?', 'a', 'a', 'v', 'a', 'a', 't5', 'TEST', 0),
(6, 'abcd?', 'a', 'a', 'va', 'a', 'a', 't5', 'TEST', 0),
(7, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(8, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(9, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(10, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(11, 'abcd?', 'a', 'a', 'a', 'a', 'a', 't5', 'TEST', 0),
(12, 'abcd?', 'a', 'asdf', 'gdfgdf', 'dfgfd', 'a', 't5', 'TEST', 0),
(13, 'abcd?', 'fdgdfg', 'dfg', 'gdfg', 'dfgdf', 'a', 't5', 'TEST', 0),
(14, 'abcd?', 'dfgdf', 'gdfg', 'dfg', 'dfg', 'a', 't5', 'TEST', 0),
(15, 'abcd?', 'dfg', 'dfg', 'dfg', 'dfg', 'a', 't5', 'TEST', 0),
(16, 'abcd?', 'dfg', 'dfgdf', 'dfg', 'gdfg', 'a', 't5', 'TEST', 0),
(17, 'abcd?', 'dfgdf', 'dfg', 'gdf', 'dfg', 'a', 't5', 'TEST', 0),
(18, 'abcd?', 'dfg', 'dfgs', 'sdgfsdg', 'dgdfg', 'a', 't5', 'TEST', 0),
(19, 'abcd?', 'sdfg', 'sdfg', 'gsdfg', 'sdf', 'a', 't5', 'TEST', 0),
(20, 'abcd?', 'dsfg', 'sdfg', 'sdfg', 'sdfg', 'a', 't5', 'TEST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` text NOT NULL,
  `register` text NOT NULL,
  `DOB` text NOT NULL,
  `department` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `register`, `DOB`, `department`, `mail`) VALUES
('Aishwarya Lakshmi', '311515104001', '05/06/1998', 'CSE', 'aish.sri05@gmail.com'),
('Akshaya', '311515104002', '29/04/1998', 'CSE', 'akshaya.e26@gmail.com'),
('Anjana Arun Kumar', '311515104003', '09/08/1997', 'CSE', 'anjana.arunkumar@gmail.com'),
('Archana', '311515104004', '10/04/1997', 'CSE', 'archanalatha666@gmail.com'),
('Arjun Nag Ashok Kumar', '311515104005', '12/02/1998', 'CSE', 'arjun7ashok@gmail.com'),
('Harshitha', '311515104006', '18/03/1998', 'CSE', 'harshitha8330@gmail.com'),
('Sabari krishnan', '311515104031', '20/07/1997', 'CSE', 'mskrishhhh@gmail.com'),
('Bhargavan', '311515104007', '23/03/1997', 'CSE', 'bhargavan.balaji@gmail.com'),
('Gayathri', '311515104008', '13/12/1997', 'CSE', 'gayathrielankkathir@gmail.com'),
('Sakshi', '311515104032', '11/02/1997', 'CSE', 'srirangamsakshi35@gmail.com'),
('Gomathi', '311515104009', '15/09/1998', 'CSE', 'gomathijeni98@gmail.com'),
('Hari krishnan', '311515104010', '14/01/1998', 'CSE', 'hari.krishnan1601@gmail.com'),
('Hemashree', '311515104011', '24/07/1998', 'CSE', 'hemaroopa247@gmail.com'),
('Sanjaay Kishore', '311515104033', '06/01/1998', 'CSE', 'sanjaaykishore@gmail.com'),
('Indhumathi', '311515104012', '25/11/1997', 'CSE', 'indhu167@gmail.com'),
('Saranya', '311515104035', '29/10/1997', 'CSE', 'aspriya.nela77@gmail.com'),
('Janani', '311515104013', '10/10/1997', 'CSE', 'jananipugazh.10@gmail.com'),
('Satheesh', '311515104036', '28/03/1997', 'CSE', 'satheeshnehru7@gmail.com'),
('Kamini', '311515104014', '03/10/1996', 'CSE', 'kaminijon777@gmail.com'),
('Satya shrikar', '311515104037', '02/06/1998', 'CSE', 'satyashrikar@gmail.com'),
('Krishnakumar', '311515104015', '11/07/1998', 'CSE', 'krishnakumar1171998@gmail.com'),
('Shakthidhar', '311515104038', '29/10/1996', 'CSE', 'shakthidhar63@gmail.com'),
('Sharmila', '311515104039', '13/03/1998', 'CSE', 'sharmilanagarajan98@gmail.com'),
('Sharook ahmed', '311515104040', '19/05/1997', 'CSE', 'sharookahmed7@gmail.com'),
('Madan Kumar', '311515104016', '08/07/1997', 'CSE', 'madkumar871997@gmail.com'),
('Sneha', '311515104041', '28/10/1997', 'CSE', 'snehachandran99@gmail.com'),
('Manjula', '311515104017', '11/03/1998', 'CSE', 'manjulathambidurai@gmail.com'),
('Sreyas', '311515104042', '20/06/1997', 'CSE', 'anithavenkysreyas@gmail.com'),
('P.Srikrishnan', '311515104043', '29/07/1997', 'CSE', 'mail2psrikrishna@gmail.com'),
('Neeraja', '311515104018', '28/01/1998', 'CSE', 'neerajap45@gmail.com'),
('Nikitha Murugavel', '311515104019', '26/08/1997', 'CSE', 'nikitha100@gmail.com'),
('Srinidhi', '311515104044', '21/11/1997', 'CSE', 'srinidhikarthikeyan@gmail.com'),
('Sri Upanya', '311515104045', '07/12/1997', 'CSE', 'sriupanya@gmail.com'),
('Nikitha', '311515104020', '28/06/1998', 'CSE', 'nikithamanjunath43@gmail.com'),
('Srividhya', '311515104046', '22/07/1998', 'CSE', 'srividhyasankari@gmail.com'),
('Srividhya subramanian', '311515104047', '05/05/1998', 'CSE', 'skssrividhya@gmail.com'),
('Subhashini', '311515104048', '01/02/1998', 'CSE', 'subhashinisuresh98@gmail.com'),
('Prathiba', '311515104021', '02/07/1998', 'CSE', 'prathibakumar27@gmail.com'),
('K.Subramanian', '311515104049', '17/05/1997', 'CSE', 'subu17may@gmail.com'),
('Preethi', '311515104022', '03/09/1997', 'CSE', 'preeti3557@gmail.com'),
('Suriya', '311515104050', '27/02/1998', 'CSE', 'suriyavenkt@gmail.com'),
('Prem', '311515104023', '03/09/1997', 'CSE', 'mr.vickyfantasy@gmail.com'),
('Sushmitha', '311515104051', '23/03/1998', 'CSE', 'ksushmitha54@gmail.com'),
('Priyadharshini', '311515104025', '12/09/1997', 'CSE', 'priyadharshinikj@gmail.com'),
('Swetha', '311515104052', '27/07/1997', 'CSE', 'swethapattudurai@gmail.com'),
('Raajashri', '311515104026', '09/08/1997', 'CSE', 'raaji0919@gmail.com'),
('Thenmozhi', '311515104053', '13/10/1997', 'CSE', 'thenmozhi.b97@gmail.com'),
('Rajendra Prasad Dhakal', '311515104027', '06/12/1997', 'CSE', 'rajedhakal@gmail.com'),
('Usha', '311515104054', '05/05/1998', 'CSE', 'ushahindhu2298@gmail.com'),
('Ramya Ramdoss', '311515104029', '15/04/1998', 'CSE', 'anudhya1598@gmail.com'),
('Rashmika Calve', '311515104030', '27/11/1997', 'CSE', 'clvrashmika@gmail.com'),
('Uthra', '311515104055', '21/12/1997', 'CSE', 'uthra2197@gmail.com'),
('Vaishnavi', '311515104056', '15/01/1997', 'CSE', 'vaishu150197@gmail.com'),
('Vignesh', '311515104057', '29/07/1997', 'CSE', 'vickydesires97@gmail.com'),
('Harivenkatesh', '311515104302', '30/06/1995', 'CSE', 'harivenkatesh777@gmail.com'),
('Vijith niranjana', '311515104058', '10/11/1997', 'CSE', 'vijitha.niranjana@gmail.com'),
('Manikandan', '311515104303', '05/07/1997', 'CSE', 'manikandank2213@gmail.com'),
('Vishnu priya', '311515104059', '01/05/1998', 'CSE', 'svishnupriya19@yahoo.com'),
('Pavithra', '311515104304', '03/12/1997', 'CSE', 'pavithranageswarn@gmail.com'),
('Yashini', '311515104060', '10/07/1997', 'CSE', 'yashinisuresh.97@gmail.com'),
('Saipreethika', '311515104305', '21/07/1996', 'CSE', 'saipreethikar@gmail.com'),
('Goutham', '311515104701', '04/11/1997', 'CSE', 'gauthirio97@gmail.com'),
('Santhosh', '311515104034', '17/05/1998', 'CSE', 'santh5858@gmail.com'),
('Test', '123', '01/01/2018', 'CSE', 'test@gmail.com'),
('gayathri', '311515104008', '13/12/1997', 'CSE', 'gaayuammu97@gmail.com'),
('saranya', '311515104035', '29/10/1997', 'CSE', 'saranya291097@gmail.com'),
('Test', '30906106301', '17/05/1998', 'ECE-A', 'balsu89@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stureport`
--

CREATE TABLE `stureport` (
  `name` text NOT NULL,
  `regno` text NOT NULL,
  `dept` text NOT NULL,
  `cans` int(11) NOT NULL,
  `testno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stureport`
--

INSERT INTO `stureport` (`name`, `regno`, `dept`, `cans`, `testno`) VALUES
('Test', '123', 'CSE', 1, '01'),
('Bhargavan', '311515104007', 'CSE', 0, '01'),
('gayathri', '311515104008', 'CSE', 0, '01'),
('Test', '30906106301', 'ECE-A', 1, '01'),
('Sushmitha', '311515104051', 'CSE', 0, '01'),
('Raajashri', '311515104026', 'CSE', 13, '01'),
('Santhosh', '311515104034', 'CSE', 4, '01'),
('Prem', '311515104023', 'CSE', 8, '01'),
('Vaishnavi', '311515104056', 'CSE', 5, '01'),
('Shakthidhar', '311515104038', 'CSE', 5, '01'),
('P.Srikrishnan', '311515104043', 'CSE', 18, '01'),
('Srividhya', '311515104046', 'CSE', 10, '01'),
('Pavithra', '311515104304', 'CSE', 3, '01'),
('Vijith niranjana', '311515104058', 'CSE', 2, '01'),
('Preethi', '311515104022', 'CSE', 14, '01'),
('Gomathi', '311515104009', 'CSE', 4, '01'),
('Srinidhi', '311515104044', 'CSE', 6, '01'),
('Thenmozhi', '311515104053', 'CSE', 6, '01'),
('Akshaya', '311515104002', 'CSE', 4, '01'),
('Nikitha Murugavel', '311515104019', 'CSE', 6, '01'),
('Uthra', '311515104055', 'CSE', 8, '01'),
('Yashini', '311515104060', 'CSE', 3, '01'),
('Sabari krishnan', '311515104031', 'CSE', 7, '01'),
('Manjula', '311515104017', 'CSE', 6, '01'),
('Santhosh', '311515104034', 'CSE', 0, 't5'),
('Hari krishnan', '311515104010', 'CSE', 5, '01'),
('Aishwarya Lakshmi', '311515104001', 'CSE', 7, '01'),
('Anjana Arun Kumar', '311515104003', 'CSE', 9, '01'),
('Kamini', '311515104014', 'CSE', 5, '01'),
('Sharook ahmed', '311515104040', 'CSE', 7, '01'),
('Rashmika Calve', '311515104030', 'CSE', 10, '01'),
('', '', '', 0, ''),
('Vignesh', '311515104057', 'CSE', 9, '01'),
('Subhashini', '311515104048', 'CSE', 7, '01'),
('Rajendra Prasad Dhakal', '311515104027', 'CSE', 7, '01'),
('Satya shrikar', '311515104037', 'CSE', 6, '01'),
('Janani', '311515104013', 'CSE', 4, '01'),
('saranya', '311515104035', 'CSE', 5, '01'),
('Ramya Ramdoss', '311515104029', 'CSE', 2, '01'),
('Krishnakumar', '311515104015', 'CSE', 7, '01'),
('Sanjaay Kishore', '311515104033', 'CSE', 4, '01'),
('Prathiba', '311515104021', 'CSE', 10, '01'),
('Sharmila', '311515104039', 'CSE', 7, '01'),
('Satheesh', '311515104036', 'CSE', 3, '01'),
('Suriya', '311515104050', 'CSE', 5, '01'),
('Harshitha', '311515104006', 'CSE', 8, '01'),
('Saipreethika', '311515104305', 'CSE', 6, '01'),
('Priyadharshini', '311515104025', 'CSE', 3, '01'),
('Sakshi', '311515104032', 'CSE', 7, '01'),
('Usha', '311515104054', 'CSE', 5, '01'),
('Srividhya subramanian', '311515104047', 'CSE', 6, '01'),
('Goutham', '311515104701', 'CSE', 5, '01'),
('Harivenkatesh', '311515104302', 'CSE', 3, '01'),
('Sneha', '311515104041', 'CSE', 4, '01'),
('Sri Upanya', '311515104045', 'CSE', 8, '01'),
('Madan Kumar', '311515104016', 'CSE', 3, '01'),
('Manikandan', '311515104303', 'CSE', 2, '01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
