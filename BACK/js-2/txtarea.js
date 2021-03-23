  function preview() {

            $("#content").html(
                $("#editor").val()
            );

        }
  $(function () {
        $("#editor").shieldEditor({
            height: 260
        });
    })