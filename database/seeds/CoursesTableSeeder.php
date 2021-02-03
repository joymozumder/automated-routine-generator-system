<?php

use Illuminate\Database\Seeder;
use App\Course;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(['code'=>'ACC101','name'=>'Basic Accounting','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE110','name'=>'Introduction to Computer System (Laboratory)','credit'=>2,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'EEE101','name'=>'Electrical Circuits I','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE102','name'=>'Electrical Circuits I Laboratory','credit'=>1.5,'type'=>2,'status'=>true,]);
        Course::create(['code'=>'ENG101','name'=>'General English','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'MAT105','name'=>'Engineering Mathematics I','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'ME102','name'=>'Mechanical Engineering Drawing ‎& ‎CAD ‎(‎Laboratory‎)‎','credit'=>1,'type'=>4,'status'=>true,]);
        Course::create(['code'=>'PHY101','name'=>'Engineering Physics I','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE103','name'=>'Discrete Mathematics','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE111','name'=>'Structured Programming','credit'=>2,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE112','name'=>'Structured Programming Laboratory','credit'=>2,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'EEE211','name'=>'Electronics I','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE212','name'=>'Electronics I Laboratory','credit'=>1.5,'type'=>2,'status'=>true,]);
        Course::create(['code'=>'ENG103','name'=>'Developing English Skills','credit'=>2,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'MAT107','name'=>'Engineering Mathematics II','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'PHY103','name'=>'Engineering Physics II','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE211','name'=>'Object Oriented Programming','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE212','name'=>'Object Oriented Programming Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE221','name'=>'Data Structure','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE222','name'=>'Data Structure Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'ECO201','name'=>'Basic Economics','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE311','name'=>'Digital Electronics','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE312','name'=>'Digital Electronics Laboratory','credit'=>1.5,'type'=>2,'status'=>true,]);
        Course::create(['code'=>'MAT201','name'=>'Engineering Mathematics III','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE225','name'=>'Algorithm Design And Analysis','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE226','name'=>'Algorithm Design And Analysis Laboratory','credit'=>1,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE237','name'=>'Database Management System','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE238','name'=>'Database Management System Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'EEE201','name'=>'Signals & Systems','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE202','name'=>'Signals & Systems Laboratory','credit'=>1,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'MAT203','name'=>'Engineering Mathematics IV','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'MGT203','name'=>'Industrial & Business Management','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE301','name'=>'Computational Methods for Engineering Problems','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE302','name'=>'Computational Methods for Engineering Problem Laboratory‎','credit'=>1,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE305','name'=>'Software Engineering & Information System Design','credit'=>4,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE306','name'=>'Software Engineering ‎& ‎Information System Design ‎Laboratory‎','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'EEE309','name'=>'Communication Engineering','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE310','name'=>'Communication Engineering Laboratory','credit'=>1.5,'type'=>3,'status'=>true,]);
        Course::create(['code'=>'EEE371','name'=>'Microprocessors & Microcontrollers','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE372','name'=>'Microprocessors & Microcontrollers Laboratory','credit'=>1.5,'type'=>5,'status'=>true,]);
        Course::create(['code'=>'MGT251','name'=>'Organizational Behavior','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE317','name'=>'Artificial Intelligence','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE318','name'=>'Artificial Intelligence Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE333','name'=>'Operating Systems','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE334','name'=>'Operating Systems Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE337','name'=>'Computer Organization & Architecture','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE364','name'=>'Data Communication','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE367','name'=>'Computer Network','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE368','name'=>'Computer Network Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE338','name'=>'Software Development','credit'=>2,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE309','name'=>'Theory of Computation','credit'=>2,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE437','name'=>'Network and Computer Security','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE451','name'=>'Neural Network & Fuzzy Logic','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE452','name'=>'Neural Network & Fuzzy Logic Laboratory','credit'=>1,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE455','name'=>'Computer Graphics & Image Processing','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE456','name'=>'Computer Graphics & Image Processing Laboratory','credit'=>1,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'EEE313','name'=>'Control Systems','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'EEE314','name'=>'Control Systems Laboratory','credit'=>1.5,'type'=>3,'status'=>true,]);
        Course::create(['code'=>'ENG401','name'=>'Technical Writing & Presentation','credit'=>2,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE453','name'=>'Compiler Construction','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE454','name'=>'Compiler Construction Laboratory','credit'=>1.5,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE459','name'=>'Pattern Recognition','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE460','name'=>'Pattern Recognition Laboratory','credit'=>1,'type'=>1,'status'=>true,]);
        Course::create(['code'=>'CSE481','name'=>'Contemporary Course of Computer Science','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE482','name'=>'Contemporary Course of Computer Science Laboratory‎','credit'=>1,'type'=>5,'status'=>true,]);
        Course::create(['code'=>'CSE457','name'=>'Machine Learning','credit'=>3,'type'=>0,'status'=>true,]);
        Course::create(['code'=>'CSE458','name'=>'Machine Learning Laboratory','credit'=>1,'type'=>1,'status'=>true,]);

    }
}
