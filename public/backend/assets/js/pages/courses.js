$(document).ready(function () {
    $('.add_more_additional').click(function () {
        let container = $('#additionalContentContainer');
        let count = container.children().length + 1;
        let newRow = `
        <tr class="paragraph-row">
            <td style="width: 50%">
                <span class="counter-badge">${count}</span>
                <label class="form-label">Courses Additional Title</label>
                <input type="text" name="courses_additional_title[]" class="form-control" placeholder="Enter Courses Additional Title" required>
            </td>                                    
            <td>
                <label class="form-label">Courses Additional Content</label>
                <textarea name="courses_additional_content[]" class="summernoteclass form-control" placeholder="Enter detailed content here"></textarea>
                <div class="remove-btn-container">
                    <button type="button" class="btn btn-danger btn-sm remove-paragraph"><i class="fas fa-trash me-1"></i>Remove</button>
                </div>
            </td>
        </tr>`;
        container.append(newRow);
        container.find('.summernoteclass').last().summernote({
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        updateCounters();
    });
    $('.add_more_highlights').click(function () {
        let container = $('#highlightsContainer');
        let newRow = container.find('.paragraph-row').first().clone();
        newRow.find('input[type="text"]').val('');
        newRow.find('select').prop('selectedIndex', 0);
        newRow.find('.remove-paragraph').show();
        newRow.find('.remove-paragraph').click(function () {
            $(this).closest('.paragraph-row').remove();
        });
        container.append(newRow);
    });
    $(document).on('click', '.remove-paragraph', function () {
        if ($(this).closest('tbody').children().length > 1) {
            $(this).closest('.paragraph-row').remove();
            updateCounters();
        }
    });
    function updateCounters() {
        $('#additionalContentContainer .paragraph-row').each(function (index) {
            $(this).find('.counter-badge').text(index + 1);
        });

        $('#highlightsContainer .paragraph-row').each(function (index) {
            $(this).find('.counter-badge').text(index + 1);
        });
    }

    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();

        Swal.fire({
            title: `Are you sure you want to delete this ${name}?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

});