<?php

namespace App\Http\Controllers;

use App\Exports\LeadExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Models\MasterLeadStatus;
use App\Models\ProgramPaymentCommission;
use App\Models\Caste;
use App\Models\Subject;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Province;
use App\Models\Setting;
use App\Models\Pincode;
use App\Models\UserFollowUp;
use App\Models\EducationHistory;
use App\Models\Source;
use App\Models\EducationLevel;
use App\Models\PaymentsLink;
use App\Models\Intrested;
use App\Models\Fieldsofstudytype;
use App\Models\University;
use App\Models\Program;
use App\Models\ApplicationsApplied;
use Validator;
use App\Models\StudentScholorship;
use App\Models\Exam;
use App\Mail\FranchiseCreatedStudentProfileMail;
use App\Mail\StudentProfileCreatedMail;
use App\Mail\NewLeadAssignedMail;
use App\Mail\StudentPaymentMail;
use App\Jobs\SendOTPJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Mail\PaymentLinkEmail;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\FuncCall;

class LeadsManageCotroller extends Controller
{
    public function lead_dashboard_data(Request $request)
    {
        $users = DB::table('users')->WHERE('id', 1)->first();
        $user = Auth::user();
        $roles = $user->roles;

        $page = $request->get('page');
        if($page == 1){
            $offset = 0;
        } else {
            $offset = ((($page-1) * 12));
        }
        if($user->hasRole('Administrator')){
            $next_leads = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))
                ->skip($offset)
                ->take(12)
                ->orderBy('next_calling_date', 'asc')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id')
                ->select(
                    'student_by_agent.id',
                    'student_by_agent.name',
                    'student_by_agent.email',
                    'student_by_agent.phone_number',
                    'student_by_agent.next_calling_date',
                    'student_by_agent.created_at',
                    'student_by_agent.zip',
                    'student_by_agent.course',
                    'student_by_agent.intake',
                    'student_by_agent.intake_year',
                    'master_lead_status.name as status_name',
                    'A.email as assign_email',
                    'A.account_type',
                    'A.parent_id',
                    'B.email as parent_email'
                );
                if(!empty($keywords)){
                    $next_leads = $next_leads->where(function ($query) use ($keywords) {
                        $query->WHERE('student_by_agent.name', 'like', '%'.$keywords.'%')
                          ->orWHERE('student_by_agent.zip', 'like', '%'.$keywords.'%')
                          ->orWHERE('student_by_agent.phone_number', 'like', '%'.$keywords.'%')
                          ->orWHERE('student_by_agent.email', 'like', '%'.$keywords.'%')
                          ->orWHERE('student_by_agent.course', 'like', '%'.$keywords.'%')
                          ->orWHERE('master_lead_status.name', 'like', '%'.$keywords.'%');
                    });
                }
                $next_leads = $next_leads->paginate(10);

