<?php
function generateUserTable($users) {
    // Check if $users is set and not empty
    echo "<h2 style='text-align: center;'>Manage Users</h2>";
    if (isset($users) && !empty($users)) {
        // Start the table
        $table = "<div style='display: flex; justify-content: center;'>";
        $table .= "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px 0;'>";
        
        // Table header
        $table .= "<tr style='background-color: #f2f2f2;'>";
        $table .= "<th style='padding: 10px; text-align: left;'>User ID</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Name</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Email</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Edit</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Delete</th>";
        $table .= "</tr>";
        
        // Iterate over each user record
        foreach ($users as $user) {
            // Table row
            $table .= "<tr>";
            // User ID
            $table .= "<td style='padding: 10px;'>" . $user['UserID'] . "</td>";
            // Name
            $table .= "<td style='padding: 10px;'>" . $user['Name'] . "</td>";
            // Email
            $table .= "<td style='padding: 10px;'>" . $user['Email'] . "</td>";
            // Edit button
            $table .= "<td style='padding: 10px;'><a href='./edit_user.php?user_id=" . $user['UserID'] . "'>Edit</a></td>";
            // Delete button
            $table .= "<td style='padding: 10px;'><a href='./delete_user.php?user_id=" . htmlspecialchars($user['UserID']) . "' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a></td>";

            $table .= "</tr>";
        }
        
        // End the table
        $table .= "</table>";
        $table .= "</div>";
        
        return $table;
    } else {
        // Return a message if no users are found
        return "<p style='text-align: center;'>No users found.</p>";
    }
}


