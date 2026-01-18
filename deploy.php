<?php
/**
 * NOOR MEDIA SOLUTION - GitHub to cPanel Sync
 * Path: /home/noorgeec/nm.noorgee.pk
 */

// Configuration
$repo_dir = '/home/noorgeec/nm.noorgee.pk';
$token = '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';
$remote_repo = "https://grapheart247:$token@github.com/grapheart247/NoorMedia.git";
$branch = 'main';

echo "<body style='background:#111; color:#0f0; font-family:monospace; padding:20px;'>";
echo "<h2>NMS System Sync & Deployment</h2>";

// Check if git is initialized
if (!is_dir("$repo_dir/.git")) {
    echo "Initializing new repository...<br>";
    echo shell_exec("cd $repo_dir && git init 2>&1");
    echo shell_exec("cd $repo_dir && git remote add origin $remote_repo 2>&1");
}

// Handle Actions
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'sync') {
    echo "Running Sync...<br>";
    $output = shell_exec("cd $repo_dir && git fetch origin $branch 2>&1 && git reset --hard origin/$branch 2>&1");
    echo "<pre>$output</pre>";
    echo "<br><b style='color:white;'>Update Complete!</b>";
} elseif ($action == 'revert') {
    echo "Reverting to previous commit...<br>";
    $output = shell_exec("cd $repo_dir && git reset --hard HEAD@{1} 2>&1");
    echo "<pre>$output</pre>";
    echo "<br><b style='color:orange;'>Revert Complete!</b>";
}

// UI Buttons
echo "<hr style='border:1px solid #333; margin:20px 0;'>";
echo "<div style='display:flex; gap:20px;'>";
echo "<a href='?action=sync' style='background:yellow; color:black; padding:10px 20px; text-decoration:none; font-weight:bold; border-radius:5px;'>🚀 Sync Now</a>";
echo "<a href='?action=revert' style='background:red; color:white; padding:10px 20px; text-decoration:none; font-weight:bold; border-radius:5px;'>⏪ Revert Changes</a>";
echo "</div>";

echo "<br><br><a href='index.php' style='color:#888;'>← Back to Website</a>";
echo "</body>";
