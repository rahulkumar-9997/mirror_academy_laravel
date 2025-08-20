<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Award;

class AwardsController extends Controller
{
    public function index()
    {
        $awardsList = Award::orderBy('id', 'desc')->paginate(20);
        //return response()->json($testimonialsList);
        return view('backend.pages.awards.index', compact('awardsList'));
    }

    public function create(Request $request)
    {
        $form = '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-awards.store') . '" accept-charset="UTF-8" enctype="multipart/form-data" id="awardsAddForm">
                ' . csrf_field() . '
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="awards_image" class="form-label">Select Awards Image File* </label>
                            <input type="file" id="awards_image" name="awards_image" multiple class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="awards_description">
                                Awards Description *
                            </label>
                            <textarea type="text" class="form-control" id="awards_description" name="awards_description"></textarea>
                        </div>
                    </div>                   
                                
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>';
        return response()->json([
            'status' => 'success',
            'message' => 'Form created successfully',
            'form' => $form,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'awards_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:6144',
            'awards_description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $destinationPath = public_path('upload/awards');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $filename = null;
            if ($request->hasFile('awards_image')) {
                $file = $request->file('awards_image');
                $filename = 'awards-' . uniqid() . '-' . time() . '.webp';
                $imagePath = $destinationPath . '/' . $filename;
                
                $image = Image::make($file)
                    ->encode('webp', 75)
                    ->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                $image->save($imagePath);
            }

            Award::create([
                'image' => $filename,
                'description' => $request->awards_description,
            ]);

            DB::commit();

            $awardsList = Award::orderBy('id', 'desc')->paginate(20);
            return response()->json([
                'status' => 'success',
                'message' => 'Awards Created successfully!',
                'awardsListData' => view('backend.pages.awards.partials.awards-list', compact('awardsList'))->render()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($filename) && File::exists($destinationPath . '/' . $filename)) {
                File::delete($destinationPath . '/' . $filename);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create award: ' . $e->getMessage()
            ], 500);
        }
    }
}
