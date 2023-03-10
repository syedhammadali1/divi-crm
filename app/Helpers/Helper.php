<?php

namespace App\Helpers;

use App\Models\projects;
use Auth;
use App\Models\role_assign;
use App\Models\sessions;

class Helper
{
    public static function curren_user()
    {
        $user = Auth::user();
        return $user;
    }

    public static function empAvatarbyProjectID($project_id)
    {
        $projects = projects::with('support', 'client', 'projectTasks.projectTaskLabel')
            ->where("project_number", $project_id)
            ->where("is_active", 1)
            ->where("is_deleted", 0)->first();
        $user_ids = array();
        foreach ($projects->projectTasks as $k => $task) {
            $user_ids[$k] = $task->dpt_to;
            foreach ($task->projectTaskLabel as $k => $taskLabel) {
                if ($taskLabel->type == 1) {
                    $user_ids[$k] = intval($taskLabel->title);
                }
            }
        }
        dd($user_ids);

    }

    public static function create_sidebar($data)
    {
        $user = Auth::user();
        $temp = array();
        foreach ($data as $key => $value) {
            $name = explode('_', $value);
            if (!in_array($name[0], $temp)) {
                $temp[$key] = $name[0];
            }
        }
        return array_values($temp);
    }

    public static function check_rights($slug)
    {
        $user = Auth::user();
        $temp = array();
        $role_assign = role_assign::where('is_active', 1)->where("role_id", $user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if (str_contains($value, $slug)) {
                if (!in_array($value, $temp)) {
                    $temp[$key] = $value;
                }
            }
        }
        return array_values($temp);
    }

    public static function can_create($slug = '')
    {
        $user = Auth::user();
        $temp = false;
        $role_assign = role_assign::where('is_active', 1)->where("role_id", $user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if ($value == $slug . "_1") {
                $temp = true;
            }
        }
        return $temp;
    }

    public static function can_view($slug = '')
    {
        $user = Auth::user();
        $temp = false;
        $role_assign = role_assign::where('is_active', 1)->where("role_id", $user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if ($value == $slug . "_2") {
                $temp = true;
            }
        }
        return $temp;
    }

    public static function can_edit($slug = '')
    {
        $user = Auth::user();
        return $user;
    }

    public static function activity_log($slug = "", $data = [])
    {
        $project_id = $data['project_id'];

        if ($slug == "login") {
            $sessions = new sessions;
            $sessions->user_id = Auth::user()->id;
            $sessions->project_id = $project_id;
            $sessions->ip_address = \Request::ip();
            $sessions->slot = $slug;
            $sessions->save();
        }
    }
}
