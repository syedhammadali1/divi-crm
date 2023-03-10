<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TestNodeAppContact;
use Illuminate\Http\Request;

class TestNodeAppController extends Controller
{

    public $successStatus = 200;
    public $HTTP_FORBIDDEN = 403;
    public $HTTP_NOT_FOUND = 404;

    public function index()
    {
        $userContacts = TestNodeAppContact::all();

        if (!$userContacts->isEmpty()) {

            foreach ($userContacts as $k => $v) {

                $array[$k]['id'] = $v->id;
                $array[$k]['name'] = $v->name;
                $array[$k]['desc'] = $v->desc;
                $array[$k]['status'] = $v->status;

            }
            return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Contacts found.', 'data' => $array]);

        }else{
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'No record found.', 'data' => []]);
        }

    }
}
