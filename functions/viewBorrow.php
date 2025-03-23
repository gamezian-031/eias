<?php
include('config.php');
$id = $_POST['id'];
$query = "SELECT * FROM `tbl_add_item` INNER JOIN tbl_items ON tbl_add_item.item_id=tbl_items.item_id INNER JOIN tbl_category ON tbl_items.category_id = tbl_category.category_id INNER JOIN tbl_brands ON tbl_brands.brand_id = tbl_items.brand_id INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id WHERE user_id=$id";
$result = $con->query($query);
$no = 1;
while($row = $result->fetch_assoc()){
    echo '<tr>
        <td>'.$no.'</td>
        <td>'.$row['item_name'].'</td>
        <td>'.$row['category_name'].'</td>
        <td>'.$row['brand_name'].'</td>
        <td>'.$row['location_name'].'</td>
        <td>'.$row['borrow_quantity'].'</td>
        <td>'.$row['timestamp'].'</td>
    </tr>';
    $no++;
}
?>