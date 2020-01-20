<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
//
use App\Persons;

class PersonsController extends Controller {

    /**
     * @return View 2
     */
    public function home() {

        $persons = Persons::orderBy('id', 'ASC')->get();
        return View::make('home', array('persons' => $persons));
    }

    /**
     * @return View
     */
    public function persons() {

        $persons = Persons::orderBy('id', 'ASC')->get();
        return view('comment.persons', array('persons' => $persons));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'comment' => 'required',
        ]);

        $data = $request->all();
        $this->create_($data);
        return back()->with('success', 'Information sent successfully.');
    }

    /**
     * @param array $data
     * 
     * @return type
     */
    public function create_(array $data) {

        $return = Persons::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'comment' => $data['comment']
        ]);

        return $return;
    }

    public function ajaxRequest(Request $request) {

        $box = $request->all();
        $myValue = array();
        parse_str($box['form'], $myValue);
        if (!empty($myValue['email'])) {
            $this->create_($myValue);
        }

        $persons = Persons::orderBy('id', 'ASC')->get();

        return response()->json([
                    'personsJson1' => view('comment.ajaxTable1')->with('persons', $persons)->render(),
                    'personsJson2' => view('comment.ajaxTable2')->with('persons', $persons)->render()
        ]);
    }

}
