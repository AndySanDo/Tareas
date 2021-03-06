<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Framework Basico:
        <?php if(isset($this->titulo)) {
        echo ": ".$this->titulo;
        }?>
    </title>

    <link rel="stylesheet" href="<?php echo APP_URL_CSS."index.css"; ?>">
    <link rel="stylesheet" href="<?php echo APP_URL_CSS."materialize.min.css"; ?>">
    <script type="text/javascript" src="<?php echo APP_URL_JS."materialize.min.js"; ?>"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {});
      });
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'yyyy-mm-dd'
        });
        });
    </script>
    <script type="text/javascript">
          document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems, {});
        });
    </script>
    
</head>

<body>
    <?php 
    if ($this->_msg->hasMessages()) {
            echo $this->_msg->display();
    } ?>
    
	<div class="container">

    