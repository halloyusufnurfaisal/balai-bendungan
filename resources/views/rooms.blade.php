<!DOCTYPE html>
<html>

<head>
    <title>Pinjam Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i> Pinjam Ruang</h3>
            <div class="card-body">
                <button type="button" class="btn btn-success float-end" style="margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#roomModal"><i class="fa fa-plus"></i>
                    Create
                </button>
                <table class="table table-bordered mt-3">
                    <tr>
                        <th colspan="4">
                            List

                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Nama Ruang</th>
                        <th>Status Booking</th>
                        <th>Action</th>
                    </tr>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->is_booking }}</td>
                        <td>
                            <button type="button" class="btn btn-warning modal-bookings" data-bs-toggle="modal" data-room-id="<?php echo $room->name; ?>" data-bs-target="#bookingModal"><i class="fa fa-plus"></i>
                                Booking
                            </button>
                            <button type="button" class="btn btn-warning delete-bookings" data-room-id="<?php echo $room->id; ?>"><i class="fa fa-trash"></i>
                                Delete
                            </button>
                            <button type="button" class="btn btn-warning update-bookings" data-bs-toggle="modal" data-room-id="<?php echo $room->id; ?>" data-room-name="<?php echo $room->name; ?>" data-room-is_booking="<?php echo $room->is_booking; ?>" data-bs-target="#updateModal" data-room-id="<?php echo $room->name; ?>"><i class="fa fa-pencils"></i>
                                Update
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    <!-- Add -->
    <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" action="{{ route('rooms.store') }}">
                        @csrf

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ruang</label>
                            <input type="text" id="nama" name="name" class="form-control" placeholder="Nama Ruang">
                        </div>

                        <div class="mb-3">
                            <label for="isBookingID" class="form-label">Is Booking:</label>
                            <input type="text" id="isBookingID" name="is_booking" class="form-control" placeholder="Y">
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-success btn-submit"><i class="fa fa-save"></i> Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form-edit" action="{{ route('rooms.update') }}">
                        @csrf

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input type="hidden" id="roomsUpdateID" name="id" class="form-control">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ruang</label>

                            <input type="text" id="roomsUpdateName" name="name" class="form-control" placeholder="Nama Ruang">
                        </div>

                        <div class="mb-3">
                            <label for="isBookingID" class="form-label">Is Booking:</label>
                            <input type="text" id="roomsUpdateIsBooking" name="is_booking" class="form-control" placeholder="Y">
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-success btn-submit updateDatas"><i class="fa fa-save"></i> Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" action="{{ route('rooms.store') }}">
                        @csrf

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="mb-3">
                            <label for="userIDS" class="form-label">User</label>
                            <input type="text" id="userIDS" name="user_id" class="form-control" placeholder="1">
                        </div>

                        <div class="mb-3">
                            <label for="roomsID" class="form-label">Ruangan</label>
                            <input type="text" id="roomsID" name="room_id" class="form-control" placeholder="1">
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-success btn-submit"><i class="fa fa-save"></i> Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

<script type="text/javascript">
    $(document).on("click", ".modal-bookings", function() {
        var roomsIDS = $(this).data('room-id');
        $(".modal-body #userIDS").val(1 + Math.floor(Math.random() * 123434));
        $(".modal-body #roomsID").val(roomsIDS);
    });
    $(document).on("click", ".update-bookings", function() {
        var roomsIDS = $(this).data('room-id');
        var roomsNames = $(this).data('room-name');
        var roomsIsBooking = $(this).data('room-is_booking');
        $(".modal-body #roomsUpdateID").val(roomsIDS);
        $(".modal-body #roomsUpdateName").val(roomsNames);
        $(".modal-body #roomsUpdateIsBooking").val(roomsIsBooking);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // create Data
    $('#ajax-form').submit(function(e) {
        e.preventDefault();

        var url = $(this).attr("action");
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                console.log('succ response:', response);
                alert('Form submitted successfully');
                location.reload();
            },
            error: function(response) {
                console.log('err response:', response);
                $('#ajax-form').find(".print-error-msg").find("ul").html('');
                $('#ajax-form').find(".print-error-msg").css('display', 'block');
                $.each(response.responseJSON.errors, function(key, value) {
                    $('#ajax-form').find(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    });

    // Update Data
    $('#ajax-form-edit').submit(function(e) {
        e.preventDefault();

        var url = $(this).attr("action");
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                console.log('succ response:', response);
                alert('Form submitted successfully');
                location.reload();
            },
            error: function(response) {
                console.log('err response:', response);
                $('#ajax-form').find(".print-error-msg").find("ul").html('');
                $('#ajax-form').find(".print-error-msg").css('display', 'block');
                $.each(response.responseJSON.errors, function(key, value) {
                    $('#ajax-form').find(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    });
    // Delete Data
    $('button.delete-bookings').on("click", function(e) {
        e.preventDefault();
        var roomsIDS = $(this).data('room-id');
        let formDatas = new FormData();
        formDatas.append('id', roomsIDS);
        $.ajax({
            type: 'POST',
            url: "deleterooms",
            data: formDatas,
            contentType: false,
            processData: false,
            success: (response) => {
                location.reload();
            },
            error: function(response) {
                alert(response);
            }
        });
    });
</script>

</html>