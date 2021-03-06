<!DOCTYPE html>
<html>
	<head>
		<title>
			Prioritas Plafon Anggaran Sementara
		</title>
		<link rel="icon" type="image/x-icon" href="<?php echo get_image('settings', get_setting('app_icon'), 'icon'); ?>" />
		
		<style type="text/css">
			@import url('<?php echo base_url('themes/assets/fonts/Oxygen/Oxygen.css'); ?>');
			@page
			{
				sheet-size: 13in 8.5in;
				footer: html_footer
			}
			.print
			{
				display: none
			}
			@media print
			{
				.no-print
				{
					display: none
				}
				.print
				{
					display: block
				}
			}
			body
			{
				font-family: 'Oxygen';
				font-size: 13px
			}
			label,
			h4
			{
				display: block
			}
			a,
			a:hover,
			a:focus,
			a:visited,
			a:link
			{
				text-decoration: none;
				color: #000
			}
			hr
			{
				border-top: 1px solid #999999;
				border-bottom: 0;
				margin-bottom: 15px
			}
			.separator
			{
				border-top: 3px solid #000000;
				border-bottom: 1px solid #000000;
				padding: 1px;
				margin-bottom: 15px
			}
			.text-sm
			{
				font-size: 10px
			}
			.text-uppercase
			{
				text-transform: uppercase
			}
			.text-muted
			{
				color: #888888
			}
			.text-left
			{
				text-align: left
			}
			.text-right
			{
				text-align: right
			}
			.text-center
			{
				text-align: center
			}
			.text-justify
			{
				text-align: justify
			}
			table
			{
				width: 100%
			}
			th
			{
				text-align:center;
				font-size: 12px;
				white-space: nowrap
			}
			td
			{
				font-size: 12px;
				padding: 5px;
				vertical-align: top
			}
			.table
			{
				border-collapse: collapse
			}
			.bordered
			{
				border: 1px solid #000
			}
			.no-border-left
			{
				border-left: 0
			}
			.no-border-top
			{
				border-top: 0
			}
			.no-border-right
			{
				border-right: 0
			}
			.no-border-bottom
			{
				border-bottom: 0
			}
			.no-padding
			{
				padding: 0;
				border: 0
			}
			h1
			{
				font-size: 24px
			}
			h2
			{
				font-size: 22px
			}
			h3
			{
				font-size: 20px
			}
			h4
			{
				font-size: 18px
			}
			h1, h2, h3, h4, h5
			{
				margin-top: 0;
				margin-bottom: 0
			}
		</style>
	</head>
	<body>
		<table align="center">
			<tr>
				<td>
					<img src="<?php echo get_image('settings', get_setting('reports_logo'), 'thumb'); ?>" alt="..." height="80" />
				</td>
				<td align="center" width="100%">
					<h4>
						<?php echo (isset($nama_pemda) ? strtoupper($nama_pemda) : '-'); ?>
					</h4>
					<h4>
						PRIORITAS PLAFON ANGGARAN SEMENTARA
					</h4>
					<h5>
						TAHUN ANGGARAN <?php echo get_userdata('year'); ?>
					</h5>
				</td>
			</tr>
		</table>
		<div class="separator"></div>
		<br />
		<?php
		/*
		<table class="table">
			<tr>
				<td width="180">
					Urusan Pemerintahan
				</td>
				<td width="1">
					:
				</td>
				<td width="100">
					<?php echo $header['kd_urusan']; ?>
				</td>
				<td>
					<?php echo $header['nm_urusan']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Bidang Pemerintahan
				</td>
				<td>
					:
				</td>
				<td>
					<?php echo $header['kd_urusan'] . '.' . sprintf('%02d', $header['kd_bidang']) ; ?>
				</td>
				<td>
					<?php echo $header['nm_bidang']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Unit Organisasi
				</td>
				<td>
					:
				</td>
				<td>
					<?php echo $header['kd_urusan'] . '.' . sprintf('%02d', $header['kd_bidang']) . '.' . sprintf('%02d', $header['kd_unit']) ; ?>
				</td>
				<td>
					<?php echo $header['nm_unit']; ?>
				</td>
			</tr>
		</table>
		<br />
		*/ ?>
		<table class="table">
			<thead>
				<tr>
					<th class="bordered">
						KODE
					</th>
					<th class="bordered">
						KEGIATAN
					</th>
					<th class="bordered">
						SKPD
					</th>
					<th class="bordered">
						ANGGARAN
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$total_pagu								= 0;
					$total_anggaran							= 0;
					$total_selisih							= 0;
					foreach($results as $key => $val)
					{
						$total_anggaran							+= $val['anggaran'];
						//$total_anggaran						+= $val['total_anggaran'];
						//$total_selisih						+= $val['selisih'];
						echo '
							<tr>
								<td class="bordered text-center">
									' . $val['kd_urusan'] . '.' . sprintf('%02d', $val['kd_bidang']) . '.' . sprintf('%02d', $val['kd_unit']) . '.' . sprintf('%02d', $val['kd_sub']) . '.' . sprintf('%02d', $val['kd_prog']) . '.' . sprintf('%02d', $val['kd_keg']) . '
								</td>
								<td class="bordered">
									' . $val['kegiatan'] . '
								</td>
								<td class="bordered">
									' . $val['nm_sub'] . '
								</td>
								<td class="bordered text-right">
									' . number_format($val['anggaran'], 2) . '
								</td>
							</tr>
						';
					}
				?>
			</tbody>
			<tr>
				<td colspan="3" class="bordered text-center">
					<b>
						JUMLAH
					</b>
				</td>
				<td class="bordered text-right">
					<b>
						<?php echo number_format($total_anggaran, 2); ?>
					</b>
				</td>
			</tr>
		</table>
		<?php /*
		<br />
		<br />
		<table class="table" style="page-break-inside:avoid">
			<tr>
				<td class="text-center" width="50%">
					Mengetahui,
					<br />
					<b>
						<?php echo strtoupper($header['jabatan_kpa']); ?>
					</b>
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />
					<u>
						<b>
							<?php echo strtoupper($header['kpa']); ?>
						</b>
					</u>
					<br />
					NIP <?php echo $header['nip_kpa']; ?>
				</td>
				<td class="text-center" width="50%">
					<?php echo (isset($nama_daerah) ? $nama_daerah : '-') ;?>, <?php echo $tanggal_cetak; ?>,
					<br />
					<b>
						<?php echo strtoupper($header['jabatan_bendahara']); ?>
					</b>
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />
					<u>
						<b>
							<?php echo strtoupper($header['bendahara']); ?>
						</b>
					</u>
					<br />
					NIP <?php echo $header['nip_bendahara']; ?>
				</td>
			</tr>
		</table>
		*/ ?>
		<htmlpagefooter name="footer">
			<table class="print">
				<tr>
					<td class="text-muted text-sm">
						<i>
							<?php //echo phrase('document_has_generated_from') . ' ' . get_setting('app_name') . ' ' . phrase('at') . ' {DATE F d Y, H:i:s}'; ?>
						</i>
					</td>
					<td class="text-muted text-sm text-right">
						<?php echo phrase('page') . ' {PAGENO} ' . phrase('of') . ' {nb}'; ?>
					</td>
				</tr>
			</table>
		</htmlpagefooter>
	</body>
</html>