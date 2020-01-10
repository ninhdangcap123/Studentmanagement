<?php
session_start();

 if (isset($_GET['Controller']))
 {
  $controller = $_GET['Controller'];
 }
 else
 {
  $controller = '';
 }

 switch ($controller)
 {
      case 'Student':
         include "App/Controller/Student/Student-Controller.php";
         break;

      case 'Subject':
          include "App/Controller/Subject/Subject-Controller.php";
          break;

      case 'Course':
        include "App/Controller/Course/Course-Controller.php";
        break;






 }
 ?>
