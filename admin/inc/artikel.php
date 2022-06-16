<?php

$sql = select('*', 'tbl_lain2', 'ds=0 LIMIT 1');
$atc = mysqli_fetch_assoc($sql);

?>
<script type="text/javascript" src="<?= base('assets/tinymce/tinymce.min.js'); ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    tinymce.init({
      selector: 'textarea',
      /* fix link image */
      relative_urls : false,
      remove_script_host : true,
      document_base_url : "/",
      convert_urls : true,
      /* fix link image */
      height: 500,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

    });
  });
</script>
<div class="col-md-12">
  <form class="form-group" action="" method="post">
    <button type="submit" name="submit" class="btn btn-default">
      Simpan
      &nbsp;
      <span class="glyphicon glyphicon-floppy-save"></span>
    </button>
    <br> <br>
    <textarea name="isiart" rows="3">
      <?= $atc['isiart']; ?>
    </textarea>
  </form>
</div>

<?php

if (isset($_POST['submit'])) {
  $isiart = $_POST['isiart'];

  if (empty(trim($isiart))) {
    echo "<script>sweetAlert('Oops!', 'Form artikel harus diisi!', 'error');</script>";
    echo notice(0);
  } else {
    $save = update("tbl_lain2", "isiart = '$isiart'", "id = 1");

    if ($save === TRUE) {
      echo "
        <script>
          swal('Yosh!', 'Artikel berhasil di perbarui!', 'success');
          $('button.confirm').on('click', function() {
            window.location='artikel'
          });
        </script>";
        echo notice(1);
    } else {
      echo "<script>swal('Oops!', 'Artikel gagal di perbarui!', 'error');</script>";
      echo notice(0);
    }
  }
}

?>
