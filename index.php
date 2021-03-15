<?php 
include 'db.php';
?>

<select name="" id="">
    <option>Pilih Provinsi</option>
    <?php 
        $query = mysqli_query($link,"SELECT * FROM province");
        while($row = mysqli_fetch_array($query)){
    ?>
    <option value="<?php echo $row["province_id"] ?>"><?php echo $row["province"] ?></option>
    <?php } ?>
</select>


<select name="" id="">
    <option>Pilih Kota / Kabupaten </option>
    <?php 
        $query = mysqli_query($link,"SELECT * FROM city");
        while($row = mysqli_fetch_array($query)){
    ?>
    <option value="<?php echo $row["city_id"] ?>"><?php echo $row["city_name"] ?></option>
    <?php } ?>
</select>