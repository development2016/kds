<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

?>

<style type="text/css">
.title {
    margin-left: 700px;
}
</style>
STATUS HARIAN AS : <?php echo date('d/m/Y'); ?> <span class="title">Summary KPI</span>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>PAHANG</th>
            <th>KEDAH</th>
            <th>PERLIS</th>
            <th>TERENGGANU</th>
            <th>PERAK</th>
            <th>JOHOR</th>
            <th>SELANGOR</th>
        </tr>

        
    </thead>
    <tbody>
        <?php foreach ($status as $key => $value) {  ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['item']; ?></td>
            <td><?php echo $value['pahang']; ?></td>
            <td><?php echo $value['kedah']; ?></td>
            <td><?php echo $value['perlis']; ?></td>
            <td><?php echo $value['terengganu']; ?></td>
            <td><?php echo $value['perak']; ?></td>
            <td><?php echo $value['johor']; ?></td>
            <td><?php echo $value['selangor']; ?></td>
        </tr>
        <?php } ?>

    </tbody>
</table>

