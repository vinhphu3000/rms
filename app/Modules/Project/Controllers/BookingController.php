<?php namespace App\Modules\Project\Controllers;
use App\Events\ProposalEmployeeStatus;
use App\Events\ProposalRequest;
use App\Events\ResourceBooking;
use App\Modules\Employee\Models\EmployeeProposal;
use App\Modules\Employee\Models\EmployeeProposalStatus;
use App\Modules\Project\Models\Proposal;
use League\Flysystem\Exception;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Models\ProjectRequest;
use App\Modules\Project\Models\ProjectBooking;
use App\Modules\Employee\Models\Employee;
use Request;
use Session;
use Input;
use App\Modules\ModulesController;
use App\Events\ResourceRequest;


class BookingController extends ModulesController {


    public function listing(\Illuminate\Http\Request $params)
    {
        $project_id = (int)$params->input('project_id');
        $project = Project::find((int)$project_id);
        $projects = Project::all();
        if (!empty($project_id) && is_integer($project_id)) {
            $requests = ProjectRequest::where('project_id', $project_id)->orderBy('updated_at','desc')->get();
        } else {
            $requests = ProjectRequest::orderBy('updated_at','desc')->get();
        }

        return $this->viewModule('request.list', ['projects' => $projects, 'project' => $project, 'requests' => $requests, 'project_id' => $project_id]);
    }

