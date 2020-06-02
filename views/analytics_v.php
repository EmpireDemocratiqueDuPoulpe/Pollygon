<!DOCTYPE html>

<html lang="fr">
<head>
    <title>Pollygon - <?= $survey_title ?></title>
    <?php include_once(ROOT."/views/models/head.php"); ?>
</head>
<body>
<!-- Navbar -->
<?php include_once(ROOT."/views/models/navbar.php"); ?>

<!-- Error/success box -->
<?php if(isset($messages) && !empty($messages)) echo $messages; ?>

<!-- Survey viewer -->
<div id="survey_viewer">
    <div id="sVQuestionList">
        <ul>
            <li id="sVQBack"><a href="./home.php"><i class="fas fa-chevron-left"></i> Retour</a></li>
            <?= $questions ?>
        </ul>
    </div>

    <div id="sVQuestionView">
        <?= $questionView; ?>
    </div>
</div>

<!-- Footer -->
<?php include_once(ROOT."/views/models/footer.php"); ?>

<script src="./assets/js/jquery-3.4.1.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('.table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
            }
        });
    } );


</script>

</body>
</html>