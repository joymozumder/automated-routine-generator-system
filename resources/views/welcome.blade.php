<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />

         <!-- tailwind  -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

         <!-- template files import  -->
        <link rel="stylesheet" href="{{ asset('frontend/dist/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/dist/all.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">


        <!-- datatable import -->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/custom/css/datatable.css') }}">



        <!-- vue table -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <div id="app">
          <example-component></example-component>
        </div>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/main.js') }}"></script>


        <!-- import datatable -->
        <!-- jQuery -->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		
        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <!-- <script src="{{ asset('frontend/custom/js/datatable.js') }}"></script>-->
        <script>
            $(document).ready(function() {
			
            var table = $('#example').DataTable( {
                    responsive: true
                } )
                .columns.adjust()
                .responsive.recalc();
        } );
        </script>
        <script></script>
    </body>
</html>