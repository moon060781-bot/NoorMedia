<?php
/**
 * NOOR MEDIA SOLUTION - Multi-Repo GitHub to cPanel Sync & Revert
 * Path: /home/noorgeec/nm.noorgee.pk
 * Supports pulling from both grapheart247 and moon060781 repositories with Revert option.
 * Added Push functionality to save local changes back to GitHub.
 */

// --- CONFIGURATION ---
$repo_dir = '/home/noorgeec/nm.noorgee.pk';
$token = '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';

// Define the two sources
$sources = [
    'grapheart247' => [
        'url' => "https://grapheart247:$token@github.com/grapheart247/NoorMedia.git",
        'branch' => 'master',
        'label' => 'Grapheart247 (Main Repo - Master)'
    ],
    'moon060781' => [
        'url' => "https://moon060781-bot:$token@github.com/moon060781-bot/NoorMedia_m81.git",
        'branch' => 'NoorMedia_m81',
        'label' => 'Moon060781 (Bot Repo - NoorMedia_m81)'
    ]
];

// Get selected source from URL, default to 'moon060781'
$selected_key = isset($_GET['source']) && array_key_exists($_GET['source'], $sources) ? $_GET['source'] : 'moon060781';
$source = $sources[$selected_key];
$action = isset($_GET['action']) ? $_GET['action'] : '';
// ---------------------

echo "<body style='background:#111; color:#0f0; font-family:monospace; padding:20px; line-height:1.6;'>";
echo "<h2 style='color:#C5A059;'>NMS System Sync & Deployment</h2>";

echo "<div style='background:#222; padding:15px; border-radius:5px; border-left:5px solid #C5A059; margin-bottom:20px;'>";
echo "<strong>Current Source:</strong> " . $source['label'] . "<br>";
echo "<strong>Target Branch:</strong> " . $source['branch'] . "<br>";
echo "</div>";

// Check if git is initialized
if (!is_dir("$repo_dir/.git")) {
    echo "<div style='color:yellow;'>Initializing new repository...</div>";
    shell_exec("cd $repo_dir && git init 2>&1");
}

