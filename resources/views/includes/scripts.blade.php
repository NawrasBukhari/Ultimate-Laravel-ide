<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/lib/ace.js')}}"></script>
<script src="{{asset('js/lib/theme-monokai.js')}}"></script>

<script type="text/javascript">

    let editor;

    window.onload = function () {
        editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/c_cpp");
    }

    function changeLanguage() {

        let language = $("#languages").val();
        if (language === 'c' || language === 'cpp') editor.session.setMode("ace/mode/c_cpp");
        else if (language === 'php') editor.session.setMode("ace/mode/php");
        else if (language === 'python') editor.session.setMode("ace/mode/python");
        else if (language === 'node') editor.session.setMode("ace/mode/javascript");
    }

    $('#ide-post').submit(function (event) {
        event.preventDefault();
    });

    $(function() {
        $(".ide-btn").click(function() {
            $("button").attr("disabled", "disabled");
            setTimeout(function() {
                $(".ide-btn").removeAttr("disabled");
            }, 3000);
        });
    });


    function executeCode() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{route('ide')}}",

            method: "POST",

            data: {
                language: $("#languages").val(),
                code: editor.getSession().getValue()
            },

            success: function (response) {
                $(".error-alert").hide()
                $(".output").text(response)

            },

            error: function (err) {
                console.log(err);
                console.log(err.responseText);
                $(".error-alert").text('⚠️'+ '' + JSON.parse(err.responseText).errors).show();
            }
        })
    }

</script>
