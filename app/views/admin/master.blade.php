<!doctype html>
<html lang="fr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>{{ $title }}</title>

	{{-- CSS --}}

	{{ HTML::style(asset('components/vendor/bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css')) }}
	{{ HTML::style(asset('components/vendor/alertify.js/themes/alertify.core.css')) }}
	{{ HTML::style(asset('components/vendor/alertify.js/themes/alertify.bootstrap.css')) }}

	@yield('css')

	{{ HTML::style(asset('css/admin.css')) }}


	{{-- JS --}}

	{{ HTML::script(asset('components/vendor/jquery/jquery.js')) }}
	{{ HTML::script(asset('components/vendor/jquery-ui/ui/jquery-ui.js')) }}
	{{ HTML::script(asset('components/vendor/jquery-ui/ui/jquery.ui.core.js')) }}
	{{ HTML::script(asset('components/vendor/jquery-ui/ui/jquery.ui.mouse.js')) }}
	{{ HTML::script(asset('components/vendor/jquery-ui/ui/jquery.ui.widget.js')) }}
	{{ HTML::script(asset('components/vendor/jquery-ui/ui/jquery.ui.sortable.js')) }}
	{{ HTML::script(asset('components/jquery.mjs.nestedSortable.js')) }}
	{{ HTML::script(asset('components/jquery.nestedCookie.js')) }}
	{{ HTML::script(asset('components/vendor/alertify.js/lib/alertify.js')) }}
	{{ HTML::script(asset('components/jquery.listenhancer.js')) }}
	{{ HTML::script(asset('components/jquery.slug.js')) }}
	{{ HTML::script(asset('components/vendor/dropzone/downloads/dropzone.js')) }}
	{{ HTML::script(asset('components/vendor/bootstrap/js/tab.js')) }}
	{{ HTML::script(asset('components/vendor/bootstrap/js/dropdown.js')) }}
	{{ HTML::script(asset('components/vendor/moment/moment.js')) }}
	{{ HTML::script(asset('components/vendor/bootstrap3-datetimepicker/src/js/bootstrap-datetimepicker.js')) }}
	{{ HTML::script(asset('components/vendor/bootstrap3-datetimepicker/src/js/locales/bootstrap-datetimepicker.'.Config::get('app.locale').'.js')) }}

	{{ HTML::script(asset('//tinymce.cachefly.net/4/tinymce.min.js')) }}

	{{ HTML::script(asset('js/general.js')) }}

	@yield('js')
	@yield('head')

</head>

<body>

{{ $navBar }}

<div class="container-global col-xs-12">

	@yield('menu')

	<script type="text/javascript">
		{{ Notification::showError('alertify.error(":message");') }}
		{{ Notification::showInfo('alertify.log(":message");') }}
		{{ Notification::showSuccess('alertify.success(":message");') }}
	</script>

	@yield('header')

	<div class="btn-group pull-right">
		@foreach (Config::get('app.locales') as $locale)
			<a class="btn btn-default btn-sm @if($locale == Session::get('locale')) active @endif" href="?locale={{ $locale }}">{{ $locale }}</a>
		@endforeach
	</div>

	@yield('buttons')

	@yield('main')

	@include('admin._footer')

</div>

</body>

</html>