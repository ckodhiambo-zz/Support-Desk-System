<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escalation</title>
</head>
<body>
<h1>
    Kindly note that we have {{\App\Models\Tickets::where('status_id', 1)->count()}} unassigned tickets!
</h1>
</body>
</html>
