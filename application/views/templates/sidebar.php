<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed !important;
            top: 0;
            left: 0;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
            width: 335px;
            height: 850px;
            position: absolute;
            background: rgba(0, 47, 17, 0.88);
            border-radius: 10px"

        }

        .sidebar-heading {
            padding: 10px 15px;
            font-size: 1.2rem;
        }

        .list-group-item {
            background-color: #333;
            border-color: #333;
            color: #fff;
        }

        .list-group-item:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .add-pop {
            position: absolute;
            top: -150%;
            left: 50%;
            opacity: 0;
            transform: translate(-50%, -50%);
            width: 600px;
            padding: 20px 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 20ms ease-in-out 0ms;

        }

        .add-pop.active {
            top: 50%;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 20ms ease-in-out 0ms;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
            background: #000000;
            color: aliceblue;
            text-align: center;
            line-height: 20px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
        }

        /* Profile Picture */
        .for-pic {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-pic-picker {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 50%;
        }

        .profile-pic-label {
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .profile-pic {
            width: 100%;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            background-color: darkgrey;
        }

        .profile-pic-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333;
        }


        .profile-pic-label {
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .profile-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-pic-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333;
        }


        .update-pop {
            position: absolute;
            top: -150%;
            left: 50%;
            opacity: 0;
            transform: translate(-50%, -50%);
            width: 600px;
            padding: 20px 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 20ms ease-in-out 0ms;

        }

        .update-pop.active {
            top: 50%;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 20ms ease-in-out 0ms;
        }

        /* view profile */
        .profile-pop {
            position: absolute;
            top: -150%;
            left: 50%;
            opacity: 0;
            transform: translate(-50%, -50%);
            width: 600px;
            padding: 20px 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 20ms ease-in-out 0ms;

        }

        .profile-pop.active {
            top: 50%;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 20ms ease-in-out 0ms;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .list-group-item {
            background: rgba(0, 47, 17, 0.88);
            color: #fff;
            font-size: 15px;
            font-family: Poppins;
            font-weight: 600;

        }

        .body {
            font-family: Poppins;
            font-weight: 600;
            color: #002F11;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/testcss.css">

    <div class="Group88" style="">
        <div class="sidebar">
            <div class="sidebar-heading" style="font-size: 20px; font-family: Poppins; font-weight: 800;">Administrator</div>
            <div class="list-group list-group-flush">
                <a href="index" class="list-group-item list-group-item-action">Home</a>

                <a href="<?php echo base_url("admin/volumes"); ?>" class="list-group-item list-group-item-action">Volume</a>
                <a href="articles" class="list-group-item list-group-item-action">Articles</a>
                <a href="authors" class="list-group-item list-group-item-action">Authors</a>
                <a href="<?php echo base_url("admin/users"); ?>" class="list-group-item list-group-item-action">Users</a>
            </div>
        </div>