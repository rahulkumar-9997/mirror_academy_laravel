<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\Gallery;

class FrontHomeController extends Controller
{
    public function home(){
        $data = [];
        //return response()->json($data['blog']);
        return view('frontend.index', compact('data'));
    }

    public function coursesList(){
        $data = [];
        return view('frontend.pages.courses.course-list', compact('data'));
    }

    public function courseDetails(){
        $data = [];
        return view('frontend.pages.courses.course-details', compact('data'));
    }

    public function termsOfUse(){
        return view('frontend.pages.others.terms-of-use');
    }
    public function privacyPolicy(){
        return view('frontend.pages.others.privacy-policy');
    }

    public function gallery(){
        $data = [];
        //return response()->json($data['blog']);
        return view('frontend.pages.gallery.index', compact('data'));
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

   
}
