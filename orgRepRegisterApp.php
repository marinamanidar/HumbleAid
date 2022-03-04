<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Humble Aid</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"></a>
          <a class="dropdown-item" href="#"></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled"></a>
      </li>
    </ul>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log Out</button>
  </div>
</nav>

<div class="row">
  <div class="col-2">
    <!-- Tab navs -->
    <div
      class="nav flex-column nav-pills text-center"
      id="v-pills-tab"
      role="tablist"
      aria-orientation="vertical"
    >
      <a
        class="nav-link"
        id="v-pills-home-tab"
        data-mdb-toggle="pill"
        href="#v-pills-home"
        role="tab"
        aria-controls="v-pills-home"
        aria-selected="true"
        >Dashboard</a
      >
      <a
        class="nav-link active"
        id="v-pills-profile-tab"
        data-mdb-toggle="pill"
        href="#v-pills-profile"
        role="tab"
        aria-controls="v-pills-profile"
        aria-selected="false"
        >Add Applicants</a
      >
      <a
        class="nav-link"
        id="v-pills-messages-tab"
        data-mdb-toggle="pill"
        href="#v-pills-messages"
        role="tab"
        aria-controls="v-pills-messages"
        aria-selected="false"
        >Record Disbursement</a
      >

      <a
        class="nav-link"
        id="v-pills-messages-tab"
        data-mdb-toggle="pill"
        href="#v-pills-messages"
        role="tab"
        aria-controls="v-pills-messages"
        aria-selected="false"
        >Organize Appeal</a
      >

      <a
        class="nav-link"
        id="v-pills-messages-tab"
        data-mdb-toggle="pill"
        href="#v-pills-messages"
        role="tab"
        aria-controls="v-pills-messages"
        aria-selected="false"
        >Record Contribution</a
      >
    </div>
    <!-- Tab navs -->
  </div>

  <div class="col-9">
    <!-- Tab content -->
    <div class="tab-content" id="v-pills-tabContent">
      <div
        class="tab-pane fade show active"
        id="v-pills-home"
        role="tabpanel"
        aria-labelledby="v-pills-home-tab"
      >

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input
    type="text"
    class="form-control"
    placeholder="Username"
    aria-label="Username"
    aria-describedby="basic-addon1"
  />
</div>

<div class="form-outline">
  <input type="text" id="typeText" class="form-control" placeholder="IC Number" />
  <label class="form-label" for="typeText"></label>
</div>

<div class="form-outline">
  <textarea class="form-control" id="textAreaExample" rows="4" placeholder="Address"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">RM</span>
  </div>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Household Salary">
</div>

<label for="basic-url" class="form-label">Your vanity URL</label>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
  <input
    type="text"
    class="form-control"
    id="basic-url1"
    aria-describedby="basic-addon3"
  />
</div>

    <div class="input-group mb-3">
    <span class="input-group-text">$</span>
    <input
        type="text"
        class="form-control"
        aria-label="Amount (to the nearest dollar)"
    />
    <span class="input-group-text">.00</span>
    </div>

    <div class="input-group mb-3">
    <input
        type="text"
        class="form-control"
        placeholder="Username"
        aria-label="Username"
    />
    <span class="input-group-text">@</span>
    <input
        type="text"
        class="form-control"
        placeholder="Server"
        aria-label="Server"
    />
    </div>

    <div class="input-group">
    <span class="input-group-text">With textarea</span>
    <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>

      </div>
      <div
        class="tab-pane fade"
        id="v-pills-profile"
        role="tabpanel"
        aria-labelledby="v-pills-profile-tab"
      >
        Profile content
      </div>
      <div
        class="tab-pane fade"
        id="v-pills-messages"
        role="tabpanel"
        aria-labelledby="v-pills-messages-tab"
      >
        Messages content
      </div>
    </div>
    <!-- Tab content -->
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>