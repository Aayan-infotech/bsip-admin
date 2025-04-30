<?php
namespace App\Http\Controllers;

use App\Models\PastHeads;
use App\Models\PastDirectors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;

class StructureManagementController extends Controller
{

    public function pastHeads()
    {
        return view('structure_management.past_heads');
    }

    public function getPastHeads(Request $request)
    {
        if ($request->ajax()) {
            $pastHeads = PastHeads::all();
            return DataTables::of($pastHeads)
                ->addColumn('from', function ($pastHead) {
                    return $pastHead->from_month . ' ' . $pastHead->from_year;
                })
                ->addColumn('to', function ($pastHead) {
                    return $pastHead->to_month . ' ' . $pastHead->to_year;
                })
                ->addColumn('status', function ($pastHead) {
                    $checked    = $pastHead->status ? 'checked' : '';
                    $statusText = $pastHead->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $pastHead->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($pastHead) {
                    return '<button class="btn btn-sm btn-primary edit-past-head" data-id="' . $pastHead->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storePastHeads(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:255',
            'hin_name'             => 'required|string|max:255',
            'designation'          => 'required|string|max:255',
            'hin_designation'      => 'required|string|max:255',
            'from_month'           => 'required|string|max:255',
            'from_year'            => 'required|string|max:255',
            'to_month'             => 'required|string|max:255',
            'to_year'              => 'required|string|max:255',
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

        $months = [
            'january'   => 'जनवरी',
            'february'  => 'फरवरी',
            'march'     => 'मार्च',
            'april'     => 'अप्रैल',
            'may'       => 'मई',
            'june'      => 'जून',
            'july'      => 'जुलाई',
            'august'    => 'अगस्त',
            'september' => 'सितंबर',
            'october'   => 'अक्टूबर',
            'november'  => 'नवंबर',
            'december'  => 'दिसंबर',
        ];
        $validatedData['hin_from_month'] = $months[strtolower($validatedData['from_month'])] ?? $validatedData['from_month'];
        $validatedData['hin_to_month']   = $months[strtolower($validatedData['to_month'])] ?? $validatedData['to_month'];

        $pastHead = PastHeads::create($validatedData);

        return response()->json(['success' => true, 'message' => "Past Head saved successfully!", 'data' => $pastHead]);
    }

    public function editPastHeads($id)
    {
        $pastHead = PastHeads::findOrFail($id);
        return response()->json($pastHead);
    }

    public function updatePastHeads(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'hin_name'   => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'hin_designation' => 'required|string|max:255',
            'from_month' => 'required|string|max:255',
            'from_year'  => 'required|string|max:255',
            'to_month'   => 'required|string|max:255',
            'to_year'    => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $months = [
            'january'   => 'जनवरी',
            'february'  => 'फरवरी',
            'march'     => 'मार्च',
            'april'     => 'अप्रैल',
            'may'       => 'मई',
            'june'      => 'जून',
            'july'      => 'जुलाई',
            'august'    => 'अगस्त',
            'september' => 'सितंबर',
            'october'   => 'अक्टूबर',
            'november'  => 'नवंबर',
            'december'  => 'दिसंबर',
        ];
        $validatedData['hin_from_month'] = $months[strtolower($validatedData['from_month'])] ?? $validatedData['from_month'];
        $validatedData['hin_to_month']   = $months[strtolower($validatedData['to_month'])] ?? $validatedData['to_month'];

        $pastHead = PastHeads::findOrFail($id);
        if ($pastHead) {
            $pastHead->update($validatedData);
            return response()->json(['success' => true, 'message' => "Past Head updated successfully!", 'data' => $pastHead]);
        } else {
            return response()->json(['success' => false, 'message' => "Past Head not found!"], 404);
        }

    }
    public function togglePastHeadsStatus(Request $request)
    {
        $pastHead         = PastHeads::findOrFail($request->id);
        $pastHead->status = $request->status;
        $pastHead->save();

        return response()->json(['success' => "Past Head status updated successfully!"]);
    }

    // Past Directors Page

    public function pastDirectors()
    {
        return view('structure_management.past_directors');
    }

    public function getPastDirectors(Request $request)
    {
        if ($request->ajax()) {
            $pastDirectors = PastDirectors::all();
            return DataTables::of($pastDirectors)
                ->addColumn('from', function ($pastDirector) {
                    return $pastDirector->from_month . ' ' . $pastDirector->from_year;
                })
                ->addColumn('to', function ($pastDirector) {
                    return $pastDirector->to_month . ' ' . $pastDirector->to_year;
                })
                ->addColumn('status', function ($pastDirector) {
                    $checked    = $pastDirector->status ? 'checked' : '';
                    $statusText = $pastDirector->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $pastDirector->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($pastDirector) {
                    return '<button class="btn btn-sm btn-primary edit-past-director" data-id="' . $pastDirector->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
    public function storePastDirectors(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:255',
            'hin_name'             => 'required|string|max:255',
            'from_month'           => 'required|string|max:255',
            'from_year'            => 'required|string|max:255',
            'to_month'             => 'required|string|max:255',
            'to_year'              => 'required|string|max:255',
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

        $months = [
            'january'   => 'जनवरी',
            'february'  => 'फरवरी',
            'march'     => 'मार्च',
            'april'     => 'अप्रैल',
            'may'       => 'मई',
            'june'      => 'जून',
            'july'      => 'जुलाई',
            'august'    => 'अगस्त',
            'september' => 'सितंबर',
            'october'   => 'अक्टूबर',
            'november'  => 'नवंबर',
            'december'  => 'दिसंबर',
        ];
        $validatedData['hin_from_month'] = $months[strtolower($validatedData['from_month'])] ?? $validatedData['from_month'];
        $validatedData['hin_to_month']   = $months[strtolower($validatedData['to_month'])] ?? $validatedData['to_month'];

        $pastDirector = PastDirectors::create($validatedData);

        return response()->json(['success' => true, 'message' => "Past Director saved successfully!", 'data' => $pastDirector]);
    }
    public function editPastDirectors($id)
    {
        $pastDirector = PastDirectors::findOrFail($id);
        return response()->json($pastDirector);
    }

    public function updatePastDirectors(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'hin_name'   => 'required|string|max:255',
            'from_month' => 'required|string|max:255',
            'from_year'  => 'required|string|max:255',
            'to_month'   => 'required|string|max:255',
            'to_year'    => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $months = [
            'january'   => 'जनवरी',
            'february'  => 'फरवरी',
            'march'     => 'मार्च',
            'april'     => 'अप्रैल',
            'may'       => 'मई',
            'june'      => 'जून',
            'july'      => 'जुलाई',
            'august'    => 'अगस्त',
            'september' => 'सितंबर',
            'october'   => 'अक्टूबर',
            'november'  => 'नवंबर',
            'december'  => 'दिसंबर',
        ];
        $validatedData['hin_from_month'] = $months[strtolower($validatedData['from_month'])] ?? $validatedData['from_month'];
        $validatedData['hin_to_month']   = $months[strtolower($validatedData['to_month'])] ?? $validatedData['to_month'];

        $pastDirector = PastDirectors::findOrFail($id);
        if ($pastDirector) {
            $pastDirector->update($validatedData);
            return response()->json(['success' => true, 'message' => "Past Director updated successfully!", 'data' => $pastDirector]);
        } else {
            return response()->json(['success' => false, 'message' => "Past Director not found!"], 404);
        }

    }
    public function togglePastDirectorsStatus(Request $request)
    {
        $pastDirector         = PastDirectors::findOrFail($request->id);
        $pastDirector->status = $request->status;
        $pastDirector->save();

        return response()->json(['success' => "Past Director status updated successfully!"]);
    }

}
