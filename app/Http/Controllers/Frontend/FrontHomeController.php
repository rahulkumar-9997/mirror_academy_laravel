<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Award;
use App\Models\Banner;
use App\Models\Courses;
use App\Models\Gallery;

class FrontHomeController extends Controller
{
    public function home() {
        $data['banners'] = Banner::select('banner_heading_name', 'banner_link', 'banner_desktop_img', 'banner_mobile_img')
            ->orderBy('id', 'asc')
            ->limit(4)
            ->get();
        $data['awards'] = Award::select('image', 'description')
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->limit(25)
            ->get();
        $data['courses'] = Courses::select('id', 'title', 'slug', 'short_content', 'description', 'main_image')
        ->where('status', 1)
        ->inRandomOrder()
        ->limit(6)
        ->get();
        //return response()->json($data['courses']);
        return view('frontend.index', compact('data'));
    }


    public function coursesList(){
        $data['courses'] = Courses::select('id', 'title', 'slug', 'short_content', 'description', 'main_image')
        ->where('status', 1)
        ->get();
        return view('frontend.pages.courses.course-list', compact('data'));
    }
    public function courseDetails($slug){
        $course = Courses::with(['additionalContents', 'highlightsContents'])->select('id', 'title', 'slug', 'short_content', 'description', 'main_image', 'page_image', 'meta_title', 'meta_description')
        ->where('status', 1)
        ->where('slug', $slug)
        ->firstOrFail();
        //return response()->json($course);
        return view('frontend.pages.courses.course-details', compact('course'));
    }
    
    public function termsOfUse(){
        return view('frontend.pages.others.terms-of-use');
    }
    public function privacyPolicy(){
        return view('frontend.pages.others.privacy-policy');
    }

    public function gallery(){
        $galleries = Gallery::select('id', 'title', 'image')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(12);
        //return response()->json($galleries);
        return view('frontend.pages.gallery.index', compact('galleries'));
    }

    public function aboutUs(){
        return view('frontend.pages.about-us.index');
    }

    public function foundersMessage(){
        return view('frontend.pages.founders.founder-message');
    }

    public function contactUs(){
        return view('frontend.pages.contact-us.enquiry');
    }

    public function EnquirySubmitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'required|string|max:10',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone_number'] ?? null,
            'message' => $validated['message'] ?? null,
        ];
        try {
            Mail::to('contact@mirrorsacademy.in')->send(new EnquiryMail($data));
        } catch (\Exception $e) {
            Log::error('Failed to send enquiry email: ' . $e->getMessage());
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Your enquiry form submitted successfully. Our team will contact you soon.',
        ]);
    }
   
}
