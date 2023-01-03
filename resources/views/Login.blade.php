<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <section class="login">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-7 px-0 d-none d-sm-block">
            <img src="img/login.png"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>
        <div class="col-sm-5 text-black">

            <div class="d-flex align-items-center h-custom-2 px-3 ms-xl-3 mt-5 pt-5 pt-xl-1 mt-xl-n5">

            <form action="config/login.php" method="post" style="width: 23rem;">

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login</h3>

                <div class="form-outline mb-4 wit">
                <label class="form-label" for="form2Example18">Email</label>
                <input type="email" id="form2Example18" class="form-control" name="emailu"/>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form2Example28">Password</label>
                <input type="password" id="form2Example28" class="form-control" name="password"/>
                </div>

                <div class="form-outline mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" name="setsave" id="form2Example28" checked />
                    <label class="form-check-label" for="form2Example28"> Remember Me </label>
                </div>
                
                <div class="pt-1 mb-4">
                <button type="submit" class="btn bg-primary text-white mt-7">Login</button>
                </div>

                <p>Don't have an account? <a href="Rizky_Register.php" class="link-info">Register here</a></p>

            </form>

            </div>

        </div>
        
        </div>
    </div>
    </section>