// Handle Actions
if ($action == 'sync') {
    echo "<div style='background:#000; padding:15px; border:1px solid #333;'>";
    echo "Running Sync from <b>" . $selected_key . "</b>...<br>";
    
    // Update remote URL to the selected source
    shell_exec("cd $repo_dir && git remote remove origin 2>&1");
    shell_exec("cd $repo_dir && git remote add origin " . $source['url'] . " 2>&1");

    // Fetch and reset to the latest commit from the remote branch
    $commands = [
        "cd $repo_dir",
        "git fetch origin " . $source['branch'] . " 2>&1",
        "git reset --hard origin/" . $source['branch'] . " 2>&1",
        "git clean -df 2>&1"
    ];
    $output = shell_exec(implode(" && ", $commands));
    
    echo "<pre style='background:#111; color:#ccc; padding:10px; border:1px solid #222;'>$output</pre>";
    echo "<b style='color:white; background:green; padding:2px 10px;'>Update Complete!</b>";
    echo "</div>";
    echo "<br><a href='deploy.php?source=$selected_key' style='color:yellow;'>&larr; Back to Dashboard</a>";
} elseif ($action == 'revert') {
    echo "<div style='background:#000; padding:15px; border:1px solid #333;'>";
    echo "Reverting to previous state...<br>";
    
    // Revert to the state before the last hard reset or commit
    $output = shell_exec("cd $repo_dir && git reset --hard HEAD@{1} 2>&1");
    
    echo "<pre style='background:#111; color:#ccc; padding:10px; border:1px solid #222;'>$output</pre>";
    echo "<b style='color:white; background:orange; padding:2px 10px;'>Revert Complete!</b>";
    echo "</div>";
    echo "<br><a href='deploy.php?source=$selected_key' style='color:yellow;'>&larr; Back to Dashboard</a>";
} elseif ($action == 'push') {
    echo "<div style='background:#000; padding:15px; border:1px solid #333;'>";
    echo "Pushing local changes to <b>" . $selected_key . "</b>...<br>";
    
    // Update remote URL to the selected source
    shell_exec("cd $repo_dir && git remote remove origin 2>&1");
    shell_exec("cd $repo_dir && git remote add origin " . $source['url'] . " 2>&1");

    // Configure user for commit
    shell_exec("cd $repo_dir && git config user.email 'nms-deploy@noorgee.pk' 2>&1");
    shell_exec("cd $repo_dir && git config user.name 'NMS Deploy Bot' 2>&1");

    // Add, commit and push
    $timestamp = date('Y-m-d H:i:s');
    $commands = [
        "cd $repo_dir",
        "git add . 2>&1",
        "git commit -m 'Manual push from cPanel - $timestamp' 2>&1",
        "git push origin " . $source['branch'] . " 2>&1"
    ];
    $output = shell_exec(implode(" && ", $commands));
    
    echo "<pre style='background:#111; color:#ccc; padding:10px; border:1px solid #222;'>$output</pre>";
    echo "<b style='color:white; background:blue; padding:2px 10px;'>Push Complete!</b>";
    echo "</div>";
    echo "<br><a href='deploy.php?source=$selected_key' style='color:yellow;'>&larr; Back to Dashboard</a>";
} else {
    // UI for Source Selection and Actions
    echo "<h3>Select Source to Pull From:</h3>";
    echo "<div style='display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:30px;'>";
    foreach ($sources as $key => $info) {
        $isActive = ($key == $selected_key);
        $boxStyle = $isActive ? "border:2px solid #C5A059; background:#1a1a1a;" : "border:1px solid #333; opacity:0.7;";
        
        echo "<div style='padding:15px; border-radius:8px; $boxStyle'>";
        echo "<h4 style='margin:0; color:" . ($isActive ? "#C5A059" : "#eee") . ";'>" . $info['label'] . "</h4>";
        echo "<p style='font-size:12px; color:#888; margin:5px 0;'>Repo: " . $key . " | Branch: " . $info['branch'] . "</p>";
        
        if (!$isActive) {
            echo "<a href='?source=$key' style='display:inline-block; margin-top:10px; padding:8px 20px; background:#333; color:#ccc; text-decoration:none; border-radius:4px;'>Select This Source</a>";
        } else {
            echo "<span style='display:inline-block; margin-top:10px; padding:8px 20px; background:#C5A059; color:black; font-weight:bold; border-radius:4px;'>Currently Selected</span>";
        }
        echo "</div>";
    }
    echo "</div>";

    // Action Buttons for the selected source
    echo "<hr style='border:1px solid #333; margin:20px 0;'>";
    echo "<h3>Actions for " . $source['label'] . ":</h3>";
    echo "<div style='display:flex; gap:20px; flex-wrap:wrap;'>";
    echo "<a href='?action=sync&source=$selected_key' style='background:yellow; color:black; padding:15px 30px; text-decoration:none; font-weight:bold; border-radius:5px; box-shadow: 0 4px #990;'>🚀 Sync Now (Pull)</a>";
    echo "<a href='?action=push&source=$selected_key' onclick=\"return confirm('This will push all local files to GitHub. Are you sure?')\" style='background:#007bff; color:white; padding:15px 30px; text-decoration:none; font-weight:bold; border-radius:5px; box-shadow: 0 4px #0056b3;'>📤 Push to GitHub</a>";
    echo "<a href='?action=revert&source=$selected_key' onclick=\"return confirm('Are you sure you want to revert to the previous state?')\" style='background:red; color:white; padding:15px 30px; text-decoration:none; font-weight:bold; border-radius:5px; box-shadow: 0 4px #900;'>⏪ Revert Changes</a>";
    echo "</div>";
}

echo "<br><br><hr style='border:0; border-top:1px solid #333; margin:30px 0;'>";
echo "<div style='display:flex; justify-content:space-between; align-items:center;'>";
echo "<a href='index.php' style='color:#888; text-decoration:none;'>&larr; Back to Website</a>";
echo "<div style='color:#555; font-size:11px;'>NMS Deployment Tool v3.1 | Multi-Source, Revert & Push Enabled</div>";
echo "</div>";
echo "</body>";
?>
