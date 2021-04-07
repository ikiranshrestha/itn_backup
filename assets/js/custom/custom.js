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

function loadAvailableClasses() {
    $(document).ready(function () {
        $('#g_cid').on('change', function () {
            var courseId = $(this).val();

            $.ajax({
                method: "POST",
                url: "http://localhost/itn2/pages/admin_area/loaders/load_available_classes.php",
                data: { id: courseId },
                dataType: "html",
                success: function (data) {
                    $("#sg_gid").html(data);
                }
            });
        });
    });
}

loadAvailableClasses();


function clickableTableRow() {
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
}

clickableTableRow();

function searchTable() {
        $("#search").keyup(function() {
            var value = this.value.toLowerCase().trim();

            $("table tr").each(function(index) {
                if (!index) return;
                $(this).find("td").each(function() {
                    var id = $(this).text().toLowerCase().trim();
                    var not_found = (id.indexOf(value) == -1);
                    $(this).closest('tr').toggle(!not_found);
                    return not_found;
                });
            });
        });
}

searchTable();