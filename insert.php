<?php
	//require('fpdf181/fpdf.php');

    $mysql_host = "localhost";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "hr_form";
    
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);



    if ($_SERVER["REQUEST_METHOD"] == "POST") {



    	$u_name = filter_var($_POST["u_name"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
    $desig = filter_var($_POST["designation"], FILTER_SANITIZE_STRING); 
    $pis=filter_var($_POST["PIS_NO"], FILTER_SANITIZE_NUMBER_INT);
    $doj = $_POST['date_of_joining'];
    $phone=filter_var($_POST["phone_no"], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);   
    $category = filter_var($_POST["category"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
    $dob = $_POST["DOB"];
    $qual = filter_var($_POST["qualification"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below




    $group=filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT);
    $activity=filter_var($_POST["activity_no"], FILTER_SANITIZE_NUMBER_INT);
    $period=filter_var($_POST["period_present_assign"], FILTER_SANITIZE_NUMBER_INT);
    $suit=$_POST["suitable"];
    $c_title = filter_var($_POST["course_title"], FILTER_SANITIZE_STRING); 
    $c_venue = filter_var($_POST["course_venue"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
    $dur=filter_var($_POST["duration"], FILTER_SANITIZE_NUMBER_INT);
    $doc = $_POST["date_of_course"];
    $basic=filter_var($_POST["basic_pay"], FILTER_SANITIZE_NUMBER_FLOAT);
    $total=filter_var($_POST["total_pay"], FILTER_SANITIZE_NUMBER_FLOAT);
    $salary=filter_var($_POST["salary_for_training"], FILTER_SANITIZE_NUMBER_FLOAT);
    $reg=filter_var($_POST["registration_fee"], FILTER_SANITIZE_NUMBER_FLOAT);
    $ta=filter_var($_POST["TA/DA"], FILTER_SANITIZE_NUMBER_FLOAT);



    $criteria = filter_var($_POST["criteria"], FILTER_SANITIZE_STRING);
    $similar=$_POST["attended_similar"];
    $title_prev = filter_var($_POST["course_title"], FILTER_SANITIZE_STRING); 
    $venue_prev = filter_var($_POST["course_venue"], FILTER_SANITIZE_STRING); 
    $tcform=$_POST["training_completion_form"];
    $reason = filter_var($_POST["reason"], FILTER_SANITIZE_STRING); 



    if (empty($u_name)){
        die("Please enter your name");
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Please enter valid email address");
    }





    $sql = "INSERT INTO user1 (u_name,designation,PIS_NO,date_of_joining,phone_no,
    email, category, DOB, qualification) VALUES('$u_name','$desig','$pis','$doj','$phone','$email','$category','$dob','$qual')";


    $sql1 = "INSERT INTO user2 (group_no, activity_no, period_present_assign, suitable, 
     course_title, course_venue,duration, date_of_course) VALUES('$group','$activity','$period','$suit','$c_title','$c_venue','$dur','$doc')";


    $sql2 = "INSERT INTO user3 ( basic_pay, total_pay, salary_for_training, 
    registration_fee,TA,criteria,attended_similar, title_of_previous_course, venue_of_previous_course,
    training_completion_form, reason) VALUES('$basic','$total','$salary','$reg','$ta','$criteria','$similar','$title_prev','$venue_prev','$tcform','$reason')"; 


	$result1 = $mysqli->query($sql) or die($mysqli->error);
	$result2 =$mysqli->query($sql1) or die($mysqli->error);
    $result3 =$mysqli->query($sql2) or die($mysqli->error); 


    if($result1 == 1 && $result2 ==1 && $result3 ==1){
	  print "Hello " . $u_name . "!, your form has been submitted!";

	}

	ob_start();
        ?>

        <h1>Data from form</h1>
        <p>Name: <?php echo $u_name;?></p>
		<p>Designation: <?php echo $desig;?></p>
		<p>PIS NO: <?php echo $pis;?></p>
        <p>Date of joining: <?php echo $doj;?></p>
        <p>Phone No : <?php echo $phone;?></p>
        <p>Email : <?php echo $email;?></p>
        <p>Category: <?php echo $category;?></p>
        <p>Date of Birth:<?php echo $dob;?></p>
        <p>Qualification: <?php echo $qual;?></p>
        <p>Group No : <?php echo $group;?></p>
        <p>Activity No : <?php echo $activity;?></p>
        <p>Period in the present assignment(in Months): <?php echo $period;?></p>
        <p>Is qualification/experience Suitable to the assignment : <?php echo $suit;?></p>
        <p>Title of CEP/Trg./Course/Seminar etc : <?php echo $c_title;?></p>
        <p>Venue of CEP/Trg./Course/Seminar etc : <?php echo $c_venue;?></p>
        <p>Duration(in Months): <?php echo $dur;?></p>
        <p>Date of course: <?php echo $doc;?></p>
        <p>Basic Pay RS: <?php echo $basic;?></p>
        <p>Total Pay RS: <?php echo $total;?></p>
        <p>Salary for training period Rs: <?php echo $salary;?></p>
        <p>Registration fee (if any) Rs: <?php echo $reg;?></p>
        <p>TA/DA Rs: <?php echo $ta;?></p>
        <!-- <p>Criteria: <?php echo $criteria;?></p> 
        <p>Has nominee attended similar program in the past?: <?php echo $similar;?></p>
        <p>Details of other Trg./Course/Seminar attended during the Last two years Title of previous Trg./Course/Seminar: <?php echo $title_prev;?></p>
        
         <p>Venue of previous Trg./Course/Seminar : <?php echo $venue_prev;?></p>
        <p>Have you submitted the Trg.Completion Form for other Trg. /Course attended by you : <?php echo $tcform;?></p>
		<p>If No,reason there of : <?php echo $reason;?></p> -->        
        <?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        $mpdf->Output('demo.pdf','D');
        $mpdf->Output();

        //save to server
        //$mpdf->Output("mydata.pdf",'F');

	
}

?>	  
