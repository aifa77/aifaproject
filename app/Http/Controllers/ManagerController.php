<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.index');
    }
    public function list()
    {
        $users = User::with('roles')->get();
        return view('manager.list')->with('users', $users);
    }
    public function htmltopdfview(Request $request)
    {
        $users = User::with('roles')->get();
        $data = ['title'=>'User List', 'users'=>$users];
        $pdf = PDF::loadview('manager.htmltopdfview', $data);
        return $pdf->download('users.pdf');
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import()
    {
        Excel::import(new UsersImport, 'users.xlsx');
        return redirect('manager')->with('success', 'All good!');
    }
}
