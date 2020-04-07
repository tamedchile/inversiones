<?php

namespace App\Http\Controllers\Client;

use App\Helper\Reply;
use App\ModuleSetting;
use App\Project;
use App\ClientDetails;
use App\Task;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientTasksController extends ClientBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.projects';
        $this->pageIcon = 'icon-layers';
        $this->middleware(function ($request, $next) {
            if(!in_array('tasks',$this->user->modules)){
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
        $this->task = Task::findOrFail($id);

        

        $view = view('client.tasks.show', $this->data)->render();

        return Reply::dataOnly(['status' => 'success', 'view' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 1){

          $proyecto = DB::table('projects')->where('client_id', $this->user->id)->first();

          $this->tasks = Task::leftJoin('projects', 'projects.id', '=', 'tasks.project_id')
              ->Join('task_users', 'tasks.id', '=', 'task_users.task_id')
              ->where('tasks.project_id', '=', $proyecto->id)
              ->where('projects.client_id', '=', $this->user->id)
              ->select('tasks.*', 'task_users.user_id as cliente_task')
              ->orderby('tasks.id','desc')
              ->get();

          $this->project = Project::findOrFail($proyecto->id);

          if($this->project->client_view_task == 'disable'){
              abort(403);
          }
          $this->clientDetail = ClientDetails::where('user_id', '=', $this->user->id)->first();
          return view('client.tasks.edit', $this->data);

        }else{

          $this->tasks = Task::leftJoin('projects', 'projects.id', '=', 'tasks.project_id')
              ->where('tasks.project_id', '=', $id)
              ->where('projects.client_id', '=', $this->user->id)
              ->select('tasks.*')
              ->get();
          $this->project = Project::findOrFail($id);

          if($this->project->client_view_task == 'disable'){
              abort(403);
          }
          $this->clientDetail = ClientDetails::where('user_id', '=', $this->user->id)->first();

          return view('client.tasks.edit', $this->data);

        }
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
