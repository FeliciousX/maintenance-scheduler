<?php

include '../controllers/DatabaseController.php';

$inc = '<link rel="stylesheet" href="../includes/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../includes/main.css">
          <script src="../includes/bootstrap/js/jquery.js"></script>
        ';


$css_narrow_page = '<style type="text/css">
          body {
            padding-top: 20px;
            padding-bottom: 40px;
          }

          /* Custom container */
          .container-narrow {
            margin: 0 auto;
            max-width: 700px;
          }
          .container-narrow > hr {
            margin: 30px 0;
          }

          /* Main marketing message and sign up button */
          .jumbotron {
            margin: 60px 0;
            text-align: center;
          }
          .jumbotron h1 {
            font-size: 72px;
            line-height: 1;
          }
          .jumbotron .btn {
            font-size: 21px;
            padding: 14px 24px;
          }

          /* Supporting marketing content */
          .marketing {
            margin: 60px 0;
          }
          .marketing p + h4 {
            margin-top: 28px;
          }</style>';

echo $inc;
?>

