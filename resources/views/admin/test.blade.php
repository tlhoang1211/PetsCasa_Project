<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Selectize Theme for Bootstrap 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/selectize.bootstrap4.css')}}">
</head>
<body class="m-5">
<div class="container">
    <h1 class="text-center">Selectize Theme for Bootstrap 4</h1>
    <div class="row my-5">
        <div class="col-6">
            <h2>Multiple Select</h2>
            <form>
                <div class="form-group">
                    <label for="select-7">Regular</label>
                    <select class="form-control selectize-multiple" id="select-7" multiple>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{asset('assets/admin/js/selectize.js')}}"></script>
<script>
    $('.selectize-multiple').selectize({
        delimiter: ',',
        persist: false,
        create: function (input) {
            return {value: input, text: input};
        }
    });
</script>
</body>
</html>