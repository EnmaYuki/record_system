# record_system
 Student record system

Group: 27

Name: 
Lam Yin Ying Elayne(12239282).
Lai Joe Wing(13261888).
Li Siu Kit(13342258).
Yeung Nga Ting Winnie(13382717)

Application link: https://github.com/EnmaYuki/record_system.git

WAMP (Version: 3.2.6) link: https://drive.google.com/file/d/1iQNaMOt6-pfZYQaZuUhyuB-7Dh8TVBQI/view?usp=drive_link

Open steps:
1. After installing the WAMP, opening the broswer and entering 'localhost'. If it is successful, you can see the WAMP Server interface.
2. Then download the zip folder on the github through the application link, and unzip it to the www folder in the wamp64 folder
3. Going back to the broswer, entering '/' after the 'localhost' and the folder name. If it is successful, you may see the index of the system.

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
In the home page, each user can log out their account by clicking logout.

********************************************
# Student
After login, student can see their name on the page.

- View academic record
  
  1. Select the course that the student wants to check its acadmeic record
  
  2. Then student can see the assessment name and the score of corresponding assessment.
  
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

********************************************
# Admin
After login, admin can see the functions.

- Edit and remove course information
- Add and remove all user's information
- Review course information

********************************************
# Project Status
We apologize for the late implementation which cause the incomplete status of the task. 

The page of admin has not already done so that those function of admin is fail to implement.
