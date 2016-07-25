<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/25 0025
 * Time: 22:59
 */

namespace app\models;


class Classification
{

    public static $Classification = [
        "teacher"=>[
            'one'=>"教师分类一",
            'two'=>"教师分类2",
            'thr'=>"教师分类3",
        ],
        "student"=>[
            'one'=>"学生分类一",
            'two'=>"学生分类2",
            'thr'=>"学生分类3",
        ],
        'pic'=>[
            'one'=>"剧照分类一",
            'two'=>"剧照分类2",
            'thr'=>"剧照分类3",
        ]
    ];

    public static function getTeacherClass(){
        return self::$Classification["teacher"];
    }

    public static function getStudentClass(){
        return  self::$Classification['student'];
    }

    public static function getPicClass(){
        return self::$Classification['pic'];
    }
    


}