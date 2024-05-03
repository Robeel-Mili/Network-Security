<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Data Entry</h1>
        <form action="submit.php" method="post">
            <input type="text" name="id" id="id" placeholder="ID">
            <input type="text" name="id_str" id="id_str" placeholder="ID String">
            <input type="text" name="screen_name" id="screen_name" placeholder="Screen Name">
            <input type="text" name="location" id="location" placeholder="Location">
            <input type="text" name="description" id="description" placeholder="Description">
            <input type="text" name="url" id="url" placeholder="URL">
            <input type="text" name="followers_count" id="followers_count" placeholder="Followers Count">
            <input type="text" name="friends_count" id="friends_count" placeholder="Friends Count">
            <input type="text" name="listed_count" id="listed_count" placeholder="Listed Count">
            <input type="text" name="created_at" id="created_at" placeholder="Created At">
            <input type="text" name="favourites_count" id="favourites_count" placeholder="Favourites Count">
            <input type="text" name="verified" id="verified" placeholder="Verified">
            <input type="text" name="statuses_count" id="statuses_count" placeholder="Statuses Count">
            <input type="text" name="lang" id="lang" placeholder="Language">
            <input type="text" name="status" id="status" placeholder="Status">
            <input type="text" name="default_profile" id="default_profile" placeholder="Default Profile">
            <input type="text" name="default_profile_image" id="default_profile_image" placeholder="Default Profile Image">
            <input type="text" name="has_extended_profile" id="has_extended_profile" placeholder="Has Extended Profile">
            <input type="text" name="name" id="name" placeholder="Name">
            <button type="submit">Add</button>
            <button type="button" onclick="stimulateData()">Simulate</button>
        </form>
        <h2>Current Data</h2>
        <table id="dataTable">
            <tr>
               
                <?php
                // Open the CSV file
                $file = fopen("data.csv", "r");
                
                // Read the headers
                $headers = fgetcsv($file);
                
                // Output table headers
                foreach ($headers as $header) {
                    echo "<th>" . ucfirst($header) . "</th>";
                }
                ?>
            </tr>
            <?php
            //Output table rows with data
            while (($data = fgetcsv($file)) !== FALSE) {
                echo "<tr>";
                foreach ($data as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            
            // Close the CSV file
            fclose($file);
            ?> 
        </table>
    </div>
    <script src="script.js"></script>
</body>
<script>
function stimulateData() {
    fetch('http://localhost:5000/predict', {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        // Assume data returned is an array of results corresponding to the rows
        let tableRows = document.querySelectorAll('#dataTable tr:not(:first-child)'); 
        tableRows.forEach((row, index) => {
            let cell = row.insertCell(-1); 
            cell.innerHTML = data[index] || '0'; 
        });
    })
    .catch(error => console.error('Error:', error));
}
</script>
</html>
