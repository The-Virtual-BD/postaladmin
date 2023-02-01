<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        *{
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        html,body{
            background: #eeeeee;
            /* font-family: 'Open Sans', sans-serif, Helvetica, Arial; */
            font-family: 'Poppins', sans-serif;
        }
        img{
            max-width: 100%;
        }
        /* This is what it makes reponsive. Double check before you use it! */
        @media only screen and (max-width: 480px){
            table tr td{
                width: 100% !important;
                float: left;
            }
        }
    </style>
</head>

<body style="background: #eeeeee; padding: 10px; font-family: 'Open Sans', sans-serif, Helvetica, Arial;">
<center>
    <!-- ** Table begins here
    ----------------------------------->
    <!-- Set table width to fixed width for Outlook(Outlook does not support max-width) -->
    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" style="background: #ffffff; max-width: 600px !important; margin: 0 auto; background: #ffffff;">
        <tr>
            <td style="padding: 20px; text-align: center; background: radial-gradient(119.76% 198.28% at 102.53% -5.77%, #4361EE 0%, #0096C7 100%);">
                <img src="http://admintwst.z4id.com/images/logo.png" width="100px"/>
                <p style="font-size: 30px; font-wight:800; color:#fff;font-weight: 800;">Bahamas Postal Service</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; color: #141125;font-size: 12px;">
                <h1>Hello! {{$details['name']}} <span>Welcome!</span></h1>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px; background: #E9F7FF;">
                {{-- <p style="font-size:30px; margin: 5px;text-align:center">{{ $newsletter['title'] }}</p> --}}
                <p>
                    Dear {{$details['name']}}, <br/>
                    <p>Your Email: {{$details['email']}}</p>
                    <p>Your Password: {{$details['password']}}</p>
                    {{ $details['body'] }}
                </p>
               <center>
                   <p style="border-radius: 40px; -moz-border-radius: 40px; padding: 15px 20px; margin: 10px auto; background: #0582CA; display: inline-block;">
                       <a href="http://test.z4id.com/" style="color: #fff; text-decoration: none;">Visit PostBahamas.com</a>
                   </p>
               </center>
            </td>
        </tr>

    </table>
    <p style="text-align: center; color: #666666; font-size: 12px; margin: 10px 0;">
        Copyright © 2023. All&nbsp;rights&nbsp;reserved.<br />
        {{-- If you do not want to receive emails from us, you can <a href="http://test.z4id.com/newsletters/unsubscribe?subscriber={{ $subscriber['id']}}" target="_blank">unsubscribe</a>. --}}
    </p>
</center>
</body>
</html>
