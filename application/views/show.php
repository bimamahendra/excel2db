<!DOCTYPE html>

<?php 
	if($getout > 0 && $getall > 0){
		$presentase = ($getout/$getall) * 100;
		$conv = number_format($presentase, 2, '.', ',');
	}
?>
<html>
	<head>
		<title>Excel2DB</title>
	</head>
	<body>
		<h3><button><a href="<?php echo site_url('Import')?>">Import</a></button> | Data SPM Proses > 1 Jam 
			<?php if($getout > 0 && $getall > 0){
				echo 'sebanyak '.$getout.'/'.$getall.' = '.$conv.'%';
			}?></h3>
		<table style="border: 1px solid black">
			<tr>
				<th>No</th>
				<th>Invoice</th>
				<th>SP2D</th>
				<th>SPM</th>
				<th>Tgl Up</th>
				<th>Wkt Up</th>
				<th>Tgl PD</th>
				<th>Wkt PD</th>
				<th>Tgl Bank</th>
				<th>Wkt Bank</th>
				<th>Durasi</th>
				<th>Jumlah</th>
			</tr>
			<?php 
			$no = 1;
			foreach($list as $row) { ?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $row->no_invoice ?></td>
					<td><?php echo $row->no_sp2d ?></td>
					<td><?php echo $row->jenis_spm ?></td>
					<td><?php echo $row->tgl_upload ?></td>
					<td><?php echo $row->wkt_upload ?></td>
					<td><?php echo $row->tgl_pd ?></td>
					<td><?php echo $row->wkt_pd ?></td>
					<td><?php echo $row->tgl_bank ?></td>
					<td><?php echo $row->wkt_bank ?></td>
					<td><?php echo $row->durasi ?></td>
					<td><?php echo $row->jumlah ?></td>
				</tr>

			<?php $no++; } ?>
		</table>
	</body>
</html>