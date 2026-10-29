import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(document).ready(function () {
$(document).on('change', '#course_id', function () {
const id = this.value;
const $availability = $('#availability');

    if (!$availability.length) {
        return;
    }

    if (!id) {
        $availability
            .removeClass('alert-success alert-danger')
            .addClass('alert-secondary')
            .text('Pilih kursus untuk melihat sisa kursi.');

        return;
    }

    $availability
        .removeClass('alert-success alert-danger')
        .addClass('alert-secondary')
        .text('Memuat ketersediaan...');

    $.ajax({
        url: `/courses/${encodeURIComponent(id)}/availability`,
        method: 'GET',
        dataType: 'json',

        success: function (data) {
            $availability
                .removeClass('alert-secondary alert-danger')
                .addClass('alert-success')
                .text(
                    `${data.remaining} kursi tersisa untuk ${data.course}.`
                );
        },

        error: function (xhr) {
            console.error(
                'Gagal memuat ketersediaan:',
                xhr.status,
                xhr.responseText
            );

            $availability
                .removeClass('alert-secondary alert-success')
                .addClass('alert-danger')
                .text('Gagal memuat ketersediaan kursus.');
        }
    });
});

});