
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <script src="js/script.js"></script>

  <style> 
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .page-bg {
    background: url('http://www.planwallpaper.com/static/images/general-night-golden-gate-bridge-hd-wallpapers-golden-gate-bridge-wallpaper.jpg');
    -webkit-filter: blur(10px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
    filter: blur(5px);
    position: fixed;*/
    width: 70%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: -1;
  }

  .post-content {
    text-align: center;
    color:  #673AB7;
    font-size: 60px;
    /*width: 900px;*/
    /*border:25px solid green;*/
    padding: 25px;
    margin: 25px;
    -webkit-text-stroke: 1px black;
    color: white;
    text-shadow:
    5px 5px 0 #violet,
  }
}
</style>
</head>


<body>
  <div class="container">
    <img src="res/store.png"  class = "page-bg"alt="Norway" style="width:100%;">
    <div class="row">
      <div  class="post-content">
        <p>Development of Warranty Tracking and Inventory Control System</p>
      </div>
    </div>
    <div class="col-sm-4">

    </div>

    <div class="col-sm-4" style="align-self: center;">
      <form class="form-signin" method="post" action="auth.php">

        <!-- <h2 class="form-signin-heading">Sign in</h2> -->
        <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus=""  />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <select class="form-control">
          <option>Admin</option>
          <option>Employee</option>
        </select>    
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> 
    <div class="col-sm-4">

    </div>
  </div>
</body>
