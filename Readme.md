
-u should install PHP7, xampp ,mysql to run this system<br>
-this system help manger to know employee attendance in any month & work hours<br>
  that employee can check in & out & sign in.<br>
- admin can sign in & add employee & view all employees or filter them by name or email or bin,view attendance<br><br>
  
  -there is 3 dierctores in this project<br>
      1- first director "main": have htmls files <br>
           /have "register.php" file <br>
      2- second : have all other php files except "register.php" in main directory.<br>
      3- third: have styles files <br><br>

-u should create sqldata base in php my admin to run this system this data base should have the following:<br><br>
-Data base name "attendence":<br>
     1-first table : "admin"<br>
            has:<br> name :"TEXT"<br>
                 password :"TEXT"<br><br>
     2-second table :"employee"<br>
         has:<br>
            name :"text"<br>
            email: "text"<br>
            bin  :"int"<br>
            date: "date"<br><br>
     3- third table :"employeecheck"<br>
           has:<br>
              in_time: "time"<br>
              out_time:"time"<br>
              bin:"int"<br>
              date:"date"  <br>  
            