            $next_leads_count = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))
                ->orderBy('next_calling_date', 'asc')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id')
                ->select('student_by_agent.id');
            if(!empty($keywords)){
                $next_leads_count = $next_leads_count->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.zip', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.email', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.course', 'like', '%'.$keywords.'%')
                        ->orWHERE('master_lead_status.name', 'like', '%'.$keywords.'%');
                });
            }
            $next_leads_count = $next_leads_count->count();
        }else if($user->hasRole('agent') || $user->hasRole('sub_agent')){

            $agents=DB::select("SELECT id FROM `users` WHERE `parent_id` = $user->id");
            $commaList='';
            foreach($agents as $agent){
                $commaList .= $agent->id.',';
            }
            $user=$commaList.$user->id;
            //=============
            $next_leads = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))
                ->skip($offset)
                ->take(12)
                ->orderBy('student_by_agent.next_calling_date', 'asc')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id')
                ->select(
                    'student_by_agent.id',
                    'student_by_agent.name',
                    'student_by_agent.email',
                    'student_by_agent.phone_number',
                    'student_by_agent.next_calling_date',
                    'student_by_agent.created_at',
                    'student_by_agent.zip',
                    'student_by_agent.course',
                    'student_by_agent.intake',
                    'student_by_agent.intake_year',
                    'master_lead_status.name as status_name',
                    'A.email as assign_email',
                    'A.account_type',
                    'A.parent_id',
                    'B.email as parent_email');
            $next_leads = $next_leads->where(function ($query) use ($user) {
                $query->where('student_by_agent.added_by', $user->id);
            });
            $next_leads = $next_leads->where(function ($query) use ($user) {
                $query->orWhereRaw("student_by_agent.assigned_to IN($user)");
            });
            if(!empty($keywords)){
                $next_leads = $next_leads->where(function ($query) use ($keywords) {
                    $query->orWHERE('student_by_agent.name', 'like', '%'.$keywords.'%')
                      ->orWHERE('student_by_agent.zip', 'like', '%'.$keywords.'%')
                      ->orWHERE('student_by_agent.phone_number', 'like', '%'.$keywords.'%')
                      ->orWHERE('student_by_agent.email', 'like', '%'.$keywords.'%')
                      ->orWHERE('student_by_agent.course', 'like', '%'.$keywords.'%')
                      ->orWHERE('master_lead_status.name', 'like', '%'.$keywords.'%');
                });
            }
            $next_leads = $next_leads->paginate(10);

        }
        return $next_leads;
    }
    public function dashboard_lead_report(Request $request){
        $users = DB::table('users')->WHERE('id', 1)->first();
        $user = Auth::user();
        $roles = $user->roles;
        $keywords = $request->get('keywords');

        $page = $request->get('page');
        if($page == 1){
            $offset = 0;
        } else {
            $offset = ((($page-1) * 12));
        }

        if($user->hasRole('Administrator')){
            $lead_reports = StudentByAgent::select(
                'student_by_agent.id',
                'student_by_agent.name',
                'student_by_agent.email',
                'student_by_agent.phone_number',
                'student_by_agent.next_calling_date',
                'student_by_agent.created_at',
                'student_by_agent.zip',
                'student_by_agent.course',
                'student_by_agent.intake',
                'student_by_agent.intake_year',
                'master_lead_status.name as status_name',
                'A.email as assign_email',
                'A.account_type',
                'A.parent_id',
                'B.email as parent_email'
                )
                ->skip($offset)
                ->take(12)
                ->orderBy('id', 'DESC')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id');
            if(!empty($keywords)){
                $lead_reports = $lead_reports->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.zip', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.email', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.course', 'like', '%'.$keywords.'%')
                        ->orWHERE('master_lead_status.name', 'like', '%'.$keywords.'%');
                });
            }

            $lead_reports = $lead_reports->paginate(10);
            $lead_reports_count = StudentByAgent::select('student_by_agent.id')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id');
            if(!empty($keywords)){
                $lead_reports_count = $lead_reports_count->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.zip', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.email', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.course', 'like', '%'.$keywords.'%')
                        ->orWHERE('master_lead_status.name', 'like', '%'.$keywords.'%');
                });
            }
            $lead_reports_count = $lead_reports_count->count();
        }else if($user->hasRole('agent') || $user->hasRole('sub_agent')){

            $agents=DB::select("SELECT id FROM `users` WHERE `parent_id` = $user->id");
            $commaList='';
            foreach($agents as $agent){
                $commaList .= $agent->id.',';
            }
            $user=$commaList.$user->id;

            $lead_reports = StudentByAgent::select(
                'student_by_agent.id',
                'student_by_agent.name',
                'student_by_agent.email',
                'student_by_agent.phone_number',
                'student_by_agent.next_calling_date',
                'student_by_agent.created_at',
                'student_by_agent.zip',
                'student_by_agent.course',
                'student_by_agent.intake',
                'student_by_agent.intake_year',
                'master_lead_status.name as status_name',
                'A.email as assign_email',
                'A.account_type',
                'A.parent_id',
                'B.email as parent_email'
            )
                ->skip($offset)
                ->take(12)
                ->orderBy('id', 'DESC')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id');
            $lead_reports = $lead_reports->where(function ($query) use ($user) {
                $query->where('student_by_agent.added_by', $user->id);
            });
            $lead_reports = $lead_reports->where(function ($query) use ($user) {
                $query->orWhereRaw("student_by_agent.assigned_to IN($user)");
            });
            if(!empty($keywords)){
                $lead_reports = $lead_reports->where(function ($query) use ($keywords) {
                    $query->orWHERE('student_by_agent.name', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.zip', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.email', 'like', '%'.$keywords.'%')
                        ->orWHERE('student_by_agent.course', 'like', '%'.$keywords.'%')
                        ->orWHERE('master_lead_status.name', 'like', '%'.$keywords.'%');
                });
            }
            $lead_reports = $lead_reports->paginate(10);
        }
        return $lead_reports;
        // return view('admin.leads.dashboard',compact('lead_reports'));
    }
    public function leadsDashboard(Request $request)
    {
        $next_leads = $this->lead_dashboard_data($request);
        $leads_report= $this->dashboard_lead_report($request);
        $users = DB::table('users')->WHERE('id', 1)->first();
        $user = Auth::user();
        $roles = $user->roles;
        $total_leads = 0;
        if ($user->hasRole('Administrator')) {
            $total_leads = StudentByAgent::count();
        } elseif ($user->hasRole('agent')) {
            $total_leads = StudentByAgent::where(function($q) use ($user) {
                return $q->where("added_by_agent_id", $user->id)->orWhere('assigned_to', $user->id);
            })->count();
        } elseif ($user->hasRole('sub_agent')) {
            $total_leads = StudentByAgent::where("assigned_to", $user->id)->count();
        }
        $total_assigned_leads = 0;
        if($user->hasRole('Administrator')){
            $total_assigned_leads = StudentByAgent::whereNotNull("assigned_to")->count();
        }else if($user->hasRole('agent') || $user->hasRole('sub_agent')){
            $total_assigned_leads = StudentByAgent::where("assigned_to", $user->id)->count();
        }
        // Total non-allocated Leads --
        $total_non_allocated_leads = 0;
        if($user->hasRole('Administrator')){
            $total_non_allocated_leads = StudentByAgent::whereNull("assigned_to")->count();
        }else if($user->hasRole('agent') || $user->hasRole('sub_agent')){
            $total_non_allocated_leads = StudentByAgent::where("added_by_agent_id", $user->id)->whereNull('assigned_to')->count();
        }
        // Total Members
        $total_members = User::count();
        $total_student = User::where('account_type', 'student')->count();
        $total_school_manager = User::where('account_type', 'school_manager')->count();
        $total_frenchise = User::where('account_type', 'agent')->count();
        $total_active_frenchise = User::where('account_type', 'agent')->where('is_active', 1)->count();
        $total_inactive_frenchise = User::where('account_type', 'agent')->where('is_active', 0)->count();
        $total_approve_frenchise = User::where('account_type', 'agent')->where('profile_verify_for_agent', 1)->count();
        $total_unapprove_frnchise = User::where('account_type', 'agent')->where('profile_verify_for_agent', 0)->count();
        $total_agent = User::where('account_type', 'sub_agent')->count();

        $total_university = University::count();
        $total_program = Program::count();
        $total_application = ApplicationsApplied::count();
        $total_unapprove_universties = University::where('is_approved', 0)->count();
        $total_unapprove_program = Program::where('is_approved', 0)->count();
        $total_unapprove_counceler = User::where('account_type', 'counselor')->where('profile_verify_for_agent', 0)->count();
        $total_approve_counceler = User::where('account_type', 'counselor')->where('profile_verify_for_agent', 1)->count();
        // ===
        $data = array(
            "total_leads" => $total_leads,
            "total_assigned_leads" => $total_assigned_leads,
            "total_non_allocated_leads" => $total_non_allocated_leads,
            "total_members" => $total_members,
            "total_student" => $total_student,
            "total_school_manager" => $total_school_manager,
            "total_frenchise" => $total_frenchise,
            "total_active_frenchise" => $total_active_frenchise,
            "total_inactive_frenchise" => $total_inactive_frenchise,
            "total_approve_frenchise" => $total_approve_frenchise,
            "total_unapprove_frnchise" => $total_unapprove_frnchise,
            "total_agent" => $total_agent,
            "total_university" => $total_university,
            "total_program" => $total_program,
            "total_application" => $total_application,
            "total_unapprove_universties" => $total_unapprove_universties,
            "total_unapprove_program" => $total_unapprove_program,
            "total_unapprove_counceler" => $total_unapprove_counceler,
            "total_approve_counceler" => $total_approve_counceler
        );

        return view('admin.leads.dashboard',compact('data','next_leads','leads_report'));
    }


    public function create_new_lead()
    {

        $user = auth()->user();
        $castes = Caste::where("status", 1)->get();
        $subjects = Subject::where("status", 1)->get();
        $countries = Country::all();
        $lead_status = MasterLeadStatus::where("status", 1)->orderBy('name', 'ASC')->get();
        $source = Source::where("status", 1)->orderBy('name', 'ASC')->get();
        $progLabel = EducationLevel::All();
        $preproLabel = Fieldsofstudytype::All();
        $interested = Intrested::WHERE('is_deleted', '0')->get();
        return view('admin.leads.add_lead', compact('preproLabel','castes','interested', 'subjects', 'countries', 'lead_status', 'source','progLabel'));

    }

    public function fetchStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = Province::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($states);
    }

    public function add_lead_data(Request $request)
    {
        if($request->tab1){
            $validator = Validator::make($request->all(),[
                'first_name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $user_id =Auth::user()->id;
            $StudentAgent = StudentByAgent::updateOrCreate(
                ['id' => $request->id],
                [
                    "user_id"=>$user_id,
                    "source" => $request->source ?? '',
                    "name" => $request->first_name,
                    "middle_name" => $request->middle_name ?? '',
                    "last_name" => $request->last_name ?? '',
                    "father_name" => $request->father_name ?? '',
                    "email" => $request->email,
                    "phone_number" => $request->phone_number,
                    "phone_number_one" => $request->phone_number1 ?? '',
                    "dob" => $request->dob ?? '',
                ]
            );
            $data = [
                'id'=>$StudentAgent->id,
                'student_agent'=>$StudentAgent,
                'tab1'=>'tab1',
                'status'=>true,
                'message'=>'Leads Added Successfully',
            ];
            return response()->json($data);
        }elseif($request->tab2 && $request->id){
            $studentAgent = StudentByAgent::where('id',$request->id)->first();
            $studentAgent->update([
                "cand_working" => $request->cand_working ?? '',
                "caste" => $request->caste,
                "country_id" => $request->country_id,
                "province_id" => $request->province_id,
                "zip" => $request->zip,
            ]);
            $data = [
                'student_agent'=>$studentAgent,
                'tab2'=>'tab2',
                'status'=>true,
                'message'=>'Leads Updated Successfully',
            ];
            return response()->json($data);
        }elseif($request->tab3){
            $studentAgent = StudentByAgent::where('id',$request->id)->first();
            $studentAgent->update([
                "program_label" => $request->program_label ?? '',
                "interested" => $request->interested ?? '',
                "subject" => $request->subject ?? '',
                "preferred_program_label"=>$request->preferred_program_label ?? "",
                "school"=>$request->school ?? "",
                "course"=>$request->course ?? "",
                "preferred_country_id"=>$request->preferred_country_id ?? "",
                "stream" => $request->stream,
                "status_study" => $request->status_study,
                "board" => $request->board_university,
            ]);
            $data = [
                'student_agent'=>$studentAgent,
                'tab3'=>'tab3',
                'status'=>true,
                'message'=>'Leads Updated Successfully',
            ];
            return response()->json($data);
        }elseif($request->tab4){
            $studentAgent = StudentByAgent::where('id',$request->id)->first();
            $studentAgent->update([
                "lead_status" => $request->lead_status ?? '',
                "next_calling_date" => $request->next_calling_date ?? '',
                "interested_in" => $request->interested_in ?? '',
                "intake" => $request->intakeMonth ?? '',
                "intake_year" => $request->year ?? '',
                "profile_created"=>$request->profile_create ?? '',
                "student_comment"=>$request->comment ?? '',
            ]);
            $data = [
                'student_agent'=>$studentAgent,
                'tab4'=>'tab4',
                'status'=>true,
                'message'=>'Leads Updated Successfully',
            ];
            return response()->json($data);
        }
    }

    public function lead_list(Request $request ,$export = null)
    {
        $lead_list = $this->filterLeads($request);
        if ($request->has('export')) {
            return Excel::download(new LeadExport($lead_list->get()), 'leads.xlsx');
        }
        $lead_list = $lead_list->paginate(12);
        $countries = Country::all();
        $lead_status = MasterLeadStatus::get();
        if ($request->has('action') && $request->input('action') === 'export') {
            return Excel::download(new LeadExport($lead_list), 'leads.xlsx');
        }
        return view('admin.leads.lead-list', compact('lead_list', 'countries', 'lead_status'));
    }

    public function edit_lead_data(Request $request,$id)
    {
        $user = auth()->user();
        $castes = Caste::where("status", 1)->get();
        $subjects = Subject::where("status", 1)->get();
        $countries = Country::all();
        $lead_status = MasterLeadStatus::where("status", 1)->orderBy('name', 'ASC')->get();
        $source = Source::where("status", 1)->orderBy('name', 'ASC')->get();
        $progLabel = EducationLevel::All();
        $preproLabel = Fieldsofstudytype::All();
        $interested = Intrested::WHERE('is_deleted', '0')->get();
        $studentData =StudentByAgent::where('id',$id)->first();
        // dd($studentData);
        return view('admin.leads.edit_lead', compact('studentData','preproLabel','castes','interested', 'subjects', 'countries', 'lead_status', 'source','progLabel'));

    }


    private function filterLeads($request)
    {
        $lead_list = StudentByAgent::query();
        $user = Auth::user();

        if (!($user->hasRole('Administrator'))) {
            $userid = Auth::user()->id;
            $lead_list->where('user_id', $userid);
        }

        // Add other filters...

        if ($request->name) {
            $lead_list->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $lead_list->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $lead_list->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
        }
        if ($request->zip) {
            $lead_list->where('zip', 'LIKE', '%' . $request->zip . '%');
        }
        if ($request->country_id) {
            $lead_list->where('country_id', 'LIKE', '%' . $request->country_id . '%');
        }
        if ($request->province_id) {
            $lead_list->where('province_id', 'LIKE', '%' . $request->province_id . '%');
        }
        if ($request->lead_status) {
            $lead_list->where('lead_status', 'LIKE', '%' . $request->lead_status . '%');
        }
        if ($request->assigned_status) {
            $lead_list->where('assigned_status', 'LIKE', '%' . $request->assigned_status . '%');
        }
        if ($request->intakeMonth) {
            $lead_list->where('intake', $request->intakeMonth);
        }
        if ($request->intake_year) {
            $lead_list->where('intake_year', $request->intake_year);
        }
        if ($request->from_date && $request->to_date) {
            $lead_list->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }

        return $lead_list;
    }

    public function manage_lead(Request $request,$id)
    {
        $studentAgentData =StudentByAgent::with('country')->find($id);
        $student_id = $id;
        $masterLeadStatus = MasterLeadStatus::get();
        $follow_up_list = DB::table('user_follow_up')
            ->join('users', 'user_follow_up.user_id', '=', 'users.id')
            ->where('student_id',$id)
            ->get();
        return view('admin.leads.manage-leads',compact('studentAgentData','student_id','masterLeadStatus','follow_up_list'));
    }

    public function add_user_follow_up(Request $request)
    {
        if($request->payment_data == 'payment_form'){
            $studentEmail =StudentByAgent::where('id',$request->student_id)->select('email')->first();
            $paymentLink = "https://overseaseducationlane.com/";
            Mail::to($studentEmail->email)->send(new PaymentLinkEmail($paymentLink));
        }
        $data = [
            'student_id'=>$request->student_id,
            'status'=>$request->lead_status ?? '',
            'paymentType'=>$request->paymentType ?? '',
            'paymentTypeRemarks'=>$request->paymentTypeRemarks ?? '',
            'paymentMode'=>$request->paymentMode ?? '',
            'paymentModeRemarks'=>$request->paymentModeRemarks ?? '',
            'intake'=>$request->intake ?? '',
            'intake_year'=>$request->intake_year ?? '',
            'user_id'=>Auth::user()->id,
            'comment'=>$request->comment ?? '',
            'next_calling_date'=>$request->next_calling_date,
            'amount'=>$request->amount ?? '',
            'created_at' => now(),
        ];
        DB::table('user_follow_up')->insert($data);
        return response()->json(['message'=>'Data inserted Successfulyy']);
    }

    public function oel_360(Request $request)
    {
          $studentData = StudentByAgent::get();
          return view('admin.leads.oel-360',compact('studentData'));
    }


    public function lead_details(Request $request)
    {
        $leadDetails=StudentByAgent::with('caste_data','subject','country','state')->where('id',$request->lead_id)->first();
        return response()->json($leadDetails);
    }

    public function aply_360($id)
    {
        // dd($id);
        $leadDetails=StudentByAgent::with('caste_data','subject','country','state')->where('id',$id)->first();
        $university =University::where('country_id',$leadDetails->country_id)->get();
        // dd($leadDetails);
        return view('admin.leads.aply-oel-360',compact('leadDetails','university'));
    }


    public function save_universty($id, Request $request){
        $college = $request->get('myVals');
        if(!empty($college)){
            $univerty = DB::table('tbl_three_sixtee')
                ->where('sba_id', $id)
                ->first();
            if($univerty == NULL){
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $id,
                    'user_id' => $id,
                    'college' => $college
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $id)
                    ->update([
                    'sba_id' => $id,
                    'user_id' => $id,
                    'college' => $college
                ]);
            }

            $data = "Insert";
        } else {
            $data = "Please Choose at least one College/Universty !!!";
        }
        return response()->json($data);
    }

}
