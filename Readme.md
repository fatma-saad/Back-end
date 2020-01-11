
-u should install PHP7, xampp ,mysql to run this system
-this system help manger to know employee attendance in any month & work hours
  that employee can check in & out & sign in.
 - admin can sign in & add employee & view all employees or filter them by name or email or bin,view attendance
  
  -there is 3 dierctores in this project
    1- first director "main": have htmls files
           /have "register.php" file
     2- second : have all other php files except "register.php" in main directory.
     3- third: have styles files

-u should create sqldata base in php my admin to run this system this data base should have the following:
-Data base name "attendence":
   1-first table : "admin"
            has: name "TEXT"
                 password "TEXT"
    2-second table :"employee"
         has:name "text"
            email "text"
            bin  "int"
            date: "date"
    3- third table :"employeecheck"
           has:
              in_time: "time"
              out_time:"time"
              bin:"int"
              date:"date"    
            
