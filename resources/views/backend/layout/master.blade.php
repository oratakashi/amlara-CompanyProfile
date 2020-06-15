<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.ico">

	<!-- plugins -->
	<link href="{{ asset('backend') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

	<!-- plugin css -->
	<link href="{{ asset('backend') }}/js/DataTables/dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ asset('backend') }}/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

	<!-- App css -->
	<link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ asset('backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ asset('backend') }}/css/app.min.css" rel="stylesheet" type="text/css" />

	<script src="{{ asset('tinymce') }}/tinymce.min.js"></script>
	<!-- Vendor js -->
	<script src="{{ asset('backend') }}/js/vendor.min.js"></script>
	<script>
		tinyMCE.init({
			selector: ".richtext",
			height: 350,
			setup: function(editor) {
				editor.on('change', function() {
					tinymce.triggerSave();
				});
			},
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen link",
				"insertdatetime media table contextmenu paste imagetools responsivefilemanager"
			],
			toolbar: "insertfile undo redo | paste | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link | | responsivefilemanager ",
			paste_as_text: true,
			menubar: false,
			statusbar: false,

			external_filemanager_path: "{{asset('filemanager')}}",
			filemanager_title: "Pengelola Berkas",
			external_plugins: {
				"filemanager": "{{asset('filemanager')}}/plugin.min.js"
			}
		});
	</script>

</head>

<body>
	<!-- Begin page -->
	<div id="wrapper">

		<!-- Topbar Start -->
		@include('backend.layout.header')
		<!-- end Topbar -->

		<!-- ========== Left Sidebar Start ========== -->
		@include('backend.layout.sidebar')
		<!-- Left Sidebar End -->

		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">

			@yield('content')

			<!-- Footer Start -->
			@include('backend.layout.footer')
			<!-- end Footer -->

		</div>

		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->


	</div>
	<!-- END wrapper -->

	<!-- optional plugins -->
	<script src="{{ asset('backend') }}/libs/moment/moment.min.js"></script>
	<script src="{{ asset('backend') }}/libs/apexcharts/apexcharts.min.js"></script>
	<script src="{{ asset('backend') }}/libs/flatpickr/flatpickr.min.js"></script>

	<!-- datatable js -->
	<script src="{{ asset('backend') }}/js/DataTables/datatables.min.js"></script>

	<!-- Datatables init -->
	<script src="{{ asset('backend') }}/js/pages/datatables.init.js"></script>
	<script src="{{ asset('backend') }}/libs/select2/select2.min.js"></script>
	<script src="{{ asset('backend') }}/js/pages/form-advanced.init.js"></script>

	<!-- App js -->
	<script src="{{ asset('backend') }}/js/app.min.js"></script>


</body>

</html>