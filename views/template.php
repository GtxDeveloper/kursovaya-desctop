<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $data['options']['title']['value'] ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/static/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/static/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>
    <link href="/static/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/static/css/style.css" rel="stylesheet">
</head>

<body>

<?php require_once VIEWS_PATH . "topbar" . EXT; ?>

<?php require_once VIEWS_PATH . "navbar" . EXT; ?>

<?php if (!empty($data['error'])) { ?>
    <div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
        <?= $data['error'] ?>
    </div>
<?php } ?>
<?php if (!empty($data['message'])) { ?>
    <div class="alert alert-primary" role="alert" style="margin-bottom: 0px">
        <?= $data['message'] ?>
    </div>
<?php } ?>
<?php if (!empty($data['success'])) { ?>
    <div class="alert alert-success" role="alert" style="margin-bottom: 0px">
        <?= $data['success'] ?>
    </div>
<?php } ?>

<?php require_once PAGES_PATH . $content . EXT; ?>

<?php require_once VIEWS_PATH . "footer" . EXT; ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/static/lib/easing/easing.min.js"></script>
<script src="/static/lib/waypoints/waypoints.min.js"></script>
<script src="/static/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="/static/lib/tempusdominus/js/moment.min.js"></script>
<script src="/static/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="/static/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/static/lib/isotope/isotope.pkgd.min.js"></script>
<script src="/static/lib/lightbox/js/lightbox.min.js"></script>

<!-- Template Javascript -->
<script src="/static/js/main.js"></script>
</body>

</html>
