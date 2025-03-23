<?php
include('config.php');
$userid = $_POST['user_id'];

$query =    "SELECT * FROM `tbl_add_item` INNER JOIN tbl_items ON tbl_add_item.item_id=tbl_items.item_id INNER JOIN tbl_category ON tbl_items.category_id = tbl_category.category_id INNER JOIN tbl_brands ON tbl_brands.brand_id = tbl_items.brand_id INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id 
            WHERE user_id='$userid'";

$result = $con->query($query);
$no = 1;
while ($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row['item_name']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
        <td><?php echo $row['brand_name']; ?></td>
        <td><?php echo $row['location_name']; ?></td>
        <td><?php echo $row['borrow_quantity']; ?></td>
        <td><?php echo $no; ?></td>
    </tr>

<?php
    $no++;
}
?>