<?php

function generate_table($files) {
    // Check if $files is set and not empty
    if (isset($files) && !empty($files)) {
        // Start the table with a surrounding div for centering
        $table = "<div style='display: flex; justify-content: center;'>";
        $table .= "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; width: 80%; margin: 20px 0; font-family: Arial, sans-serif;'>";

        // Table header
        $table .= "<tr style='background-color: #f2f2f2;'>";
        $table .= "<th style='padding: 10px; text-align: left;'>Name</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>FileName</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Post Date</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Edit</th>";
        $table .= "<th style='padding: 10px; text-align: left;'>Delete</th>";
        $table .= "</tr>";

        // Iterate over each file record
        foreach ($files as $file) {
            // Table row
            $table .= "<tr>";
            // Name
            $table .= "<td style='padding: 10px;'>" . htmlspecialchars($file['Name']) . "</td>";
            // FileName
            $table .= "<td style='padding: 10px;'>" . htmlspecialchars($file['FileName']) . "</td>";
            // Date
            $table .= "<td style='padding: 10px;'>" . htmlspecialchars($file['FileUpload_Date']) . "</td>";
            // Edit file
            $table .= "<td style='padding: 10px;'><a href='./edit_file_ui.php?id=" . htmlspecialchars($file['FileID']) . "' style='color: #007bff; text-decoration: none;'>Edit</a></td>";
            // Delete button
            $table .= "<td style='padding: 10px;'><a href='./delete_file.php?id=" . htmlspecialchars($file['FileID']) . "' style='color: #dc3545; text-decoration: none;' onclick=\"return confirm('Are you sure you want to delete this file?');\">Delete</a></td>";
            $table .= "</tr>";
        }

        // End the table
        $table .= "</table>";
        $table .= "</div>";

        return $table;
    } else {
        // Return a message if no files are found
        return "<p style='text-align: center;'>No Files found.</p>";
    }
}
