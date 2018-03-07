$(function(){
    $('[name="main_section_id"]').change(function(){
        $.get(EDIT_POST.SUB_SECTIONS+'/'+$(this).val(),'',function(res){
            var html="<option></option>";
            for (var key in res) {
                if (res.hasOwnProperty(key)) {
                    html+="<option value='"+key+"'>"+res[key]+"</option>";
                }
            }
            $('[name="section_id"]').html(html);
        });
    });
    $('#post-create-form [name="main_section_id"]').trigger("change");
});