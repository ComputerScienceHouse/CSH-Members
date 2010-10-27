<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AJAX</title>
    <link rel="stylesheet" href="<?=site_url('js/sencha-touch/resources/css/sencha-touch.css')?>" type="text/css">
    <script type="text/javascript" src="<?=site_url('js/sencha-touch/ext-touch.js')?>"></script>
    <script type="text/javascript" src="<?=site_url('js/ajax.js')?>"></script>

    <style type="text/css" media="screen">
        .day {
            float: left;
            background-color: #c5c5c5;
            color: rgba(0,0,0,.5);
            text-shadow: #fff 0 1px 0;
            margin: 1%;
            width: 18%;
            text-align: center;
            -webkit-border-radius: 15px;
            border-bottom: 1px solid #999;
            padding: 15px;
        }

        .x-phone .day {
            float: none;
            width: 98%;
            padding: 10px;
        }

        .day img {
            display: block;
            margin: 0 auto;
        }

        .temp {
            display: block;
            margin: 20px 0;
            font-size: 48px;
            line-height: 40px;
        }

        .day .temp_low {
            display: inline;
        }

        .temp_low {
            display: block;
            font-size: 26px;
            color: rgba(30,30,30,.5);
        }

        .date {
            margin: 10px 0 5px;
            font-size: 11px;
            font-weight: bold;
        }
        .demos-loading {
          background: rgba(0,0,0,.3) url('<?=site_url('js/sencha-touch/resources/shared/loading.gif')?>') center center no-repeat;
          display: block;
          width: 10em;
          height: 10em;
          position: absolute;
          top: 50%;
          left: 50%;
          margin-left: -5em;
          margin-top: -5em;
          -webkit-border-radius: .5em;
          color: #fff;
          text-shadow: #000 0 1px 1px;
          text-align: center;
          padding-top: 8em;
          font-weight: bold;
        }
    </style>
</head>
<body>
<textarea id="weather" class="x-hidden-display">
    <tpl for=".">
        <div class="day">
            <div class="date">{date}</div>
            <tpl for="weatherIconUrl"><img src="{value}"/></tpl>

            <span class="temp">{tempMaxF}&deg;<span class="temp_low">{tempMinF}&deg;</span></span>
        </div>
    </tpl>
</textarea>
</body>
</html>