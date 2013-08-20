-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: sql310.byethost18.com
-- Generation Time: Jul 23, 2013 at 02:46 PM
-- Server version: 5.5.30-30.2
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b18_12381309_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `soft` varchar(20) NOT NULL,
  `cat` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `imglink` varchar(200) NOT NULL,
  `source` varchar(50) NOT NULL,
  `yt` tinyint(1) NOT NULL,
  `duration` int(5) NOT NULL,
  `views` int(11) NOT NULL,
  `videos` int(3) NOT NULL,
  `level` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `soft`, `cat`, `Description`, `imglink`, `source`, `yt`, `duration`, `views`, `videos`, `level`, `date`) VALUES
(1, 'Introduction to Maya 2012', 'maya', 'basics', 'In this series of tutorials, you will be introduced to the industry standard production application MAYA.We will be working in Maya 2012. </br>\nTopics covered:</br>\nInstalling Maya 2012 <a href=''http://autodesk.com''>Download</a></br>\nMaya Interface\n', 'HmPitTWKudI', 'www.youtube.com', 1, 70, 60, 4, 1, '2013-07-16 18:45:42'),
(2, 'Getting started with maya 2012', 'maya', 'basics', 'In this series of tutorials, you will be introduced to the industry standard production application MAYA.We will be working in Maya 2012. \nTopics covered:\nModelling basics \nShortcuts in maya', 'XBpI0TePikA', 'youtube.com', 1, 30, 34, 5, 1, '2013-07-02 16:49:11'),
(3, 'Introduction to CryEngine 3', 'cryengine', 'basics', 'In this series of tutorials we begin to cover CryEngine 3 SDK. If you wanted to learn CryEngine 3 SDK, this is the time to do it.\n\nWe will cover everything you need to know to get started with CryEngine 3 SDK and begin creating your own beautiful, realistic environments with one of the industries top game engines.\n\nLets begin.\n\nIn this first tutorial we cover how to download, install and launch CryEngine 3 SDK.\n\nTopics covered:\n\nDownload\n\nInstall\n\nLaunching the editor and the game\n\nChanging the game screen resolution\n\nLoading the example map, forest.cry in game and in the level editor', 'hMq5cQVOvZ4', 'youtube.com', 1, 70, 24, 9, 1, '2013-06-28 15:53:39'),
(4, 'PHP For Beginners', 'php', 'basics', 'This series of tutorials contain basics of php, and by the end of this tutorial series you can start developing basic php web apps. ', 'kY5P9sZqFas', 'youtube.com', 1, 220, 21, 15, 1, '2013-07-12 23:18:30'),
(5, 'Learn PHP in 15 minutes', 'php', 'basics', 'PHP is one of the most useful languages to know and is used everywhere you look online. In this tutorial, I start from the beginning and show you how to start writing PHP scripts.\n\nThe video covers the software you need to get started, data types, outputting data, variables, concatenating strings, operators, if statements, HTML forms, arrays and loops.</br>\n\nCheck out my Learn HTML in 12 Minutes video for a quick introduction to HTML, which will be useful before trying to understand this tutorial:\nhttp://youtu.be/bWPMSSsVdPk</br>\n\nSet Up a Local Web Server</br>\nFor Mac: http://www.mamp.info/en/index.html\nFor Windows: http://www.wampserver.com\n</br>\nRecommended Text Editors</br>\nFor Mac: http://www.sublimetext.com</br>\nFor Windows: http://notepad-plus-plus.org</br></br>\n\nhttp://jakewright.net', 'ZdP0KM49IVk', 'www.youtube.com', 1, 15, 6, 1, 1, '2013-06-25 16:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `tutos`
--

CREATE TABLE IF NOT EXISTS `tutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutorial_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(250) NOT NULL,
  `youtube` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tutos`
--

INSERT INTO `tutos` (`id`, `tutorial_id`, `name`, `description`, `link`, `youtube`) VALUES
(1, 1, 'Autodesk Maya 2013: Workflow improvement', 'In this presentation where going to look at a variety of workflow improvements in Maya 2013 that will increase your productivity. The improvements cover many everyday tasks such as file referencing, hardware rendering, skinning, and managing complex nodes', 'AbTgr95Z8nk', 1),
(2, 1, 'Maya 2014 New Features: Advanced Modelin', 'This video shows Maya 2014 New Features: Paint Effects Enhancments', 'YV51sFi5aV4', 1),
(3, 3, ' CryEngine 3 SDK: How to Download, Insta', 'Topics covered:\r\n\r\nDownload\r\n\r\nInstall\r\n\r\nLaunching the editor and the game\r\n\r\nChanging the game screen resolution', 'hMq5cQVOvZ4', 1),
(4, 3, ' CryEngine 3 SDK: Navigation, Interface,', 'In this tutorial we cover how to navigate around CryEngine, interface functions to get started and viewport configurations. After this tutorial you''ll be ready to start creating your first map. Which what we will do in the next tutorial.\r\n\r\nTopics covered:\r\n\r\n-Navigate around CryEngine 3\r\n-Interface overview\r\n-Viewport configuration\r\n-Getting comfortable with the example map', 'rsJfLijkYAw', 1),
(5, 3, ' CryEngine 3 SDK: Creating and Generatin', 'In this tutorial we cover how to generate and create new terrain.\r\n\r\nTopics covered:\r\n\r\n-Creating New Map\r\n-Defining Heightmap Resolution and Meters Per Unit\r\n-Generating and creating terrain (procedural)\r\n-Generate terrain options\r\n-Modifying terrain options\r\n-Resizing terrain', 'NeJt50kRI8c', 1),
(6, 3, ' CryEngine 3 SDK: How to Manually Paint,', 'In this tutorial we cover how to manually paint, modify and edit terrain.\r\n\r\nTopics covered:\r\n\r\n-Using Flatten, Rise/Lower, Smooth and Pick Height Terrain tools\r\n-Defining a general shape of your terrain\r\n-Manually modifying the terrain height\r\n-Combining Generate Terrain Tool and manually painting/editing terrain height', 'MDUiNdfDBFc', 1),
(7, 3, ' CryEngine 3 SDK: How to Create Realisti', 'In this tutorial we cover how to export/import/create custom heightmaps using Photoshop.\r\n\r\nTopics covered:\r\n\r\n-Export heightmap\r\n-Import heightmap\r\n-Create custom heightmap using Photoshop and default filters\r\n-Modifying and tweaking custom heightmap', 'ivkz0sACZqU', 1),
(8, 4, '1. Introduction to php', 'In this tutorial we go over a short presentation on what PHP is, what is required to learn it and what we will be covering further down the line. This video will hopefully introduce you to the PHP scripting language and get you interested in learning more.</br></br>\r\n\r\nFor more information, check out the website:\r\n\r\nhttp://howtostartprogramming.com/PHP/...', 'kY5P9sZqFas', 1),
(9, 4, '2. Installing XAMPP', 'In this short video, we will cover the part that most beginners struggle with and that is installing PHP on a server. You can use your own computer as a server by installing XAMPP and run .php files on your own computer. If you have a web hosting account then you do not need to follow this tutorial and you can simply use your web hosting to run your scripts instead.', 'ArsbbtkF0ps', 1),
(10, 4, '3. Notepad++', 'A source code editing application is every programmers best friend. Notepad++ will allow you to highlight the PHP syntax and make your code easier to write. If you can’t use Notepad++ because you don’t have windows, google for a list of PHP Editors that have Syntax highlighting enabled.', 'EuW4EhdPv0o', 1),
(11, 4, '4. Hello World', 'In this video we will begin looking at the PHP Syntax and how the server interprets the code. We write our first script that will output the text “Hello World” to the web browser using echo.', 'aCQ1X68QRig', 1),
(12, 4, '5. Variables', 'In this tutorial we start looking at the first programming concept, variables. Variables are used to store data and can be called by using the variable name and the data that it holds will be outputted instead.', 'uUV-K7ggTjc', 1),
(13, 4, '6. Comments', 'In this video we look at a very useful part of any programming language, Comments. Comments can be used to add notes to your code and make it look more organised. It can also be used to skip lines of code if you don’t want to run them, but still want to keep them typed out.', '6SBxpdnwBiQ', 1),
(14, 4, '7. Single Quotes & Concatenation', 'As I mentioned in one of the previous tutorials, there is a difference between using single quotes and double quotes. This video will investigate the difference in performance and how the strings are read by the server. Concatenation is something that you will have to get used to.', 'AEMYxKjDBcc', 1),
(15, 4, '8. Math Operators', 'This video will take a look at the basic Math Operators in PHP, showing you how to do some basic calculations with a few lines of code. We look at addition, subtraction, multiplication and division. We also look at the increment and decrement operators also.', 'YtoC0C751fY', 1),
(17, 4, '9. If Statements', 'An If statement is a conditional statement that will allow your PHP application to make a decision based on if a statement is true or false. This is where we start getting into the dynamic features of programming and understanding some of the core concepts.', 'zLMpFzha6fg', 1),
(19, 4, '10. Else & ElseIf Statements', 'In the previous tutorial we looked at the conditional If Statement. But in this video we will take a look at the ElseIf statement and the Else statement. ElseIf basically allows us to add more than one condition or option to our statement. And Else is sort of like a default action to take if none of the statements are true.\r\n', 'AaMKI2UMhDY', 1),
(20, 4, '11. Comparison Operators', 'Comparison operators are used in conditions to compare two pieces of data. For example, we can check if one piece of data is the same as another piece of data, or we can check if one integer is of a greater value than another integer.', 'L7-IAV62nCw', 1),
(21, 4, '12. Logical Operators', 'Logical operators can be used in conditions to add more than one condition or have a choice of conditions. In this video we will cover the And operator and the Or operator.', 'xEoGKig9bd8', 1),
(22, 4, '13. Arrays', 'In this video we will cover two types of Arrays; a numeric array and associative array. Arrays can be used to store a list of items that are related into one single value. Those values can then be accessed by calling the array and specifying the index.', 'FVR2UPWH9UQ', 1),
(23, 4, '14. While Loop', 'A while loop in PHP is used to execute a script while a condition is true. This video will take a look at the dynamics of a While Loop and how we would go about creating one.', 'H1mhpPuCHrw', 1),
(24, 4, ' 15. ForEach Loop', 'The ForEach Loop will allow you to loop through arrays and store the array value as a variable each time the loop is executed. It is a very useful way to loop through pieces of data when using Arrays.', 'EKNsoVW6KU0', 1),
(25, 4, '16. GET Variable', 'The GET Variable will allow you to store data taken directly from the user. It can be taken from a HTML Form using the GET method or even directly from the URL. This video will introduce the GET Variable and show you how you can take input from the user and put it through the processor and then return a dynamic result back to the browser.', 'NnC0N7LJ9PI', 1),
(26, 4, '17. POST Variable', 'Similar to the GET variable, the POST variable allows you to send data to the server from a HTML Form, but the data is invisible to the user. This is a great increase in security because if you are using the POST Variable to store information such as a password, the password is not visible in plain-text.', 'PTq-MP3VCpE', 1),
(27, 4, '18. Functions', 'PHP already holds hundreds of built-in functions that you use in your everyday applications, but in PHP you have the ability to create your own functions. A function will carry out a pre-determined set of code and can be called whenever you want it to. Functions can also take parameters so you can specify the data that is entered into a function each time you call it. Functions can also be used to return values. This video will cover the wonderful world of functions.\r\n', '1tsZ3dPfFRA', 1),
(28, 4, '19. Date and Time', 'One of the great functions of PHP is the Date function. It can be used to display the Time, Date and Day. This video will show you a simple way to output the date and time in a nicely formatted way. You can find a full list of the PHP date and time characters on the PHP website.', '7hTFhE5Bkjs', 1),
(29, 4, '20. Explode', 'The Explode function will allow you to split a string up by the string that you declare. So you could split a paragraph up into sentences by splitting it by a full stop or even split a sentence up into words by splitting it by a space. This video will show you how to explode a string and then access each string stored inside arrays.', 'AcLtQAyeN4s', 1),
(31, 4, '21. Find If String Contains a String', 'The strpos(String Position) function will allow you to check if one string contains another string and will also determine the first occurrence of that string. This function has been very useful to me when parsing web pages and should prove useful for you too.', 'vEeU93cNJE8', 1),
(32, 4, '22. Check If Variable Is Set', 'The isset function will allow you to determine if a variable has been set or not. This can be useful when checking if user input has been entered or not. The function will return either a true or false value.', 'azlX2qyPI8I', 1),
(33, 4, '23. Embedding HTML And PHP', 'There are many ways to output a response inside of your HTML and this video will investigate the different methods that you can use. The easiest way is to use single quotes but we can also stop and start our PHP script without causing errors in If Statements or Loops.', 'Zhy7UHUwBKE', 1),
(34, 4, '24. Reading A File', 'There are multiple ways to read a file in PHP but the method recommended by PHP.NET is to use the file_get_contents function. It will return the file as a string and then allow you to play around with it. You could use this for a local text file on your machine or even an external HTML page.', 'Hr_HcMEBPdo', 1),
(35, 4, '25. Writing To A File', 'In the previous tutorial we looked at the file_get_contents function which allowed us to read the contents of a file. This tutorial looks at the file_put_contents function which will allow us to easily put data into a file. We will also look how to overwrite the data and append the data.', 'blSAiNRmauc', 1),
(36, 4, '26. MySQL Introduction', 'Processing massive amounts of data without impairing the usability of an application is the most important to consider when developing high-end applications. MySQL is not a part of PHP, but can be installed on a server and then accessed by PHP. PHP will allow you to run MySQL queries to insert, modify and delete data inside of a database. In this video we take a first look at MySQL and the web-based control panel Phpmyadmin.', 'z_5834yFeEg', 1),
(37, 4, '27. MySQL Creating A Table', 'In the previous tutorial we took a first look at MySQL and Phpmyadmin. In this video we will run our first MySQL Query through PHP to create a table inside of our accounts database that we created in part 26.\r\n', 'f38A2Jcp6bs', 1),
(38, 4, '28. MySQL Inserting Data', 'This tutorial takes a look at how to insert data into a MySQL Table and specify which fields to insert data into. There is no example of using this to insert user-generated data yet because of the 15 minute limit but I will cover that don’t worry. The more experienced viewers will know how to do this already.', 'lKTGyaLefvM', 1),
(39, 4, ' 29. MySQL Reading Data', 'This video explores the SELECT statement when working with MySQL queries in PHP. We take two mock entries from our table and then display two fields in that table onto a clients page. This video does not show how to use the statement effectively but that will be covered further down the line.\r\n', 'DlKqy89qQHE', 1),
(40, 5, 'Learn php in 5 minutes', 'PHP is one of the most useful languages to know and is used everywhere you look online. In this tutorial, I start from the beginning and show you how to start writing PHP scripts.\n</br>\nThe video covers the software you need to get started, data types, outputting data, variables, concatenating strings, operators, if statements, HTML forms, arrays and loops.</br>\n</br>\nCheck out my Learn HTML in 12 Minutes video for a quick introduction to HTML, which will be useful before trying to understand this tutorial:\nhttp://youtu.be/bWPMSSsVdPk</br>\n\nSet Up a Local Web Server</br>\nFor Mac: http://www.mamp.info/en/index.html\nFor Windows: http://www.wampserver.com\n</br>\nRecommended Text Editors</br>\nFor Mac: http://www.sublimetext.com</br>\nFor Windows: http://notepad-plus-plus.org</br></br>', 'ZdP0KM49IVk', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
