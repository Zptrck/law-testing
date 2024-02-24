<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (!isset($_GET["case_no"])){
        header("location: index.php");
        exit;
    }

    $case_no = $_GET["case_no"];

    $sql = "SELECT * FROM blotter WHERE case_no=$case_no";
    $result=$connection->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("location: index.php");
        exit;
    }

    $case_no=$row["case_no"];
    $case_title=$row["case_title"];
    $complainant_name=$row["complainant_name"];
    $complainant_address=$row["complainant_address"];
    $respondent=$row["respondent"];
    $respondent_address=$row["respondent_address"];
    $nature=$nature=$row["nature"];
    $date=$row["date"];
    $time=$row["time"];
    $dates=$row["dates"];
    $remarks=$row["remarks"];

}
else{
    
    $case_no= $_POST["case_no"];
    $case_title=$_POST["case_title"];
    $complainant_name=$_POST["complainant_name"];
    $complainant_address=$_POST["complainant_address"];
    $respondent=$_POST["respondent"];
    $respondent_address=$_POST["respondent_address"];
    $nature=$_POST["nature"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $dates=$_POST["dates"];
    $remarks=$_POST["remarks"];

    do{
        if ( empty($case_no) || empty($case_title) || empty($complainant_name) || empty($respondent) || empty($nature) || empty($date) || empty($time) ||  empty($remarks)){
            $errorMessage = "All fields are required";
            break;
        }

        $sql="UPDATE blotter " . "SET case_no = '$case_no', case_title='$case_title',complainant_name='$complainant_name', complainant_address='$complainant_address',respondent='$respondent',respondent_address='$respondent_address',nature='$nature',date='$date',time='$time',dates='$dates',remarks='$remarks' " . "WHERE case_no = $case_no";
        
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid Query" . $connection->error;
            break;
        }

        $successMessage = "blotter Updated!";
        header("location: index.php");
        exit;

        
    }while(false);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="indescs.css">
</head>
<style>

    h2{
        top:100%;
        background-color: #444;
	    color: #fff;
	    padding: 10px;
    font-size: 20px;
    }

    #btnn{
        border:Black;
        background-color:black;
    }
    
    #move{
        margin-top:3%;
    }

    label[for=pending]{
        margin-right:5%;
    }

    input[type=radio]{
        margin-left:10%;
    }


</style>
<body>
    <div class="container my-5">
        <h2>Edit Record</h2>
        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissble fade show' role='alert'>
                 <strong>$errorMessage</strong>
                 <button type='button' class = 'btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Case Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="case_no" autocomplete="off" value="<?php echo $case_no; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Case Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="case_title"autocomplete="off" value="<?php echo $case_title; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Complainant Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="complainant_name"autocomplete="off" value="<?php echo $complainant_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Complainant Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="complainant_address"autocomplete="off" value="<?php echo $complainant_address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Respondent</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="respondent"autocomplete="off" value="<?php echo $respondent; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Respondent Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="respondent_address"autocomplete="off" value="<?php echo $respondent_address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nature</label>
                <div class="col-sm-6">
                    <input id='nature' type="text" class="form-control" name="nature" autocomplete="off"value="<?php echo $nature; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date"autocomplete="off" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Time</label>
                <div class="col-sm-6">
                    <input type="time" class="form-control" name="time" autocomplete="off" value="<?php echo $time; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Settlement</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dates"autocomplete="off" value="<?php echo $dates; ?>">
                </div>
            </div>
                <label class="col-sm-3 col-form-label">Remarks</label>
                <input type="radio" id="pending" name="remarks" value="Pending" checked="checked">
                <label for="pending">Pending</label>
                <input type="radio" id="closed" name="remarks" value="Closed" >
                <label for="closed">Closed</label>
            
            <?php
                 if (!empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                           <div class='alert alert-success alert-dismissble fade show' role='alert'>
                                  <strong>$successMessage</strong>
                                 <button type='button' class = 'btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                          </div>
                    </div>
                 </div>
                    ";
        }
        ?>
             
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>