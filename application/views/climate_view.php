<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html>
<head>
    <title>Climate App</title>
    
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>" >

    <script src="<?php echo base_url("assets/js/jquery-3.1.1.min.js"); ?>"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

</head>
<body>
	<div class="container">
		<div class="dropdown combobox">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Pilih Kota
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				<?php foreach($city_list as $value) { ?>
					<a class="dropdown-item" href="<?php echo base_url('climate/index/' . $value) ?>">
						<?php echo $value ?>
					</a>
				<?php } ?>
			</div>
		</div>
		<h2><?php echo $city?></h2>
		<table class="table table-bordered cool-table">
			<thead>
				<tr>
					<th></th>
					<th>Date</th>
					<th>5 Day Avg : <?php echo $climate_data['average'] ?> C</th>
					<th>5 Day Avg Variance : <?php echo $climate_data['variance'] ?> C</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				if($climate_data)
				foreach ($climate_data['temp'] as $value) { ?>
					<tr>
						<th scope="row"><?php echo $i ?></th>
						<td><?php echo $value['date'] ?></td>
						<td><?php echo $value['temp'] ?> C</td>
						<td><?php echo round($value['variance'],2) ?> C</td>
					</tr>	
				<?php $i++; }	?>
			</tbody>
		</table>

	</div>
</body>
<footer>
	<script type='text/javascript'>

	</Script>
</footer>
</html>