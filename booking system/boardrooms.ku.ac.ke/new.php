<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="select">

        <label for="building">Choose a Building:
            <select name="building" id="building">
                <option value="">--Select a Building--</option>

            </select>
        </label>
        <label for="boardroom">Choose a Boardroom:
            <select name="boardroom" id="boardroom" disabled>
                <option value="">--Select a Boardroom--</option>
            </select>
        </label>
    </div>
    <div id="boardroomData"></div>

    <script src="ajax.js"></script>

</body>

</html>