<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Humble Aid</title>
  </head>
  <body>

  <nav class="navbar fixed-top" style="background-color: #507daf;">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white" >Humble Aid </a>
    <form class="d-flex">
      <p style="margin: 5px; padding: 5px; color:white;">John Doe</p>
      <button class="btn logoutbtn" type="submit">Log Out</button>
    </form>
  </div>
</nav>

  <section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3" style="padding-top: 100px;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <form>

                <div class="form-outline mb-4">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option selected>Select Organization</option>
                </select>
                  </div>

                  <div class="form-outline mb-4">
                    <input
                    type="text"
                    class="form-control"
                    placeholder="John Doe"
                    aria-label="Full Name"
                    aria-describedby="basic-addon1"
                  />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="typeText" class="form-control" placeholder="123456-01-1254"/>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+60</span>
                    </div>
                    <input type="text" id="typeText" class="form-control" placeholder="123345622" />
                  </div>

                  <div class="form-outline mb-4">
                    <textarea class="form-control" id="textAreaExample" rows="4" placeholder="Address"></textarea>
                  </div>

                  <div class="form-outline mb-4">
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">RM</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Amount" placeholder="1000.00">
                </div>
                  </div>

                  <div class="form-outline mb-4">
                  <div class="input-group mb-3">
                    <div class="form-outline">
                    <input class="form-control" type="file" id="formFileMultiple" multiple placeholder="Documents"/>
                    </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                  <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample" rows="4" placeholder="Description"></textarea>
                  <label class="form-label" for="textAreaExample"></label>
                  </div>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style="background-color: #507daf;">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>