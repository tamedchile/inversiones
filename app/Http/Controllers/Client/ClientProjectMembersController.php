<?php

namespace App\Http\Controllers\Client;

use App\ModuleSetting;
use App\Project;
use App\ProjectMember;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientProjectMembersController extends ClientBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'app.menu.projects';
        $this->pageIcon = 'icon-layers';
        $this->middleware(function ($request, $next) {
            if(!in_array('projects',$this->user->modules)){
                abort(403);
            }
            return $next($request);
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->project = Project::findOrFail($id);
        $this->employees = User::allEmployees();
        return view('client.project-member.show', $this->data);
    }

    public function ver_asesor($id)
    {
      $this->employees = User::allEmployees();
      $this->project = Project::findOrFail($id);
      $this->member = ProjectMember::join('users', 'users.id', 'project_members.user_id')
                                          ->join('role_user', 'project_members.user_id', 'role_user.user_id')
                                          ->join('employee_details', 'employee_details.user_id', 'users.id')
                                          ->join('teams', 'employee_details.department_id', 'teams.id')
                                          ->join('designations', 'employee_details.designation_id', 'designations.id')
                                          ->where('project_members.project_id', $this->project->id)
                                          ->where('role_user.role_id', 2)
                                          ->where('project_members.user_id','<>', 1)
                                          ->select('users.*','employee_details.address  as address','teams.team_name as department','designations.name as designation' )
                                          ->get();

      return view('client.project-member.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
