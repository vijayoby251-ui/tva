<?php
if (!isset($page_title) || trim($page_title) === '') {
    $page_title = 'Visa Academy';
}
if (!isset($page_desc) || trim($page_desc) === '') {
    $page_desc = 'Visa Academy offers visa training and professional courses for immigration and study abroad services.';
}
if (!isset($page_keywords) || trim($page_keywords) === '') {
    $page_keywords = 'visa academy, visa training, immigration training, study visa course, digital nomad visa training';
}
if (!isset($page_path) || trim($page_path) === '') {
    $page_path = $_SERVER['PHP_SELF'] ?? '/';
}

$site_url = 'https://YOURDOMAIN.com';
$canonical_url = rtrim($site_url, '/') . '/' . ltrim(basename($page_path), '/');
if (basename($page_path) === 'index.php' || basename($page_path) === '') {
    $canonical_url = rtrim($site_url, '/') . '/';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="Visa Academy">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8'); ?>">

    <script type="application/ld+json">
    {
      "@context":"https://schema.org",
      "@type":"Organization",
      "name":"Visa Academy",
      "url":"<?php echo htmlspecialchars(rtrim($site_url, '/'), ENT_QUOTES, 'UTF-8'); ?>",
      "logo":"<?php echo htmlspecialchars(rtrim($site_url, '/'), ENT_QUOTES, 'UTF-8'); ?>/images/logo.png"
    }
    </script>

    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="magnific-popup.css">
    <link rel="stylesheet" href="slicknav.min.css">
    <link rel="stylesheet" href="mousecursor.css">
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="responsive.css">
</head>
<body>
