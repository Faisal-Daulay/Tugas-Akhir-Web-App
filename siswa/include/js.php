    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- START PRELOADS -->
    <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
    <!-- START PLUGINS -->
    <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->
    <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

    <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
    <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
    <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
    <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

    <script type="text/javascript" src="js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
    <!-- END THIS PAGE PLUGINS-->

    <!-- START TEMPLATE -->
    <script type="text/javascript" src="js/settings.js"></script>

    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/actions.js"></script>

    <script>
        $(document).ready(function(){
            // $("#form-input1").hide();
            // $("#form-input2").hide();
            // $("#form-input3").hide();

            $("#form-input1").prop('disabled',true);
            $("#form-input2").prop('disabled',true);
            $("#form-input3").prop('disabled',true);

            $('#pilih').change(function(e){
                var pilih = $("#pilih").val();
                if (pilih=='lunas') {
                    $("#form-input1").prop('disabled',true);
                    $("#form-input2").prop('disabled',true);
                    $("#form-input3").prop('disabled',false);
                }else if(pilih == 'cicil') {
                    $("#form-input1").prop('disabled',false);
                    $("#form-input2").prop('disabled',false);
                    $("#form-input3").prop('disabled',true);
                }
            });
        });
    </script>
    <script>
        function validasiFile(){
            var inputFile = document.getElementById('file');
            var pathFile = inputFile.value;
            var ekstensiOk = /(.jpg|.jpeg|.png|.gif)$/i;
            if(!ekstensiOk.exec(pathFile)){
                alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png/.gif');
                inputFile.value = '';
                return false;
            }else{
                //Pratinjau gambar
                if (inputFile.files && inputFile.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('pratinjauGambar').innerHTML = '<img width="200" src="'+e.target.result+'"/>';
                    };
                    reader.readAsDataURL(inputFile.files[0]);
                }
            }
        }
    </script>
    <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->