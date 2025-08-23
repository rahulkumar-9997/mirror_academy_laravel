<h2>New Enquiry</h2>
@if(!empty($enquiry['course_name']))
    <p><strong>Course:</strong> {{ $enquiry['course_name'] }}</p>
@endif
<p><strong>Name:</strong> {{ $enquiry['name'] }}</p>
<p><strong>Email:</strong> {{ $enquiry['email'] ?? 'N/A' }}</p>
<p><strong>Phone:</strong> {{ $enquiry['phone'] }}</p>
<p><strong>Message:</strong> {{ $enquiry['message'] ?? 'N/A' }}</p>
