<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Password Strenght Meter</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

</head>

<body>
<h1>Easy password strenght meter</h1>
<div class="page">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control"  placeholder="Password" value="">
                <div class="progress password-progress">
                    <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
                </div>

                <div class="text-danger" id="passwordmessage"></div>
            </div>
        </div>
    </div>

</div>
</body>

<script>
    (function($){
        $(document).ready(function(){

            $('#password').keyup(function(password) {
                checkpassword($('#password').val());
            });

            function checkpassword(password) {

                $('#feedback-password').hide();

                var result  = zxcvbn(password)
                var no   = result.score

                if (password.length < 6) {
                    $('#feedback-password').html("minimum number of characters is 6");
                    $('#feedback-password').show();
                }

                if (password.length > 12) {
                    $('#feedback-password').html("maximum number of characters is 12");
                    $('#feedback-password').show();
                }

                var message = '';
                var $bar = $('#strengthBar');

                switch (no) {
                    case 0:
                        message += 'The password is weak';
                        $bar.attr('class', 'progress-bar bg-danger')
                            .css('width', '1%');
                        break;
                    case 1:
                        message += 'The password is weak';
                        $bar.attr('class', 'progress-bar bg-danger')
                            .css('width', '25%');
                        break;
                    case 2:
                        message += 'The password is weak';
                        $bar.attr('class', 'progress-bar bg-danger')
                            .css('width', '50%');
                        break;
                    case 3:
                        message = '<span class="text-warning">The password is medium</span>'
                        $bar.attr('class', 'progress-bar bg-warning')
                            .css('width', '75%');
                        break;
                    case 4:
                        message = '<span class="text-success">Strong password 💪</span>'
                        $bar.attr('class', 'progress-bar bg-success')
                            .css('width', '100%');
                        break;
                }

                $('#passwordmessage').html(message);

            }

        });

    })(jQuery)
</script>
