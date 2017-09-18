<?php
if (trim(@$status) !== "") {
    if ($status < 500) {
        ?>
        <div class="alert alert-warning" id="cmsg"><strong>Alert:</strong> <?php echo $msg; ?></div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" id="cmsg"> <strong>Alert:</strong> <?php echo $msg; ?></div>
        <?php
    }
    echo "<br><br>";
}
?>
<script>
    setTimeout(function () {
        $(cmsg).hide("slow");
    }, 5000);
</script>