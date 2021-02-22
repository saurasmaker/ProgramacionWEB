
    <div class = "col-12">
		<h3 class = "display-2 text-center"><?php echo ($_SESSION["TYPE_ERROR"]); ?></h3>
        <hr width = "50%"/>
        <p><?php echo ($_SESSION["MSG_ERROR"]);?></p>
		<p><a href = "index.php?ACTUAL_PAGE=catalogue" id = "input-edit-send" type = "submit" class="btn btn-primary">Aceptar</a></p>
	</div>