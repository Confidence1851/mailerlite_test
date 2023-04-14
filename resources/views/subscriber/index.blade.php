<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <title>Subscribers</title>
</head>

<body>
    <div class="container mt-5">
        @include('notifications.flash_messages', ['errors' => null])
        <div class="row">
            <div class="col-md-3">
                @if (empty($subscriber ?? null))
                    @include('subscriber.fragments.create')
                @else
                    @include('subscriber.fragments.update')
                @endif
            </div>
            <div class="col-md-9">
                @include('subscriber.fragments.table')
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const datatable = $('#example').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: '{{ route('api.subscribers.index') }}',
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'email',
                        render: function(data, type) {
                            if (type === 'display') {
                                let link = '/subscribers?edit=' + data;
                                return '<a href="' + link + '">' + data + '</a>';
                            }
                            return data;
                        },
                    },
                    {
                        data: 'country'
                    },
                    {
                        data: 'subscribe_date'
                    },
                    {
                        data: 'subscribe_time'
                    },
                    {
                        data: 'id',
                        render: function(data, type) {
                            return '<a href="#" class="delete_subscriber" data-id=' + data +
                                '>Delete</a>';
                        },
                    },
                ],
            });

            datatable.on('click', '.delete_subscriber', function(e) {
                const id = $(this).attr("data-id");
                const row = $(this).parent().parent();
                $.ajax({
                    type: 'DELETE',
                    url: '/subscribers/' + id,
                    success: function(data) {
                        row.remove();
                    }
                });
            });
        });
    </script>
</body>

</html>
