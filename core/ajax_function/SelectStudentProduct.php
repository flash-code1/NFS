<?php
include('../../function/db/config.php');
if (isset($_POST["course_id"])) {
    $course_id = $_POST["course_id"];
    function fill_product($con, $course_id)
{
    $bcp = mysqli_query($con, "SELECT * FROM `payment_product` WHERE `payment_product`.`courseId` = $course_id AND `payment_product`.`Enabled` = '1'");
    $outputx = '';
    while ($rowx = mysqli_fetch_array($bcp)) {
        $outputx .= '<option value="' . $rowx["id"] . '">' . $rowx["name"] . '</option>';
    }
    return $outputx;
}
    ?>
    <div class="form-group mb-3">
        <label class="control-label">Payment Product</label>
        <select class="form-control" name="prod_id" required="required">
        <option value="">select a course</option>
        <?php echo fill_product($con, $course_id); ?>
        </select>
    </div>
<?php
}
?>