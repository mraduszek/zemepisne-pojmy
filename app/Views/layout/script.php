<script type="text/javascript" src='<?=base_url("vendor/components/jquery/jquery.min.js")?>'></script>
<script type="text/javascript" src='<?=base_url("vendor/popper/popper.min.js")?>'></script>
<script type="text/javascript" src='<?=base_url("vendor/twbs/bootstrap/dist/js/bootstrap.min.js")?>'></script>
<script type="text/javascript" src='<?=base_url("vendor/select2/select2/dist/js/select2.min.js")?>'></script>
<script type="text/javascript" src='<?=base_url("vendor/datatables/datatables/media/js/jquery.dataTables.min.js")?>'></script>

<script>
  $(".multiple-select").select2({
  //maximumSelectionLength: 2
});
</script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
        language: {
        url: '<?=base_url("vendor/datatables/datatables/cs.json")?>',
    },
    });

    });
</script>