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
1. After installing the wamp, opening the broswer and entering localhost. If it is successul, you can see the WAMP Server interface.
2. Then download the zip folder on the github through the application link, and unzip it to the www folder in the wamp64 folder
3. Going back to the broswer, entering '/' and the folder name. If it is successful, you may see the index of the system.

********************************************
# Student record system
This system is for managing student records of the School of Science and Technology.

It is convenience to open through the broswer, so the user can access easily.

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
- View academic record
- View personal information
- Edit/Update personal information

********************************************
# Teacher
- Select students from the courses they are teaching to
- View students' academic record
- Update students' academic record

********************************************
# Admin
- View students' academic record
- Edit and remove course information
- Add and remove all user's information
- Review course information

********************************************
# Project Status
We apologize for the late implementation which cause the incomplete status of the task. 

The page of admin has not already done so that those function of admin is fail to implement.
