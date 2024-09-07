<?php require_once '../navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>CodeMirror Example</title>

    <!-- Inclure les fichiers CSS et JS de CodeMirror -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>

    <style>
        .CodeMirror {
            border: 1px solid #ddd;
            height: auto;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>Tapez votre code ici :</h1>
    <textarea id="code" name="code">// Écrivez votre code ici...</textarea>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
            lineNumbers: true,
            mode: "javascript",
            theme: "default",
        });
    </script>
</body>

</html>