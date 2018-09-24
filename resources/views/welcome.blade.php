<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Container Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 20px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .devBy {
                font-size: 18px;
                color: #999;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .bd {
                border: 1px solid #ddd;
                margin: 10px;
                padding: 10px;
                border-radius: 10px;
            }
            .v-title {
                color: #333;
                font-weight: bold;
            }
            .text-explain {
                float: left;
                margin-top: -10px;
                margin-left: 13px;
                color: #999;
            }
            .wall {
                background-color: black;
            }
            .water {
                background-color: blue;
                color: white;
            }
            .js-err-control, .php-err-control {
                display: none;
            }
            .clear {
                clear: both;
            }
        </style>
        <!-- Bootstrap 4.1 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Container Test
                    <div class="devBy">By Nikhom Suksamer</div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm bd">
                            <div class="v-title">Javascript Version</div><br>
                            <small class="form-text text-muted">Ex. 0, 1, 0, 2, 1, 0, 1, 3, 2, 0, 1, 0, 2</small>
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="jsdata" name="jsdata" class="form-control is-invalid" placeholder="Enter your data" required>
                                    <div class="input-group-append">
                                        <button id="jssend" class="btn btn-outline-secondary" onclick="getContainerSize();" disabled type="button">Send</button>
                                    </div>
                                </div>
                                <div class="js-err-control text-danger">
                                    Format incorrect: please enter number or comma or space only.
                                </div>
                            </div>
                            <hr>
                            <div id="jsDisplay" align="center">
                                <div class="v-title">Display</div>
                                <div id="jsDisplayTable"></div>
                            </div><hr>
                            <div id="jsResult">
                                <div class="v-title">Result</div>
                                <div id="jsResultTable"></div>
                            </div>
                        </div>
                        <div class="col-sm bd">
                            <div class="v-title">PHP Version</div><br>
                            <form action="{{ action('containerController@getContainerSize') }}" method="get">
                                <small class="form-text text-muted">Ex. 0, 1, 0, 2, 1, 0, 1, 3, 2, 0, 1, 0, 2</small>
                                <div class="input-group mb-3">
                                    <input type="text" id="phpdata" name="phpdata" class="form-control is-invalid" placeholder="Enter your data" required>
                                    <div class="input-group-append">
                                        <button id="phpsend" class="btn btn-outline-secondary" disabled type="submit">Send</button>
                                    </div>
                                </div>
                                <div class="php-err-control text-danger">
                                    Format incorrect: please enter number or comma or space only.
                                </div>
                            </form>
                            <hr>
                            <div id="phpDisplay" align="center">
                                <div class="v-title">Display</div>
                                <div id="phpDisplayTable">
                                    @if(!empty(request()->all()))
                                        <table border="1" cellpadding="0" cellspacing="0">
                                            @foreach ($wall as $index => $item)
                                                <tr>
                                                    @for ($i=0; $i<=$x-1; $i++)
                                                        @if (in_array($i, $item))
                                                            <td align="center" width="20" height="20" class="wall"></td>
                                                        @else
                                                            @if (!empty($water[$index]))
                                                                @if (!in_array($i, $water[$index]))
                                                                    <td align="center" width="20" height="20"></td>
                                                                @else
                                                                    <td align="center" width="20" height="20" class="water">w</td>
                                                                @endif
                                                            @else
                                                                <td align="center" width="20" height="20"></td>
                                                            @endif
                                                        @endif
                                                    @endfor
                                                </tr>
                                            @endforeach
                                        </table>
                                        <table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
                                            <tr>
                                                @for ($j = 0; $j <= $x-1; $j++ )
                                                    <td align="center" width="20" height="20">{{ $input[$j] }}</td>
                                                @endfor
                                            </tr>
                                        </table>
                                    @endif
                                </div>
                            </div><hr>
                            <div id="phpResult">
                                <div class="v-title">Result</div>
                                <div id="phpResultTable">
                                    @if(!empty(request()->all()))
                                        {{ $phpResultTable }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {
                // Control button, Error and Validate check
                $('#jsdata, #phpdata').on('keyup', function(e) {
                    if($(this).attr('name') == 'jsdata') {
                        $('#jssend').prop('disabled', true);
                        $('.js-err-control').hide();
                        if(checkDataFormat($(this).val())) {
                            $(this).removeClass('is-invalid');
                            $(this).addClass('is-valid');
                            $('#jssend').prop('disabled', false);
                            if(e.which == 13) {
                                $('#jssend').click();
                            }
                        } else {
                            $(this).removeClass('is-valid');
                            $(this).addClass('is-invalid');
                            $('.js-err-control').show();
                        }
                    } else {
                        $('#phpsend').prop('disabled', true);
                        $('.php-err-control').hide();
                        if(checkDataFormat($(this).val())) {
                            $(this).removeClass('is-invalid');
                            $(this).addClass('is-valid');
                            $('#phpsend').prop('disabled', false);
                            if(e.which == 13) {
                                $('form').submit();
                            }
                        } else {
                            $(this).removeClass('is-valid');
                            $(this).addClass('is-invalid');
                            $('.php-err-control').show();
                        }
                    }
                });
            });
            // Validate check
            function checkDataFormat(v) {
                return /^\d(, ?\d)*$/.test(v);
            }
            // Get Container Size
            function getContainerSize() {
                if($('#jsdata').val()) {
                    // Create array data from input form
                    var input = $('#jsdata').val().split(",").map(function(item) {
                        let n = Number(item.trim());
                        return n === 0 ? n : n || item.trim();
                    });
                    const y = Math.max(...input); // Get max of array for genarate table view
                    const x = input.length; // Get min of array for genarate table view

                    // Create Table View ( You can skip this code if you do not want to create a table view. )
                    let tbl = '<table id="tbl" border="1" cellpadding="0" cellspacing="0">';
                    for (let i = 0; i <= y-1; i++ ) {
                        tbl += '<tr>';
                        for (let j = 0; j <= x-1; j++ ) {
                            tbl += '<td align="center" width="20" height="20"></td>';
                        }
                        tbl += '</tr>';
                    }
                    tbl += '</table>';
                    tbl += '<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">';
                    tbl += '<tr>';
                    for (let j = 0; j <= x-1; j++ ) {
                        tbl += '<td align="center" width="20" height="20">'+input[j]+'</td>';
                    }
                    tbl += '</tr>';
                    tbl += '</table>';
                    $('#jsDisplayTable').html(tbl);
                    
                    // Create Wall (Black)
                    // --- Start Comment --- //
                    // After this code run finish, you will get array data to look like a table
                    // 0: [7]
                    // 1: [3, 7, 8, 12]
                    // 2: [1, 3, 4, 6, 7, 8, 10, 12]
                    // Now you have a wall data on this array
                    // --- End Comment --- //
                    let tr = y-1;
                    let row = new Array();
                    let wall = new Array();
                    for (let i = 0; i <= (y-1); i++ ) {
                        row = [];
                        input.forEach((item, index) => {
                            if(item > i) {
                                // --- Start Comment this if you do not want to create a table view. --- //
                                $('#tbl tr:eq('+tr+') td:eq('+index+')')
                                    .addClass('wall');
                                // --- End Comment this if you do not want to create a table view. --- //
                                row.push(index);
                            }
                        });
                        wall[tr] = row;
                        tr--;
                    }
                    
                    // Create water
                    // --- Comment --- //
                    // Check once row (index in array) for put water
                    // Example on index 1 ( data in array is [3, 7, 8, 12] )
                    // Loop start on first number of array +1 to end number of array -1 (3+1 and 12-1)
                    // and check number of loop match in wall data
                    // if matched is mean "this's the wall", if don't is mean "pull water" ( You can count total of water in this step )
                    // --- Comment --- //
                    let waterCount = 0;
                    wall.forEach((item, index) => {
                        if(item.length > 1) {
                            let min = Math.min(...item);
                            let max = Math.max(...item);
                            for (let i = min+1; i <= max-1; i++ ) {
                                if($.inArray(i, item) == -1) {
                                    $('#tbl tr:eq('+index+') td:eq('+i+')')
                                        .addClass('water')
                                        .html('w');
                                        waterCount++;
                                }
                            }
                        }
                    });
                    $('#jsResultTable').html(waterCount);
                } else {
                    $('#jsDisplayTable').html('');
                    $('#jsResultTable').html('');
                }
            }
        </script>
    </body>
</html>