    public function requestBooking(\Illuminate\Http\Request $params)
    {
        $project_id = (int)$params->input('project_id');
        $request_id = (int)$params->input('request_id');

        $project = Project::find((int)$project_id);
        $projects = Project::all();

        if (!empty($project_id) && is_integer($project_id)) {
            $requests = ProjectRequest::where('project_id', $project_id)->orderBy('updated_at','desc')->get();
        } else {
            $requests = ProjectRequest::orderBy('updated_at','desc')->get();
        }


        if (!empty($request_id) && is_integer($request_id) ) {
            $request = ProjectRequest::find((int)$request_id);
        } else {
            foreach($requests as $item) {
                $request = $item;
                break;
            }

        }

        $proposal = Proposal::where('request_id', $request->id)->orderBy('created_at', 'desc')->get();

        $proposal_temp = [];
        if(Session::has('proposal_temp_' . $request->id)){
            $proposal_temp = Session::get('proposal_temp_' . $request->id);
        }


        $bookings = ProjectBooking::where('project_id', $request->project->id)->where('remove',0)->orderBy('project_role_id')->get();

        $limit = 100;
        $builder = Employee::query();
        $search_param = [
            'kw' => $params['kw'],
            'order_by' => empty($params['order_by']) ? 'id' : $params['order_by'],
            'order_type' => $params['order_type'] == 'asc' ? 'asc' : 'desc',
        ];
        Session::set('search_param', $search_param);

        if(!empty($search_param['kw'])){
            $builder->where(function ($query) use($search_param) {
                $query->orWhere('full_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('last_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('skills', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('first_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('code', 'LIKE', "%{$search_param['kw']}%");
            });

        }
        $booking_employee_id = [];
        foreach ($bookings as $item) {
            $booking_employee_id[] = $item->employee_id;
        }
        if (count($booking_employee_id)) {
            $builder->whereNotIn('id', $booking_employee_id);
        }

        $employees = $builder->orderBy($search_param['order_by'], $request['order_type'])->paginate($limit);

        $view_data = [
                        'search_param' => $search_param,
                        'request' => $request,
                        'project' => $project,
                        'requests' => $requests,
                        'employees' => $employees,
                        'projects' => $projects,
                        'project_id' => $project_id,
                        'bookings' => $bookings,
                        'proposal' => $proposal,
                        'proposal_temp' => $proposal_temp
        ];

        return $this->viewModule('booking.booking-with-requests', $view_data);
    }


    public function booking(\Illuminate\Http\Request $params)
    {
        $project_id = (int)$params->input('project_id');
        $request_id = (int)$params->input('request_id');

        $project = Project::find((int)$project_id);
        $projects = Project::all();

        if (!empty($project_id) && is_integer($project_id)) {
            $requests = ProjectRequest::where('project_id', $project_id)->orderBy('updated_at','desc')->get();
        } else {
            $requests = ProjectRequest::orderBy('updated_at','desc')->get();
        }


        if (!empty($request_id) && is_integer($request_id) ) {
            $request = ProjectRequest::find((int)$request_id);
        } else {
            foreach($requests as $item) {
                $request = $item;
                break;
            }

        }

        $bookings = ProjectBooking::where('project_id', $request->project->id)->where('remove',0)->orderBy('project_role_id')->get();

        $limit = 100;
        $builder = Employee::query();
        $search_param = [
            'kw' => $params['kw'],
            'order_by' => empty($params['order_by']) ? 'id' : $params['order_by'],
            'order_type' => $params['order_type'] == 'asc' ? 'asc' : 'desc',
        ];
        Session::set('search_param', $search_param);

        if(!empty($search_param['kw'])){
            $builder->where(function ($query) use($search_param) {
                $query->orWhere('full_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('last_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('skills', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('first_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('code', 'LIKE', "%{$search_param['kw']}%");
            });

        }
        $booking_employee_id = [];
        foreach ($bookings as $item) {
            $booking_employee_id[] = $item->employee_id;
        }
        if (count($booking_employee_id)) {
            $builder->whereNotIn('id', $booking_employee_id);
        }

        $employees = $builder->orderBy($search_param['order_by'], $request['order_type'])->paginate($limit);


        return $this->viewModule('booking.booking-with-project', [ 'search_param' => $search_param,'request' => $request, 'project' => $project, 'requests' => $requests, 'employees' => $employees, 'projects' => $projects, 'project_id' => $project_id, 'bookings' => $bookings]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function popupBooking(\Illuminate\Http\Request $request)
    {
        $project_request = ProjectRequest::find((int)$request->input('request_id'));
        $employee = Employee::find((int)$request->input('employee_id'));
        $roles = \App\Modules\Project\Models\ProjectRole::all();
        return $this->viewModule('booking.add', ['employee' => $employee, 'request' => $project_request, 'roles' => $roles]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doBooking(\Illuminate\Http\Request $request)
    {

        $project_id = (int)$request->input('project_id');

        if(!empty($project_id)) {
            $booking_data = [
                'project_id' => $project_id,
                'project_role_id' => $request->input('project_role_id'),
                'take_part_per' => $request->input('take_part_per'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'employee_id' => $request->input('employee_id'),
                'book_type' => 'Reserve',
                'user_id' => $this->user->id,
            ];

//            $request_on_range = ProjectBooking::where('employee_id', $request->input('employee_id'))
//                ->whereBetween('start_date', [$booking_data['start_date'], $booking_data['end_date']])
//                ->orWhereBetween('end_date', [$booking_data['start_date'], $booking_data['end_date']])->count();
//
//            if ($request_on_range > 0) {
//                throw new \Exception('Range date select is invalid');
//            }
            $booking = ProjectBooking::create($booking_data);
            event(new ResourceBooking($booking));

        }
        return $this->viewModule('widgets.booking-item',['booking' => $booking]);
    }

    public function details($id)
    {
        $booking = ProjectBooking::find($id);
        return $this->viewModule('booking.details', ['booking' => $booking,]);
    }

    public function edit($id)
    {
        $booking = ProjectBooking::find($id);
        $roles = \App\Modules\Project\Models\ProjectRole::all();
        return $this->viewModule('booking.edit', ['booking' => $booking, 'roles' => $roles]);
    }

    /**
     * @param $id
     * @return string
     */
    public function doRemove($id)
    {
        ProjectBooking::where('id', $id)->update(['remove' => 1, 'remove_by' => $this->user->id]);
        return '';
    }

    /**
     * @param $id
     * @return string
     */
    public function doOfficial($id)
    {

        ProjectBooking::where('id', $id)->update(['book_type' => 'Official']);
        return '';
    }

    public function doEdit(\Illuminate\Http\Request $request)
    {
        $project_id = (int)$request->input('project_id');

        if(!empty($project_id)) {
            $booking_data = [
                'project_role_id' => $request->input('project_role_id'),
                'take_part_per' => $request->input('take_part_per'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ];

            ProjectBooking::where('id', $request->input('id'))->update($booking_data);
        }
        return '';
    }

    public function doProposalUpdate(\Illuminate\Http\Request $request)
    {
        $request_id = (int)$request->input('request_id');

        if(!empty($request_id)) {

            $proposal_data = [
                'request_id' => $request_id,
                'employee_id' => $request->input('employee_id'),
                'employee_name' => $request->input('employee_name'),
                'role_name' => $request->input('role_name'),
                'role_id' => $request->input('role_id'),
                'take_part_per' => $request->input('take_part_per'),
                'take_part_per_text' => $request->input('take_part_per_text'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ];

            $proposal_temp = [];

            if(Session::has('proposal_temp_' . $request_id)){
                $proposal_temp = Session::get('proposal_temp_' . $request_id);
            }

            array_push($proposal_temp, $proposal_data);

            Session::set('proposal_temp_' . $request_id, $proposal_temp);
        }
        return '';
    }

    public function proposalCancel(\Illuminate\Http\Request $request)
    {
        $request_id = (int)$request->input('request_id');
        $project_id = (int)$request->input('project_id');

        if(!empty($request_id)) {

            if (Session::has('proposal_temp_' . $request_id)) {
                Session::forget('proposal_temp_' . $request_id);
            }
        }

        return redirect('/request/booking?project_id=' . $project_id . '&request_id=' . $request_id);
    }


    public function proposalSend(\Illuminate\Http\Request $request)
    {
        $request_id = (int)$request->input('request_id');
        $project_id = (int)$request->input('project_id');

        if(!empty($request_id)) {

            if (Session::has('proposal_temp_' . $request_id)) {
                $proposal_temp = Session::get('proposal_temp_' . $request_id);
                $proposal = Proposal::create([
                                    'project_id' => $project_id,
                                    'request_id' => $request_id,
                                    'user_id' => $this->user->id,
                                ]);
                if (!empty($proposal->id)) {
                    foreach ($proposal_temp as $item ) {
                        $employee_proposal = [
                            'request_id' => $request_id,
                            'proposal_id' => $proposal->id,
                            'employee_id' => $item['employee_id'],
                            'role_id' => $item['role_id'],
                            'take_part_per' => $item['take_part_per'],
                            'start_date' => $item['start_date'],
                            'end_date' => $item['end_date'],
                            'user_id' => $this->user->id
                        ];

                        $employee_proposal_obj = EmployeeProposal::create($employee_proposal);

                        event(new ProposalRequest($employee_proposal_obj));

                        if ( !empty($employee_proposal_obj->id) ) {

                            $employee_proposal_status = [
                                'employee_proposal_id' => $employee_proposal_obj->id,
                                'status' => 'New',
                                'user_id' => $this->user->id,
                            ];

                            EmployeeProposalStatus::create($employee_proposal_status);


                            if (Session::has('proposal_temp_' . $request_id)) {
                                Session::forget('proposal_temp_' . $request_id);
                            }
                        }
                    }
                }

            }
        }

        return redirect('/request/booking?project_id=' . $project_id . '&request_id=' . $request_id);
    }

    public function requestInterview(\Illuminate\Http\Request $request)
    {
        $id = (int)$request->input('id');
        $project_id = (int)$request->input('project_id');

        if(!empty($id)) {

            $employee_proposal_status = [
                'employee_proposal_id' => $id,
                'status' => 'Request Interview',
                'user_id' => $this->user->id,
            ];

            $employee_proposal_status_obj = EmployeeProposalStatus::create($employee_proposal_status);
            event(new ProposalEmployeeStatus($employee_proposal_status_obj));

        }

        return redirect('/project/details/' . $project_id);
    }


    public function accept(\Illuminate\Http\Request $request)
    {
        $id = (int)$request->input('id');
        $project_id = (int)$request->input('project_id');

        if(!empty($id)) {

            $employee_proposal_status = [
                'employee_proposal_id' => $id,
                'status' => 'Accepted',
                'user_id' => $this->user->id,
            ];

            EmployeeProposalStatus::create($employee_proposal_status);

            $employee_proposal = EmployeeProposal::find($id);

            $project_id = (int)$request->input('project_id');

            if(!empty($project_id)) {
                $booking_data = [
                    'project_id' => $project_id,
                    'project_role_id' => $employee_proposal->role_id,
                    'take_part_per' => $employee_proposal->take_part_per,
                    'start_date' => $employee_proposal->start_date,
                    'end_date' => $employee_proposal->end_date,
                    'employee_id' => $employee_proposal->employee_id,
                    'book_type' => 'Official',
                    'user_id' => $this->user->id,
                ];

                $booking = ProjectBooking::create($booking_data);
                event(new ResourceBooking($booking));

            }

        }


        return redirect('/project/details/' . $project_id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reject(\Illuminate\Http\Request $request)
    {
        $id = (int)$request->input('id');
        $project_id = (int)$request->input('project_id');
        return $this->viewModule('booking.reject_reason', ['project_id' => $project_id, 'id' => $id]);
    }

    public function doReject(\Illuminate\Http\Request $request)
    {
        $id = (int)$request->input('id');
        $project_id = (int)$request->input('project_id');
        $reason = $request->input('reason');
        if ($reason == 'Other') {
            $reason = $request->input('other_reason');
        }
        if (!empty($id)) {

            $employee_proposal_status = [
                'employee_proposal_id' => $id,
                'status' => 'Rejected',
                'comment' => $reason,
                'user_id' => $this->user->id,
            ];

            $employee_proposal_status_obj = EmployeeProposalStatus::create($employee_proposal_status);
            event(new ProposalEmployeeStatus($employee_proposal_status_obj));
        }
        return redirect('/project/details/' . $project_id);
    }


}
