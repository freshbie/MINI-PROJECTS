<html>
<head>
<meta charset="utf-8">
<title>Newsfeed</title>
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="script.js"></script>
  <style>
  .centered-navbar {
    position:absolute;
    left:25%;
    width:50%;
    text-align:center;
  }
  .example1 {
 height: 50px;
 overflow: hidden;
 position: relative;
}
.example1 h3 {
 font-size: 3em;
 color: orange;
 position: absolute;
 width: 100%;
 height: 100%;
 margin: 0;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 -moz-transform:translateX(100%);
 -webkit-transform:translateX(100%);
 transform:translateX(100%);
 /* Apply animation to this element */
 -moz-animation: example1 15s linear infinite;
 -webkit-animation: example1 15s linear infinite;
 animation: example1 15s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes example1 {
 0%   { -moz-transform: translateX(100%); }
 100% { -moz-transform: translateX(-100%); }
}
@-webkit-keyframes example1 {
 0%   { -webkit-transform: translateX(100%); }
 100% { -webkit-transform: translateX(-100%); }
}
@keyframes example1 {
 0%   {
 -moz-transform: translateX(100%); /* Firefox bug fix */
 -webkit-transform: translateX(100%); /* Firefox bug fix */
 transform: translateX(100%);
 }
 100% {
 -moz-transform: translateX(-100%); /* Firefox bug fix */
 -webkit-transform: translateX(-100%); /* Firefox bug fix */
 transform: translateX(-100%);
 }
}
  </style>
</head>
<body>
  <div class="example1">
<h3>TASK FOR MONTH </h3>
</div>
  <div id='cssmenu' >
  <ul>
     <li class='active'><a href='#'><i class="fa fa-home"></i>&nbsp;&nbsp;STUDENT CLUB</a></li>
     <div class="centered-navbar"><img src="images/club2.png" style="height:55px; width:250px;border-radius:20px;"></div>
     <li style="float:right"><a href='index.php'><i class="fa fa-power-off"></i>&nbsp;&nbsp;LOGOUT</a></li>
  </ul>
  </div>
  <form action="task.php" method="post">
  <div class="panel panel-primary" >
      <div class="panel-heading" style="text-align:center">TASK FOR THE MONTH</div>
      <div class="panel-body">
          <div class="row">
              <div class="col-sm-12">
                  <textarea rows="8" cols="93" style="resize:vertical;max-height: 500px;width: 100%" class="form-control" name="tu" readonly></textarea>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
