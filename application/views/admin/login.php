
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    // $title = array_key_exists('title', $header) ? $header['title'] : $ci->namaAplikasi();
    // $page = array_key_exists('page', $header) ? $header['page'] : 'master_admin';
    // $js = array_key_exists('js', $header) ? $header['js'] : array();
    $bu = base_url();
    ?>		
			
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link  href="<?= $bu; ?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link  href="<?= $bu; ?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link  href="<?= $bu; ?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link  href="<?= $bu; ?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link  href="<?= $bu; ?>assets/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <h1>Login Admin</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username"  required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" id="loginBtn">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>

          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
	<script src="<?= $bu; ?>assets/admin//vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= $bu; ?>assets/admin//vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= $bu; ?>assets/admin//vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= $bu; ?>assets/admin//vendors/nprogress/nprogress.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?= $bu; ?>assets/admin//build/js/custom.min.js"></script>
	<script src="<?= $bu; ?>assets/admin/vendors/datatables.net/js/jquery.dataTables.js"></script>
	<script src="<?= $bu; ?>assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  </body>
</html>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) { 

    $('#loginBtn').on('click', function() {

        var username = $('#username').val();
        var password = $('#password').val();
        var win = '<?= $bu ?>Admin'
        // console.log(username,password)
        // return false

        if (username.length < 1 || password.length < 1) {
            var message = 'Silahkan ketikkan username dan password Anda.';
            $('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        } else {
            $('#loginBtn').html('<i class="fas fa-spinner fa-spin"></i> Tunggu..');
            $('#loginBtn').prop('disabled', true);
            // alert("gagal-")
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?= $bu; ?>/LoginAdmin/login_proses',
                data: {
                    username: username,
                    password: password,
                },
            }).done(function(e) {
                // console.log(e);
                   
                if (e.status) {
                    $('#username').val('');
                    $('#password').val('');
                    $('#captcha').val('');
                    $('#alertNotif').html('<div class="alert alert-success alert-dismissible show" role="alert"><span>' + e.message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    Swal.fire(
						'Login Success!',
						e.message,
						'success'
					)

                    setTimeout(() => {
                        window.location = win ;
                    }, 1000);
                    
                } else {
                    $('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + e.message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            }).fail(function(e) {
                
                    Swal.fire(
						'Login Gagal!',
						e.message,
						'error'
					)
                var message = 'Terjadi Kesalahan.';
                $('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }).always(function() {
                toAlert();
                resetButton()
            });
        }
        // return false;;
        });
    });

</script>