# record_system
 Student record system

Group: 27

Name: 
Lam Yin Ying Elayne(12239282).
Lai Joe Wing(13261888).
Li Siu Kit(13342258).
Yeung Nga Ting Winnie(13382717)

Github link: https://github.com/EnmaYuki/record_system.git

WAMP (Version: 3.2.6) link: https://drive.google.com/file/d/1iQNaMOt6-pfZYQaZuUhyuB-7Dh8TVBQI/view?usp=drive_link

Open steps:
1. After installing the WAMP, opening the broswer and entering 'localhost'. If it is successful, you can see the WAMP Server interface.
2. Then download the zip folder on the github through the application link, and unzip it to the www folder in the wamp64 folder
3. Going back to the broswer, entering '/' after the 'localhost' and the folder name. If it is successful, you may see the index of the system.

Open database steps:
1. Finding the icon of WAMP in the arrow in task column, then left click it to select the PhpMyAdmin whether any version.
2. Select the language which want to set up, then enter 'root' in the username.
3. The password fill in blank and checking that the server choice is MYSQL.
4. After pressing the 'Go' button, you can successfully enter the database.

********************************************
# Student record system
This system is for managing student records of the School of Science and Technology.

It is written in html and php language, and managed by WAMP.

********************************************
# Login
Through the login interface, each user (Student, Teacher, Admin) can access the student record system by entering their role first, then entering the username and password.

Each user has a role('t for teacher', 's for student' and 'a for admin'), username and password;

	{'userid','role','password'}
 
	{'ADMIN', 'a', 'administrator'},
 
	{'11223654', 's', '45632211'},
 
	{'12353265', 's', '56235321'},
 
	{'14223652', 's', '25632241'},
 
	{'38459313', 't', '31395483'},
 
	{'38459341', 't', '14395483'},
 
	{'38459888', 't', '88895483'}

After successful login, user can enter the page based on their role.

********************************************
# Logout
In the each page, each user can log out their account by clicking logout.

********************************************
# Reset password
In the home page, each user can reset their password by clicking 'Reset Password'.

********************************************
# Student
After login, student can see their name on the page.

- View academic record
  
  1. Select the course that the student wants to check its acadmeic record
  
  2. Then student can see the course name and the gpa of the relevant course.
  
- View personal information
  
  Student can directly see their personal information on the page.
  
- Edit/Update personal information
  
  If student want to edit or update their personal information, they just need to click on the 'Edit' button and enter the content.

********************************************
# Teacher
After login, teacher can see their name on the page.

- Select students from the courses they are teaching to

  Teacher can view the student after select a course from the courses.
  
- View and Update students' academic record

  Teacher can view the original score of the corresponding assessment of student.

  If they want to update the score, they just need to enter the score and click on the 'Update' button.

- Add assessment
  
  Teacher can add assessment by entering id, courseid, aid, weighting and total score, then press 'Add assessment' button.

********************************************
# Admin
After login, admin can see the functions.

- Edit teachers
  1. Select the teacher id which want to be deleted, then press 'Delete Teacher' button.
  2. Add teacher by entering the teacher id, teacher name and mobile number, then press 'Add Teacher' button.
  
  If it is successful, it would show up a message.

- Edit students
  1. Select the student id which want to be deleted, then press 'Delete Student' button.
  2. Add teacher by entering the student id, student name and course code, then press 'Add Student' button.
  
  *The new student does not have gpa, so the academic record cannot be updated.
  
  If it is successful, it would show up a message.

- Edit course information
  
  Add course by entering the course id, course title and course credit, then press 'Add course' button.
  
  If it is successful, it would show up a message.

********************************************
# Project Status
We apologize for the late implementation which cause the incomplete status of the task. 

The function of reset password is not yet finish, so it is failed to work.

Also, the page of student and teacher has not already done so that those function of personal information and the assessment is fail to implement.
