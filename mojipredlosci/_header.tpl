<!DOCTYPE html>
<html>
    <head>
        <title>
            {$title}
        </title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Darijan Vertovšek"/>
        <meta name="dcterms.created" content = "2015-03-11"/> 
        <link rel="stylesheet" type="text/css" href="css/dvertovs.css"/>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='js/jquery-1.11.3.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src='https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
        <script src='js/validacija.js'></script>
    </head>

    <body>
        <header id="zaglavlje">
            <h1 id='headerZaglavlje'>
                {$title}
            </h1> 
            
        </header>
        {if isset($smarty.session.id_kor)}
            <div style = "float:right">
                Zadnja uspješna prijava: {$smarty.session.vrijeme_prijave_zadnje} | {$smarty.session.ime} {$smarty.session.prezime}
                <a href="odjava.php">Odjava</a>
            </div>
        {/if}