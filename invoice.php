<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/* include autoloader */
require_once 'vendor/dompdf/autoload.inc.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

/* reference the Dompdf namespace */

use Dompdf\Dompdf;

$result='';

if( isset($_POST['invoice_no']) )
{

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();


$html = '<head>
	<title>Invoice</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100" style="width: 675px;">
		<h1>Invoice :</h1>
		<table class="table table-bordered">
			<tr>
				<th colspan="4"><center>Invoice Information </center></th>
			</tr>
			<tr>
				<th>INVOICE NO</th>
				<td>'.$_POST['invoice_no'].'</td>
				<th>Company Name:</th>
				<td>'.$_POST['company_name'].'</td>
			</tr>
			<tr>
				<th>Bank Full Address:</th>
				<td colspan="3">'.$_POST['bank_full_address'].' </td>
			</tr>
			<tr>
				<th>House / Holding Number:</th>
				<td>'.$_POST['holdingNumber'].'</td>
				<th>Street No:</th>
				<td>'.$_POST['streetNo'].'</td>
			</tr>
			<tr>
				<th>State:</th>
				<td>'.$_POST['state'].'</td>
				<th>City:</th>
				<td>'.$_POST['city'].'</td>
			</tr>
			<tr>
				<th>Country:</th>
				<td>'.$_POST['country'].'</td>
				<th>Phone No:</th>
				<td>'.$_POST['phoneNo'].'</td>
			</tr>
			<tr>
				<th>Account / Beneficiary Name:</th>
				<td>'.$_POST['bank_AC_B_name'].'</td>
				<th>Beneficiary Full Address:</th>
				<td>'.$_POST['bank_address'].'</td>
			</tr>
			<tr>
				<th>House / Holding Number:</th>
				<td>'.$_POST['BholdingNumber'].'</td>
				<th>Street No:</th>
				<td>'.$_POST['bStreerNo'].'</td>
			</tr>
			<tr>
				<th>State:</th>
				<td>'.$_POST['bState'].'</td>
				<th>City:</th>
				<td>'.$_POST['bCity'].'</td>
			</tr>
			<tr>
				<th>Country:</th>
				<td>'.$_POST['bCountry'].'</td>
				<th>Phone No:</th>
				<td>'.$_POST['bPhoneNo'].'</td>
			</tr>
			<tr>
				<th>SWIFT Code:</th>
				<td>'.$_POST['swiftCode'].'</td>
				<th>Account Number:</th>
				<td>'.$_POST['accNO'].'</td>
			</tr>
			<tr>
				<th>IBAN:</th>
				<td>'.$_POST['iban'].'</td>
			</tr>
		</table>
		</div>
	</div>

</body>';


$dompdf->loadHtml($html);


$dompdf->render();



$file_name ="invoice_".$_POST['invoice_no'].".pdf";
$file = $dompdf->output();
file_put_contents($file_name, $file);


$mail = new PHPMailer(true);

$mail->isSMTP();


$mail->SMTPDebug = 0;

$mail->Host = 'mail.example.com '; // change hosting mail server name  *** must ***

$mail->Port = 587;  // mail server port *** must ***

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "info@example.com";  // change email  *** must ***

$mail->Password = "password";   // give password *** must ***


$mail->setFrom('info@example.com', 'name');   // Add sender email *** must ***
$mail->addAddress("oyon.ctg@gmail.com", "Oyon");    // Add a recipient


$mail->AddAttachment($file_name);

// Content
$mail->isHTML(true);
$mail->Subject = 'Invoice Details';
$mail->Body    = 'Please Find Invoice details in attach PDF File.';



if(!$mail->send())
{
   unlink($file_name);
   $result='<span class="contact100-form-title">
                <div class="alert alert-danger">
                        <strong>Sorry!</strong>Failed to sent email.
                </div>
            </span>';
}
else
{
    unlink($file_name);
    $result='<span class="contact100-form-title">
                <div class="alert alert-success">
                        <strong>Success!</strong>Email sent successfully.
                </div>
            </span>';
}

}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Host Cloud Template - About Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-host-cloud.css">
    <link rel="stylesheet" href="assets/css/owl.css">
		<!--===============================================================================================-->
			<link rel="icon" type="vendor/image/png" href="images/icons/favicon.ico"/>
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="vendor/css/util.css">
			<link rel="stylesheet" type="text/css" href="vendor/css/main.css">

		<!--===============================================================================================-->
		<style>
		.alert-success{
		  padding: 20px;
		  background-color: #008000;
		  color: white;
		}
		.alert-danger{
		  padding: 20px;
		  background-color: #f44336 ;
		  color: white;
		}
		</style>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php include 'layouts/header.php'; ?>

    <!-- Page Content -->
    <!-- Heading Starts Here -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Invoice</h1>
            <p><a href="index.html">Home</a> / <span>Invoice</span></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Heading Ends Here -->


		<!-- Contact Us Starts Here -->
		<div class="container-contact100">
				<div class="wrap-contact100">
					<form class="contact100-form validate-form" action="index.php"  method="POST">

					<!--Php message code -->
				        <?php
				        if($result!=''){
				             echo $result;
				        }
				        else{

				            null;
				        }

				        ?>

						<div class="wrap-input100 bg1 rs1-wrap-input100" id="invoice_no">
							<span class="label-input100">Invoice No</span>
							<input id="invoic_no" required class="input100" type="text" name="invoice_no" placeholder="Enter Invoice No">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100" id="invoice_date">
							<span class="label-input100">Company Name:</span>
							<input id="invoic_date" required class="input100" type="text" name="company_name" placeholder="Enter company name">
						</div>
						<div class="wrap-input100 validate-input bg1" data-validate="Enter bank full address">
							<span class="label-input100">Bank Full Address:</span>
							<textarea id="invoic_date" required class="input100" type="text" name="bank_full_address" placeholder="Enter bank full address"></textarea>
							</div>

						<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter house/holding Number">
							<span class="label-input100">House/Holding Number:</span>
							<input class="input100" required type="text" name="holdingNumber" placeholder="Enter house/holding Number">
						</div>

						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Street No:</span>
							<input class="input100" required type="text" name="streetNo" placeholder="Enter street No">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">State:</span>
							<input class="input100" required type="text" name="state" placeholder="Enter state">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">City:</span>
							<input class="input100" required type="text" name="city" placeholder="Enter city name">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Country:</span>
							<input class="input100" required type="text" name="country" placeholder="Enter country name">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Phone No:</span>
							<input class="input100" required type="number" name="phoneNo" placeholder="Enter your Bank A/C NO">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Account / Beneficiary Name:</span>
							<input class="input100" required type="text" name="bank_AC_B_name" placeholder="Enter your Bank A/C Name">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary Full Address:</span>
							<input class="input100" required type="text" name="bank_address" placeholder="Enter your Bank Address">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary House / Holding Number:</span>
							<input class="input100" required type="text" name="BholdingNumber" placeholder="Enter house / holding Number:">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary Street No:</span>
							<input class="input100" required type="text" name="bStreerNo" placeholder="Enter beneficiary street No">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary State:</span>
							<input class="input100" required type="text" name="bState" placeholder="Enter beneficiary state">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary City:</span>
							<input class="input100" required type="text" name="bCity" placeholder="Enter beneficiary city">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary Country:</span>
							<input class="input100" required type="text" name="bCountry" placeholder="Enter beneficiary country">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Beneficiary Phone No:</span>
							<input class="input100" required type="text" name="bPhoneNo" placeholder="Enter beneficiary phone no">
						</div>

						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">SWIFT Code:</span>
							<input class="input100" required type="text" name="swiftCode" placeholder="Enter SWIFT code">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">Account Number:</span>
							<input class="input100" required type="text" name="accNO" placeholder="Account number">
						</div>
						<div class="wrap-input100 bg1 rs1-wrap-input100">
							<span class="label-input100">IBAN:</span>
							<input class="input100" required type="text" name="iban" placeholder="Enter IBAN">
						</div>

						<div class="container-contact100-form-btn">
							<button class="contact100-form-btn">
								<span>
									Submit
									<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
								</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		    <!-- Contact Us Ends Here -->


    <!-- Footer Starts Here -->
    <?php include 'layouts/footer.php'; ?>
    <!-- Footer Ends Here -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>
