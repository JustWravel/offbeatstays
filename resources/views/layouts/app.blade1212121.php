<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	@livewireStyles()
	<livewire:styles>
	@livewireScripts()
	<livewire:scripts>
</head>
<body>
	@yield('content')
	@livewire('front.home-component')

</body>
</html>