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

            <form method="POST" action="/project/page/register.php">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>

                <p class="text-white-50 mb-5">

                  Please provide the following inputs!

                </p>



                <div class="form-outline form-white mb-4">

                  <input

                    type="text"

                    name="username"

                    class="form-control form-control-lg"

                  />

                  <label class="form-label" for="typeusernameX">Username</label>

                </div>

                <div class="form-outline form-white mb-4">

                  <input

                    type="text"

                    name="email"

                    class="form-control form-control-lg"

                  />

                  <label class="form-label" for="typeemailX">Email</label>

                </div>



                <div class="form-outline form-white mb-4">

                  <input

                    name="password"

                    type="password"

                    class="form-control form-control-lg"

                  />

                  <label class="form-label" for="typePasswordX">Password</label>

                </div>
                <div class="form-outline form-white mb-4">

                <input

                name="confirmPassword"

                type="password"

                class="form-control form-control-lg"

                />

                <label class="form-label" for="confirmPasswordX">Confirm Password</label>

                </div>



                <button class="btn btn-outline-light btn-lg px-5" type="submit">

                  Register

                </button>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['password'] === $_POST["confirmPassword"]){
                    echo "<h3>". "Provided passwords are not the same" ."</h3>";

                   /* if($_POST['password'] != $_POST["confirmPassword"]){
                            echo "<h3>". "Provided passwords are not the same" ."</h3>";
                    }*/
                    else{
                        include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
                        $query = "insert into auth values('".$POST["username"]."','".$POST["password"]."')";
                        mysqli_query($conn,$query);

                    }
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