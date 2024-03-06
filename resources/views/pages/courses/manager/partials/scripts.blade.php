@section('d-scripts')
    <script src="{{asset('assets/admin/js/wysiwyg.js')}}"></script>
    <script src="{{asset('assets/admin/js/uikit_fileinput.js')}}"></script>
    <script>
        $("input#status").on('change', function () {
            if ($(this).prop("checked") === true) {
                $("input[type='hidden'][name='status_id']").val(1);
            } else {
                $("input[type='hidden'][name='status_id']").val(2);
            }
        })
    </script>
        <script>
            $(function () {
                altair_form_adv.date_range()
            }), altair_form_adv = {
                date_range: function () {
                    var t = $("#uk_dp_start"), e = $("#uk_dp_end"), i = UIkit.datepicker(t, {format: "YYYY-MM-DD"}),
                        n = UIkit.datepicker(e, {format: "YYYY-MM-DD"});
                    t.on("change", function () {
                        n.options.minDate = t.val(), setTimeout(function () {
                            e.focus()
                        }, 300)
                    }), e.on("change", function () {
                        i.options.maxDate = e.val()
                    })
                }
            };
        </script>
    <script>
        $(document).ready(function(){
            $(".type").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>

@endsection
