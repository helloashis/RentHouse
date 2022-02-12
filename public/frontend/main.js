
$(document).ready(function() {
    var loader = $('#loader'),
    district = $('#district');
        district.attr('disabled','disabled');
        loader.hide();
    $('select[name="division"]').on('change', function() {
        var divID = $(this).val();
        loader.show();
        district.attr('disabled','disabled');
        if(divID) {
            $.ajax({
                url: '/finddistrict/'+divID,
                type: "GET",
                dataType: "json",
                success:function(data) {

                    $('select[name="district"]').empty();
                    $('select[name="district"]').append('<option value="" selected>===Select District===</option>');
                    $.each(data, function(key, value) {

                        $('select[name="district"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                    loader.hide();
                    district.removeAttr('disabled');


                }
            });
        }else{
            $('select[name="district"]').empty();
        }
    });
});

  

