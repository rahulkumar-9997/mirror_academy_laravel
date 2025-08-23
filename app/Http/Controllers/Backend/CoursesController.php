<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use App\Models\Courses;
use App\Models\CoursesAdditional;
use App\Models\CoursesHighlights;
use App\Models\Icons;
class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::with(['additionalContents', 'highlightsContents'])->paginate(20);
        //return response()->json($courses);
        return view('backend.pages.courses.index', compact('courses'));
    }

    public function create()
    {
        $icons = Icons::all();
        return view('backend.pages.courses.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'courses_additional_title' => 'nullable|array',
            'courses_additional_title.*' => 'nullable|string|max:255',
            'courses_additional_content' => 'nullable|array',
            'courses_additional_content.*' => 'nullable|string',
            'courses_highlights_content' => 'nullable|array',
            'courses_highlights_content.*' => 'nullable|string',
            'courses_highlights_icon' => 'nullable|array',
            'courses_highlights_icon.*' => 'nullable|string|max:255', 
        ]);
        $destinationPath = public_path('upload/courses');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        DB::beginTransaction();        
        try {
            if ($request->hasFile('main_image')) {
                $mainImage = $request->file('main_image');
                $titleSlug = Str::slug($validatedData['title']);
                $mainImageName = $titleSlug . '-' . uniqid() . '.webp';
                $mainImagePath = $destinationPath . '/' . $mainImageName;
                $this->processAndSaveImage($mainImage, $mainImagePath);
            }
            $pageImageName = null;
            if ($request->hasFile('page_image')) {
                $pageImage = $request->file('page_image');
                $pageImageName = $titleSlug . '-page-' . uniqid() . '.webp';
                $pageImagePath = $destinationPath . '/' . $pageImageName;
                $this->processAndSaveImage($pageImage, $pageImagePath);
            }           
            $course = Courses::create([
                'title' => $validatedData['title'],
                'short_content' => $validatedData['short_content'] ?? null,
                'description' => $validatedData['description'] ?? null,
                'main_image' => $mainImageName,
                'page_image' => $pageImageName,
                'meta_title' => $validatedData['meta_title'] ?? null,
                'meta_description' => $validatedData['meta_description'] ?? null,
                'status' => true,
            ]);
            if (!empty($request->courses_additional_title)) {
                foreach ($request->courses_additional_title as $index => $title) {
                    if (!empty($title)) {
                        $content = $request->courses_additional_content[$index] ?? null;
                        CoursesAdditional::create([
                            'courses_id' => $course->id,
                            'title' => $title,
                            'description' => $content,
                            'short_order' => $index,
                        ]);
                    }
                }
            }
            if (!empty($request->courses_highlights_content)) {
                foreach ($request->courses_highlights_content as $index => $content) {
                    if (!empty($content)) {
                        $iconClass = $request->courses_highlights_icon[$index] ?? null;
                        CoursesHighlights::create([
                            'courses_id' => $course->id,
                            'content' => $content,
                            'icon' => $iconClass,
                            'short_order' => $index,
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('manage-courses.index')->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($mainImagePath) && file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
            if (isset($pageImagePath) && file_exists($pageImagePath)) {
                unlink($pageImagePath);
            }
            return back()->withInput()->with('error', 'Error creating course: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $course = Courses::with(['additionalContents', 'highlightsContents'])->findOrFail($id);
        $icons = Icons::all();
        return view('backend.pages.courses.edit', compact('course', 'icons'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'courses_additional_id' => 'nullable|array',
            'courses_additional_id.*' => 'nullable|integer|exists:courses_additional,id',
            'courses_additional_title' => 'nullable|array',
            'courses_additional_title.*' => 'nullable|string|max:255',
            'courses_additional_content' => 'nullable|array',
            'courses_additional_content.*' => 'nullable|string',
            'courses_highlights_id' => 'nullable|array',
            'courses_highlights_id.*' => 'nullable|integer|exists:courses_highlights,id',
            'courses_highlights_content' => 'nullable|array',
            'courses_highlights_content.*' => 'nullable|string',
            'courses_highlights_icon' => 'nullable|array',
            'courses_highlights_icon.*' => 'nullable|string|max:255',
            'remove_main_image' => 'nullable|boolean',
            'remove_page_image' => 'nullable|boolean',
        ]);
        $destinationPath = public_path('upload/courses');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        DB::beginTransaction();        
        try {
            $course = Courses::findOrFail($id);
            $titleSlug = Str::slug($validatedData['title']);
            if ($request->hasFile('main_image')) {
                if ($course->main_image && file_exists($destinationPath . '/' . $course->main_image)) {
                    unlink($destinationPath . '/' . $course->main_image);
                }                
                $mainImage = $request->file('main_image');
                $mainImageName = $titleSlug . '-' . uniqid() . '.webp';
                $mainImagePath = $destinationPath . '/' . $mainImageName;
                $this->processAndSaveImage($mainImage, $mainImagePath);
                $course->main_image = $mainImageName;
            }
            if ($request->hasFile('page_image')) {
                if ($course->page_image && file_exists($destinationPath . '/' . $course->page_image)) {
                    unlink($destinationPath . '/' . $course->page_image);
                }
                
                $pageImage = $request->file('page_image');
                $pageImageName = $titleSlug . '-page-' . uniqid() . '.webp';
                $pageImagePath = $destinationPath . '/' . $pageImageName;
                $this->processAndSaveImage($pageImage, $pageImagePath);
                $course->page_image = $pageImageName;
            }
            $course->update([
                'title' => $validatedData['title'],
                'short_content' => $validatedData['short_content'] ?? null,
                'description' => $validatedData['description'] ?? null,
                'meta_title' => $validatedData['meta_title'] ?? null,
                'meta_description' => $validatedData['meta_description'] ?? null,
            ]);
            CoursesAdditional::where('courses_id', $id)->delete();           
            if (!empty($request->courses_additional_title)) {
                foreach ($request->courses_additional_title as $index => $title) {
                    if (!empty($title)) {
                        $content = $request->courses_additional_content[$index] ?? null;
                        CoursesAdditional::create([
                            'courses_id' => $course->id,
                            'title' => $title,
                            'description' => $content,
                            'short_order' => $index,
                        ]);
                    }
                }
            }
            CoursesHighlights::where('courses_id', $id)->delete();
            if (!empty($request->courses_highlights_content)) {
                foreach ($request->courses_highlights_content as $index => $content) {
                    if (!empty($content)) {
                        $iconClass = $request->courses_highlights_icon[$index] ?? null;
                        CoursesHighlights::create([
                            'courses_id' => $course->id,
                            'content' => $content,
                            'icon' => $iconClass,
                            'short_order' => $index,
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('manage-courses.index')->with('success', 'Course updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();            
            return back()->withInput()->with('error', 'Error updating course: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();        
        try {
            $course = Courses::with(['additionalContents', 'highlightsContents'])->findOrFail($id);
            $destinationPath = public_path('upload/courses');
            if ($course->main_image && file_exists($destinationPath . '/' . $course->main_image)) {
                unlink($destinationPath . '/' . $course->main_image);
            }
            if ($course->page_image && file_exists($destinationPath . '/' . $course->page_image)) {
                unlink($destinationPath . '/' . $course->page_image);
            }
            foreach ($course->additionalContents as $additional) {
                if ($additional->image && file_exists($destinationPath . '/' . $additional->image)) {
                    unlink($destinationPath . '/' . $additional->image);
                }
                $additional->delete();
            }
            foreach ($course->highlightsContents as $highlight) {
                $highlight->delete();
            }
            $course->delete();            
            DB::commit();            
            return redirect()->route('manage-courses.index')->with('success', 'Course deleted successfully.');                
        } catch (\Exception $e) {
            DB::rollBack();            
            return redirect()->route('manage-courses.index')->with('error', 'Error deleting course: ' . $e->getMessage());
        }
    }

    private function processAndSaveImage($image, $path, $width = 800, $height = null)
    {
        $img = Image::make($image->getRealPath());
        if ($width || $height) {
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        $img->encode('webp', 80)->save($path);
    }
}
