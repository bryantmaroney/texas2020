<!DOCTYPE html>
<html>
    <head>
        <title>Regestred Candidate</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h3>Hello Admin!</h3>
            <h3>I was just writing to let you know that we've had another sign up. Check it out!</h3>
            <h3>Yours truly,</h3>
            <h3>The Computer</h3>
            <h3><a href="Texas2020.org">Texas2020.org</a></h3>            
            <h3><a href="http://texas2020.org/tvgadmin/admin">Admin console</a></h3>
            <h3>Candidate name: <?=$data['first_name']?> <?= $data['last_name']?>   </h3>
            <h3>Office: <?=$data['seeking_office'] ?> </h3>
            <h3>District: <?=$data['which_district'] ?></h3>
        </div>
    </body>
</html>