<?php
$page_title = isset($page_title) ? $page_title : "Visa Academy";
$page_desc = isset($page_desc) ? $page_desc : "Visa Academy offers visa training, immigration courses and study abroad guidance.";
$page_keywords = isset($page_keywords) ? $page_keywords : "visa academy, visa training, immigration course, study visa, digital nomad visa";

$site_url = 'https://www.thevisaacademy.com';
$page_path = basename($_SERVER['PHP_SELF']);

$canonical_url = $site_url . '/' . $page_path;
if ($page_path == 'index.php') {
    $canonical_url = $site_url . '/';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $page_title; ?></title>
<meta name="description" content="<?php echo $page_desc; ?>">
<meta name="keywords" content="<?php echo $page_keywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="canonical" href="<?php echo $canonical_url; ?>">

<!-- Open Graph -->
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:description" content="<?php echo $page_desc; ?>">
<meta property="og:url" content="<?php echo $canonical_url; ?>">
<meta property="og:type" content="website">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">

<link rel="stylesheet" href="css/style.css">
</head>
<body>
