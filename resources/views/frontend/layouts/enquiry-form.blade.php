<form class="mt-2 d-grid gap-4 gap-md-4 form-wraper" action="{{ route('enquiry.submit') }}" id="enquiryFormSubmit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="course_name" value="{{ $courseName ?? '' }}">
    <div class="single-box d-grid gap-1">
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Enter full name *" class="w-100 form-control">
        </div>
    </div>
    <div class="single-box d-grid gap-1">
        <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Enter your email address" class="w-100 form-control">
        </div>
    </div>
    <div class="single-box d-grid gap-1">
        <div class="form-group">
            <input type="tel" placeholder="Enter your phone number *" class="w-100 form-control"  name="phone_number" id="phone_number"  maxlength="10" pattern="[0-9]{10}">
        </div>
    </div>
    <div class="single-box d-grid gap-1">
        <div class="form-group">
            <textarea rows="3" name="message" placeholder="Enter your message here..." class="w-100 form-control"></textarea>
        </div>
    </div>
    <button class="btn box-style box-second second-alt alt-nineteen transition d-center py-2 py-md-3 px-4 px-md-6 w-100" type="submit">
        <span class="fs-eight fw-semibold">Send us a message</span>
    </button>
</form>