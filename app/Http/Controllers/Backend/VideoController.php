<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(){ 
        $videoList = Video::orderBy('id', 'desc')->paginate(20); 
        //return response()->json($testimonialsList);
        return view('backend.pages.video.index', compact('videoList'));
    }

    public function create(Request $request){
        $form = '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-video.store') . '" accept-charset="UTF-8" enctype="multipart/form-data" id="videoAddForm">
                ' . csrf_field() . '
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="video_file" class="form-label">Select Video File</label>
                            <input type="file" id="video_file" name="video_file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="progress" style="height: 25px; display:none;" id="uploadProgressWrapper">
                            <div id="uploadProgress" class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                                role="progressbar" style="width:0%">0%</div>
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
            'video_file' => 'required|file|mimes:mp4,mov,avi,mkv,webm|max:204800',
             // 200MB limit
        ], [
            'video_file.required' => 'Please select a video file.',
            'video_file.mimes' => 'Only MP4, MOV, AVI, MKV, WEBM formats are allowed.',
            'video_file.max' => 'The video size must not exceed 200MB.',
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
            $destinationPath = public_path('upload/video');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file = $request->file('video_file');
            $safeTitle = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $uniqueTimestamp = round(microtime(true) * 1000);
            $extension = $file->getClientOriginalExtension();
            $fileName = 'video-' . $uniqueTimestamp . '.' . $extension;
            $file->move($destinationPath, $fileName);
            $video = Video::create([
                'file' => $fileName,
                'status' => 1
            ]);
            DB::commit();
            $videoList = Video::orderBy('id', 'desc')->paginate(20);
            return response()->json([
                'status' => 'success',
                'message' => 'Video uploaded successfully!',
                'videoListData' => view('backend.pages.video.partials.video-list', compact('videoList'))->render()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to upload video: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $form = '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-video.update', $video->id) . '" 
                accept-charset="UTF-8" enctype="multipart/form-data" id="videoEditForm">
                ' . csrf_field() . method_field('PUT') . '
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="video_file" class="form-label">Replace Video File (optional)</label>
                        <input type="file" id="video_file" name="video_file" class="form-control">
                        <small class="text-muted">Leave empty if you don\'t want to change the video.</small>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control form-select">
                            <option value="1" ' . ($video->status == 1 ? 'selected' : '') . '>Active</option>
                            <option value="0" ' . ($video->status == 0 ? 'selected' : '') . '>Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>';

        return response()->json([
            'status' => 'success',
            'message' => 'Form loaded successfully',
            'form' => $form,
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'video_file' => 'nullable|file|mimes:mp4,mov,avi,mkv,webm|max:204800',
            'status'     => 'required|in:0,1',
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
            $destinationPath = public_path('upload/video');
            if ($request->hasFile('video_file')) {
                if ($video->file && File::exists($destinationPath . '/' . $video->file)) {
                    File::delete($destinationPath . '/' . $video->file);
                }
                $file = $request->file('video_file');
                $uniqueTimestamp = round(microtime(true) * 1000);
                $extension = $file->getClientOriginalExtension();
                $fileName = 'video-' . $uniqueTimestamp . '.' . $extension;
                $file->move($destinationPath, $fileName);
                $video->file = $fileName;
            }

            $video->status = $request->status;
            $video->save();
            DB::commit();
            $videoList = Video::orderBy('id', 'desc')->paginate(20);
            return response()->json([
                'status' => 'success',
                'message' => 'Video updated successfully!',
                'videoListData' => view('backend.pages.video.partials.video-list', compact('videoList'))->render()
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Update failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $video = Video::findOrFail($id);
            $filePath = public_path('upload/video/' . $video->file);
            if ($video->file && File::exists($filePath)) {
                File::delete($filePath);
            }
            $video->delete();
            DB::commit();
            $videoList = Video::orderBy('id', 'desc')->paginate(20);
            return response()->json([
                'status' => 'success',
                'message' => 'Video deleted successfully!',
                'videoListData' => view('backend.pages.video.partials.video-list', compact('videoList'))->render()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete video: ' . $e->getMessage()
            ], 500);
        }
    }
}
