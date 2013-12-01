<?php

//index .php
echo 'hello';
header("Location: views/loginView.php");








/*
=================================
      Test for Add Schdule
=================================
*/
// $taskName = "Jeager Maintenance";
// $taskDesc = "Replace The Nuclear Reactor, ".
//             "Clean the Radioactive waste, ".
//             "And just put it back in, not too hard";
//             //5 days later
// $taskDue  = date('Y-m-d H:i:s',mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
// $inv_mp = "1,2,3";

// $db_controller->addScheduleTask( $taskName, $taskDesc, $taskDue, $inv_mp);



/*
========================================
      Test for Add User Account
========================================
*/
// $username = 'pamela';
// $password = 'eshan is so cool';
// $rank = 1;
// $email = 'pam.dayne@gmail.com';
// $job_title = 'Senior Mechatronics Officer';

// $db_controller->addUserAccount($username,$password,$rank,$email,$job_title);

// ========================================
//       Test for Add Notification
// ========================================

// $subject = "Hello There";
// $description = "Welcome to the maintenace Schedule Service. We hope you enjoy";
// $link = "www.google.com";
// $userid = "1";
// $taskid = "2";
// $notifid = "3";

// $db_controller->addNotification($subject, $description, $link, $userid, $taskid, $notifid);


// ========================================
//       Test for Remove Schedule
// ========================================

// $id = 7;
// $db_controller->removeSchedule($id);

// ========================================
//       Test for Remove User
// ========================================

// $id = 19;
// $db_controller->removeUser($id);

// ========================================
//       Test for Remove Notification
// ========================================

// $id = 6;
// $db_controller->removeNotification($id);

// ========================================
//       Test for Remove User Task
// ========================================

// $id = 2;
// $db_controller->removeUserTask($id);


// $db_controller->testDatabse();

