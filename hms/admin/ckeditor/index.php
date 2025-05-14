
<!DOCTYPE html>

<html>

        <head>

                <meta charset="utf-8">

                <title>CKEditor</title>

                <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

        </head>

        <body>

                <textarea name="editor"></textarea>

               <script>

    CKEDITOR.replace('editor', {

        filebrowserUploadUrl: 'ckeditor/ck_upload.php',

        filebrowserUploadMethod: 'form'

    });

</script>

        </body>

</html>