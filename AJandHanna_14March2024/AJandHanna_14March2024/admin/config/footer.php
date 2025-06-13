</div>

</div>
        </div>

    </div>
    <!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; My Wedding Day. 2021</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="../admin/js/jquery-3.1.1-min.js"></script>
<script src="../admin/js/bootstrap.js"></script>
<script src="../admin/plugins/ckeditor/ckeditor.js"></script>

<!-- JQUERY DATATABLE -->
<!--<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>-->

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>

<script src="../admin/js/imgPreview.min.js"></script>
<script>
    //INITIALIZE JQRY
    $(function () {
        $(() => $.imgPreview());

        $(".jqdatatable").DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            'iDisplayLength': 100,
        });


        //Update All Submit Buttons, Add onclick event for saving.
        //$('input[type="submit"]').attr("onclick", "showsavingstate();");
        //$('button[type="submit"]').attr("onclick", "showsavingstate();");

        $('.no-onclick').removeAttr("onclick");

        $('#bodycontainer').parent().prepend('<p><center class="pgreloader"><i class="fa fa-refresh fa-spin fa-3x"></i><br>Loading...</center></p>');

        setTimeout(function () {
            $('.pgreloader').attr('style', 'display:none');
            $('#bodycontainer').attr('style', 'display:block').slideDown(3000);
        }, 2000);

    });

    function insertIntoCKEditor(ckeditor_id, str) {
        CKEDITOR.instances[ckeditor_id].insertText(str)
    }

    function showsavingstate() {

        if ($("form").valid() == false) {
            return;
        }
        if ($('button[type="submit"]').find('i').length > 0) {
            $('button[type="submit"]').find('i').replaceWith("<i class='fa fa-refresh fa-spin'></i>&nbsp;")
        }
        else if ($('input[type="submit"]').find('i').length > 0) {
            $('input[type="submit"]').find('i').replaceWith("<i class='fa fa-refresh fa-spin'></i>&nbsp;")
        }
        $('.wrapper').append('<div class="loading-post-block" id="loading_block">Saving&#8230;</div>');
    }

    function ValidateSize(file) {
        console.table(file.files[0]);
        console.log(file.files[0].type.toString());
        var FileSize = file.files[0].size / 1000000; // in MB
        //alert(FileSize);
        if (FileSize > 5) {
            alert('File too large. File must be less than 5 MB.');
            $(file).val(''); //for clearing with Jquery
        }

        switch (file.files[0].type) {
            case "image/png":
            case "image/jpg":
            case "image/jpeg": {
                break;
            }
            default: {
                alert('Invalid file type. Only JPG, JPEG and PNG types are accepted.');
                $(file).val(''); //for clearing with Jquery
                break;
            }
        }
    }
</script>
</body>

</html>