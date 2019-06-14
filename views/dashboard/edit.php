
<script type="text/javascript">
    $(document).ready(function() {

        $('#news').submit(function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.post(url, data)
                .done( function() {
                    $('#response').html("Vest je dodata.");
                    $("#news")[0].reset();
                })
                .fail( function() {
                    $('#response').html("Vest je nije dodata!");
                });

        });
    });
</script>
<script type="text/javascript">

    function changeContent(page) {
        var pgHome = document.getElementById('contentBody_Home');
        var pgArticles = document.getElementById('contentBody_News');
        var x = document.getElementById("mceu_86");
        x.style.display = "none";
        switch(page) {
            default: alert("This shouldn't happen...");
                break;

            case "Home":	pgHome.style.display='block';
                pgArticles.style.display='none';
                pgDownloads.style.display='none';
                pgContact.style.display='none';
                header.innerHTML='Home';
                break;

            case "News": pgHome.style.display='none';
                pgArticles.style.display='block';
                pgDownloads.style.display='none';
                pgContact.style.display='none';
                header.innerHTML='News';
                break;
        }
    }

</script>




<fieldset align="center" id="contentArea" >
    <div id="content">
        <div id="contentBody_Home">
            <div class="about-us-edit">
            <div class="container">
                <form method="post" action="<?php echo URL;?>dashboard/editSave">
                    <h1 class="text-center" style="margin: 50px 0px 15px 0px">O nama</h1> <input type="textarea" id='mytextarea'name="text" value="<?php echo $this->aboutUsText['text']; ?>">
                    <input style="width: 170px; height: 40px; margin-top: 10px; margin-right: auto; margin-left: auto;" class="btn btn-success btn-block" type="submit" name="action" value="Submit">
                </form>
                <script>
                    tinymce.init({
                        height : "300",
                        width  : "100%",
                        selector: '#mytextarea',
                        theme: 'modern',
                        plugins: 'print preview  powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
                        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                        image_advtab: true,
                        content_css: [
                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                            '//www.tinymce.com/css/codepen.min.css'
                        ]
                    });
                </script>
            </div>
        </div>
        </div>

        
    </div>
</fieldset>







