        <!-- jQuery Cookie -->

        <script src="assets/js/jqueryCookie.min.js"></script>

        <!-- Bootstrap Framework -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- retina images -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/retina.js/2.1.0/retina.min.js"></script>

        <!-- switchery -->

        <script src="assets/lib/switchery/dist/switchery.min.js"></script>

        <!-- typeahead -->

        <script src="assets/lib/typeahead/typeahead.bundle.min.js"></script>

        <!-- fastclick -->

        <script src="assets/js/fastclick.min.js"></script>

        <!-- match height -->

        <script src="assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>

        <!-- scrollbar -->

        <script src="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>



        <!-- Yukon Admin functions -->

        <script src="assets/js/yukon_all.js"></script>

            <script>

                $(function() {
                    jQuery('input.datepicker').Zebra_DatePicker();
                    // c3 charts

                    yukon_charts.p_dashboard();

                    // countMeUp

                    yukon_count_up.init();

                    // easy pie chart

                    yukon_easyPie_chart.p_dashboard();

                    // vector maps

                    yukon_vector_maps.p_dashboard();

                    // match height

                    yukon_matchHeight.p_dashboard();

                });

            </script>