
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <h1>Solid State Physics Laboratory, Delhi</h1>
    <h3>RECOMMENDATION FOR ATTENDING CEP/TRG./COURSE/SEMINAR ETC.</h3>
    <h4>*Please do not leave any column blank</h4>
    <form method="post" action="insert.php">
        Name :
        <input type="text" name="u_name" placeholder="Name" required />
        <br /> Designation :
        <input type="text" name="designation" placeholder="Designation" required/>
        <br /> PIS NO :
        <input type="text" name="PIS_NO" placeholder="PIS NO" required/>
        <br /> Date of joining:
        <input type="date" name="date_of_joining" required/>
        <br /> Phone No :
        <input type="text" name="phone_no" placeholder="Phone No" required />
        <br /> Email :
        <input type="email" name="email" placeholder="Email" required/>
        <br /> Category:
        <br/>
        <input type="radio" name="category" value="GEN" required>GEN
        <br>
        <input type="radio" name="category" value="OBC">OBC
        <br>
        <input type="radio" name="category" value="SC"> SC
        <br>
        <input type="radio" name="category" value="ST"> ST
        <br /> Date of Birth:
        <input type="date" name="DOB" required/>
        <br /> Qualification:
        <input type="text" name="qualification" required/>
        <br /> Group No :
        <input type="text" name="group_no" placeholder="Group No" required/>
        <br /> Activity No :
        <input type="text" name="activity_no" placeholder="Activity No" required/>
        <!-- <br /> Group No :
        <input type="number" name="group_no" placeholder="Group No" required/> -->
        <br /> Period in the present assignment(in Months):
        <input type="number" name="period_present_assign" required/>
        <br /> Is qualification/experience Suitable to the assignment :
        <br/>
        <input type="radio" name="suitable" value="1" required>Yes
        <br>
        <input type="radio" name="suitable" value="0">NO
        <br> Title of CEP/Trg./Course/Seminar etc :
        <input type="text" name="course_title" placeholder="Title" required />
        <br /> Venue of CEP/Trg./Course/Seminar etc :
        <input type="text" name="course_venue" placeholder="Venue" required />
        <br /> Duration(in Months):
        <input type="number" name="duration" required/>
        <br /> Date of course:
        <input type="date" name="date_of_course" required/>
        <br />
        <h4>Expenditure:</h4> Basic Pay RS:
        <input type="text" name="basic_pay" placeholder="Basic pay" required/>
        <br /> Total Pay RS:
        <input type="text" name="total_pay" placeholder="Total pay" required/>
        <br /> Salary for training period Rs:
        <input type="text" name="salary_for_training" required/>
        <br /> Registration fee (if any) Rs:
        <input type="text" name="registration_fee" />
        <br /> TA/DA Rs:
        <input type="text" name="TA/DA" />
        <br> Criteria:
        <br/>
        <input type="checkbox" name="criteria" value="Improvement in job skill" required>Improvement in job skill
        <br>
        <input type="checkbox" name="criteria" value="Improvement in qualification">Improvement in qualification
        <br>
        <input type="checkbox" name="criteria" value="Special training ">Special training
        <br>
        <input type="checkbox" name="criteria" value="For new assignment ">For new assignment
        <br>
        <input type="checkbox" name="criteria" value="Refreshment knowledge">Refreshment knowledge
        <br>
        <input type="checkbox" name="criteria" value="Presentation of paper"> Presentation of paper
        <br> Has nominee attended similar program in the past?:
        <br/>
        <input type="radio" name="attended_similar" value="1" required>Yes
        <br>
        <input type="radio" name="attended_similar" value="0">NO
        <br> Details of other Trg./Course/Seminar attended during the Last two years Title of previous Trg./Course/Seminar:
        <input type="text" name="title_of_prev_course" placeholder="Title" required />
        <br /> Venue of previous Trg./Course/Seminar :
        <input type="text" name="venue_of_prev_course" placeholder="Venue" required />
        <br /> Have you submitted the Trg.Completion Form for other Trg. /Course attended by you : Yes/No
        <br/>
        <input type="radio" name="training_completion_form" value="1" required>Yes
        <br>
        <input type="radio" name="training_completion_form" value="0">NO
        <br> If No,reason there of :
        <textarea name="reason"></textarea>
        <br />

        <input type="submit" value="Submit" />
    </form>
    <h3>NOTE: After completion of the Training Kindly submit the Training Completion Form</h3>
</body>
</html>
