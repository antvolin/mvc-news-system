$(document).ready(function() {
    $('#show').empty().append('<option value="">Перейти к новости</option>');
    $("#show :last").attr("selected", "selected");
    $("#show :last").attr("disabled", "disabled");

    $("#number :first").attr("selected", "selected");

    $("#search").click(function() {
        $('#show').empty().append('<option value="">Перейти к новости</option>');
        $("#show :last").attr("selected", "selected");
        $("#show :last").attr("disabled", "disabled");

        $(ids).each(function(index, value) {
            $("#show").append("<option value='"+value+"'>"+value+"</option>");
        });
    });

    $("#show").change(function() {
        $("#show option:selected").each(function() {
            if ($(this).text() !== '') {
                document.location.href = baseController+"detail/" + $(this).text();
            }
        })
    });

    $("#clearShow").click(function() {
        $('#show').empty().append('<option value=""></option>');
        $("#show :last").attr("selected", "selected");
    });

    $("#exit").click(function() {
        if ($.isNumeric($("#number option:selected").text())) {
            document.location.href = baseController+"newslist/"+$("#number option:selected").text();
        }
    });
});
