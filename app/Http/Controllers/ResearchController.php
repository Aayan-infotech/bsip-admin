<?php
namespace App\Http\Controllers;

use App\Models\ActivitiesName;
use App\Models\Activity;
use App\Models\Lecturers;
use App\Models\Lectures;
use App\Models\Project;
use App\Models\ResearchHighlights;
use App\Models\SponsoredProjects;
use App\Traits\UploadFilesTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ResearchController extends Controller
{
    use UploadFilesTraits;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('research-management.add_research_highlights');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year'                 => 'required|integer|min:1900|max:' . date('Y'),
            'link'                 => 'nullable|string',
            'title'                => 'required|string|max:255',
            'hin_title'            => 'required|string|max:255',
            'hindi_file'           => 'nullable|mimes:pdf|max:2048',
            'english_file'         => 'nullable|mimes:pdf|max:2048',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $validatedData = $validator->validated();

        unset($validatedData['g-recaptcha-response']);

        if ($request->hasFile('hindi_file')) {
            $validatedData['hindi_file'] = $this->uploadFile($request->file('hindi_file'), 'research_highlights/hindi');
        }
        if ($request->hasFile('english_file')) {
            $validatedData['english_file'] = $this->uploadFile($request->file('english_file'), 'research_highlights/english');
        }

        $researchHighlight = new ResearchHighlights($validatedData);
        $status            = $researchHighlight->save();

        if (! $status) {
            return response()->json(['error' => 'Failed to create research highlight!'], 500);
        }

        return response()->json(['message' => 'Research highlight created successfully!'], 201);
    }

    public function getResearchHighlights(Request $request)
    {
        if ($request->ajax()) {
            $researchHighlights = ResearchHighlights::get();
            return DataTables::of($researchHighlights)
                ->addColumn('status', function ($researchHighlight) {
                    $checked    = $researchHighlight->status ? 'checked' : '';
                    $statusText = $researchHighlight->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $researchHighlight->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $researchHighlight->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $researchHighlight->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $researchHighlight->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($researchHighlight) {
                    return '<button class="btn btn-sm btn-primary edit-research-highlight" data-id="' . $researchHighlight->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function toggleStatus(Request $request)
    {
        $researchHighlight         = ResearchHighlights::findOrFail($request->id);
        $researchHighlight->status = $request->status;
        $researchHighlight->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
    public function toggleArchivedStatus(Request $request)
    {
        if ($request->status == 1) {
            $request->archived_status = 'Yes';
        } else {
            $request->archived_status = 'No';
        }
        $researchHighlight                  = ResearchHighlights::findOrFail($request->id);
        $researchHighlight->archived_status = $request->archived_status;
        $researchHighlight->save();

        return response()->json(['success' => 'Archived status updated successfully.']);
    }

    public function edit($id)
    {
        $researchHighlight = ResearchHighlights::findOrFail($id);
        return response()->json($researchHighlight);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'year'         => 'required|integer|min:1900|max:' . date('Y'),
            'link'         => 'nullable|string',
            'title'        => 'required|string|max:255',
            'hin_title'    => 'required|string|max:255',
            'hindi_file'   => 'nullable|mimes:pdf|max:2048',
            'english_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $data = ResearchHighlights::findOrFail($id);

        if ($request->hasFile('hindi_file')) {
            // Delete the old file if it exists
            $oldHindiFile = $data->hindi_file;

            if ($oldHindiFile) {
                $this->deleteFile($oldHindiFile);
            }
            $validatedData['hindi_file'] = $this->uploadFile($request->file('hindi_file'), 'research_highlights/hindi');
        }
        if ($request->hasFile('english_file')) {

            $oldEnglishFile = $data->english_file;
            if ($oldEnglishFile) {
                $this->deleteFile($oldEnglishFile);
            }
            $validatedData['english_file'] = $this->uploadFile($request->file('english_file'), 'research_highlights/english');
        }

        $data->update($validatedData);

        return response()->json(['message' => 'Research highlight updated successfully!'], 200);
    }

    // Lecturer Page Code Started

    public function manageLecturer()
    {
        return view('research-management.manage_lecturer');
    }

    public function storeLecturer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lecturer_name'        => 'required|string|max:255',
            'hin_lecturer_name'    => 'required|string|max:255',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }
        unset($request['g-recaptcha-response']);

        $validatedData = $validator->validated();

        Lecturers::create($validatedData);

        return response()->json(['message' => 'Lecturer added successfully!'], 201);
    }

    public function getLecturers(Request $request)
    {
        if ($request->ajax()) {
            $lecturers = Lecturers::get();
            return DataTables::of($lecturers)
                ->addColumn('status', function ($lecturer) {
                    $checked    = $lecturer->status ? 'checked' : '';
                    $statusText = $lecturer->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $lecturer->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($lecturer) {
                    return '<button class="btn btn-sm btn-primary edit-lecturer" data-id="' . $lecturer->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
    public function editLecturer($id)
    {
        $lecturer = Lecturers::findOrFail($id);
        return response()->json($lecturer);
    }

    public function updateLecturer(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'lecturer_name'     => 'required|string|max:255',
            'hin_lecturer_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $lecturer = Lecturers::findOrFail($id);
        $lecturer->update($validatedData);

        return response()->json(['message' => 'Lecturer updated successfully!'], 200);
    }

    public function toggleLecturerStatus(Request $request)
    {
        $lecturer         = Lecturers::findOrFail($request->id);
        $lecturer->status = $request->status;
        $lecturer->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    // Lecturers Page Code Ended

    // Lecture Page Code Started

    public function manageLecture()
    {
        $lecturers = Lecturers::where('status', 1)->get();
        return view('research-management.manage_lecture', compact('lecturers'));
    }

    public function storeLecture(Request $reqeust)
    {
        $validator = Validator::make($reqeust->all(), [
            'lecture_title'           => 'required|string|max:255',
            'hin_lecture_title'       => 'required|string|max:255',
            'lecture_description'     => 'nullable|string',
            'hin_lecture_description' => 'nullable|string',
            'lecturer_id'             => 'required|exists:lecturers,id',
            'g-recaptcha-response'    => 'required',
        ], [
            'lecturer_id.exists'            => 'The selected lecturer is invalid.',
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA verification.',
            'lecturer_id.required'          => 'Please Select Lecturer.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $reqeust->input('g-recaptcha-response'),
        ]);
        $result = $response->json();
        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }
        unset($reqeust['g-recaptcha-response']);

        $validatedData = $validator->validated();

        Lectures::create($validatedData);

        return response()->json(['message' => 'Lecture added successfully!'], 201);
    }

    public function getLectures(Request $request)
    {
        if ($request->ajax()) {
            $lectures = Lectures::with('lecturer')->get();
            return DataTables::of($lectures)
                ->addColumn('status', function ($lecture) {
                    $checked    = $lecture->status ? 'checked' : '';
                    $statusText = $lecture->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $lecture->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($lecture) {
                    return '<button class="btn btn-sm btn-primary edit-lecture" data-id="' . $lecture->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->addColumn('lecturer_name', function ($lecture) {
                    return $lecture->lecturer ? $lecture->lecturer->lecturer_name : 'N/A';
                })
                ->addColumn('lecture_description', function ($lecture) {
                    return $lecture->lecture_description ? (strlen($lecture->lecture_description) > 150 ? substr($lecture->lecture_description, 0, 150) . '......' : $lecture->lecture_description) : 'N/A';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
    public function editLecture($id)
    {
        $lecture = Lectures::findOrFail($id);
        return response()->json($lecture);
    }

    public function toggleLectureStatus(Request $request)
    {
        $lecture         = Lectures::findOrFail($request->id);
        $lecture->status = $request->status;
        $lecture->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
    public function updateLecture(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'lecture_title'           => 'required|string|max:255',
            'hin_lecture_title'       => 'required|string|max:255',
            'lecture_description'     => 'nullable|string',
            'hin_lecture_description' => 'nullable|string',
            'lecturer_id'             => 'required|exists:lecturers,id',
        ], [
            'lecturer_id.exists'   => 'The selected lecturer is invalid.',
            'lecturer_id.required' => 'Please Select Lecturer.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $lecture = Lectures::findOrFail($id);
        $lecture->update($validatedData);

        return response()->json(['message' => 'Lecture updated successfully!'], 200);
    }

    // Lecture Page Code Ended

    public function addActivities()
    {
        return view('research-management.add_activities');
    }

    public function getActivities(Request $request)
    {
        $activitiesNames = ActivitiesName::get();
        if ($request->ajax()) {
            return DataTables::of($activitiesNames)
                ->addColumn('status', function ($activitiesName) {
                    $checked    = $activitiesName->status ? 'checked' : '';
                    $statusText = $activitiesName->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $activitiesName->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($activitiesName) {
                    return '<button class="btn btn-sm btn-primary edit-activities-name" data-id="' . $activitiesName->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeActivities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_name'        => 'required|string|max:255',
            'hin_activity_name'    => 'required|string|max:255',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }
        unset($request['g-recaptcha-response']);

        $validatedData = $validator->validated();

        ActivitiesName::create($validatedData);

        return response()->json(['message' => 'Activities Name added successfully!'], 201);
    }

    public function editActivities($id)
    {
        $activitiesName = ActivitiesName::findOrFail($id);
        return response()->json($activitiesName);
    }

    public function updateActivities(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'activity_name'     => 'required|string|max:255',
            'hin_activity_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $activitiesName = ActivitiesName::findOrFail($id);
        $activitiesName->update($validatedData);

        return response()->json(['message' => 'Activities Name updated successfully!'], 200);
    }

    public function toggleActivitiesStatus(Request $request)
    {
        $activitiesName         = ActivitiesName::findOrFail($request->id);
        $activitiesName->status = $request->status;
        $activitiesName->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    public function manageActivities()
    {
        $activitiesNames = ActivitiesName::where('status', 1)->get();
        return view('research-management.manage_activities', compact('activitiesNames'));
    }

    public function getManageActivities(Request $request)
    {
        if ($request->ajax()) {
            $activities = Activity::with('activityName')->get();
            return DataTables::of($activities)
                ->addColumn('status', function ($activity) {
                    $checked    = $activity->status ? 'checked' : '';
                    $statusText = $activity->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $activity->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($activity) {
                    return '<button class="btn btn-sm btn-primary edit-activities" data-id="' . $activity->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->addColumn('activity_name', function ($activity) {
                    return $activity->activityName ? $activity->activityName->activity_name : 'N/A';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeManageActivities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_name_id'           => 'required|exists:activities_names,id',
            'related_project'            => 'required|string|max:255',
            'hin_related_project'        => 'required|string|max:255',
            'project_title'              => 'required|string|max:255',
            'hin_project_title'          => 'required|string|max:255',
            'project_coordinator'        => 'required|string|max:255',
            'hin_project_coordinator'    => 'required|string|max:255',
            'project_co_coordinator'     => 'nullable|string|max:255',
            'hin_project_co_coordinator' => 'nullable|string|max:255',
            'project_core_members'       => 'nullable|string|max:255',
            'hin_project_core_members'   => 'nullable|string|max:255',
            'associated_members'         => 'nullable|string|max:255',
            'hin_associated_members'     => 'nullable|string|max:255',
            'description'                => 'nullable|string',
            'hin_description'            => 'nullable|string',
            'g-recaptcha-response'       => 'required',
        ],
            [
                'activity_name_id.exists'   => 'The selected activity name is invalid.',
                'activity_name_id.required' => 'Please Select Activity Name.',
            ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
        $result = $response->json();
        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }
        unset($request['g-recaptcha-response']);

        $validatedData = $validator->validated();

        Activity::create($validatedData);

        return response()->json(['message' => 'Activities added successfully!'], 201);
    }
    public function editManageActivities($id)
    {
        $activity = Activity::findOrFail($id);
        return response()->json($activity);
    }

    public function updateManageActivities(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'activity_name_id'           => 'required|exists:activities_names,id',
            'related_project'            => 'nullable|string|max:255',
            'hin_related_project'        => 'nullable|string|max:255',
            'project_title'              => 'nullable|string|max:255',
            'hin_project_title'          => 'nullable|string|max:255',
            'project_coordinator'        => 'nullable|string|max:255',
            'hin_project_coordinator'    => 'nullable|string|max:255',
            'project_co_coordinator'     => 'nullable|string|max:255',
            'hin_project_co_coordinator' => 'nullable|string|max:255',
            'project_core_members'       => 'nullable|string|max:255',
            'hin_project_core_members'   => 'nullable|string|max:255',
            'associated_members'         => 'nullable|string|max:255',
            'hin_associated_members'     => 'nullable|string|max:255',
            'description'                => 'nullable|string',
            'hin_description'            => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $activity = Activity::findOrFail($id);
        $activity->update($validatedData);

        return response()->json(['message' => 'Activities updated successfully!'], 200);
    }
    public function toggleManageActivitiesStatus(Request $request)
    {
        $activity         = Activity::findOrFail($request->id);
        $activity->status = $request->status;
        $activity->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    public function manageProjects()
    {
        $activities = Activity::with('activityName')->get();
        return view('research-management.manage_projects', compact('activities'));
    }

    public function getManageProjects(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::with('activity')->get();
            return DataTables::of($projects)
                ->addColumn('status', function ($project) {
                    $checked    = $project->status ? 'checked' : '';
                    $statusText = $project->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $project->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($project) {
                    return '<button class="btn btn-sm btn-primary edit-project" data-id="' . $project->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->addColumn('project_title', function ($project) {
                    return $project->activity ? $project->activity->project_title : 'N/A';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeManageProjects(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_id'          => 'required|exists:activities,id',
            'component_no'         => 'nullable|string|max:255',
            'component_title'      => 'nullable|string|max:255',
            'hin_component_title'  => 'nullable|string|max:255',
            'personnel'            => 'nullable|string|max:255',
            'hin_personnel'        => 'nullable|string|max:255',
            'g-recaptcha-response' => 'required',
        ],
            [
                'activity_id.exists'   => 'The selected activity name is invalid.',
                'activity_id.required' => 'Please Select Activity Name.',
            ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
        $result = $response->json();
        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }
        unset($request['g-recaptcha-response']);

        $validatedData = $validator->validated();

        Project::create($validatedData);

        return response()->json(['message' => 'Project added successfully!'], 201);
    }

    public function editManageProjects($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    public function updateManageProjects(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'activity_id'         => 'required|exists:activities,id',
            'component_no'        => 'nullable|string|max:255',
            'component_title'     => 'nullable|string|max:255',
            'hin_component_title' => 'nullable|string|max:255',
            'personnel'           => 'nullable|string|max:255',
            'hin_personnel'       => 'nullable|string|max:255',
        ],
            [
                'activity_id.exists'   => 'The selected activity name is invalid.',
                'activity_id.required' => 'Please Select Activity Name.',
            ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return response()->json(['message' => 'Project updated successfully!'], 200);
    }
    public function toggleManageProjectsStatus(Request $request)
    {
        $project         = Project::findOrFail($request->id);
        $project->status = $request->status;
        $project->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    // Sponsered Projects
    public function sponsoredProjects(Request $request)
    {
        return view('research-management.sponsored_projects');
    }

    public function getSponsoredProjects(Request $request)
    {
        if ($request->ajax()) {
            $sponsoredProjects = SponsoredProjects::get();
            return DataTables::of($sponsoredProjects)
                ->addColumn('status', function ($sponsoredProject) {
                    $checked    = $sponsoredProject->status ? 'checked' : '';
                    $statusText = $sponsoredProject->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $sponsoredProject->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($sponsoredProject) {
                    return '<button class="btn btn-sm btn-primary edit-sponsored-project" data-id="' . $sponsoredProject->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeSponsoredProjects(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_title'           => 'required|string|max:255',
            'hin_project_title'       => 'required|string|max:255',
            'project_coordinator'     => 'required|string|max:255',
            'hin_project_coordinator' => 'required|string|max:255',
            'funding_agency'          => 'required|string|max:255',
            'hin_funding_agency'      => 'required|string|max:255',
            'project_no'              => 'required|string|max:255',
            'project_cost'            => 'required|string|max:255',
            'start_date'              => 'required|date',
            'duration'        => 'required|string|max:255',
            'hin_duration'    => 'required|string|max:255',
            'g-recaptcha-response'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }
        unset($request['g-recaptcha-response']);

        $validatedData = $validator->validated();

        SponsoredProjects::create($validatedData);

        return response()->json(['message' => 'Sponsored Projects added successfully!'], 201);
    }

    public function toggleSponsoredProjectsStatus(Request $request)
    {
        $sponsoredProject         = SponsoredProjects::findOrFail($request->id);
        $sponsoredProject->status = $request->status;
        $sponsoredProject->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
    public function editSponsoredProjects($id)
    {
        $sponsoredProject = SponsoredProjects::findOrFail($id);
        return response()->json($sponsoredProject);
    }

    public function updateSponsoredProjects(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'project_title'           => 'required|string|max:255',
            'hin_project_title'       => 'required|string|max:255',
            'project_coordinator'     => 'required|string|max:255',
            'hin_project_coordinator' => 'required|string|max:255',
            'funding_agency'          => 'required|string|max:255',
            'hin_funding_agency'      => 'required|string|max:255',
            'project_no'              => 'required|string|max:255',
            'project_cost'            => 'required|string|max:255',
            'start_date'              => 'required|date',
            'duration'        => 'required|string|max:255',
            'hin_duration'    => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $sponsoredProject = SponsoredProjects::findOrFail($id);
        $sponsoredProject->update($validatedData);

        return response()->json(['message' => 'Sponsored Projects updated successfully!'], 200);
    }
}
