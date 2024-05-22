<?php

function generateChatTable($chats)
{
    // Check if $chats is set and not empty
    if (isset($chats) && !empty($chats)) {
        // Start the table
        $table = "<table border='1' cellpadding='10' cellspacing='0'>";

        // Table header
        $table .= "<tr>";
        $table .= "<th>Name</th>";
        $table .= "<th>Chat</th>";
        $table .= "<th>Post Date</th>";
        $table .= "</tr>";

        // Iterate over each chat record
        foreach ($chats as $chat) {
            // Table row
            $table .= "<tr>";
            // Name
            $table .= "<td>" . htmlspecialchars($chat['Name']) . "</td>";
            // Chat
            $table .= "<td>" . htmlspecialchars($chat['Chat']) . "</td>";
            //Date
            $table .= "<td>" . htmlspecialchars($chat['ChatPostDate']) . "</td>";
            $table .= "</tr>";
        }

        // End the table
        $table .= "</table>";

        return $table;
    } else {
        // Return a message if no chats are found
        return "No chats found.";
    }
}

