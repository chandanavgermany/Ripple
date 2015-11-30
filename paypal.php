<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Donation form</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="paypal.css" rel="stylesheet" />
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="font-family:'Century Gothic';font-weight:bold;letter-spacing:2px;"><span class="glyphicon glyphicon-education"></span> Ripple</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-center" style="font-family:'Century Gothic';font-weight:bold;letter-spacing:1px;">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="people.php">Students' Panel</a></li>
                    <li><a href="don_people.php">Patrons' Panel</a></li>

                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div id="form">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h3>Donation Form</h3>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Id" required />
                    </div>
                     <div class="form-group">
                        <textarea rows="5" class="form-control" placeholder="Cause for donation "cols="10"></textarea>
                    </div>
                </div>
            </div>
            <span id="lippButton"></span>
            <script src="https://www.paypalobjects.com/js/external/api.js"></script>
            <script>
paypal.use( ["login"], function(login) {
 login.render ({
   "appid": "d3428641e41208c246d07b2e5f3cc7a5",
   "containerid": "lippButton",
   "locale": "en-us",
   "returnurl": "file:///C:/Users/Rashmi/Desktop/hackathon/ripple/site/index.html"
 });
});
            </script>

            
        </div>
    </div>
</body>
</html>
