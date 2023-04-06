<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <style>
        .input-field {
            max-width: -webkit-fill-available !important;
        }

        .border-green {
            border-top: 3px solid greenyellow;
            border-bottom: 3px solid greenyellow;
        }

        th {
            border: solid 1px gray;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container p-5 m-5">
        <div class="container mt-3 d-flex justify-content-between">
            <a href="{{ route('create') }}" class="btn btn-primary col-2" id="add">Add New</a>
            {{-- <button type="submit" class="btn btn-success pull-right col-2">Submit</button> --}}
        </div>
        <div class="card border-green d-flex justify-content-center">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>UID</th>
                        <th>GID</th>
                        <th>Min</th>
                        <th>Mac</th>
                        <th>Days</th>
                        <th>Weeks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->uid }}</td>
                            <td>{{ $assessment->gid }}</td>
                            <th>{{ $assessment->min }}</th>
                            <th>{{ $assessment->max }}</th>
                            <td>{{ $assessment->days }}</td>
                            <td>{{ $assessment->weeks }}</td>
                            <td>
                                <a href="{{ route('view', ['uid' => $assessment->uid]) }}" class="btn btn-primary">
                                    view <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>MID</th>
                        <th>GID</th>
                        <th>Min</th>
                        <th>Mac</th>
                        <th>Days</th>
                        <th>Weeks</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/table-datatable.js') }}"></script>
@include('sweetalert::alert')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script></script>

</html>
