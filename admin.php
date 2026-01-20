<?php
session_start();
include 'db_connect.php';

// --- LOGIN LOGIC ---
$admin_user = "nm";
$admin_pass = "123";

if (isset($_POST['login'])) {
    if ($_POST['username'] === $admin_user && $_POST['password'] === $admin_pass) {
        $_SESSION['loggedin'] = true;
    } else {
        $error = "Incorrect credentials.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

// Redirect to login form if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMS Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen text-white">
    <div class="bg-black p-8 rounded border border-gray-700 w-80">
        <h2 class="text-xl font-bold mb-4 text-center text-yellow-500">Staff Login</h2>
        <?php if(isset($error)) echo "<p class='text-red-500 text-xs text-center mb-2'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="User" class="w-full mb-3 p-2 bg-gray-800 rounded border border-gray-600 text-white">
            <input type="password" name="password" placeholder="Pass" class="w-full mb-4 p-2 bg-gray-800 rounded border border-gray-600 text-white">
            <button type="submit" name="login" class="w-full bg-yellow-600 text-black font-bold p-2 rounded hover:bg-yellow-500">Access</button>
        </form>
    </div>
</body>
</html>
<?php
    exit();
}

// --- DASHBOARD LOGIC ---

// Get Filter Selection - Default to 'nm' as requested
$filter = $_GET['filter'] ?? 'nm';

// Build Query Based on Filter
$sql = "SELECT * FROM messages";
if ($filter == 'nm') {
    $sql .= " WHERE site_source = 'nm.noorgee.pk'";
} elseif ($filter == 'web') {
    $sql .= " WHERE site_source = 'noorgee.pk/Web/'";
} elseif ($filter == 'dev') {
    $sql .= " WHERE site_source = 'noorgee.pk/Dev/'";
}
$sql .= " ORDER BY created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <nav class="bg-gray-900 text-white p-4 flex justify-between items-center shadow-lg">
        <div class="flex items-center gap-3">
            <h1 class="font-bold text-yellow-500 text-lg">NMS Admin</h1>
            <a href="https://nm.noorgee.pk" role="button" aria-label="Return to Noor Media home" style="display:inline-block;padding:8px 12px;background:#007bff;color:#fff;border-radius:4px;text-decoration:none;">Return to Home</a>
            <span class="bg-gray-700 text-xs px-2 py-1 rounded">Super User</span>
        </div>
        <a href="?logout=true" class="text-sm bg-red-600 hover:bg-red-500 px-3 py-1 rounded">Logout</a>
    </nav>

    <div class="container mx-auto p-6">
        
        <!-- Filter Controls -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Message Inbox</h2>
            
            <form method="GET" class="flex gap-2">
                <select name="filter" class="p-2 border rounded shadow-sm bg-white text-gray-700" onchange="this.form.submit()">
                    <option value="all" <?php if($filter=='all') echo 'selected'; ?>>All Messages</option>
                    <option value="nm" <?php if($filter=='nm') echo 'selected'; ?>>nm.noorgee.pk (Photography)</option>
                    <option value="web" <?php if($filter=='web') echo 'selected'; ?>>noorgee.pk/Web/</option>
                    <option value="dev" <?php if($filter=='dev') echo 'selected'; ?>>noorgee.pk/Dev/</option>
                </select>
            </form>
        </div>

        <!-- Messages Table -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-800 text-white text-sm uppercase">
                    <tr>
                        <th class="p-4">Date</th>
                        <th class="p-4">Source</th>
                        <th class="p-4">Name / Email</th>
                        <th class="p-4">Subject</th>
                        <th class="p-4 w-1/3">Message</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            // Color code source tag
                            $tagColor = 'bg-gray-200 text-gray-800';
                            if(strpos($row['site_source'], 'nm') !== false) $tagColor = 'bg-yellow-200 text-yellow-800';
                            if(strpos($row['site_source'], 'Dev') !== false) $tagColor = 'bg-blue-200 text-blue-800';
                            
                            // Fix for incorrect date display (Nov 30, -0001)
                            $date_val = $row["created_at"];
                            $display_date = ($date_val && $date_val != '0000-00-00 00:00:00') ? date('M j, Y', strtotime($date_val)) : 'N/A';
                            
                            echo "<tr class='border-b hover:bg-gray-50 transition'>";
                            echo "<td class='p-4'>" . $display_date . "</td>";
                            echo "<td class='p-4'><span class='text-xs font-bold px-2 py-1 rounded $tagColor'>" . htmlspecialchars($row["site_source"]) . "</span></td>";
                            echo "<td class='p-4 font-semibold'>" . htmlspecialchars($row["name"]) . "<br><span class='text-xs text-gray-500 font-normal'>" . htmlspecialchars($row["email"]) . "</span></td>";
                            echo "<td class='p-4'>" . htmlspecialchars($row["subject"]) . "</td>";
                            echo "<td class='p-4 text-gray-600'>" . nl2br(htmlspecialchars($row["message"])) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='p-8 text-center text-gray-500'>No messages found for this filter.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
