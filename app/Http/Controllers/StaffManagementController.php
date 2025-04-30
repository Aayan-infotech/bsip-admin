<?php
namespace App\Http\Controllers;

use App\Models\Fellowship;
use App\Models\InternationalCollaboration;
use App\Models\ProfessionalService;
use App\Models\SAIF;
use App\Models\Staff;
use App\Models\StaffSubCategory;
use App\Models\Staff_Category;
use App\Models\AwardsHonors;
use App\Traits\UploadFilesTraits;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StaffManagementController extends Controller
{
    use UploadFilesTraits;
    public function staffSubCategory()
    {
        $categories = Staff_Category::all();
        return view('staff_management.staff_sub_category', compact('categories'));
    }

    public function storeStaffSubCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'            => 'required|exists:staff__categories,id',
            'staff_sub_category'     => 'required|string|max:255',
            'staff_sub_category_hin' => 'required|string|max:255',
            'g-recaptcha-response'   => 'required',
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

        try {
            StaffSubCategory::create([
                'category_id'           => $validatedData['category_id'],
                'sub_category_name'     => $validatedData['staff_sub_category'],
                'sub_category_name_hin' => $validatedData['staff_sub_category_hin'],
            ]);

            return redirect()->back()->with('success', 'Sub Category Created Successfully');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function getStaffSubCategory(Request $request)
    {
        if ($request->ajax()) {
            $subCategories = StaffSubCategory::with('category')->get();
            return DataTables::of($subCategories)
                ->addColumn('status', function ($subCategory) {
                    $checked    = $subCategory->status ? 'checked' : '';
                    $statusText = $subCategory->status
                    ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : '<span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $subCategory->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($subCategory) {
                    return '<button class="btn btn-sm btn-primary edit-sub-category" data-id="' . $subCategory->id . '">
                        <i class="fas fa-edit"></i>
                    </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function toggleStaffSubCategoryStatus(Request $request)
    {
        $subCategory = StaffSubCategory::find($request->id);
        if ($subCategory) {
            $subCategory->status = $request->status;
            $subCategory->save();
            return response()->json(['success' => 'Status updated successfully!']);
        } else {
            return response()->json(['error' => 'Sub Category not found'], 404);
        }
    }

    public function editStaffSubCategory(Request $request)
    {
        $subCategory = StaffSubCategory::find($request->id);
        if ($subCategory) {
            return response()->json($subCategory);
        } else {
            return response()->json(['error' => 'Sub Category not found'], 404);
        }
    }

    public function updateStaffSubCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'            => 'required|exists:staff__categories,id',
            'staff_sub_category'     => 'required|string|max:255',
            'staff_sub_category_hin' => 'required|string|max:255',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        try {
            $subCategory = StaffSubCategory::find($request->id);
            if ($subCategory) {
                $subCategory->category_id           = $validatedData['category_id'];
                $subCategory->sub_category_name     = $validatedData['staff_sub_category'];
                $subCategory->sub_category_name_hin = $validatedData['staff_sub_category_hin'];
                $subCategory->save();
                return response()->json(['message' => 'Sub Category Updated Successfully']);
            } else {
                return response()->json(['error' => 'Sub Category not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===================================================
    // Staff Master Code Started
    // ===================================================

    public function staffMaster()
    {
        $categories = Staff_Category::all();
        return view('staff_management.staff_master', compact('categories'));
    }

    public function getSubCategoryofCategory(Request $request)
    {
        $subCategories = StaffSubCategory::where('category_id', $request->category_id)->get();
        return response()->json($subCategories);
    }

    public function getStaffMaster(Request $request)
    {
        if ($request->ajax()) {
            $staff = Staff::with(['category', 'subCategory'])->get();
            return DataTables::of($staff)
                ->addColumn('status', function ($staff) {
                    $checked    = $staff->status ? 'checked' : '';
                    $statusText = $staff->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $staff->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $staff->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $staff->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $staff->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($staff) {
                    return '<button class="btn btn-sm btn-primary edit-staff" data-id="' . $staff->id . '">
                        <i class="fas fa-edit"></i>
                    </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeStaffMaster(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff_type'           => 'required|in:Scientist,Other',
            'category_id'          => 'required|exists:staff__categories,id',
            'sub_category_id'      => 'required|exists:staff_sub_categories,id',
            'name'                 => 'required|string|max:255',
            'name_hin'             => 'required|string|max:255',
            'email'                => 'nullable|email|unique:staff,email',
            'telephone_extension'  => 'nullable|string|max:20',
            'personal_telephone'   => 'nullable|string|max:20',
            'mobile_no'            => 'nullable|string|max:20',
            'alternate_mobile_no'  => 'nullable|string|max:20',
            'alternate_email'      => 'nullable|email|max:255',
            'joining_date'         => 'nullable|date',
            'exit_date'            => 'nullable|date',
            'superannuation_date'  => 'nullable|date',
            'profile_picture'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'cv_file'              => 'nullable|mimes:pdf|max:10240',
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

        if ($request->hasFile('profile_picture')) {
            $file                             = $request->file('profile_picture');
            $profilePath                      = $this->uploadFile($file, 'staff/profile_pictures');
            $validatedData['profile_picture'] = $profilePath;
        }
        if ($request->hasFile('cv_file')) {
            $file                     = $request->file('cv_file');
            $cvPath                   = $this->uploadFile($file, 'staff/cv_files');
            $validatedData['cv'] = $cvPath;
        }

        $lastStaff                    = Staff::orderBy('id', 'desc')->first();
        $lastId                       = $lastStaff ? $lastStaff->id : 0;
        $employeeId                   = 'EMP' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        $validatedData['employee_id'] = $employeeId;

        try {
            Staff::create([
                'employee_id'         => $validatedData['employee_id'],
                'staff_type'          => $validatedData['staff_type'],
                'category_id'         => $validatedData['category_id'],
                'sub_category_id'     => $validatedData['sub_category_id'],
                'name'                => $validatedData['name'],
                'name_hin'            => $validatedData['name_hin'],
                'email'               => $validatedData['email'],
                'telephone_extension' => $validatedData['telephone_extension'],
                'personal_telephone'  => $validatedData['personal_telephone'],
                'mobile_no'           => $validatedData['mobile_no'],
                'alternate_mobile_no' => $validatedData['alternate_mobile_no'],
                'alternate_email'     => $validatedData['alternate_email'],
                'joining_date'        => $validatedData['joining_date'],
                'exit_date'           => $validatedData['exit_date'],
                'superannuation_date' => $validatedData['superannuation_date'],
                'profile_picture'     => $validatedData['profile_picture'] ?? null,
                'cv'                  => $validatedData['cv'] ?? null,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function toggleStaffMasterStatus(Request $request)
    {
        $staff = Staff::find($request->id);
        if ($staff) {
            $staff->status = $request->status;
            $staff->save();
            return response()->json(['success' => 'Status updated successfully!']);
        } else {
            return response()->json(['error' => 'Staff not found'], 404);
        }
    }

    public function toggleStaffMasterArchivedStatus(Request $request)
    {
        $staff = Staff::find($request->id);
        if ($staff) {
            $staff->archived_status = $request->status ? 'Yes' : 'No';
            $staff->save();
            return response()->json(['success' => 'Archived Status updated successfully!']);
        } else {
            return response()->json(['error' => 'Staff not found'], 404);
        }
    }

    public function editStaffMaster(Request $request)
    {
        $staff         = Staff::with('category', 'subCategory')->find($request->id);
        $subCategories = StaffSubCategory::where('category_id', $staff->category_id)->get();
        if ($staff) {
            return response()->json(['staff' => $staff, 'sub_categories' => $subCategories]);
        } else {
            return response()->json(['error' => 'Staff not found'], 404);
        }
    }

    public function updateStaffMaster(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'staff_type'          => 'required|in:Scientist,Other',
            'category_id'         => 'required|exists:staff__categories,id',
            'sub_category_id'     => 'required|exists:staff_sub_categories,id',
            'name'                => 'required|string|max:255',
            'name_hin'            => 'required|string|max:255',
            'email'               => 'required|email|unique:staff,email,' . $id,
            'telephone_extension' => 'nullable|string|max:20',
            'personal_telephone'  => 'nullable|string|max:20',
            'mobile_no'           => 'required|string|max:20',
            'alternate_mobile_no' => 'nullable|string|max:20',
            'alternate_email'     => 'nullable|email|max:255',
            'joining_date'        => 'nullable|date',
            'exit_date'           => 'nullable|date',
            'superannuation_date' => 'nullable|date',
            'profile_picture'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'cv_file'             => 'nullable|mimes:pdf|max:10240',
            // Add validation for the files if they are present
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        try {
            $staff = Staff::find($request->id);

            if ($request->hasFile('profile_picture')) {
                $file                             = $request->file('profile_picture');
                $profilePath                      = $this->uploadFile($file, 'staff/profile_pictures');
                $validatedData['profile_picture'] = $profilePath;
            }
            if ($request->hasFile('cv_file')) {
                $file                     = $request->file('cv_file');
                $cvPath                   = $this->uploadFile($file, 'staff/cv_files');
                $validatedData['cv'] = $cvPath;
            }

            // dd($validatedData);

            if ($staff) {
                $staff->update($validatedData);
                return response()->json(['message' => 'Staff Updated Successfully']);
            } else {
                return response()->json(['error' => 'Staff not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===================================================
    // Staff Master Code Ended
    // ===================================================

    // ===================================================
    //  Scientist Management Code Started
    // ===================================================

    public function scientistManagement()
    {
        $staffMembers = Staff::all();
        return view('staff_management.scientist_management', compact('staffMembers'));
    }

    public function getStaffDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required|exists:staff,id',
        ], [
            'staff_id.required' => 'Please select an employee',
            'staff_id.exists'   => 'Employee not found',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $staff = Staff::with('category', 'subCategory', 'internationalCollaborations', 'professionalServices', 'fellowships', 'awardsHonors')->find($request->staff_id);
        if ($staff) {
            return response()->json($staff, 200);
        } else {
            return response()->json(['error' => 'Staff not found'], 404);
        }
    }

    public function updateProfileImage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $validatedData = $validator->validated();
        try {
            $staff = Staff::find($id);
            if ($staff) {
                if ($request->hasFile('profile_picture')) {
                    // Delete the old profile picture if it exists
                    if ($staff->profile_picture) {
                        $this->deleteFile($staff->profile_picture);
                    }

                    $file                             = $request->file('profile_picture');
                    $profilePath                      = $this->uploadFile($file, 'staff/profile_pictures');
                    $validatedData['profile_picture'] = $profilePath;
                }
                $staff->update($validatedData);
                return response()->json($staff, 200);
            } else {
                return response()->json(['error' => 'Staff not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateAccountDetails(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_position'          => 'nullable|string|max:255',
            'hin_current_position'      => 'nullable|string|max:255',
            'previous_position'         => 'nullable|string|max:255',
            'hin_previous_position'     => 'nullable|string|max:255',
            'educational_qualification' => 'nullable|string|max:255',
            'hin_educational_qualification' => 'nullable|string|max:255',
            'no_of_publications'        => 'nullable|string|max:255',
            'total_citations'           => 'nullable|string|max:255',
            'research_interests'        => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $validatedData = $validator->validated();
        try {
            $staff = Staff::find($id);
            if ($staff) {
                $staff->update($validatedData);
                return response()->json($staff, 200);
            } else {
                return response()->json(['error' => 'Staff not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addCollaboration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff_id'           => 'required|exists:staff,id',
            'collaboration_name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {

            $collaboration = InternationalCollaboration::create($validatedData);
            return response()->json($collaboration, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function removeCollaboration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:international_collaborations,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {
            $collaboration = InternationalCollaboration::find($validatedData['id']);
            if ($collaboration) {
                $collaboration->delete();
                return response()->json(['message' => 'Collaboration removed successfully'], 200);
            } else {
                return response()->json(['error' => 'Collaboration not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addProfessionalService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff_id'     => 'required|exists:staff,id',
            'service_name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {

            $service = ProfessionalService::create($validatedData);
            return response()->json($service, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function removeProfessionalService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:professional_services,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {
            $service = ProfessionalService::find($validatedData['id']);
            if ($service) {
                $service->delete();
                return response()->json(['message' => 'Service removed successfully'], 200);
            } else {
                return response()->json(['error' => 'Service not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addFellowship(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff_id'        => 'required|exists:staff,id',
            'fellowship_name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {

            $fellowship = Fellowship::create($validatedData);
            return response()->json($fellowship, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function removeFellowship(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:fellowships,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {
            $fellowship = Fellowship::find($validatedData['id']);
            if ($fellowship) {
                $fellowship->delete();
                return response()->json(['message' => 'Fellowship removed successfully'], 200);
            } else {
                return response()->json(['error' => 'Fellowship not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addAward(Request $request){
        $validator = Validator::make($request->all(), [
            'staff_id'        => 'required|exists:staff,id',
            'award_name'      => 'required|string|max:255',
            'award_year'      => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {

            $award = AwardsHonors::create($validatedData);
            return response()->json($award, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function removeAward(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:awards_honors,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        try {
            $award = AwardsHonors::find($validatedData['id']);
            if ($award) {
                $award->delete();
                return response()->json(['message' => 'Award removed successfully'], 200);
            } else {
                return response()->json(['error' => 'Award not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===================================================
    // Manage SAIF Code Started
    // ===================================================

    public function manageSaif()
    {
        $scientists = Staff::where('staff_type', 'Scientist')->get();
        return view('service_management.manage_saif', compact('scientists'));
    }

    public function getSaif(Request $request)
    {
        if ($request->ajax()) {
            $saifs = SAIF::with('scientist')->get();
            return DataTables::of($saifs)
                ->addColumn('status', function ($saif) {
                    $checked    = $saif->status ? 'checked' : '';
                    $statusText = $saif->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $saif->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $saif->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $saif->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $saif->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($saif) {
                    return '<button class="btn btn-sm btn-primary edit-saif" data-id="' . $saif->id . '">
                        <i class="fas fa-edit"></i>
                    </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeSaif(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'related_scientist'    => 'required|exists:staff,id',
            'instrument_name'      => 'required|string|max:255',
            'instrument_name_hin'  => 'required|string|max:255',
            'description'          => 'nullable|string|max:1000',
            'description_hin'      => 'nullable|string|max:1000',
            'image'                => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'pdf_file'             => 'nullable|mimes:pdf|max:10240',
            'g-recaptcha-response' => 'required',
            // Add validation for the files if they are present
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
        // dd($validatedData);

        if ($request->hasFile('image')) {
            $file                   = $request->file('image');
            $imagePath              = $this->uploadFile($file, 'saif/images');
            $validatedData['image'] = $imagePath;
        }
        if ($request->hasFile('pdf_file')) {
            $file                      = $request->file('pdf_file');
            $pdfPath                   = $this->uploadFile($file, 'saif/pdf_files');
            $validatedData['pdf_file'] = $pdfPath;
        }

        try {
            SAIF::create([
                'employee_id'         => $validatedData['related_scientist'],
                'instrument_name'     => $validatedData['instrument_name'],
                'instrument_name_hin' => $validatedData['instrument_name_hin'],
                'description'         => $validatedData['description'],
                'description_hin'     => $validatedData['description_hin'],
                'image'               => isset($validatedData['image']) ? $validatedData['image'] : null,
                'pdf_file'            => isset($validatedData['pdf_file']) ? $validatedData['pdf_file'] : null,
            ]);

            return response()->json(['message' => 'SAIF Created Successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function toggleSaifStatus(Request $request)
    {
        $saif = SAIF::find($request->id);
        if ($saif) {
            $saif->status = $request->status;
            $saif->save();
            return response()->json(['success' => 'Status updated successfully!']);
        } else {
            return response()->json(['error' => 'SAIF not found'], 404);
        }
    }
    public function toggleSaifArchivedStatus(Request $request)
    {
        $saif = SAIF::find($request->id);
        if ($saif) {
            $saif->archived_status = $request->status ? 'Yes' : 'No';
            $saif->save();
            return response()->json(['success' => 'Archived Status updated successfully!']);
        } else {
            return response()->json(['error' => 'SAIF not found'], 404);
        }
    }

    public function editSaif(Request $request)
    {
        $saif = SAIF::find($request->id);
        if ($saif) {
            return response()->json($saif);
        } else {
            return response()->json(['error' => 'SAIF not found'], 404);
        }
    }

    public function updateSaif(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'related_scientist'   => 'required|exists:staff,id',
            'instrument_name'     => 'required|string|max:255',
            'instrument_name_hin' => 'required|string|max:255',
            'description'         => 'nullable|string|max:1000',
            'description_hin'     => 'nullable|string|max:1000',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'pdf_file'            => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        try {
            $saif = SAIF::find($id);

            if ($request->hasFile('image')) {
                $file                   = $request->file('image');
                $imagePath              = $this->uploadFile($file, 'saif/images');
                $validatedData['image'] = $imagePath;
            }
            if ($request->hasFile('pdf_file')) {
                $file                      = $request->file('pdf_file');
                $pdfPath                   = $this->uploadFile($file, 'saif/pdf_files');
                $validatedData['pdf_file'] = $pdfPath;
            }

            if ($saif) {
                $saif->update($validatedData);
                return response()->json(['message' => 'SAIF Updated Successfully']);
            } else {
                return response()->json(['error' => 'SAIF not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
