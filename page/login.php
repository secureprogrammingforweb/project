<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
include $_SERVER["DOCUMENT_ROOT"].'/project/module/security_header.php.php';

$password = true;



if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = $conn-> real_escape_string($_POST['username']);
	$password = $conn-> real_escape_string($_POST['password']);

    $query = 'select * from auth where username="'.$username.'" and password="'.$password.'";';

    if (mysqli_fetch_array($conn->query($query)) == NULL){

            $password = false;

            //echo ("Wrong username or password");

        }

    else {

        session_start();

        $_SESSION['name']=$username;

        $query = 'select role from rbac where username="'.$username.'";';

        // GET role of user

        $_SESSION['role'] = mysqli_fetch_array($conn->query($query))["role"];

        header("Location: http://localhost/project/page/dashboard.php");

   

        }

    }

?>




<link

  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"

  rel="stylesheet"

  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"

  crossorigin="anonymous"

/>

<section class="vh-100 gradient-custom">

  <div class="container py-5 h-100">

    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-12 col-md-8 col-lg-6 col-xl-5">

        <div class="card bg-dark text-white" style="border-radius: 1rem">

          <div class="card-body p-5 text-center">

            <form method="POST" action="/project/page/login.php">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>

                <p class="text-white-50 mb-5">

                  Please enter your Username and password!

                </p>



                <div class="form-outline form-white mb-4">

                  <input

                    type="text"

                    name="username"

                    class="form-control form-control-lg"

                  />

                  <label class="form-label" for="typeEmailX">Username</label>

                </div>



                <div class="form-outline form-white mb-4">
                <input name="CSRF" type="hidden" value="<?php echo $_SESSION["CSRF"]?>" />
                  <input

                    name="password"

                    type="password"

                    class="form-control form-control-lg"

                  />

                  <label class="form-label" for="typePasswordX">Password</label>

                </div>



                <button class="btn btn-outline-light btn-lg px-5" style="margin-bottom: 10px;" type="submit">

                  Login

                </button>
                <br>
                <a class="btn btn-outline-light btn-lg px-5" href="/project/page/register.php">Register</a>

                <?php

                if($password === false){

                     echo "<h3>". "Wrong username or password"."</h3>";

                }



                ?>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>