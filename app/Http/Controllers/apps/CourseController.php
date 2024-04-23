<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\CourseEvaluation;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\CoursesLessons;
use App\Models\CoursesModules;
use App\Models\LessonComment;
use App\Models\LessonRating;
use App\Models\UserLessonsOpeneds;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    public function detail($id)
    {
        $data = Courses::find($id);

        $modules = DB::Select("
        SELECT cm.module, cm.id
        FROM coursesmodules cm
        inner join courses c on cm.id_course = c.id
        where cm.id_course = $data->id
        order by cm.modulenumber ASC
        ");

        $coursesTop10 = DB::Select("
        SELECT c.id, c.course, c.cover, SUM(ce.rate) AS total_rate
        FROM coursesevaluation ce
        inner join courses c on ce.idcourse = c.id
        GROUP BY (ce.idcourse)
        order by total_rate DESC
        limit 10;");

        $firstLesson = DB::Select("
        select distinct cl.id 
        from courseslessons cl
        inner join coursesmodules cm on cl.id_module = cm.id
        where cm.id_course =  $data->id");

        $firstLesson = $firstLesson[0]->id;

        $allCourses = Courses::get();

        $courseEvaluation =  DB::Select("
        select ce.rate, ce.comment, u.name
        from coursesevaluation ce
        inner join users u on ce.iduser = u.id
        where ce.idcourse = $data->id");

        return view('apps.course.detail')->with([
            'data' => $data, 'modules' => $modules, 'coursesTop10' => $coursesTop10, 'allCourses' => $allCourses,
            'courseEvaluation' => $courseEvaluation, 'firstLesson' => $firstLesson
        ]);
    }

    public function firstLessonRedirect($id)
    {
        $firstLesson = DB::Select("
        select distinct cl.id 
        from courseslessons cl
        inner join coursesmodules cm on cl.id_module = cm.id
        where cm.id_course = $id");
        // echo $firstLesson[0]->id;
        return redirect('/course-lesson/' . $firstLesson[0]->id);
    }

    public function lesson($id)
    {
        $iduser = Auth::user()->id;

        $data = CoursesLessons::find($id);

        $coursesTop10 = DB::Select("
        SELECT c.id, c.duration, c.course, c.cover, SUM(ce.rate) AS total_rate
        FROM coursesevaluation ce
        inner join courses c on ce.idcourse = c.id
        GROUP BY (ce.idcourse)
        order by total_rate DESC
        limit 10;");

        $searchIdCourse = DB::Select(
            "        
        select distinct cm.id_course
        from courseslessons cl
        inner join coursesmodules cm on cl.id_module = cl.id
        where cl.id = 1"
        );
        $idcourse = $searchIdCourse[0]->id_course;

        $modules = CoursesModules::where('id_course', '=', $idcourse)->get();

        for ($i = 0; $i < count($modules); $i++) {
            $moduleId = $modules[$i]->id;
            $lessons = DB::Select("select distinct * from courseslessons where id_module = $moduleId");
            $modules[$i]['lessons'] = $lessons;
        }

        $lessonrating = LessonRating::where('id_user', '=', $iduser)
            ->where('id_lesson', '=', $id)
            ->first();
        if ($lessonrating) {
            $rate = $lessonrating->rate;
        } else {
            $rate = 0;
        }

        return view('apps.course.lesson')->with(['data' => $data, 'modules' => $modules, 'coursesTop10' => $coursesTop10, 'rate' => $rate]);
    }

    function lastLesson($idlesson)
    {
        $idUser = Auth::user()->id;

        $countUserLessonsOpeneds = UserLessonsOpeneds::where('id_user', '=', $idUser)->count();
        // echo $countUserLessonsOpeneds;
        if ($countUserLessonsOpeneds > 6) {
            $checkAlreadyInserted = DB::Select("        
                select * from userlessonsopeneds where id_user = $idUser order by id_order asc      
            ");

            for ($i = 1; $i < count($checkAlreadyInserted); $i++) {
                //     $checkAlreadyInserted = DB::update(" update userlessonsopeneds set id_order = id_order + 1 
                //         where id_user = $idUser and id_order >= ?        
                //     ");
                $a = $i - 1;
                $oneMore = $i + 1;
                // echo $a;
                $checkAlreadyInsertedId = $checkAlreadyInserted[$a]->id;
                echo $i;
                echo "<br>";
                if ($i === 6) {
                    DB::update("update userlessonsopeneds set id_order = 1, id_lesson = $idlesson where id = $checkAlreadyInsertedId");
                    echo "if update userlessonsopeneds set id_order = 1, id_lesson = $idlesson where id = $checkAlreadyInsertedId";
                    echo "<br>";
                } else {
                    DB::update("update userlessonsopeneds set id_order = $oneMore where id = $checkAlreadyInsertedId");
                    echo "else update userlessonsopeneds set id_order = $oneMore where id = $checkAlreadyInsertedId";
                    echo "<br>";
                }
            }
            dump($checkAlreadyInserted);
        }
        // $userOrder = UserLessonsOpeneds::where('id_user', '=', $idUser)->get();

        // $idOrder = null;
        // if (!$userOrder) {
        //     $idOrder = 1;
        //     echo 'if';
        // } else {

        //     $lastLesson = DB::Select("        
        //         select * from userlessonsopeneds where id_user = $idUser 
        //         order by id_order desc
        //         limit 1");
        //     if ($lastLesson) {
        //         $idOrder = $lastLesson[0]->id_order + 1;
        //     } else {
        //         $idOrder = 1;
        //     }
        // }



        // $checkAlreadyInserted = DB::Select("        
        // select * from userlessonsopeneds where id_user = $idUser and id_lesson = $idlesson       
        // ");

        // if (!$checkAlreadyInserted) {
        //     $courses = UserLessonsOpeneds::create(
        //         [
        //             'id_user' => $idUser,
        //             'id_lesson' => $idlesson,
        //             'id_order' => $idOrder,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]
        //     );
        // }
    }


    function ajaxCoursesLessons($idcourse, $idmodule)
    {
        $data = DB::select("select cl.*, cm.*, cl.updated_at as clupdated_at from courseslessons cl 
        inner join coursesmodules cm on cl.id_module = cm.id  
        inner join courses c on cm.id_course = c.id
        where c.id = $idcourse and cm.id = $idmodule;");

        // dump($data);

        return view('apps.course.courseslessonsajax', ['data' => $data]);
    }

    function lessonrating($idlesson, $rate)
    {

        return view('apps.course.lessonrating')->with(['idlesson' => $idlesson, 'rate' => $rate]);
    }

    public function lessoncommenttore($idlesson, $rate)
    {
        $iduser = Auth::user()->id;

        $lessonRating = LessonRating::where('id_lesson', $idlesson)->where('id_user', $iduser)->get();

        intval($rate);
        if ($lessonRating->isEmpty()) {
            echo 'if';
            try {
                $resCreate = LessonRating::create(
                    [
                        'id_lesson' => $idlesson,
                        'id_user' => $iduser,
                        'rate' => $rate,
                    ]
                );
            } catch (Exception $e) {
                $errorInfo = $e->getMessage();
                var_dump($errorInfo);
            }
            $successMessage = "Registro salvo com sucesso.";
        } else {

            try {
                LessonRating::where('id_lesson', $idlesson)->where('id_user', $iduser)->update(['rate' => $rate]);
            } catch (Exception $e) {
                $errorInfo = $e->getMessage();
                var_dump($errorInfo);
            }
            $successMessage = "Registro salvo com sucesso.";
        }
    }

    function lessoncomment($idlesson)
    {
        $data = DB::select("select u.name as username, lc.comment as comment from lessoncomments lc
        inner join users u on lc.id_user = u.id
        where lc.id_lesson = $idlesson        
        ;");

        return view('apps.course.lessoncomment')->with(['data' => $data]);
    }

    public function lessoncommentstore($idlesson, $comment)
    {
        $iduser = Auth::user()->id;

        echo $idlesson;

        $lessonRating = LessonComment::where('id_lesson', $idlesson)->where('id_user', $iduser)->get();

        if ($lessonRating->isEmpty()) {
            echo 'if';
            try {
                $resCreate = LessonComment::create(
                    [
                        'id_lesson' => $idlesson,
                        'id_user' => $iduser,
                        'comment' => $comment,
                    ]
                );
            } catch (Exception $e) {
                $errorInfo = $e->getMessage();
                var_dump($errorInfo);
            }
            $successMessage = "Registro salvo com sucesso.";
        } else {

            try {
                LessonComment::where('id_lesson', $idlesson)->where('id_user', $iduser)->update(['comment' => $comment]);
            } catch (Exception $e) {
                $errorInfo = $e->getMessage();
                var_dump($errorInfo);
            }
            $successMessage = "Registro salvo com sucesso.";
        }
    }
    public function courseevaluationstore($idcourse, Request $request)
    {
        $iduser = Auth::user()->id;
        $data = $request->all();

        $rate = $data['rate'];
        $textevaluation = $data['textevaluation'];
        $courseEvaluation = CourseEvaluation::where('idcourse', $idcourse)->where('iduser', $iduser)->get();

        if ($courseEvaluation->isEmpty()) {
            try {
                $resCreate = CourseEvaluation::create(
                    [
                        'idcourse' => $idcourse,
                        'iduser' => $iduser,
                        'comment' => $textevaluation,
                        'rate' => $rate,
                    ]
                );
            } catch (Exception $e) {
                $errorInfo = $e->getMessage();
                var_dump($errorInfo);
            }
            $successMessage = "Registro salvo com sucesso.";
            return redirect()->route('course.detail', $idcourse);
        } else {

            $rate = $data['rate'];
            $textevaluation = $data['textevaluation'];

            try {
                CourseEvaluation::where('idcourse', $idcourse)->where('iduser', $iduser)->update(['comment' => $textevaluation, 'rate' => $rate]);
                return redirect()->route('course.detail', $idcourse);
            } catch (Exception $e) {
                $errorInfo = $e->getMessage();
                var_dump($errorInfo);
            }
            $successMessage = "Registro salvo com sucesso.";
        }
    }
}
