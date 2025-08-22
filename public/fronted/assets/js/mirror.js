$(document).ready(function () {
    var swiper = new Swiper(".bannerSlider", {
        spaceBetween: 0,
        effect: "slide",
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".bannerSlider-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.dexImg').remove()
    } else {
        $('.dexImg').show()
    }

    $(window).on('load', function () {
        var $container = $('.grid-services');
        $container.imagesLoaded(function () {
            $container.isotope({
                filter: '*'
            });
        });
    });
    $(document).off('submit', '#enquiryFormSubmit').on('submit', '#enquiryFormSubmit', function (event) {
        event.preventDefault();
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');
        var formData = new FormData(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                submitButton.prop('disabled', false).html('Submit');
                if (response.status === 'success') {
                    form[0].reset();
                    showNotificationAll(response.message, 'success');
                }
            },
            error: function (xhr) {
                submitButton.prop('disabled', false).html('Submit');
                var errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, function (key, value) {
                        var inputField = $('#' + key);
                        inputField.addClass('is-invalid');
                        inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    });
                } else {
                   showNotificationAll('Something went wrong. Please try again later.', 'error');
                }
            }
        });
    });

    $(document).on('click', 'a[data-popup-enquiry="true"]', function () {
        var title = $(this).data('title');
        var courseName = $(this).data('coursename');
        var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
        var url = $(this).data('url');
        var data = {
            size: size,
            url: url,
            courseName: courseName
        };
        $("#commanModel .modal-title").html(title);
        $("#commanModel .modal-dialog").addClass('modal-' + size);
        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                $('#commanModel .render-data').html(data.modalContent);
                $("#commanModel").modal('show');                
            },
            error: function (data) {
                data = data.responseJSON;
            }
        });
    });
    function showNotificationAll(message, type = 'success') {
        const toastEl = document.getElementById('liveToast');
        const toastBody = toastEl.querySelector('.toast-body');
        toastBody.textContent = message;
        toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
        switch (type) {
            case 'success':
                toastEl.classList.add('bg-success', 'text-white');
                break;
            case 'error':
                toastEl.classList.add('bg-danger', 'text-white');
                break;
            case 'warning':
                toastEl.classList.add('bg-warning', 'text-dark');
                break;
            case 'info':
                toastEl.classList.add('bg-info', 'text-white');
                break;
        }
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
    
});