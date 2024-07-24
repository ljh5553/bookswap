# BOOKSWAP
[HOMEPAGE](http://211.243.231.147:808/)

Term-project of Software Engineering(2023, Spring), Dept. of Software, Gachon Univ.

The webpage platform that students exchange their books freely in campus.

Sending email in Authorization function is powered by [PHPMailer](https://github.com/PHPMailer/PHPMailer) which is following LGPL license.

Contributors : JiSeong Kim, TaeHyun Kim, JungWoong Park, SeoIn Lee, JunHyeong Lee, HyeYeong Lee.


# Description
Manual written by JUNHYEONG LEE

1.	Overall explanation of bookswap
   
 BOOKSWAP is term-project of software engineering course during spring semester, 2023. The project managed by Group20 which has 6 members (JiSeong Kim, TaeHyun Kim, JungWoong Park, SeoIn Lee, JunHyeong Lee, HyeYeong Lee). Most of the source code is consisted of HTML, CSS, PHP because it is web-based project. For configuration management, we use github. If you want some additional information like change history, please visit our github, https://github.com/ljh5553/bookswap.

 The front-end page decomposed to board, chat, finding, login, mypage, signup. Board is literally board, which allow user to post and view postings. Chat is chatting page which is access in specific post on board. You can direct message to posting writer by chatting. Finding allows to find your account information when you forget about E-mail or password. Login is a login page that is essential for every transaction web-page. Nothing specially, login page gets user’s input and compare with database. Mypage allows to user check their posting and manage transactions. Signup is registration page of the project. One of the important features of our project is E-mail verification and this part does verification. Rest part of PHP is actual database processing files. They are invisible to user but they process data and returns the results.
 
 The back-end part is decomposed by server and database. The folder ‘sql’ is storing SQL files for database. So, if you read the SQL files, you can realize what data is stored and how data is managed. Database management system is MariaDB. MariaDB is forked project of MySQL. Therefore, it is familiar most of beginner developers like us. Server is not included in source code. But the project is hosted by Apache HTTP web server.
 
 This project reused other component for E-mail sending. PHPMailer is connector of PHP and SMTP. It gets information by user and run on PHP, and send the E-mail my connected E-mail account. In the project, we used Google’s GMAIL for SMTP. PHPMailer is following LGPL license, so there is no problem for copyright. If you want to know more about PHPMailer, visit their github, https://github.com/PHPMailer/PHPMailer.
 
 Some files associated chat and database might omit its comment on source code. This is because comments are making trouble for data exchange. For example, chat communicates between files by JSON, but if I add comment on chat file, it will store comment without distinguishing actual code and comment. Therefore, on unparsing stage, it cannot parse properly and make errors. So please give mercy for that. I want to solve the problems too but I cannot make it.
 
2.	Actual hosting on server
   
 BOOKSWAP is running on server 24/7 right now. You can access the BOOKSWAP page by http://bookswap.co.kr or http://211.243.231.147:808/. The server is managed by JUNHYEONG LEE. And the physical server component is Raspberry Pi 4 which is enough to host web server.
 Server’s operating system is Raspberry Pi OS, based on Debian. So, I cannot confirm if it would run properly on other operating systems like Windows, although I tested earlier versions on Windows XAMPP environments. And as I mentioned already, data are managed by MariaDB.
 If you are getting trouble accessing web-page, check the port of address. It should be 808. Since there are some other applications running on same server, incorrect port number may lead you other hosting systems (like Node.js) or cause access problem. Or maybe the server is down.
 
3.	If you want to run the project yourself…
   
 If you run the project for testing, I recommend using XAMPP for Windows. XAMPP is package for APM(Apache, PHP, MySQL) flatform, which is the same with the project. Installing XAMPP is including all of required components. After installing, you need to make database structure. Fortunately, source code provides all SQL files which is required for structing database. Run MySQL and run all the SQL files you have. Now all you need to do is just drop and drag entire source file on XAMPP and access localhost for testing. And configurate passwords for ./db_info.php and ./signup/signup.php. If you download and install correctly (and if source code is not broken while adding comments) you will get exactly same copy of the BOOKSWAP page. For more information about installing XAMPP, check https://teserre.tistory.com/12. The page is explaining how to install XAMPP and basic guide for hosting, written in Korean.
