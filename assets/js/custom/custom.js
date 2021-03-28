function loadTrainers() {
    $(document).ready(function () {
        $('#g_cid').on('change', function () {
            var courseId = $(this).val();

            $.ajax({
                method: "POST",
                url: "http://localhost/itn2/pages/admin_area/loaders/load_trainers.php",
                data: { id: courseId },
                dataType: "html",
                success: function (data) {
                    $("#g_tid").html(data);
                }
            });
        });
    });
}

loadTrainers();