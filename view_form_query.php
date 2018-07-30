<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Forms filled</title>
  <style>
  <!--
   body {
    font-family: Tahoma, Verdana, Arial, Sans-serif;
    font-size: 11px;
   }
   hr {
    border: 1px #ccc;
    border-style: none none solid none;
    margin: 20px 0;
   }
   a {
    color: #333;
    text-decoration: none;
   }
   a:hover {
    text-decoration: underline;
   }
   a.selected {
    font-weight: bold;
    text-decoration: underline;
   }
   .numbers {
    line-height: 20px;
    word-spacing: 4px;
   }
  //-->
  </style>
  </head>
  <body>
  	<h1>Forms Filled by User</h1>
<hr />
<?php


	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();

	  ini_set('display_errors','On');
      error_reporting(E_ALL);

    include 'pagination.class.php';
            



        $data_array[] = array('u_name'=>'u_name', 'designation'=>'designation', 'PIS_NO'=>'PIS_NO', 'date_of_joining'=>'date_of_joining', 'phone_no'=>'phone_no', 'email'=>'email', 'category'=>'category', 'DOB'=>'DOB', 'qualification'=>'qualification', 'group_no'=>'group_no', 'activity_no'=>'activity_no', 'period_present_assign'=>'period_present_assign', 'suitable'=>'suitable', 'course_title'=>'course_title', 'course_venue'=>'course_venue', 'duration'=>'duration', 'date_of_course'=>'date_of_course', 'basic_pay'=>'basic_pay', 'total_pay'=>'total_pay', 'salary_for_training'=>'salary_for_training', 'registration_fee'=>'registration_fee', 'TA'=>'TA','criteria'=>'criteria', 'attended_similar'=>'attended_similar', 'title_of_previous_course'=>'title_of_previous_course', 'venue_of_previous_course'=>'venue_of_previous_course', 'training_completion_form'=>'training_completion_form', 'reason'=>'reason');
		if(isset($_POST['view_form']))
			{
				@$username=$_SESSION['username'];
				@$pisno = $_POST['PIS_NO'];
//@$usid=$_POST['usid']
				// $query = "select * from user1 LIMIT 3";

				$limit = 2;  
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
				$start_from = ($page-1) * $limit; 

				$query="SELECT  u_name, designation, PIS_NO, date_of_joining, phone_no, email, category, DOB, qualification, group_no, activity_no, period_present_assign, suitable, course_title, course_venue, duration, date_of_course, `basic_pay`, `total_pay`, `salary_for_training`, `registration_fee`, `TA`, `criteria`, `attended_similar`, `title_of_previous_course`, `venue_of_previous_course`, `training_completion_form`, `reason` FROM user2 a ,user1 b, user3 c WHERE a.Id=b.id AND b.Id=c.id AND a.Id=c.id AND PIS_NO='$pisno'";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				
				// print_r(mysqli_fetch_assoc($query_run));
				// //echo mysqli_num_rows($query_run);
				// print_r(mysqli_fetch_assoc($query_run));
				// print_r(mysqli_fetch_assoc($query_run));
				// print_r(mysqli_fetch_assoc($query_run));
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					//$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					// $row = mysqli_fetch_assoc($query_run)
					while ($row = mysqli_fetch_assoc($query_run))
						{
							//$array = $row;
							
						$data_array[]=array(
						'u_name'=> $row['u_name'],'designation'=>$row['designation'],'PIS_NO'=>$row['PIS_NO'],'date_of_joining'=>$row['date_of_joining'],'phone_no'=>$row['phone_no'],'email'=> $row['email'],'category'=>$row['category'],'DOB'=>$row['DOB'],'qualification'=>$row['qualification'],'group_no'=>$row['group_no'],'activity_no'=>$row['activity_no'],'period_present_assign'=>$row['period_present_assign'],'suitable'=>$row['suitable'],'course_title'=>$row['course_title'],'course_venue'=>$row['course_venue'],'duration'=>$row['duration'],'date_of_course'=>$row['date_of_course'],'basic_pay'=>$row['basic_pay'],'total_pay'=>$row['total_pay'],'salary_for_training'=>$row['salary_for_training'],'registration_fee'=>$row['registration_fee'],'TA'=>$row['TA'],'criteria'=>$row['criteria'],'attended_similar'=>$row['attended_similar'],'title_of_previous_course'=>$row['title_of_previous_course'],'venue_of_previous_course'=>$row['venue_of_previous_course'],'training_completion_form'=>$row['training_completion_form'],'reason'=>$row['reason']);
  							// Looping through the resultset.
						}
					 //print_r($data_array);

					if (count($data_array)) {
          // Create the pagination object
          $pagination = new pagination($data_array, (isset($_GET['page']) ? $_GET['page'] : 1), 2);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator(' | ');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
            echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
            // Loop through all the items in the array
            foreach ($productPages as $productArray) {
              // Show the information about the item
              echo '<p><b>'.$productArray['u_name'].'</b> &nbsp;<b>'.$productArray['designation'].'</b> &nbsp;<b>'.$productArray['PIS_NO'].'</b> &nbsp;<b>'.$productArray['date_of_joining'].'</b> &nbsp; <b>'.$productArray['phone_no'].'</b> &nbsp;<b>'.$productArray['email'].'</b> &nbsp;<b>'.$productArray['category'].'</b> &nbsp;<b>'.$productArray['DOB'].'</b> &nbsp;<b>'.$productArray['qualification'].'</b> &nbsp;<b>'.$productArray['group_no'].'</b> &nbsp;<b>'.$productArray['activity_no'].'</b> &nbsp;<b>'.$productArray['period_present_assign'].'</b> &nbsp;<b>'.$productArray['suitable'].'</b> &nbsp;<b>'.$productArray['course_title'].'</b> &nbsp;<b>'.$productArray['course_venue'].'</b> &nbsp;<b>'.$productArray['duration'].'</b> &nbsp;<b>'.$productArray['date_of_course'].'</b> &nbsp;<b>'.$productArray['basic_pay'].'</b> &nbsp;<b>'.$productArray['total_pay'].'</b> &nbsp;<b>'.$productArray['salary_for_training'].'</b> &nbsp; <b>'.$productArray['registration_fee'].'</b> &nbsp;<b>'.$productArray['criteria'].'</b> &nbsp;<b>'.$productArray['attended_similar'].'</b> &nbsp;<b>'.$productArray['title_of_previous_course'].'</b> &nbsp;<b>'.$productArray['venue_of_previous_course'].'</b> &nbsp; <b>'.$productArray['training_completion_form'].'</b> &nbsp; <b>'.$productArray['reason'].'</b> &nbsp;
              </p>';

              
  // echo "<table>
  //  <tr>
  //     <td > 
  //       Name :
  //     </td>
  //     <td>"
  //     .$productArray['u_name'].
  //     "</td>
  //   </tr>
    
  //  <tr>
  //     <td> 
  //       Designation :
  //     </td>
  //     <td>"
  //     .$productArray['designation'].
  //     "</td>
  //   </tr>
    
  //  <tr>
  //     <td> 
  //       PIS No. :
  //     </td>
  //     <td>"
  //     .$productArray['PIS_NO'].
  //     "</td>
  //   </tr>
    
  //  <tr>
  //     <td> 
  //      Date of Joining:
  //     </td>
  //     <td>"
  //     .$productArray['date_of_joining'].
  //     "</td>
  //   </tr>
    
  //  <tr>
  //     <td> 
  //       Phone No. :
  //     </td>
  //     <td>"
  //     .$productArray['phone_no'].
  //     "</td>
  //   </tr>"
    
  // ;


            }
            // print out the page numbers beneath the results
            echo $pageNumbers;
          }
        }	
					
          			}
   
					
					else
					{
						echo '<script type="text/javascript">alert("No form exists.")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}

	?>
<hr />
<p><a href="http://localhost/drdo/homepage.php" target="_blank">Home</a>
</body>
</html>
<!-- 
$data_array[]=array(
'u_name'=$row['u_name'],'email'= $row['email']
); -->