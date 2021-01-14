jQuery(document).ready(function() {
        var table = $("#userstable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [{
                    data: "id"
                }

            ],
            sdefaultContent: "<button>Click!</button>",
        });
    });
