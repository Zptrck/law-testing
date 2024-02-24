<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="indescs.css">

   
</head>
<style>
    body{
        background-color:#fff;
    }

    header{
        position: sticky;
        width: auto;
        margin-top:0%;
        top:0;
    }

    table {
        width: 90%;
            margin-bottom: 20px;
            text-align: center;
            border:solid black 1px;
        }
        
        td{
            background-color:#fff;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
            border:solid black 1px;
        }


        th{
            background-color:#fff;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
            border:solid black 1px;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            
        }

        table thead th {
            background-color: #000;
            text-align: center;
            
        }

        table tbody td:first-child {
            text-align: center;
            
        }

        table tbody td:last-child {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

            input[type="text"] {
            padding: 5px;
            width: 100px;

        }

        input[type="submit"] {
            font-size:15px;
            border: 1px solid #000;
            padding: 5px 5px;
            background-color: #000;
            color: #fff;
            cursor: pointer;
            position: absolute;
            margin-left: 10px;
        }

        input[value="Back"] {
            border: 1px solid #000;
            padding: 5px 10px;
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }
        
        
        input[type="submit"]:hover {
            background-color: #F1F6F9;
            color: #000;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover:not(#special-submit):not(#another-special-submit) {
            border: 1px solid #000;
        }

        .button {
            display: inline-block;
            border: 1px solid #000;
            padding: 5px 10px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #F1F6F9;
            color: #000;
            transition: background-color 0.3s ease;
        }

        #black{
            background-color:#000;
            border-bottom:solid white 1px;
        }
        #cc{
            background-color:#fff;
            color:#000;
            border-top:1px white solid ;
            
        }
        #head{
            border-bottom:1px white solid ;
        }

</style>
<body>
<header>
<!-- <img src="ge.jpg"class="logo"> -->
<h1>Blotter System</h1>
	<nav>
		<ul>
            <li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="add.php">Add Record</a></li>
            <li><a href="index.php">Records</a></li>
			<li><a href="pending.php">Pending Cases</a></li>
            <li><a href="closed.php">Closed Cases</a></li>
		</ul>
	</nav>
    <h2>Dashboard</h2>
    </header>
    <form method="POST" action="dashboard.php">
        <table border="1px">
            <thead>
                <th id="head">Pending Cases</td>
                <th id="head">Close Cases</th>
            </thead>
            <tbody>
                <?php
                    include 'conn.php';

                    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT COUNT(*) AS pending_cases FROM blotter WHERE remarks = 'Pending'";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection_error);
                    }

                    // Fetch the result
                    $row = $result->fetch(PDO::FETCH_ASSOC);

                    // Get the count of pending cases
                    $pendingCasesCount = $row['pending_cases'];

                    $sql = "SELECT COUNT(*) AS closed_cases FROM blotter WHERE remarks = 'Closed'";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection_error);
                    }

                    // Fetch the result
                    $row = $result->fetch(PDO::FETCH_ASSOC);

                    // Get the count of closed cases
                    $closedCasesCount = $row['closed_cases'];

                    echo "<tr>
                            <th id='black'>$pendingCasesCount</th>
                            <th id='black'>$closedCasesCount</th>
                        </tr>
                    <thead>
                        <th id='ccc' colspan='2'>Month</th>
                    </thead>
                    <tr>
                        <td>Year: <input type='text' name='year' id='year' placeholder='2023' pattern='[0-9]{4}' maxlength='4' required><input type='submit' value='Search'></td>
                        <th id='cc'><a href='index.php' class='button'>Back</a></th>
                    </tr>";
                    

                    if (isset($_POST['year'])) {
                        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                        $year = $_POST['year'];

                        // Define an array with the names of the months
                        $months = array(
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'
                        );

                        foreach ($months as $month) {
                            $monthNumber = str_pad(array_search($month, $months) + 1, 2, '0', STR_PAD_LEFT);

                            // Prepare and execute the SQL query
                            $sql = "SELECT COUNT(*) as case_count FROM blotter WHERE MONTH(date) = :month AND YEAR(date) = :year";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':month', $monthNumber);
                            $stmt->bindParam(':year', $year);
                            $stmt->execute();

                            // Fetch the result
                            $result = $stmt->fetch();
                            $caseCount = $result['case_count'];

                            // Output the result
                            echo "
                                <tr>
                                    <td>$month:</td>
                                    <th id='cc'>$caseCount</th>
                                </tr>";
                                
                        }
                        
                    }
                ?>
            </tbody>
        </table>
    </form>
</body
