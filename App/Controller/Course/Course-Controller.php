<?php

include('App/Model/DbFunction.php');
$obj=new DbFunction();
if (isset($_GET['action']))
{
 $action = $_GET['action'];
}
else {
 $action = '';
}

switch ($action) {


  case 'add-course':
    if(isset($_POST['submit']))
    {
        $obj->create_course($_POST['course-short'],$_POST['course-full'],$_POST['cdate']);
    }
    include "App/View/pages/add-course.php";
    break;

    case 'view-course':
      $rs=$obj->showCourse();
      if(isset($_GET['del']))
      {
            $obj->del_course(intval($_GET['del']));
      }
      include "App/View/pages/view-course.php";
      break;

      case 'edit-course':
        $id=$_GET['cid'];
        $rs=$obj->showCourse1($id);
        $res=$rs->fetch_object();
        if(isset($_POST['submit']))
        {
            $obj->edit_course($_POST['course-short'],$_POST['course-full'],$_POST['udate'],$id);
        }
        include "App/View/pages/edit-course.php";
        break;



  default:
  include "App/View/pages/add-course.php";
    break;
}



 ?>
