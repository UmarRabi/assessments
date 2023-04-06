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
    <form action="{{ route('save') }}" method="post">
        @csrf
        <div class="container p-5 m-5">
            <div class="card border-green d-flex justify-content-center">
                <div class="card-header">Weekly Assessment Page</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    UID: <br />
                                    <input required type="text" name="uid" class="input-field" id="uid" />
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    GID: <br />
                                    <input type="text" name="gid" class="input-field" id="gid" />
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    Min: <br />
                                    <input required type="text" name="min" class="input-field" id="min" />
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    Max: <br />
                                    <input required type="text" name="max" class="input-field" id="max" />
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    Days: <br />
                                    <input required type="text" name="days" class="input-field" id="days" />
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    Weeks: <br />
                                    <input required type="text" name="weeks" class="input-field" id="weeks" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <table class="bordered">
                            <thead>
                                <tr>
                                    <th class="col-2"></th>
                                    <th class="col-2">Day 1</th>
                                    <th class="col-2">Day 2</th>
                                    <th class="col-2">Day 3</th>
                                    <th class="col-2">Day 4</th>
                                    <th class="col-2">Day 5</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                {{-- <tr>
                                    <th class="col-2">Week </th>
                                    <th class="col-2"><input type="checkbox" name="day1[]"></th>
                                    <th class="col-2"><input type="checkbox" name="day2[]"></th>
                                    <th class="col-2"><input type="checkbox" name="day3[]"></th>
                                    <th class="col-2"><input type="checkbox" name="day4[]"></th>
                                    <th class="col-2"><input type="checkbox" name="day5[]"></th>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="card-body"></div>
                <div class="container mt-3 d-flex justify-content-between">
                    <span></span>
                    <span>Total Amount: <input type="text" readonly name="total_amount" id="total_amount"></span>
                </div>
            </div>
            <div class="container mt-3 d-flex justify-content-between">
                <button type="button" class="btn btn-primary col-2" id="add">Add New
                    Week</button>
                <button type="submit" class="btn btn-success pull-right col-2">Submit</button>
            </div>
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        let loc = window.location.pathname
        if (loc != '/create') {
            uid = loc.replace("/", "")
            uidf(uid)
        }

        var weeks = 0
        var days = 0;
        var objdup = {
            uid: null,
            gid: null,
            min: 0,
            max: 0,
            days: 0,
            weeks: 0,
            weekly: [{
                day1: false,
                day2: false,
                day3: false,
                day4: false,
                day5: false,
            }, ],
        };
        var obj = {
            uid: null,
            gid: null,
            min: 0,
            max: 0,
            days: 0,
            weeks: 0,
            weekly: [{
                day1: false,
                day2: false,
                day3: false,
                day4: false,
                day5: false,
            }, ],
        };
        map(obj)
        $("#uid").on("change", async function() {
            let uid = $(this).val();
            uidf(uid)
        });

        $('#add').on('click', async function() {
            let weekStructure = {
                day1: false,
                day2: false,
                day3: false,
                day4: false,
                day5: false,
            };
            weeks += 1
            obj.weekly.push(weekStructure);
            map(obj)
            $('#weeks').val(obj.weekly.length);
        })

        // $(".checkers").on('click', function() {
        //     alert("hello checkers")
        //     let id = $(this).id
        //     alert(id)
        //     // obj[id[1]][id[0]] = $(this).checked

        // })
        async function uidf(uid) {
            let url = `${window.location.origin}/api/${uid}`
            let response = await fetch(url)
            response = await response.json()
            if (response.status == 200) {
                obj = response.data
                obj.uid = uid
                map(obj);
            } else {
                obj = objdup
                obj.uid = uid
                map(objdup)
            }
        }

        function map(obj) {
            $("#gid").val(obj.gid);
            $("#min").val(obj.min);
            $("#max").val(obj.max);
            $("#days").val(obj.days);
            $("#weeks").val(obj.weeks);
            // }

            days = obj.days
            weeks = obj.weeks
            $('#tbody').html('')
            $('#total_amount').val($('#min').val() * days)
            obj.weekly.forEach((e, i) => {
                let row = ` <tr>
                                <th class="col-2">Week ${i+1} </th>
                                <th class="col-2">
                                    <input type="checkbox" ${e.day1 ? 'checked'  : ''} class="checkers" id="day1_${i}"  >
                                    <input type="hidden" id="day1${i}" name=day1[] value="${e.day1 ?? ''}">
                                    </th>
                                <th class="col-2">
                                    <input type="checkbox" ${e.day2 ? 'checked' : ''} class="checkers" id="day2_${i}" >
                                     <input type="hidden" id="day2${i}" name=day2[] value="${e.day2 ?? ''}">
                                    </th>
                                <th class="col-2">
                                    <input type="checkbox" ${e.day3 ? 'checked' : ''} class="checkers" id="day3_${i}" >
                                     <input type="hidden" id="day3${i}" name=day3[] value="${e.day3 ?? ''}">
                                    </th>
                                <th class="col-2">
                                    <input type="checkbox" ${e.day4 ? 'checked' : ''} class="checkers" id="day4_${i}">
                                     <input type="hidden" id="day4${i}" name=day4[] value="${e.day4 ?? ''}">
                                    </th>
                                <th class="col-2">
                                    <input type="checkbox" ${e.day5 ? 'checked' :''} class="checkers" id="day5_${i}">
                                     <input type="hidden" id="day5${i}" name=day5[] value="${e.day5 ?? ''}">
                                    </th>
                            </tr>`

                $('#tbody').append(row)


            })
            $(".checkers").on('click', function() {
                let id = $(this).attr('id')
                id = id.split('_')
                obj.weekly[id[1]][id[0]] = this.checked
                if (this.checked) {
                    $('#' + id[0] + id[1]).val(1);
                    days += 1
                } else {
                    $('#' + id[0] + id[1]).val(0)
                    days -= 1
                }
                $('#days').val(days)
                obj.days = days
                $('#total_amount').val($('#min').val() * days)
            })
        }
        $('#min').on('change', function() {
            obj.min = this.value
            $('#total_amount').val($('#min').val() * days)
        })
        $('#max').on('change', function() {
            obj.max = this.value
            $('#total_amount').val($('#min').val() * days)
        })
        // function addWeek() {
        //     obj.weekly.push(weekStructure)
        //     map(obj)
        // }



    });
</script>

</html>
