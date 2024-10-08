<?php
$draftLocation = './data/drafts/default.json';

if (!file_exists($draftLocation)) {
  $myfile = fopen($draftLocation, "w") or die("Unable to open file!");
  $txt = json_encode(array('blocks' => array()));
  fwrite($myfile, $txt);
  fclose($myfile);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Minimal Editor.JS</title>
  <link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
  <link href="./public/assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="./public/assets/json-preview.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>

<body>

  <div class="" style="width:100%; height:auto; position:fixed; z-index:99;">
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./public/assets/logo-editor-js.svg" alt="" width="30" height="24"
            class="d-inline-block align-text-top">
          <span>Minimal Editor.JS <span class="message" style="font-size:14px;"></span></span>
        </a>
        <div class="d-flex">
          <a href="./preview.php?currentDraft=true" target="__blank"><img src="./public/assets/preview.svg" alt="" class="d-inline-block align-text-top" style="margin-right:20px; width:40px;"></a>
          <button style="margin-right:20px;" class="btn btn-success" id="saveButton">Save Draft</button>
          <button style="margin-right:20px;" class="btn btn-info" id="saveAsButton">Save as...</button>
          <button style="margin-right:20px;" class="btn btn-warning" id="resetButton">Reset Draft</button>
          <button style="margin-right:20px;" class="btn btn-danger" id="resetTempButton">Reset Temp</button>
        </div>
      </div>
    </nav>
  </div>

  <div class="" style="width:100%; height:auto; padding-top:20px; padding-bottom:20px; font-size:16px;">
    <div id="editorjs" style="margin-top:70px;"></div>
  </div>

  <input type="hidden" id="jsonData" value="<?php echo htmlspecialchars(file_get_contents($draftLocation)); ?>" />

</body>
<script src="./public/assets/js/jquery.js"></script>
<script src="./public/assets/js/header.js"></script><!-- Header -->
<script src="./public/assets/js/simple-image.js"></script><!-- Image -->
<script src="./public/assets/js/delimiter.js"></script><!-- Delimiter -->
<script src="./public/assets/js/list.js"></script><!-- List -->
<script src="./public/assets/js/checklist.js"></script><!-- Checklist -->
<script src="./public/assets/js/quote.js"></script><!-- Quote -->
<script src="./public/assets/js/code.js"></script><!-- Code -->
<script src="./public/assets/js/embed.js"></script><!-- Embed -->
<script src="./public/assets/js/table.js"></script><!-- Table -->
<script src="./public/assets/js/link.js"></script><!-- Link -->
<script src="./public/assets/js/warning.js"></script><!-- Warning -->
<script src="./public/assets/js/marker.js"></script><!-- Marker -->
<script src="./public/assets/js/inline-code.js"></script><!-- Inline Code -->
<script src="./public/assets/js/editor.js"></script>
<script>
  let dataLoaded = document.getElementById("jsonData").value;
  let autoSaveSeconds = 30000;//30 seconds (30000)
</script>
<script src="./public/assets/js/init.js"></script>

</html>