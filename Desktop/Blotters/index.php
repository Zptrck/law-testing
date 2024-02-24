
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blotter System</title>
    <link rel="stylesheet" href="indescs.css">

   
</head>
<style>
    
    header{
        position: sticky;
        width: auto;
        margin-top:0%;
        top:0;
    }

    table{
         margin: 0 auto;
        width:90%;
    }

    thead{
    position: sticky;
    top: 34%;
    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    }

    th{
        background-color:black;
        text-align:center;
    }

    td{
        text-align:center;
    }

    tbody td:hover {
        transform: scale(1.5);
        background-color:#fff;
        transition: transform 0.3s ease;
    }

</style>
<body>
<header>

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
    <h2>Records</h2>
    
    <form method="GET">
            <div class="input-group mb-3">
                <input type="text" autocomplete="off" placeholder="Search" name="search_query" value="<?php echo isset($_GET['search_query']) ? $_GET['search_query'] : '' ?>">
                <button class="btn3" type="submit">Search</button>
                <a href="login.php" type="submit" class="btn3" value="Log Out" onclick="return confirm('Are you sure you want to logout?');">
                Log Out
                </a>

        </form>
</header>
<a>
        <table class="table">
            <thead>
                <th>Case Number</th>
                <th>Case Title</th>
                <th>Comaplainant Name</th>
                <th>Comaplainant Address</th>
                <th>Respondent</th>
                <th>Respondent Address</th>
                <th>Nature</th>
                <th>Date</th>
                <th>Time</th>
                <th>Dates of Settlement</th>
                <th>Remarks</th>
                <th>Action</th></a>
            </thead>
            <tbody>
            <?php
                include 'conn.php';

                    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                    if (!empty($search_query)) {
                        $sql="SELECT * FROM Blotter WHERE case_no LIKE '%$search_query%' OR case_title LIKE '%$search_query%' OR complainant_name LIKE '%$search_query%' OR respondent LIKE '%$search_query%' OR nature LIKE '%$search_query%' OR date LIKE '%$search_query%' OR time LIKE '%$search_query%' OR dates LIKE '%$search_query%' OR remarks LIKE '%$search_query%' ORDER BY case_no DESC";
                    } else {
                        $sql="SELECT * FROM Blotter ORDER BY case_no DESC";
                    }

                    $result=$connection->query($sql);

                    if(!$result){
                        die("Invalid query: ". $connection_error);
                    }

                    if ($result->num_rows == 0) {
                        echo "<tr><td colspan='10'>No records found.</td></tr>";
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                    <tr>
                        <td>$row[case_no]</td>
                        <td>$row[case_title]</td>
                        <td>$row[complainant_name]</td>
                        <td class='nature-column'>$row[complainant_address]</td>
                        <td>$row[respondent]</td>
                        <td class='nature-column'>$row[respondent_address]</td>
                        <td class='nature-column'>$row[nature]</td>
                        <td>$row[date]</td>
                        <td>$row[time]</td>
                        <td>$row[dates]</td>
                        <td>$row[remarks]</td>
                        <th><a id='edit' href='edit.php?case_no=$row[case_no]'>Edit</a></th>
                    </tr>";
                        }
                    }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>