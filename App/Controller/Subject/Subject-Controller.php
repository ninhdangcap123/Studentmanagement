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
  case 'add-subject':
    $rs=$obj->showCourse();
    $rs1=$obj->showCourse();
    if(isset($_POST['submit']))
    {
        $obj=new DbFunction();
        $obj->create_subject($_POST['course-short'],$_POST['course-full'],$_POST['sub1'],$_POST['sub2'],$_POST['sub3']);
    }
    include "App/View/pages/add-subject.php";
    break;

    case 'view-subject':
      $rs=$obj->showSubject();
      if(isset($_GET['del']))
      {
          $obj->del_subject(intval($_GET['del']));
      }
      include "App/View/pages/view-subject.php";
      break;

      case 'edit-sub':
        $id=$_GET['sid'];
        $rs=$obj->showSubject1($id);
        $res=$rs->fetch_object();
        if(isset($_POST['submit']))
        {
            $id=$_GET['sid'];
            $obj->edit_subject($_POST['sub1'],$_POST['sub2'],$_POST['sub3'],$_POST['udate'],$id);
        }
        include "App/View/pages/edit-sub.php";
        break;

  default:
  include "App/View/pages/add-subject.php";

    break;
}
 ?>
