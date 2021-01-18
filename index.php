<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mira KPI</title>

    <link rel="shortcut icon" href="assets/imgs/miraicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/c755223df6.js"></script>

    <!-- bootstrapplus -->
    <script src="https://cdn.jsdelivr.net/npm/@bootstrapplus/bootstrapplus@1.0.0/dist/bootstrapplus.min.js"></script>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>

</head>

<body>
    <app><center>Loading...</center></app>
    <script src="paging.js"></script>
    <script src="main.js"></script>
    <script src="dashboard.js"></script>
    <script>
        bootstrapplus.swatch({
            primary: "#1a237e"
        });
    </script>
    <script>nav.start();</script>

    <template id="main" class="bg-light">

        <div class="container-fluid">
            <div class="my-lg-5 my-md-5 my-5 col-lg-5 col-md-12 col-12 mx-auto">
                <h1 class="">
                    <div class="float-left">
                        <img src="assets/imgs/miraicon.png" alt="Mira Technologies Logo">
                        &nbsp;
                    </div>
                    <div class="">
                        Mira Technologies <br>
                        <small class="">Key Performance Indicator</small>
                    </div>
                    <div class="clearfix"></div>
                </h1>
                <hr class="text-dark">

                <form>
                    <div class="align-items-center">
                        <div id="enter-email" class="col-auto">
                            <label class="" for="email" class="font-weight-bold">Office Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-briefcase"></i></div>
                                </div>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Enter office email (name@miratechnologiesng.com)">
                            </div>
                            <br>
                        </div>

                        <div id="enter-token" class="col-auto d-none">
                            <label class="" for="token" class="font-weight-bold">Token</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-asterisk"></i></div>
                                </div>
                                <input type="text" class="form-control" id="token"
                                    placeholder="Enter token sent to office email">
                            </div>
                            <br>
                        </div>

                        <div class="col-auto">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div> <br>
                        <div class="col-auto float-left">
                            <button type="button" id="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>

                        <div class="col-auto float-right">
                            <button type="button" id="help" class="btn btn-muted mb-2">Help <i class="font-weight-light fa fa-question"></i></button>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </form>

            </div>
        </div>

    </template>

    <template id="verify" class="bg-light">

        <div class="container-fluid">
            <div class="my-lg-5 my-md-5 my-5 col-lg-5 col-md-12 col-12 mx-auto">
                <h1 class="">
                    <div class="float-left">
                        <img src="assets/imgs/miraicon.png" alt="Mira Technologies Logo">
                        &nbsp;
                    </div>
                    <div class="">
                        Mira Technologies <br>
                        <small class="">Key Performance Indicator</small>
                    </div>
                    <div class="clearfix"></div>
                </h1>
                <hr class="text-dark">

                <form>
                    <div class="align-items-center">

                        <div id="enter-token" class="col-auto">
                            <label class="" for="token" class="font-weight-bold">Token</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-asterisk"></i></div>
                                </div>
                                <input type="text" class="form-control" id="token"
                                    placeholder="Enter token sent to office email">
                            </div>
                            <br>
                        </div>

                        <div class="col-auto float-left">
                            <button type='button' class='btn btn-primary' onclick="nav.back()">Back</button>
                        </div>

                        <div class="col-auto float-right">
                            <button type="button" id="submit" class="btn btn-primary mb-2">Continue</button>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </form>

            </div>
        </div>

    </template>

    <template id="user-dashboard">

    </template>

    <template id="admin-dashboard">
        
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand"><img src="assets/imgs/miraicon.png" width="50px" alt="Mira Technologies Logo">
                    &nbsp;Key Performance Indicator</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
              </nav>
        </div>
        
    </template>

</body>

</html>