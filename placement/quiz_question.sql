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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
