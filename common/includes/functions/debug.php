<?php 
	if (isset($bench)){
		$bench->stop();
		print_r($bench->getProfiling());
	}
?>


<div class='phpinfodisplay'>
<?php 
if (isset($_SESSION)){
?>
	<div class="center">
	<h2>Session Variables</h2>
	<table border="0" cellpadding="3" width="600">
	<tr class="h"><th>Key</th><th>Value</th></tr>
	<?php 
	while ($var = each($_SESSION)) {
	print "<tr><td class='e'><strong>".$var['key']."</strong></td><td class='v'>".$var['value']."</td></tr>";
	}
	?>
	</table>
	</div>
<?php 
}//endif
?>
</div>

<div class='phpinfodisplay'>
	<div class="center">
	<h2>Evironment Variables</h2>
	<table border="0" cellpadding="3" width="600">
	<tr class="h"><th>Key</th><th>Value</th></tr>
	<?php 
	while ($var = each($_ENV)) {
	print "<tr><td class='e'><strong>".$var['key']."</strong></td><td class='v'>".$var['value']."</td></tr>";
	}
	?>
	</table>
	</div>
</div>

<?php
ob_start();
phpinfo(INFO_VARIABLES);

preg_match ('%<style type="text/css">(.*?)</style>.*?(<body>.*</body>)%s', ob_get_clean(), $matches);

# $matches [1]; # Style information
# $matches [2]; # Body information

echo "<div class='phpinfodisplay'><style type='text/css'>\n",
    join( "\n",
        array_map(
            create_function(
                '$i',
                'return ".phpinfodisplay " . preg_replace( "/,/", ",.phpinfodisplay ", $i );'
                ),
            preg_split( '/\n/', $matches[1] )
            )
        ),
    "</style>\n",
    $matches[2],
    "\n</div>\n";
?>
