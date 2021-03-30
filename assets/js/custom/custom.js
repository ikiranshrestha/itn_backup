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

function loadRooms() {
    $(document).ready(function () {
        $('#g_tmid').on('change', function () {
            var timeId = $(this).val();

            $.ajax({
                method: "POST",
                url: "http://localhost/itn2/pages/admin_area/loaders/load_rooms.php",
                data: { id: timeId },
                dataType: "html",
                success: function (data) {
                    $("#g_rid").html(data);
                }
            });
        });
    });
}

loadRooms();
