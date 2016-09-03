<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<div class="row">
	<div class="col-md-10">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-users "></i> &nbsp; Manajemen User</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-box-tool" href=<?= Url::to(['tambah']) ?>><i class="fa fa-plus"></i></a>
				</div>
			</div>
			<div class="box-body">
				
				<table class='table table-bordered table-hover'>
					<caption><em>*User yang telah dihapus, tidak dapat dikembalikan lagi</em></caption>
					<thead>
						<tr>
							<td><center>No</center></td>
							<td><center>Nama Pengguna</center></td>
							<td><center>Email</center></td>
							<td><center>Tanggal Buat</center></td>
							<td><center>Aksi</center></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($model as $i=>$user):?>
						<tr>
							<td width="10%"><center><?=$i+1 ?></center></td>
							<td><center><?= $user->username ?></center></td>
							<td width="20%"><center><?= $user->email ?></center></td>
							<td><center><?= Date('d/m/Y',$user->created_at)?></center></td>
							<td><center><a href=<?= Url::to(['/manajer-user/hapus', 'id'=>$user->id]) ?> data-confirm='Apakah anda ingin menghapus User ini?'>hapus</a></center></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="box-footer"></div>
		</div>
	</div>
</div>